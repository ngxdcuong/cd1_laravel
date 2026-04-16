<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'dob',
        'gender',
        'position_id',
        'salary',
        'hire_date',
        'status'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
