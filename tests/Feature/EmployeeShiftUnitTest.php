<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\EmployeeShift;

class EmployeeShiftUnitTest extends TestCase
{
    /** @test */
    public function it_calculates_salary_with_8_hours()
    {
        $shift = new EmployeeShift(['hours' => 8]);
        $salary = $shift->calculateSalary(50000);

        dump("Hours=8, Rate=50000, Salary={$salary}");

        $this->assertEquals(400000, $salary);
    }

    /** @test */
    public function it_calculates_salary_with_0_hours()
    {
        $shift = new EmployeeShift(['hours' => 0]);
        $salary = $shift->calculateSalary(50000);

        dump("Hours=0, Rate=50000, Salary={$salary}");

        $this->assertEquals(0, $salary);
    }

    /** @test */
    public function it_calculates_salary_with_4_hours()
    {
        $shift = new EmployeeShift(['hours' => 4]);
        $salary = $shift->calculateSalary(60000);

        dump("Hours=4, Rate=60000, Salary={$salary}");

        $this->assertEquals(240000, $salary);
    }

    /** @test */
    public function it_calculates_salary_with_10_hours()
    {
        $shift = new EmployeeShift(['hours' => 10]);
        $salary = $shift->calculateSalary(70000);

        dump("Hours=10, Rate=70000, Salary={$salary}");

        $this->assertEquals(700000, $salary);
    }
}
