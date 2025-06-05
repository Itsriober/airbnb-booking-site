<?php
namespace App\Http\Controllers\installer;

use Config;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\PurchaseVerify;
use App\Classes\DatabaseManager;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Classes\EnvironmentManager;
use App\Classes\PermissionsChecker;
use App\Classes\FinalInstallManager;
use App\Classes\RequirementsChecker;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Classes\InstalledFileManager;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InstallerController extends Controller
{
    private $databaseManager;
    protected $requirements;
    protected $permissions;
    protected $environmentManager;

    public function __construct(DatabaseManager $databaseManager, RequirementsChecker $checker, PermissionsChecker $pchecker, EnvironmentManager $environmentManager)
    {
        $this->databaseManager = $databaseManager;
        $this->requirements = $checker;
        $this->permissions = $pchecker;
        $this->environmentManager = $environmentManager;
    }

    public function installContent()
    {
        $phpSupportInfo = $this->requirements->checkPHPversion(config('installer.core.minPhpVersion'));
        $requirements = $this->requirements->check(config('installer.requirements'));
        $permissions = $this->permissions->check(config('installer.permissions'));
        return view('installer.index', compact('phpSupportInfo', 'requirements', 'permissions'));
    }

    public function requirement(Request $request)
    {
        if ($request->ajax()) {
            $phpSupportInfo = $this->requirements->checkPHPversion(config('installer.core.minPhpVersion'));
            $requirements = $this->requirements->check(config('installer.requirements'));
            if (isset($requirements['errors']) || isset($phpSupportInfo['supported']) !== true) {
                return response()->json(['status' => false, 'message' => 'Please make sure Server Requirements']);
            } else {
                return response()->json(['status' => true]);
            }
        }
        return redirect(404);
    }

    public function permission(Request $request)
    {
        if ($request->ajax()) {
            $permissions = $this->permissions->check(config('installer.permissions'));
            if (isset($permissions['errors']) == true) {
                return response()->json(['status' => false, 'message' => 'Please make sure folder Permissions']);
            } else {
                return response()->json(['status' => true]);
            }
        }
        return redirect(404);
    }

    public function environment(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'app_name' => 'required',
                'app_debug' => 'required',
                'environment' => 'required',
                'app_log_level' => 'required',
                'app_url' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()]);
            }
            Session::put('environment', $request->all());
            return response()->json(['status' => true]);
        }
        return redirect(404);
    }

    public function database(Request $request)
    {
        $request->merge(Session::get('environment'));
        try {
            $rules = config('installer.environment.form.rules');
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()]);
            }
            if (!$this->checkDatabaseConnection($request)) {
                return response()->json(['status' => false, 'message' => "Could not connect to the database."]);
            }
            $results = $this->environmentManager->saveFileWizard($request);
            return response()->json(['status' => true, 'message' => "d", 'url' => route('install.import-demo')]);
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function importDemo()
    {
        return view('installer.index');
    }

    public function imported(Redirector $redirect)
    {
        try {
            if (Request()->demo_import == "on") {
                $sql = File::get(public_path('demo.sql'));
                DB::connection()->getPdo()->exec($sql);
            } else {
                $this->databaseManager->migrateAndSeed();
            }
            return $redirect->route('install.final');
        } catch (\Throwable $th) {
            return $redirect->route('install.final');
        }
    }

    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $filePath = storage_path('app/public/file.txt');
        if (File::exists($filePath)) {
            $purchaseCode = File::get($filePath);
            PurchaseVerify::create(['purchase_code' => $purchaseCode]);
        }
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();
        $storagePath = public_path('storage');
        Artisan::call('cache:clear');
        return view('installer.index', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }

    private function checkDatabaseConnection(Request $request)
    {
        $connection = $request->input('database_connection');
        $settings = config("database.connections.$connection");

        config([
            'database' => [
                'default' => $connection,
                'connections' => [
                    $connection => array_merge($settings, [
                        'driver' => $connection,
                        'host' => $request->input('database_hostname'),
                        'port' => $request->input('database_port'),
                        'database' => $request->input('database_name'),
                        'username' => $request->input('database_username'),
                        'password' => $request->input('database_password'),
                    ]),
                ],
            ],
        ]);

        DB::purge();

        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }

    public function purchaseCode(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'purchase_code' => 'required',
                'email' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()]);
            }

            
            Storage::disk('local')->put('public/file.txt', $request->purchase_code);

            
            $filePath = base_path('config/app.php');
            $currentContent = file_get_contents($filePath);
            $keyToModify = "'app_verify' => false,";
            $newValue = "    'app_verify' => true,";
            $updatedContent = str_replace($keyToModify, $newValue, $currentContent);
            file_put_contents($filePath, $updatedContent);

            return response()->json(['status' => true, 'message' => 'Purchase code accepted']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}