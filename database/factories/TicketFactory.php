<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Admin\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'ticket_no' => $faker -> randomNumber(),
        'case_report' => $faker -> text(30),
        'department_id' => $faker -> numberBetween(1,4),
        'medical_file_id' => $faker -> numberBetween(1,5),
    ];
});
