<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'hospital_id'];

    public function hospitals()
    {
        return $this -> belongsToMany(Hospital::class, hospital_department::class);
    }

    public function tickets()
    {
        return $this -> hasMany(Ticket::class);
    }
}
