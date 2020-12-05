<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Thiepcuoi;
class ThiepcuoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<=30;$i++){
            DB::table('thiepcuoi')->insert([
                'id_user'=>1,
                'KH'=>Str::random(10),
                'o_nhatrai'=>Str::random(15),
                'b_nhatrai'=>Str::random(15),
                'o_nhatgai'=>Str::random(15),
                'b_nhagai'=>Str::random(15),
                'of'=>Str::random(5),
                'chure'=>Str::random(15),
                'codau'=>Str::random(15),
                'bac_chure'=>Str::random(4),
                'bac_codau'=>Str::random(4),
                'time_an_trai'=>now()->format('H:i'),
                'time_tochuc_trai'=>now()->format('H:i'),
                'time_an_gai'=>now()->format('H:i'),
                'time_tochuc_gai'=>now()->format('H:i'),
                'diachi_nhatrai'=>Str::random(40),
                'diachi_nhagai'=>Str::random(40),
                'sdt_trai'=>'0'.rand(0,999999),
                'sdt_gai'=>'0'.rand(0,999999),
                'soluong_trai'=>rand(10,200),
                'soluong_gai'=>rand(10,200),
                'Tong_tien'=>rand(10,300000),
                'Dat_coc'=>rand(10,200000),
                'code_thiep'=>Str::random(6),
                'ngay_tra'=>now()->format('d/m/y H:i'),
                ]);
        }
        
    }
}
