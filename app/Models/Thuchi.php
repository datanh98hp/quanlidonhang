<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuchi extends Model
{
    use HasFactory;
    protected $table = 'thuchi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'NDCV',
        'SoTen_Thu',
        'SoTen_Chi',
        'id_user'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}
