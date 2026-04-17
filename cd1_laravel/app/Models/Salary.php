<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
        
    protected $table = 'salaries';

    protected $fillable = [
        'employee_id', 'employee_name', 'base_salary', 
        'total_work_hours', 'total_salary', 'salary_month'
    ];
    
    public $timestamps = false;

}
