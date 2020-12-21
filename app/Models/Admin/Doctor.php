<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name', 'spec', 'image_path', 'image_name', 'hospital_id'];

    public function hospital()
    {
        return $this -> belongsTo(Hospital::class);
    }
//
    public function medicals()
    {
        return $this -> hasMany(MedicalFile::class);
    }

    public function media()
    {
        return $this -> hasOne(Media::class);
    }

    protected $appends = ['profile_picture_path'];

    public function getProfilePicturePathAttribute()
    {
        return 'storage' . DS . $this->image_path . DS . $this->image_name;
    }

//    public function patients()
//    {
//        return $this -> hasMany(Patient::class);
//    }

//    public function getProfilePicturePathAttribute($profile_picture_path)
//    {
//        ########### profile picture path\profile picture name ###########
//        return $profile_picture_path.DS.$this->getAttribute('profile_picture');
//    }
}
