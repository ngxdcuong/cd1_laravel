<?php

namespace App\Http\Controllers;
use App\Models\Salary;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\Employee;

class SalaryController extends Controller {

    public function index(Request $request)
    {
        $employees = Employee::all(); // Lấy danh sách nhân viên
        $positions = Position::all(); // Lấy danh sách chức vụ
    
        // Truy vấn danh sách lương kèm theo nhân viên và chức vụ
        $query = Salary::with('employee.position');
    
        // Lọc theo nhân viên (nếu có)
        if ($request->has('employee_id') && $request->employee_id != '') {
            $query->where('employee_id', $request->employee_id);
        }
    
        // Lọc theo chức vụ (nếu có)
        if ($request->has('position_id') && $request->position_id != '') {
            $query->whereHas('employee', function ($q) use ($request) {
                $q->where('position_id', $request->position_id);
            });
        }
    
        $salaries = $query->get(); // Lấy danh sách sau khi lọc
    
        return view('salaries.index', compact('salaries', 'employees', 'positions'));
    }
    
}