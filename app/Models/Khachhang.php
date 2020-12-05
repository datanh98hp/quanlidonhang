<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $primaryKey ='id';
    protected $fillable = [
        'Hoten',
        'SDT',
        'Email',
        'typeKH',
        'Cty'
    ];

    public function donhang(){
        return $this->belongTo('App\Models\Donhang');
    }
}
