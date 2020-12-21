<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Hospital;
use Faker\Generator as Faker;

$factory->define(Hospital::class, function (Faker $faker) {
    return [
        'name' => 'Hospital . ' .$faker -> name,
        'address' => $faker -> streetName,
    ];
});
