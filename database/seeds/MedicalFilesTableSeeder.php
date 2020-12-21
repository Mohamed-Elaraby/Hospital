<?php

use Illuminate\Database\Seeder;

class MedicalFilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Admin\MedicalFile::class, 5)->create();
    }
}
