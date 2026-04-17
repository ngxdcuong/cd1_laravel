<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Attendance;
use App\Models\Employee;
use App\Observers\AttendanceObserver;
use App\Observers\EmployeeObserver;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }
}
