<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;

    protected $table = 'donhang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'Tg_giao',
        'Coc_truoc',
        'Trang_thai',
        'Tong_gia'
    ];

    public function Phieuxuat()//1-1
    {
        return $this->belongTo('App\Models\Phieuxuat');
    }
    
//
    public function Mathang()///1-N
    {
        return $this->hasMany('App\Models\Mathang');
    }

}
