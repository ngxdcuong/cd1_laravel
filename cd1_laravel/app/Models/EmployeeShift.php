<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EmployeeShift extends Model
{
    use HasFactory;
    

    protected $table = 'employee_shifts';
    protected $fillable = ['employee_id', 'shift_id', 'work_date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public $timestamps = false; 
}
