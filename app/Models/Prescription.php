<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
   

 
   public static function getLastId()
   {
       $Prescription = self::latest()->first();

       return $Prescription ? $lastPrescription->id : null;
   }
}
