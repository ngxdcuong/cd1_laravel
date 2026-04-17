<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index() {
        return view('attendance.index');
    }

    public function checkIn(Request $request) {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);

        $employeeId = $request->employee_id;

        // Kiểm tra nhân viên đã check-in nhưng chưa check-out chưa?
        $lastAttendance = Attendance::where('employee_id', $employeeId)
                                    ->whereNull('check_out')
                                    ->first();

        if ($lastAttendance) {
            return back()->with('error', 'Bạn cần check-out trước khi check-in lại.');
        }

        // Lưu check-in
        Attendance::create([
            'employee_id' => $employeeId,
            'check_in' => Carbon::now(),
        ]);

        return back()->with('success', 'Check-in thành công!');
    }

    public function checkOut(Request $request) {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);
    
        $employeeId = $request->employee_id;
    
        // Lấy lần check-in gần nhất chưa check-out
        $attendance = Attendance::where('employee_id', $employeeId)
            ->whereNull('check_out')
            ->first();
    
        if (!$attendance) {
            return response()->json(['message' => 'Không tìm thấy lần check-in hợp lệ'], 404);
        }
    
        // Lấy thời gian check-out hiện tại
        $checkOutTime = Carbon::now();
        
        // Chuyển đổi check_in thành đối tượng Carbon để tính toán
        $checkInTime = Carbon::parse($attendance->check_in);
        
        // Tính số giờ làm việc
        $workHours = $checkInTime->diffInHours($checkOutTime) + 
                     ($checkInTime->diffInMinutes($checkOutTime) % 60) / 60;
    
        // Cập nhật dữ liệu check-out
        $attendance->update([
            'check_out' => $checkOutTime,
            'work_hours' => $workHours
        ]);

        return back()->with('success', 'Check-out thành công!');
    }
}
