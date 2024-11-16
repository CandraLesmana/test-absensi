<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $guarded = ['id'];

    public function attendace()
    {
        return $this->belongsTo(Attendace::class, 'id', 'employee_id');
    }

    public function slip_gaji()
    {
        return $this->belongsTo(SlipGaji::class, 'id', 'employee_id');
    }
}
