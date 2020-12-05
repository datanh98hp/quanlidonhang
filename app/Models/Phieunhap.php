<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieunhap extends Model
{
    use HasFactory;

    protected $table = 'phieunhap';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'Tgian_nhap',
        'Description',
    ];


    //
    public function vatlieu()
    {
        return $this->hasMany('App\Models\Vatlieu');
    }
}
