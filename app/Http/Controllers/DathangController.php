<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Donhang;
use App\Models\Mathang;
use App\Models\Banggia;
use App\Models\Khachhang;
use Illuminate\Support\Facades\Auth;

class DathangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $donhang = Donhang::all();
       $bg = Banggia::all();
       $kh = Khachhang::all();
       $username = Auth::user()->name;
        return view('ketoan.listBill',['donhang'=>$donhang,'username'=>$username,'bg'=>$bg,'kh'=>$kh]);
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
    public function store(Request $request)
    {
        // Thêm tt Khách hàng

        // $kh = new Khachhang;

        // $kh->updateOrCreate([
        //     'Hoten'=>$request->input('Hoten'),
        //     'SDT'=>$request->input('SDT'),
        //     'Email'=>$request->input('Email'),
        //     'Cty'=>$request->input('Cty'),
        // ]);
        //
        $donhang = new Donhang;
        $donhang->id_user = Auth::user()->id;
        $donhang->id_Khachhang = $request->input('id_Khachhang');
        $donhang->Tg_giao = $request->input('Tg_giao');
        $donhang->TenDH = $request->input('TenDH');
        $donhang->Coc_truoc = $request->input('Coc_truoc');
        $donhang->Trang_thai = 'Đang xử lí';
        $donhang->Tong_gia = 0;
        $donhang->save();
///
        $banggia = Banggia::all();

        $giaDon= 0;
        $dongia=0;
        foreach ($request->input('id_Banggia') as $key=>$id) {
         
            $mathang = new Mathang;
            $mathang->id_Donhang = $donhang->id;
            $mathang->id_Banggia = $request->id_Banggia[$key];
            $mathang->Soluong = $request->Soluong[$key];
           
            $mathang->save();
  
            foreach ($banggia as $bg) {
                if ($bg->id==$mathang->id_Banggia) {
                    $dongia=$bg->Dongia;
                }
            }

            $giaDon += $mathang->Soluong * $dongia;

        }
        $donhang->Tong_gia = $giaDon - $donhang->Coc_truoc;
        $donhang->update(); 
        return redirect('/dathang')->with('status','Thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      
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
        $donhang = Donhang::find($id);
        $username = Auth::user()->name;
        $mathang = Mathang::where('id_Donhang',$id)->get();
        $bg = Banggia::all();
        return view('ketoan.EditBill',['username'=>$username,'donhang'=>$donhang,'mathang'=>$mathang,'bg'=>$bg]);
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
       
        // try {
                    //
        $donhang = Donhang::find($id);
        $donhang->id_user = Auth::user()->id;
        $donhang->Tg_giao = $request->input('Tg_giao');
        $donhang->Coc_truoc = $request->input('Coc_truoc');
        $donhang->Trang_thai = 'Đang xử lí';
        $donhang->Tong_gia = 0;
        $donhang->update();
  
        Mathang::where('id_Donhang',$id)->delete(); // xóa cái cũ
        $giaDonHang= 0;
        $dongia=0;
        $banggia = Banggia::all();
        foreach ($request->input('id_Banggia') as $key=>$key) {
         // cập nhật lại list mat hàng
                $mh = new Mathang;
                
                $mh->updateOrCreate([
                    'id_Donhang'=>$id,
                    'id_Banggia'=>$request->id_Banggia[$key],
                    'Soluong'=> $request->Soluong[$key],
                    ]);
                   
           // 
            // foreach ($banggia as $bg) {
            //     if ($bg->id == $mh->id_Banggia) {
            //         $dongia = $bg->Dongia;
            //     }
            // }

            // $giaDonHang += $mh->Soluong * $dongia;

        }

        $mathang = Mathang::where('id_Donhang',$id)->get();

        for ($i=0; $i < $mathang->count(); $i++) { 
            # code...
            for ($j=0; $j < $banggia->count(); $j++) { 
                # code...
                if ($mathang[$i]->id_Banggia==$banggia[$j]->id) {
                    # code...
                    $dongia=$banggia[$j]->Dongia;
                    //tinh $

                }
            }
            $giaDonHang+=($mathang[$i]->Soluong * $dongia);
        }
      
        $donhang->Tong_gia =  $giaDonHang;
        $donhang->update();

        return redirect('/dathang')->with('status','Cập nhật thành công.');
    //     } catch (\Throwable $th) {
    //        return redirect('/dathang');
    //     }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function Del_one_Mathang($id){

        $mathang = Mathang::find($id);

        // CAP NHAT LẠI DƠN HÀNG
        $dh = Donhang::find($mathang->id_Donhang);
        // $dh->Tong_gia = 0;$dh->update();
        $mathang->delete();//xóa
        
        // $mh_of_DH = Mathang::where('id_Donhang',$dh->id); // tim ds mh còn lại trong dơn hàng
        // $tongGiaDH = 0;

        // foreach ($mh_of_DH as $key => $value) {
        //     $tongGiaDH += ($mh_of_DH[$key]->Soluong * $mh_of_DH[$key]->Don_gia );
        // }
        
        // $dh->Tong_gia = $tongGiaDH; 
        // $dh->update();
            
        return redirect('/edit-donhang'.'/'.$dh->id)->with('status','Cập nhật thành công.');
        
    }
    public function XacNhanXoa_one_Mathang($id){
        
        return view('ketoan.XoaMh',['id'=>$id]);
    }
    public function hoanthanh(Request $request, $id){
        try {
            //
            $donhang = Donhang::find($id);
          
            $donhang->Trang_thai = 'Hoàn thành';
         
            $donhang->update(); 
            return redirect('edit-donhang'.'/'.$id)->with('status','Cập nhật thành công. Đã xác nhận đơn hàng.');
            } catch (\Throwable $th) {
            return redirect('edit-donhang'.'/'.$id)->with('status','Không thể cập nhật bản ghi này ... '.$th);
            }
    }
    public function bo_hoanthanh(Request $request, $id){
        try {
            //
            $donhang = Donhang::find($id);
          
            $donhang->Trang_thai = 'Đang xử lí';
         
            $donhang->update(); 
            return redirect('edit-donhang'.'/'.$id)->with('status','Cập nhật thành công. Đã bỏ xác nhận đơn hàng.');
            } catch (\Throwable $th) {
            return redirect('edit-donhang'.'/'.$id)->with('status','Không thể cập nhật bản ghi này ... '.$th);
            }
    }
    public function destroy($id)
    {
    
    try {

        Mathang::where('id_Donhang',$id)->delete();
        $donhang = Donhang::find($id);
        $donhang->delete();
        return redirect('/dathang')->with('status','Xóa thành công đơn hàng....');
    } catch (\Throwable $th) {
       return redirect('/dathang')->with('status','Vui lòng kiểm tra lại thông tin. Phiếu xuất tồn tại mã mặt hàng này'.$th);
    }
    }
    public function print($id){

        $donhang = Donhang::find($id);
        $list_mh = Mathang::where('id_Donhang',$id)->get();

        $tong_Gia = 0;
        $banggia = Banggia::all();
        $dg = 0;
        
        for ($i=0; $i < $list_mh->count(); $i++) { 
            # code...
            for ($j=0; $j < $banggia->count(); $j++) { 
                # code...
                if ($list_mh[$i]->id_Banggia==$banggia[$j]->id) {
                    # code...
                    $dg=$banggia[$j]->Dongia;
                    //tinh $

                }
            }
            $tong_Gia+=($list_mh[$i]->Soluong * $dg);
        }

        return view('ketoan.PrintHoadon',
        [
            'dh'=>$donhang,
            'list_dh'=>$list_mh,
            'banggia'=>$banggia,
            'tonggia'=>$tong_Gia,
        ]
        );
    }
}
