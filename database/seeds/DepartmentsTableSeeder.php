<?php

use App\Models\Admin\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['Cardiology', 'Neurology', 'Hepatology', 'Pediatrics'];

        foreach ($departments as $department){
            Department::create([
                'name' => $department,
            ]);
        }
    }
}
