<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Phieunhap;
use App\Models\Nhacungcap;
use App\Models\Phieuxuat;


use App\Models\Vatlieu;
use App\Models\Donhang;
use Illuminate\Support\Facades\Auth;

class PhieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $phieunhap = Phieunhap::all();
        $phieuxuat = Phieuxuat::all()->except([1]);
        $ds_Donhang = Donhang::where('id_user',Auth::user()->id)->get();
        $ds_Vatlieu = Vatlieu::all();
        $ncc = Nhacungcap::all();
        return view('Vatlieu.vatlieu',[
            'phieunhap'=>$phieunhap,
            'phieuxuat'=>$phieuxuat,
            'username'=>Auth::user()->name,
            'ds_Donhang'=>$ds_Donhang,
            'ds_Vatlieu'=>$ds_Vatlieu,
            'ncc'=>$ncc
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_Phieunhap(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_phieunhap' => 'required|unique:Phieunhap|max:255',
            'TenVL' => 'required',
            'id_phieuxuat'=>'required|unique:Phieuxuat',
        ]);
        //
        // try {
            //code...
            $phieunhap = new Phieunhap;
            $phieunhap->id_user = Auth::user()->id;
            // $phieunhap->Tgian_nhap = now();
            $phieunhap->Description = $request->input('Description');
            $phieunhap->save();
    // 
            foreach ($request->input('TenVL') as $key => $id) {
                # code...
                try {
                    $vatlieu = Vatlieu::where('TenVL',$request->TenVL[$key])->first();

                    $vatlieu->TenVL = $request->TenVL[$key];
                    $vatlieu->Soluong_ton +=  $request->Soluong_ton[$key];
                    // $vatlieu->id_ncc = $request->id_ncc[$key];
                    // $vatlieu->Don_gia = $request->Don_gia[$key];
                    // $vatlieu->Donvi_tinh = $request->Donvi_tinh[$key];
                    $vatlieu->id_phieunhap  = $phieunhap->id;
                    $vatlieu->last_change = "+". $request->Soluong_ton[$key];
                    // $vatlieu->id_phieuxuat  = 1;
                    $vatlieu->update();
    
                } catch (\Throwable $th) {
                    $vatlieu = new Vatlieu;
                    $vatlieu->TenVL = $request->TenVL[$key];
                    $vatlieu->Soluong_ton = $request->Soluong_ton[$key];
                    $vatlieu->id_ncc = $request->id_ncc[$key];
                    $vatlieu->Don_gia = $request->Don_gia[$key];
                    $vatlieu->Donvi_tinh = $request->Donvi_tinh[$key];
                    $vatlieu->id_phieunhap  = $phieunhap->id;
                    $vatlieu->last_change = $request->Soluong_ton[$key];
                    // $vatlieu->id_phieuxuat  = 1;
                    $vatlieu->save();
                }

           }
            
            $phieunhap->save();
            // return $vatlieu;
            return redirect('/vatlieu')->with('status','Thêm thành công...');
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return redirect('/vatlieu')->withErrors($validator, 'TenVL')->with('status','Thêm thất bại ... Vui lòng kiểm tra lại dữ liệu nhập.');;
        // }
       
    }
    public function store_Phieuxuat(Request $request)
    {
        $validator = $request->validate([
            'TenDH'=>'required|unique:Donhang',
            'TenVL'=>'required',
            'Soluong_xuat'=>'required',
            
        ]);
        //
        try {
        $phieuxuat = new Phieuxuat;
        $phieuxuat->id_user = Auth::user()->id;
        // $phieuxuat->Tgian_xuat = now();
        $phieuxuat->id_Donhang = $request->input('TenDH');
        $phieuxuat->Description = $request->input('Description');
        $phieuxuat->save();
        // Cap nhat lai so luong vat lieu
        foreach ($request->input('TenVL') as $key => $id) {
            # code...
            $vatlieu = Vatlieu::where('TenVL',$request->TenVL[$key])->first();
            if($vatlieu->Soluong_ton>0){

                $vatlieu->Soluong_ton -= $request->Soluong_xuat[$key];
                $vatlieu->last_change = $request->Soluong_xuat[$key];
                $vatlieu->id_phieuxuat = $phieuxuat->id ;
                $vatlieu->update();
            }else{
                return redirect('/vatlieu')->with('status',' Số lượng đã hết...');
            }
            
        }
        
        return redirect('/vatlieu')->with('status','Thêm thành công...');
        } catch (\Throwable $th) {
            return redirect('/vatlieu')->with('status','Vui lòng nhập đầy đủ thông tin.');
        }
        
        // 
        return redirect('/vatlieu')->with('status','Thêm thành công...');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_Phieunhap ($id)
    {
        //
        $phieunhap = Phieunhap::find($id);
        $user = Auth::user()->name;
        $VL = Vatlieu::where('id_phieunhap',$id)->get();
        $coutnTongGia = 0;
        foreach ($VL as $key => $value) {
            $coutnTongGia+=( intval($VL[$key]->last_change) * $VL[$key]->Don_gia );
        }
        return view('Vatlieu.ChitietPhieuNhap',['phieunhap'=>$phieunhap,'user'=>$user,
        'coutnTongGia'=>$coutnTongGia,
        'VL'=>$VL
        ]);
    }
    public function show_Phieunxuat ($id)
    {
        //
        $phieuxuat = Phieuxuat::find($id);
        
        $VL = Vatlieu::where('id_phieuxuat',$id)->get();

        return view('Vatlieu.ChitietPhieuXuat',
        [
            'phieuxuat'=>$phieuxuat,
            
            'VL'=>$VL
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
