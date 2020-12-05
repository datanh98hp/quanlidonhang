<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thiepcuoi extends Model
{
    use HasFactory;
    
    protected $table = 'thiepcuoi';

    protected $primaryKey='id';
    protected $fillable  = [
        'id_user',
        'KH',
        'o_nhatrai',
        'b_nhatrai',
        'o_nhatgai',
        'b_nhagai',
        'qh',
        'of',
        'chure',
        'codau',
        'bac_chure',
        'bac_codau',
        'time_an_trai',
        'time_tochuc_trai',
        'time_an_gai',
        'time_tochuc_gai',
        'diachi_nhatrai',
        'diachi_nhagai',
        'sdt_trai',
        'sdt_gai',
        'soluong_trai',
        'soluong_gai',
        'Tong_tien',
        'Dat_coc',
        'code_thiep',
        'ngay_tra',

    ]; 
    
}
