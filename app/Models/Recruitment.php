<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $table = 'recruitments';

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'position_id',
        'description',
        'location',
    ];

    public $timestamps = false;

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
