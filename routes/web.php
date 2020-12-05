<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanvienController;
use App\Http\Controllers\ThiepcuoiController;
use App\Http\Controllers\DathangController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\VatlieuController;
use App\Http\Controllers\ManagerUserController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\PhieuController;
use App\Http\Controllers\ThuchiController;
use App\Http\Controllers\Danhmuc\DanhmucController;
use App\Http\Controllers\Danhmuc\KhachhangController;
use App\Http\Controllers\Danhmuc\BanggiaController;
use App\Http\Controllers\Danhmuc\NhaCungCapController;
use App\Http\Controllers\BackupController;


use App\Http\Middleware\ChecTypeUser;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',function ()
{
    return redirect('/dashboard');
});
// Route::middleware(['auth:sanctum', 'checkType'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['auth:sanctun' => 'vertified'], function () {

    Route::get('dashboard',[DasboardController::class,'display'])->middleware(['auth:sanctum','verified'])->name('dashboard');
    Route::get('get-data/thuchi/dashboard',[DasboardController::class,'getDataToChart'])->middleware(['auth:sanctum','verified'])->name('dashboard');;

    ///
    Route::get('nhanvien',[NhanvienController::class,'index'])->middleware(['auth:sanctum','verified']);
    Route::post('create-nhanvien',[NhanvienController::class,'store']);
    Route::get('edit-nhanvien/{id}',[NhanvienController::class,'edit']);
    Route::put('update-nhanvien/{id}',[NhanvienController::class,'update']);
    Route::delete('del-nhanvien/{id}',[NhanvienController::class,'delete']);

    //thiepcuoi
    Route::get('inthiepcuoi',[ThiepcuoiController::class,'index'])->middleware(['auth:sanctum','verified']);
    Route::get('inthiepcuoi/chitiet/{id}',[ThiepcuoiController::class,'show'])->middleware(['auth:sanctum','verified']);
    Route::post('inthiepcuoi/create',[ThiepcuoiController::class,'store'])->middleware(['auth:sanctum','verified']);
    Route::get('inthiepcuoi/edit/{id}',[ThiepcuoiController::class,'edit'])->middleware(['auth:sanctum','verified']);
    Route::put('inthiepcuoi/update/{id}',[ThiepcuoiController::class,'update'])->middleware(['auth:sanctum','verified']);
    Route::delete('inthiepcuoi/delete/{id}',[ThiepcuoiController::class,'destroy'])->middleware(['auth:sanctum','verified']);

    //// Cong viec
    Route::get('/task',[TaskController::class,'index']);
    // Route::post('/task/create',[TaskController::class,'create']);
    // Route::post('/task/update',[TaskController::class,'update']);
    // Route::post('/task/delete',[TaskController::class,'destroy']);
    Route::get('/thongke',[TaskController::class,'thongke']);
    ///
    Route::get('vatlieu',[PhieuController::class,'index'])->middleware(['auth:sanctum','verified']);
    Route::post('phieunhap-vatlieu',[PhieuController::class,'store_Phieunhap'])->middleware(['auth:sanctum','verified']);
    Route::post('phieuxuat-vatlieu',[PhieuController::class,'store_Phieuxuat'])->middleware(['auth:sanctum','verified']);
    Route::get('chitiet-phieunhap-vatlieu/{id}',[PhieuController::class,'show_Phieunhap'])->middleware(['auth:sanctum','verified']);
    Route::get('chitiet-phieuxuat-vatlieu/{id}',[PhieuController::class,'show_Phieunxuat'])->middleware(['auth:sanctum','verified']);

// 
    Route::get('dathang',[DathangController::class,'index'])->middleware(['auth:sanctum','checkType']);
    Route::post('/create-donhang',[DathangController::class,'store'])->middleware(['auth:sanctum','checkType']);
    Route::get('/edit-donhang/{id}',[DathangController::class,'edit'])->middleware(['auth:sanctum','checkType']);
    Route::put('/update-donhang/{id}',[DathangController::class,'update'])->middleware(['auth:sanctum','checkType']);
    Route::delete('/del-donhang/{id}',[DathangController::class,'destroy'])->middleware(['auth:sanctum','checkType']);
    // 
    Route::delete('/delete-one-mathang/{id}',[DathangController::class,'Del_one_Mathang'])->middleware(['auth:sanctum','checkType']);
    Route::get('/del-one-mathang/{id}',[DathangController::class,'XacNhanXoa_one_Mathang'])->middleware(['auth:sanctum','checkType']);
    // 
    Route::put('/hoanthanh-donhang/{id}',[DathangController::class,'hoanthanh'])->middleware(['auth:sanctum','checkType']);
    Route::put('/undo-hoanthanh-donhang/{id}',[DathangController::class,'bo_hoanthanh'])->middleware(['auth:sanctum','checkType']);
    Route::get('/print-donhang/{id}',[DathangController::class,'print'])->middleware(['auth:sanctum','checkType']);
    
    //QL người dùng
    Route::get('usermanage',[ManagerUserController::class,'index'])->middleware(['auth:sanctum','checkType']);
    Route::get('edit/user/{id}',[ManagerUserController::class,'edit'])->middleware(['auth:sanctum','checkType']);
    Route::put('user/update/{id}',[ManagerUserController::class,'update'])->middleware(['auth:sanctum','checkType']);

    ///
    Route::get('thuchi',[ThuchiController::class,'index'])->middleware(['auth:sanctum','checkType']);
    Route::post('/create-thuchi',[ThuchiController::class,'store'])->middleware(['auth:sanctum','checkType']);
    Route::delete('/del-thuchi/{id}',[ThuchiController::class,'destroy'])->middleware(['auth:sanctum','checkType']);
