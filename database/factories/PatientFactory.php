<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name' => 'Patient . ' .$faker -> name,
        'status' => $faker -> numberBetween(0,1),
        'identify' => $faker -> ean8,
        'hospital_id' => $faker -> numberBetween(1,2),
        'doctor_id' => $faker -> numberBetween(1,3)
    ];
});
