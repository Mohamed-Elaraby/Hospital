<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['name', 'address'];

    public function departments()
    {
        return $this -> belongsToMany(Department::class, hospital_department::class);
    }

    public function doctors()
    {
        return $this -> hasMany(Doctor::class);
    }

    public function patients()
    {
        return $this -> hasMany(Patient::class);
    }
}
