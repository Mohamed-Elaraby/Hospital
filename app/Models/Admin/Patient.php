<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name', 'status', 'identify', 'doctor_id', 'hospital_id'];

    public function hospital()
    {
        return $this -> belongsTo(Hospital::class);
    }

    public function medicalFile()
    {
        return $this -> hasOne(MedicalFile::class);
    }

    public function getStatusAttribute($value)
    {
        return  $value == '0' ? 'In':'Out';
    }

//    public function doctor()
//    {
//        return $this -> belongsTo(Doctor::class);
//    }
}
