<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MedicalFile extends Model
{
    protected $fillable = ['name', 'patientReport', 'patient_id', 'doctor_id'];

    public function patient()
    {
        return $this -> belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this -> belongsTo(Doctor::class);
    }

    public function tickets()
    {
        return $this -> hasMany(Ticket::class);
    }
}
