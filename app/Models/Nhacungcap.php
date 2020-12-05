<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    use HasFactory;
    protected $table = 'nhacungcaps';
    protected $primaryKey ='id';
    protected $fillable = [
        'TenNCC',
        'DiaChi',
        'Hotline',
        'Daidien'
    ];
    public function vatlieu()
    {
        return $this->belongsTo('App\Models\Vatlieu');
    }
}
