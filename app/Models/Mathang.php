<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mathang extends Model
{
    use HasFactory;

    protected $table = 'mathang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_Donhang',
        'id_Banggia',
        'Soluong',
        'Desc'
    ];

    public function Donhang()///1-n
    {
        return $this->belongTo('App\Models\Donhang');
    }
    public function Banggia()///1-n
    {
        return $this->belongTo('App\Models\Banggia');
    }
}
