<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Doctor;
use Faker\Generator as Faker;

$factory->define(Doctor::class, function (Faker $faker) {
    return [
        'name' => 'DR. ' . $faker-> userName,
        'spec' => $faker-> jobTitle,
        'image_path' => null,
        'image_name' => 'default.png',
        'hospital_id' => $faker -> numberBetween(1,2)
    ];
});
