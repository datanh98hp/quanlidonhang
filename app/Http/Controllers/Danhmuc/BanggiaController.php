<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banggia;

class BanggiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $bg = new Banggia;
        $bg->TenLoai = $request->input('TenLoai');
        $bg->Dongia = $request->input('Dongia');
        $bg->Donvi = $request->input('Donvi');
        $bg->save();

        return redirect('danh-muc')->with('statusBG','Thêm loại sản phẩm thành công.');
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
        $bg = Banggia::find($id);
        return view('danhmuc.banggia.Edit-loai-mh',['bg'=>$bg]);
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
        $bg = Banggia::find($id);
        $bg->TenLoai = $request->input('TenLoai');
        $bg->Dongia = $request->input('Dongia');
        $bg->Donvi = $request->input('Donvi');
        $bg->save();
        return redirect('/thongbao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xac_nhan_xoa($id)
    {
        return view('danhmuc.banggia.xoa-bg',['id'=>$id]);
    }
    public function destroy($id)
    {
        //
        $bg = Banggia::find($id);
        $bg->delete();
        return redirect('danh-muc')->with('status','Đã Xóa loại mặt hàng thành công.');

        
    }
}
