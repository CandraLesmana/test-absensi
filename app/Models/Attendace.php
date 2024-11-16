<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendace extends Model
{
    protected $table = 'attendaces';
    protected $guarded = ['id'];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}
