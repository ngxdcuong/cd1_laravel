<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    // Tên bảng (nếu bạn đặt khác mặc định)
    protected $table = 'menu_items';

    // Các field được phép insert/update
    protected $fillable = [
        'name',
        'price',
        'category',
        'image',
        'status'
    ];

    // Kiểu dữ liệu (không bắt buộc nhưng nên có)
    protected $casts = [
        'price' => 'float',
        'status' => 'boolean',
    ];

    // Giá trị mặc định
    protected $attributes = [
        'status' => 1,
    ];

    // (Tuỳ chọn) Scope lấy món đang bán
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}