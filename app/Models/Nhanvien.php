<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    use HasFactory;
    protected $table = '_nhanvien';
    protected $primaryKey = 'id';
    protected $fillable  =[
        'Hoten',
        'sdt',
        'start_work',
        'end_work',
        'Hesoluong',
        'Position',
        'luong_h',
        'Tienluong',
    ]; 
}
