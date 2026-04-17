<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
{
    $this->middleware('auth'); // Bắt buộc phải đăng nhập
}
    public function index()
    {
        $employees = Employee::with('position')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        if (!in_array(auth()->user()->role, ['admin', 'manager'])) {
            return redirect()->route('employees.index')->with('error', 'Bạn không có quyền thêm nhân viên.');
        }
    
        $positions = Position::all();
        return view('employees.create', compact('positions'));
    }

    public function store(Request $request)
{
    if (!in_array(auth()->user()->role, ['admin', 'manager'])) {
        return redirect()->route('employees.index')->with('error', 'Bạn không có quyền thêm nhân viên.');
    }

    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'nullable|email|unique:employees',
        'phone' => 'nullable|string|max:20|unique:employees',
        'address' => 'nullable|string',
        'dob' => 'nullable|date',
        'gender' => 'required|in:Nam,Nữ,Khác',
        'position_id' => 'nullable|exists:positions,id',
        'salary' => 'nullable|numeric',
        'hire_date' => 'nullable|date',
        'status' => 'required|in:active,inactive'
    ]);

    Employee::create($request->all());

    return redirect()->route('employees.index')->with('success', 'Thêm nhân viên thành công.');
}

public function edit($id)
{
    if (!in_array(auth()->user()->role, ['admin', 'manager'])) {
        return redirect()->route('employees.index')->with('error', 'Bạn không có quyền sửa nhân viên.');
    }

    $employee = Employee::findOrFail($id);
    $positions = Position::all();
    return view('employees.edit', compact('employee', 'positions'));
}

public function update(Request $request, $id)
{
    if (!in_array(auth()->user()->role, ['admin', 'manager'])) {
        return redirect()->route('employees.index')->with('error', 'Bạn không có quyền cập nhật nhân viên.');
    }

    // Kiểm tra dữ liệu đầu vào
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255|unique:employees,email,'.$id,
        'phone' => 'nullable|string|max:20|unique:employees,phone,'.$id,
        'address' => 'nullable|string',
        'dob' => 'nullable|date',
        'gender' => 'required|in:Nam,Nữ,Khác',
        'position_id' => 'nullable|exists:positions,id',
        'salary' => 'nullable|numeric|min:0',
        'hire_date' => 'nullable|date',
        'status' => 'required|in:active,inactive',
    ]);

    // Lấy nhân viên cần cập nhật
    $employee = Employee::findOrFail($id);

    // Cập nhật dữ liệu
    $employee->update([
        'full_name' => $request->full_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'dob' => $request->dob,
        'gender' => $request->gender,
        'position_id' => $request->position_id,
        'salary' => $request->salary,
        'hire_date' => $request->hire_date,
        'status' => $request->status,
    ]);

    return redirect()->route('employees.index')->with('success', 'Cập nhật nhân viên thành công.');
}

public function destroy(Employee $employee)
{
    if (!in_array(auth()->user()->role, ['admin', 'manager'])) {
        return redirect()->route('employees.index')->with('error', 'Bạn không có quyền xóa nhân viên.');
    }

    $employee->delete();

    return redirect()->route('employees.index')->with('success', 'Xóa nhân viên thành công.');
}

}
