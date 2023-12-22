<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\AksesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    route::get('/', [SesiController::class, 'index'])->name('login');
    route::post('/', [SesiController::class, 'login']);
});
route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    route::get('/admin', [AksesController::class, 'index']);
    route::get('/admin/admin', [AksesController::class, 'admin'])->middleware('userAkses:admin');
    route::get('/admin/kasir', [AksesController::class, 'kasir'])->middleware('userAkses:kasir');
    route::get('/logout', [SesiController::class, 'logout']);
});

//MENU 
//CRUD SETORAN PENJUALAN
route::get('/setoran_penjualan', [SetoranController::class, 'tampil_penjualan']);
route::get('/penjualan_tambah', [SetoranController::class, 'create_penjualan']);
route::post('/setoran_penjualan', [SetoranController::class, 'store_penjualan']);
route::get('/penjualan_edit/{id}', [SetoranController::class, 'edit_penjualan']);
route::put('/setoran_penjualan/{id}', [SetoranController::class, 'update_penjualan']);
route::delete('/penjualan_destroy/{id}', [SetoranController::class, 'destroy_penjualan']);

//CRUD SETORAN BANK
route::get('/setoran_bank', [SetoranController::class, 'tampil_bank']);
route::get('/bank_tambah', [SetoranController::class, 'create_bank']);
route::post('/setoran_bank', [SetoranController::class, 'store_bank']);
route::get('/bank_edit/{id}', [SetoranController::class, 'edit_bank']);
route::put('/bank/{id}', [SetoranController::class, 'update_bank']); 
route::delete('/bank_destroy/{id}', [SetoranController::class, 'destroy_bank']);

//COBA TRANSAKSI "DONE"
route::get('/kaskecil', [TransaksiController::class, 'tampil_kaskecil']);
route::get('/kaskecil_tambah', [TransaksiController::class, 'create_kaskecil']);
route::post('/kaskecil', [TransaksiController::class, 'store']);
route::get('/kaskecil_edit/{id}', [TransaksiController::class, 'edit_kaskecil']);
route::put('/kaskecil/{id}', [TransaksiController::class, 'update']); 
route::delete('/kaskecil_destroy/{id}', [TransaksiController::class, 'destroy']); //menghapus transaksi tidak menghapus data karyawan

//CRUD SALDO "DONE"
route::get('/saldo', [SaldoController::class, 'tampil_saldo']);
route::get('/saldo_tambah', [SaldoController::class, 'create_saldo']);
route::post('/saldo', [SaldoController::class, 'store']);
route::get('/saldo_edit/{id}', [SaldoController::class, 'edit_saldo']);
route::put('/saldo/{id}', [SaldoController::class, 'update']);
route::delete('/saldo_destroy/{id}', [SaldoController::class, 'destroy']);

//CRUD KARYAWAN "DONE"
route::get('/karyawan', [KaryawanController::class, 'tampil_karyawan']);
route::get('/karyawan_tambah', [KaryawanController::class, 'create_karyawan']);
route::post('/karyawan', [KaryawanController::class, 'store']);
route::get('/karyawan_edit/{id}', [KaryawanController::class, 'edit_karyawan']);
route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
route::delete('/karyawan_destroy/{id}', [KaryawanController::class, 'destroy']);

//CRUD USER "DONE"
route::get('/user', [UserController::class, 'tampil_user']);
route::get('/user_tambah', [UserController::class, 'create_user']);
route::post('/user', [UserController::class, 'store']);
route::get('/user_edit/{id}', [UserController::class, 'edit_user']);
route::put('/user/{id}', [UserController::class, 'update']);
route::delete('/user_destroy/{id}', [UserController::class, 'destroy']);

// Route::get('/', function () {
//     return view('home', [
//         'name' => 'adinda',
//         'role' => 'admin',
//         'buah' => ['pisang', 'apel', 'mangga', 'kiwi', 'anggur']
// ]);
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact', ['name' => 'adinda', 'phone' => '08xxxxx']);
// });

// // route::view('/contact','contact', ['name' => 'adinda', 'phone' => '08xxxxx']);

// route::redirect('/contact', '/contact-us');

// // route::get('/product/{id}', function($id){
// //     return 'ini adalah product dengan id ' .$id;
// // });

// //memangil per id
// route::get('/product/{id}', function($id){
//     return view('product.detail', ['id' => $id]);
// });


// Route::prefix('admin')->group(function () { 
//     Route::get('/profil-admin', function () {
//         return 'profil admin';
//     });
    
//     Route::get('/about-admin', function () {
//         return 'about admin';
//     });
    
//     Route::get('/contact-admin', function () {
//         return 'contact admin';
//     });
// });