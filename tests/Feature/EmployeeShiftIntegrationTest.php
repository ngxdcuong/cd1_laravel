<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use App\Models\Shift;
use App\Models\EmployeeShift;

class EmployeeShiftIntegrationTest extends TestCase
{
    /** @test */
    public function it_can_show_create_form()
    {
        $response = $this->get(route('employee_shift.create'));

        $response->assertStatus(200);
        $response->assertSee('Phân Công Ca Làm Việc'); // kiểm tra view load
    }

    /** @test */
    public function it_can_assign_shift_to_employee()
    {
        // Lấy employee & shift từ DB thật
        $employee = Employee::first();
        $shift = Shift::first();

        $this->assertNotNull($employee, "Không tìm thấy nhân viên trong DB");
        $this->assertNotNull($shift, "Không tìm thấy ca làm trong DB");

        $response = $this->post(route('employee_shift.store'), [
            'employee_id' => $employee->id,
            'shift_id'    => $shift->id,
            'work_date'   => '2025-09-15',
            'hours'       => 8,
        ]);

        $response->assertRedirect(route('employee_shift.index'));

        $this->assertDatabaseHas('employee_shifts', [
            'employee_id' => $employee->id,
            'shift_id'    => $shift->id,
            'work_date'   => '2025-09-15',
        ]);
    }

    /** @test */
    public function it_can_update_employee_shift()
    {
        $employeeShift = EmployeeShift::first();

        $this->assertNotNull($employeeShift, "Không có phân công nào trong DB");

        $response = $this->put(route('employee_shift.update', $employeeShift->id), [
            'employee_id' => $employeeShift->employee_id,
            'shift_id'    => $employeeShift->shift_id,
            'work_date'   => $employeeShift->work_date,
            'hours'       => 10,
        ]);

        $response->assertRedirect(route('employee_shift.index'));

        $this->assertDatabaseHas('employee_shifts', [
            'id'    => $employeeShift->id,
            'hours' => 10,
        ]);
    }

    /** @test */
    public function it_can_delete_employee_shift()
    {
        $employeeShift = EmployeeShift::first();

        $this->assertNotNull($employeeShift, "Không có phân công nào trong DB");

        $response = $this->delete(route('employee_shift.destroy', $employeeShift->id));

        $response->assertRedirect(route('employee_shift.index'));

        $this->assertDatabaseMissing('employee_shifts', [
            'id' => $employeeShift->id,
        ]);
    }
}
