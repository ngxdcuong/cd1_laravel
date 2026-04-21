<?php

namespace App\Http\Controllers;

use App\Models\EmployeeShift;
use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Http\Request;

class EmployeeShiftController extends Controller
{
    public function index()
    {
        $employeeShifts = EmployeeShift::with(['employee', 'shift'])->orderBy('work_date', 'desc')->get();
        $employees = Employee::all();  // Lấy danh sách nhân viên
        return view('employee_shift.index', compact('employeeShifts', 'employees'));
    }
    
    public function create()
    {
        $employees = Employee::all();  // Lấy danh sách nhân viên
        $shifts = Shift::all();  // Lấy danh sách ca làm
        return view('employee_shift.create', compact('employees', 'shifts'));
    }
    
    public function edit($id)
    {
        $employeeShift = EmployeeShift::findOrFail($id);
        $employees = Employee::all();  // Lấy danh sách nhân viên
        $shifts = Shift::all();  // Lấy danh sách ca làm
        return view('employee_shift.edit', compact('employeeShift', 'employees', 'shifts'));
    }
    

    // Lưu phân công ca mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'shift_id' => 'required|exists:shifts,id',
            'work_date' => 'required|date',
        ]);

        try {
            EmployeeShift::create([
                'employee_id' => $request->employee_id,
                'shift_id' => $request->shift_id,
                'work_date' => $request->work_date,
            ]);

            return redirect()->route('employee_shift.index')->with('success', 'Phân công ca làm thành công!');
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi khi phân công ca: ' . $e->getMessage());
        }
    }

    // Cập nhật phân công ca
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'shift_id' => 'required|exists:shifts,id',
            'work_date' => 'required|date',
        ]);

        $employeeShift = EmployeeShift::findOrFail($id);
        $employeeShift->update([
            'employee_id' => $request->employee_id,
            'shift_id' => $request->shift_id,
            'work_date' => $request->work_date,
        ]);

        return redirect()->route('employee_shift.index')->with('success', 'Cập nhật thành công!');
    }

    // Xóa phân công ca
    public function destroy($id)
    {
        $employeeShift = EmployeeShift::findOrFail($id);
        $employeeShift->delete();

        return redirect()->route('employee_shift.index')->with('success', 'Xóa phân công thành công!');
    }
}
