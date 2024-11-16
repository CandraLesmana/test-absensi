<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlipGaji extends Model
{
    protected $table = 'slip_gajis';
    protected $guarded = ['id'];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}
