<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieuxuat extends Model
{
    use HasFactory;
    protected $table = 'phieuxuat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'Tgian_xuat',
        'id_Donhang',
    ];
    public function Donhang()
    {
        return $this->hasOne('App\Models\Donhang');
    }
    public function Vatlieu()
    {
        return $this->hasMany('App\Models\Vatlieu');
    }

}