// 

/////////////// addition 

Route::get('/danh-muc',[DanhmucController::class,'index'])->middleware(['auth:sanctum','checkType']);

Route::get('/thongbao',function ()
{
    return 'Cập nhật thành công.';
} );
    // khach hang
    Route::get('/edit-kh/{id}',[KhachhangController::class,'edit'])->middleware(['auth:sanctum','checkType']);
    Route::put('/update-kh/{id}',[KhachhangController::class,'update'])->middleware(['auth:sanctum','checkType']); 
    
   

    Route::post('/create-kh',[KhachhangController::class,'store'])->middleware(['auth:sanctum','checkType']); 
    Route::delete('/del-kh/{id}',[KhachhangController::class,'destroy'])->middleware(['auth:sanctum','checkType']);
    Route::get('/del-kh/{id}',[KhachhangController::class,'xac_nhan_xoa'])->middleware(['auth:sanctum','checkType']);

    /// Bảng giá
    Route::post('/create-bg',[BanggiaController::class,'store'])->middleware(['auth:sanctum','checkType']);
    Route::get('/edit-bg/{id}',[BanggiaController::class,'edit'])->middleware(['auth:sanctum','checkType']);
    Route::put('/update-bg/{id}',[BanggiaController::class,'update'])->middleware(['auth:sanctum','checkType']);
    Route::get('/del-bg/{id}',[BanggiaController::class,'xac_nhan_xoa'])->middleware(['auth:sanctum','checkType']);
    Route::delete('/del-bg/{id}',[BanggiaController::class,'destroy'])->middleware(['auth:sanctum','checkType']);

    //// NCC
    Route::post('/create-ncc',[NhaCungCapController::class,'store'])->middleware(['auth:sanctum','checkType']);
    Route::get('/edit-ncc/{id}',[NhaCungCapController::class,'edit'])->middleware(['auth:sanctum','checkType']);
    Route::get('/del-ncc/{id}',[NhaCungCapController::class,'xac_nhan_xoa'])->middleware(['auth:sanctum','checkType']);
    Route::delete('/del-ncc/{id}',[NhaCungCapController::class,'destroy'])->middleware(['auth:sanctum','checkType']);
    Route::put('/update-ncc/{id}',[NhaCungCapController::class,'update'])->middleware(['auth:sanctum','checkType']);

// vat lieu
    Route::post('/create-vl',[VatlieuController::class,'store'])->middleware(['auth:sanctum','checkType']);
    Route::get('/edit-vl/{id}',[VatlieuController::class,'edit'])->middleware(['auth:sanctum','checkType']);
    Route::put('/update-vl/{id}',[VatlieuController::class,'update'])->middleware(['auth:sanctum','checkType']);
    Route::get('/del-vl/{id}',[VatlieuController::class,'xac_nhan_xoa'])->middleware(['auth:sanctum','checkType']);
    Route::delete('/del-vl/{id}',[VatlieuController::class,'destroy'])->middleware(['auth:sanctum','checkType']);

//////// BÁO CÁO
//DH
Route::get('/bao-cao-dh',[DasboardController::class,'baocao_donhang'])->middleware(['auth:sanctum','checkType']);
Route::post('/create/bc-dh',[DasboardController::class,'get_baocao_donhang'])->middleware(['auth:sanctum','checkType']);
//Tonkho (Vat lieu + mathang (có mã đơn hàng chưa hoàn thành))
Route::get('/bao-cao-tonkho-mh',[DasboardController::class,'get_baocao_mathang_tonko'])->middleware(['auth:sanctum','checkType']);
// Route::post('/create/bc-dh',[DasboardController::class,'get_baocao_tonko'])->middleware(['auth:sanctum','checkType']);

// bao cao thu chi

Route::post('/create/bc-thuchi',[ThuchiController::class,'print_bc_thuchi'])->middleware(['auth:sanctum','checkType']);

// bao cao-  ds nhan vien(bang luong)
Route::any('/bao-cao-ds-nhanvien',[NhanvienController::class,'print_baocao_nhanvien'])->middleware(['auth:sanctum','checkType']);

Route::any('/print-ds-nhanvien',[NhanvienController::class,'print_info_nhanvien'])->middleware(['auth:sanctum','checkType']);

// BACK_UPS

Route::any('/backups-file',[BackupController::class,'backup_view'])->middleware(['auth:sanctum','checkType']);
Route::any('/download/backups-file/{filename}',[BackupController::class,'backup_file'])->middleware(['auth:sanctum','checkType']);
});

