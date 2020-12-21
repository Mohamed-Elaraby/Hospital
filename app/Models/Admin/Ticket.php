<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['case_report', 'department_id', 'medical_file_id', 'ticket_no'];

    public function medicalFile()
    {
        return $this -> belongsTo(medicalFile::class);
    }

    public function department()
    {
        return $this -> belongsTo(Department::class);
    }
}
