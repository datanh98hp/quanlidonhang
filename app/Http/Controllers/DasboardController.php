<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donhang;
use App\Models\Thuchi;
use App\Models\Khachhang;
use App\Models\Vatlieu;
use App\Models\Mathang;
use App\Models\User;
use App\Models\Banggia;
use Carbon\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DasboardController extends Controller
{
    //
    // function dates_month($month, $year) {
    //     $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    //     $dates_month = array();
    
    //     for ($i = 1; $i <= $num; $i++) {
    //         $mktime = mktime(0, 0, 0, $month, $i, $year);
    //         $date = date("d-M-Y", $mktime);
    //         $dates_month[$i] = $date;
    //     }
    
    //     return $dates_month;
    // }
    public function display()
    {
        $TongDonhang =Donhang::whereDate('created_at',date('Y-m-d') )->count();
        $TongDonhang_thang =Donhang::whereMonth('created_at',date('m') )->count();

        $TongDonhangHoanThanh = Donhang::whereDate('created_at',date('Y-m-d') )
                                        ->where('Trang_thai','Hoàn thành')->count();
        $DH_HT = Donhang::where('Trang_thai','Hoàn thành')->whereDate('created_at',date('Y-m-d') )->get();

        $tong_gt = 0;
        foreach ($DH_HT as $key => $value) {
            $tong_gt+= $DH_HT[$key]->Tong_gia;
        }
        // 
        $thuchi = Thuchi::all();

        $day = date('Y-m-d');

        $thuchiInday = Thuchi::whereDate('created_at',date('Y-m-d'))->get();
        $thuchiMonth = Thuchi::whereMonth('created_at',date('n'))->get();
        // dd( $thuchiInday);
        $month_thu = 0;
        $month_chi = 0;
         foreach ($thuchiMonth as $key => $value) {
             $month_thu+=$thuchi[$key]->SoTen_Thu;
             $month_chi+=$thuchi[$key]->SoTen_Chi;
         }

         $day_thu = 0;
        $day_chi = 0;
         foreach ($thuchiInday as $key => $value) {
             $day_thu+=$thuchi[$key]->SoTen_Thu;
             $day_chi+=$thuchi[$key]->SoTen_Chi;

         }
        $a = $thuchi->count();
        $arr_data = $thuchi->toArray();
        // 
        return view('dashboard',[
            'countDonhang'=>$TongDonhang,
            'TongDonhang_thang'=>$TongDonhang_thang,
            'countDh_Hoanthanh'=>$TongDonhangHoanThanh,
            'count_gt_Dh_ht'=>$tong_gt,
           'month_thu'=>$month_thu,
           'month_chi'=>$month_chi,
           'day_thu'=>$day_thu,
           'day_chi'=>$day_chi,
            ]);
    }
    public function getDataToChart(){
        $data = Thuchi::whereDate('created_at','<=',date('Y-m-d'))->get();
        return ($data);
    }
    public function baocao_donhang(){
        $dh = Donhang::all();
        $kh = Khachhang::all();
        return view('Baocao.bc-Donhang.baocao-dh',['dh'=>$dh,'kh'=>$kh]);
    }
    public function get_baocao_donhang(Request $request){
        try {
            //code...
            $start = $request->input('startdate');
            $end = $request->input('enddate');
            $users = User::all();
            $dh = Donhang::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->orderBy('id')->get();
            if($dh->count()==0){
                return redirect('/bao-cao-dh')->with('status','Chưa có đơn hàng nào trong khoảng thời gian này. Vui lòng chọn khoảng thời gian khác');
            }else {
                    # code...
                    $tonggia=0;
                foreach ($dh as $key => $value) {
                    # code...
                    $tonggia+=$dh[$key]->Tong_gia;

                }  
                    return view('Baocao.bc-Donhang.printBaocao-Donhang',['dh'=>$dh,'start'=>$start,'end'=>$end,'users'=>$users,'tonggia'=>$tonggia]);
            }
        

        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/bao-cao-dh')->with('status','Thời gian không được để trống.');
        }
        
    }
   public function baocao_tonkho(){
    $users = User::all();
    $vl_ton = Vatlieu::whereDate('Soluong_ton','>=',0)->orderBy('TenVL')->get();
    $dh = Donhang::where('Trang_thai','Đang xử lí')->get();

    $mh_ton = Mathang::join('donhang','mathang.id_Donhang','=','donhang.id')->get();
    dd($mh_ton);

       return view('Baocao.bc-Tonkho.printBaocao-Tonkho');
   }
    public function get_baocao_mathang_tonko(Request $request){
       
            //
            $users = User::all();
            // $vl_ton = Vatlieu::whereDate('Soluong_ton','>=',0)->orderBy('TenVL')->get();

            $dh = Donhang::where('Trang_thai','Đang xử lí')->get();
        
            $mh_ton = Mathang::join('donhang','mathang.id_Donhang','=','donhang.id')
                                ->join('banggia','mathang.id_Banggia','=','banggia.id')
                                ->select('mathang.*','banggia.id')
                                ->get();
            $users = User::all();
            $banggia = Banggia::all()->unique();
            $dh_tk =$dh->unique();
            $count_mh = [];
            
            // $arr_idBg_mh = DB::table('mathang')->join('banggia','mathang.id_Banggia','=','banggia.id')
            //                     ->select('mathang.id_Banggia','banggia.Tenloai','mathang.Soluong')
            //                     ->distinct()->get()->toArray();

            foreach ($mh_ton as $key => $value) {
                # code...
                array_push($count_mh,$mh_ton[$key]->id_Banggia);
            }
            $ls_mh = $mh_ton->unique();
            $kq_tk = array_count_values($count_mh);
            // dd($kq_tk[5]);
            

            return view('Baocao.bc-MathangTonkho.printBaocao-Tonkho',['mh_ton'=>$mh_ton,'ls_mh'=>$ls_mh,'banggia'=>$banggia,'donhang'=>$dh,'dh_tk'=>$dh_tk,'kq_tk'=>$kq_tk]);
        
    }
    
}
