<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Hotel;
use App\Models\Inquiry;
use App\Models\Tour;
use App\Models\Transport;
use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $page_title = translate('Inquiry Data');

        if ($user->role == 2) {
            $inquiry = Inquiry::where('author_id', $user->id)->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('type', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            })->latest()->paginate(10)->withQueryString();

            $data['total_inquiry']        = Inquiry::count();
            $data['tour_inquiry']         = Inquiry::where('type', 'tour')->count();
            $data['hotel_inquiry']        = Inquiry::where('type', 'hotel')->count();
            $data['activities_inquiry']   = Inquiry::where('type', 'activities')->count();
            $data['transport_inquiry']    = Inquiry::where('type', 'transport')->count();
            $data['visa_inquiry']         = Inquiry::where('type', 'visa')->count();
        } else {
            
            $inquiry = Inquiry::when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('type', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            })->latest()->paginate(10)->withQueryString();

            $data['total_inquiry']        = Inquiry::count();
            $data['tour_inquiry']         = Inquiry::where('type', 'tour')->count();
            $data['hotel_inquiry']        = Inquiry::where('type', 'hotel')->count();
            $data['activities_inquiry']   = Inquiry::where('type', 'activities')->count();
            $data['transport_inquiry']    = Inquiry::where('type', 'transport')->count();
            $data['visa_inquiry']         = Inquiry::where('type', 'visa')->count();
        }

        return view('backend.inquiry.index', compact('page_title', 'inquiry', 'data'));
    }

    public function changeStatus(Request $request)
    {

        $id = $_POST['id'];

        if ($id) {
            $inquiry = Inquiry::findOrFail($id);
            if ($inquiry->status == 1) {
                $inquiry->status = 2;
            } else {
                $inquiry->status = 2;
            }
        }
        if ($inquiry->update()) {
            $response =  'success';
            return response()->json($response);
        }
    }

    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $inquiry->delete();

        return back()->with('success', translate('Inquiry deleted successfully'));
    }
}
