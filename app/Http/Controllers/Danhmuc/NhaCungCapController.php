<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Nhacungcap;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
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
        $ncc = new Nhacungcap;
        $ncc->TenNCC = $request->input('TenNCC');
        $ncc->DiaChi = $request->input('DiaChi');
        $ncc->Hotline = $request->input('Hotline');
        $ncc->Daidien = $request->input('Daidien');
        $ncc->save();
        return redirect('/danh-muc')->with('status','Thêm nhà cung cấp thành công.');
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
        $ncc = Nhacungcap::find($id);

        return view('danhmuc.ncc.Edit-ncc',['ncc'=>$ncc]);
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
        $ncc = Nhacungcap::find($id);
        $ncc->TenNCC = $request->input('TenNCC');
        $ncc->DiaChi = $request->input('DiaChi');
        $ncc->Hotline = $request->input('Hotline');
        $ncc->Daidien = $request->input('Daidien');
        $ncc->update();

        return redirect('/danh-muc')->with('status','Cập nhật nhà cung cấp thành công.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xac_nhan_xoa($id)
    {
        return view('danhmuc.ncc.xoa-ncc',['id'=>$id]);
    }
    public function destroy($id)
    {
        //
        $ncc = Nhacungcap::find($id);
        $ncc->delete();
        return redirect('/danh-muc')->with('status','Xóa thành công nhà cung cấp...');
    }
}
