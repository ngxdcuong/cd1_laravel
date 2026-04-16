<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model {
    use HasFactory;

    protected $table = 'attendances';
    protected $fillable = ['employee_id', 'check_in', 'check_out', 'work_hours'];

    public $timestamps = false; 


    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    protected static function booted()
    {
        static::created(function ($attendance) {
            $attendance->updateSalary();
        });

        static::updated(function ($attendance) {
            $attendance->updateSalary();
        });

        static::deleted(function ($attendance) {
            $attendance->updateSalary();
        });
    }

    public function updateSalary()
{
    $employeeId = $this->employee_id;
    
    \Log::info("Cập nhật lương cho nhân viên ID: " . $employeeId);

    // Tổng số giờ làm của nhân viên này
    $totalHours = Attendance::where('employee_id', $employeeId)->sum('work_hours');

    \Log::info("Tổng số giờ làm: " . $totalHours);

    // Lấy thông tin lương của nhân viên
    $salary = Salary::where('employee_id', $employeeId)->first();

    if ($salary) {
        // Cập nhật lại tổng giờ làm và tổng lương
        $salary->total_work_hours = $totalHours;
        $salary->total_salary = $salary->base_salary * $totalHours;
        $salary->save();

        \Log::info("Cập nhật xong: " . $salary->total_salary);
    } else {
        \Log::error("Không tìm thấy bản ghi lương của nhân viên ID: " . $employeeId);
    }
}

}
