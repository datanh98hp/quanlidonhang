<?php

namespace App\Http\Controllers\Danhmuc;
use App\Models\Khachhang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KhachhangController extends Controller
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
        $kh = new Khachhang;
        $kh->Hoten = $request->input('Hoten');

        $kh->SDT = $request->input('SDT');
        $kh->Email = $request->input('Email');
        $kh->typeKH = $request->input('typeKH');
        $kh->Cty = $request->input('Cty');

        $kh->save();
        return redirect('/danh-muc') ->with('statusKH'.'Thêm thành công.');
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
        $kh = Khachhang::find($id);
        return view('Danhmuc.khachhang.edit-danhmuc-kh',['kh'=>$kh]);
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
        $kh = Khachhang::find($id);
        $kh->Hoten = $request->input('Hoten');

        $kh->SDT = $request->input('SDT');
        $kh->Email = $request->input('Email');
        $kh->typeKH = $request->input('typeKH');
        $kh->Cty = $request->input('Cty');

        $kh->update();

        return redirect('/thongbao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xac_nhan_xoa($id){
        return view('danhmuc.khachhang.xoa-kh',['id'=>$id]);
    }
    public function destroy($id)
    {
        //
        $kh = Khachhang::find($id);
        $kh->delete();
        return redirect('/danh-muc')->with('statusKH','Xóa thành công.');
    }
}
