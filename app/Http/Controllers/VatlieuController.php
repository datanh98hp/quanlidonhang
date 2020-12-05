<?php

namespace App\Http\Controllers;
use App\Models\Vatlieu;
use App\Models\Nhacungcap;
use Illuminate\Http\Request;

class VatlieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Vatlieu.vatlieu');
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
        //
        $vl = new Vatlieu;
        $vl->TenVL = $request->input('TenVL');
        $vl->Soluong_ton = $request->input('Soluong_ton');
        $vl->Don_gia = $request->input('Don_gia');
        $vl->Donvi_tinh = $request->input('Donvi_tinh');
        $vl->id_ncc = $request->input('id_ncc');
        
        $vl->save();
         return redirect('/danh-muc')->with('status','Thêm vật liệu mới thành công.');
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
        $vl = Vatlieu::find($id);
        $ncc = Nhacungcap::all();
        return view('danhmuc.vatlieu.Edit-vl',['vl'=>$vl,'ncc'=>$ncc]);
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
        $vl = Vatlieu::find($id);
        $vl->TenVL = $request->input('TenVL');
        $vl->Soluong_ton = $request->input('Soluong_ton');
        $vl->Don_gia = $request->input('Don_gia');
        $vl->Donvi_tinh = $request->input('Donvi_tinh');
        $vl->id_ncc = $request->input('id_ncc');
        
        $vl->save();

        return redirect('/danh-muc')->with('status','Cập nhật thông tin vật liệu thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xac_nhan_xoa($id)
    {
        return view('danhmuc.vatlieu.xoa-vl',['id'=>$id]);
    }
    public function destroy($id)
    {
        //
        $vl = Vatlieu::find($id);
        $vl->delete();
        return redirect('/danh-muc')->with('statusVL','Xóa thành công.');
    }
}
