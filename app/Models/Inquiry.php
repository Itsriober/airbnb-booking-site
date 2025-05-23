<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    public function statusBadge($status)
    {
        if ($status == 1) {
            return '<span class="badge bg-warning rounded-pill px-4">Received</span>';
        } else {
            return '<span class="badge bg-success rounded-pill px-4">Feedback</span>';
        }
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function countries()
    {
        return $this->belongsTo(Location::class, 'country_id');
    }

    public function galleries()
    {
        return $this->hasMany(VisaInquiryGallery::class, 'visa_inquiry_id');
    }

    public function visa_types()
    {
        return $this->belongsTo(VisaCategory::class, 'visa_type');
    }

    
}
