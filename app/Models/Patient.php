<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
   
    use HasFactory;

    public function blood()
    {
        return $this->belongsTo(Blood::class, 'bloods_id');
    }
    public function gender()
    {
        return $this->belongsTo(Blood::class, 'genders_id');
    }
    public function type()
    {
        return $this->belongsTo(Blood::class, 'types_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Blood::class, 'doctors_id');
    }
}
