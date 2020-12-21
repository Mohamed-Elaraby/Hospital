<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\MedicalFile;
use Faker\Generator as Faker;

$factory->define(MedicalFile::class, function (Faker $faker) {
    return [
        'name' => 'File Number . ' .$faker -> randomNumber(4),
        'patient_id' => $faker -> numberBetween(1,5),
        'doctor_id' => $faker -> numberBetween(1,3)
    ];
});
