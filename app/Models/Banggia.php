<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banggia extends Model
{
    use HasFactory;
    protected $table='banggia';
    protected $primaryKey = 'id';
    protected $fillable = [
        'TenLoai',
        'Dongia',
        'Donvi'
    ];
    public function mathang(){
        return $this->hasMany('\App\Models\Mathang');
    }
}
