<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    
    protected $fillable = [
        'username',    // Nếu bạn muốn dùng username
        'password',
        'role',        // Vai trò của tài khoản (admin, quản lý, nhân viên)
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'username'; // Laravel sẽ dùng username để đăng nhập
    }

    
}
