<?php

use Illuminate\Support\Facades\Route;

//Route ke halaman utama (home)
Route::get('/', function () {
    return view('home');
});

//Route ke halaman alamat
Route::get('/alamat', function () {
    echo "Jalan Rajawali 14. Palembang";
});

//Route ke halaman alamat
Route::get('/path1/path2/detail', function () {
    echo "Jalan Rajawali 14. Palembang";
    echo "<br>";
    echo "Rt. 01 Rw. 02";
    echo "<br>";
    echo "Kecamatan Alang-Alang Lebar";
    echo "<br>";
    echo "Kota Palembang";
    echo "<br>";
    echo "Provinsi Sumatera Selatan";
});

//Route Dinamis dengan parameter id
Route::get('/user/{id}', function($id){
    echo "User ID: " . $id;
});

//Route Dinamis dengan parameter nama
Route::get('/user2/{name}', function($name){
    echo "User Name: " . $name;
});

//Route Dinamis dengan opsional parameter nama
Route::get('/user3/{name?}', function($name = 'Tamu'){
    echo "User Name: " . $name;
});

//Route Dinamis degnan parameter nama dan id
Route::get('/user4/{id}/{name}', function($id, $name){
    echo "User ID: " . $id;
    echo "<br>";
    echo "User Name: " . $name;
});

//Router dengan metode POST
Route::get('/simpan', function(){
    echo "Data berhasil disimpan";
});

//Router dengan metode PUT
Route::put('/update/{id}', function($id){
    echo "Data berhasil diperbarui dengan ID: " . $id;
});

//Router dengan metode PATCH
Route::patch('/update2/{id}', function($id){
    echo "Data berhasil diperbarui dengan ID: " . $id;
});

//Router dengan metode PUT
Route::delete('/hapus/{id}', function($id){
    echo "Data berhasil dihapus dengan ID: " . $id;
});

//Router untuk menampilkan halaman test_method
Route::get('/test-method', function(){
    return view('test_method');
});

//Router untuk menampilkan halaman profil
Route::get('/profil', function(){
    return view('profile');
});

//Gunakan . untuk memisahkan folder dengan view
Route::get('/detailproduk', function(){
    return view('produk.detail');
});

// //mengirim data ke view
// Route::get('/detailproduk/{name}', function($name){
//     return view('produk.detail', 
//         ['product_name' => $name, 
//         'id' => 101,
//         'color' => 'Silver',
//         'stock' => 12
//         ]
//     );
// });

// Route::get('/produk/', function(){
//     return view('produk.index');
// });

// Route::get('/produk/create', function(){
//     return view('produk.create');
// });

// Route::get('/produk/search', function(){
//     return view('produk.search');
// });

// Route::get('/produk/detail', function(){
//     return view('produk.detail');
// });

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;

//php artisan make:controller ProductController -resource
Route::resource('/produk', ProductController::class);
Route::get('/produk/search', ProductController::class.'@search');
Route::get('/produk/detail', ProductController::class.'@detail');

// Route::get('/supplier/', function(){
//     return view('supplier.index');
// });

//php artisan make:controller SupplierController -resource
Route::resource('/supplier', SupplierController::class);
Route::get('/supplier/search', SupplierController::class.'@search');
Route::get('/supplier/detail', SupplierController::class.'@detail');

// Auth routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', function () {
    $totalBarang = \App\Models\Product::count();
    $barangTersedia = \App\Models\Product::where('stock', '>', 0)->count();
    $barangHabis = \App\Models\Product::where('stock', '=', 0)->count();
    $nilaiStok = 0;
    $barangTerbaru = collect();

    return view('dashboard', compact('totalBarang', 'barangTersedia', 'barangHabis', 'nilaiStok', 'barangTerbaru'));
})->middleware('auth');