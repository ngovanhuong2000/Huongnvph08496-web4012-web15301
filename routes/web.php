<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
// use App\models\Product;
// use App\models\Category;
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


// TODO: route-name

Route::get('/categories', function () {
    // lấy ra toàn bộ các bản ghi trong bảng users
    $listCategories =  DB::table('categories')->get(); // get lấy tất cả trong bảng user
    // dd($listUser); // dd giống var_dump dùng để in ra dữ liệu
    // return view('$listCategories');
    dd($listCategories); // dd giống var_dump dùng để in ra dữ liệu
});

Route::get('/products', function () {
    // lấy ra toàn bộ các bản ghi trong bảng users
    $listProducts =  DB::table('products')->get(); // get lấy tất cả trong bảng user
    // dd($listUser); // dd giống var_dump dùng để in ra dữ liệu
    // return view('$listCategories');
    dd($listProducts); // dd giống var_dump dùng để in ra dữ liệu
});

// nhập dữ liệu gửi lên & lưu vào db




// products

// Route::get('/admin/products', function () {
//     $listProducts = Product::all();  // User::all lấy ra tất cả các bản ghi
//     return view('admin/products/index', [
//         'data' => $listProducts,
//     ]);
// })->name('admin.products.index');

// Route::view('v1.0/admin/products/create', 'admin/products/create')->name('admin.products.create');

// Route::post('admin/products/store', function () {
//     $data = request()->except('_token');
//     // $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
//     $result = Product::create($data);

//     return redirect()->route('admin.products.index');
// })->name('admin.products.store');


// Route::get('admin/products/edit/{id}', function ($id) {
//     $data = Product::find($id);
//     return view('admin/products/edit', [
//         'data' => $data,
//     ]);
// })->name('admin.products.edit');

// Route::post('admin/products/update/{id}', function ($id) {

//     $data = request()->except('_token');
//     $product = Product::find($id);
//     $product->update($data);
//     return redirect()->route('admin.products.index');
// })->name('admin.products.update');

// Route::post('admin/products/delete/{id}', function ($id) {
//     $product = Product::find($id);
//     $product->delete();
//     return redirect()->route('admin.products.index');
// })->name('admin.products.delete');




// // Categories

// Route::get('admin/categories', function () {
//     $listCategories = Category::all();
//     return view('admin/categories/index', [
//         'data' => $listCategories,
//     ]);
// })->name('admin.categories.index');

// Route::view('v1.0/admin/categories/create', 'admin/categories/create')->name('admin.categories.create');

// Route::post('admin/categories/store', function () {
//     $data = request()->except('_token');
//     $result = Category::create($data);
//     return redirect()->route('admin.categories.index');
// })->name('admin.categories.store');

// Route::get('admin/categories/edit/{id}', function ($id) {
//     $data = Category::find($id);
//     return view('admin/categories/edit', [
//         'data' => $data,
//     ]);
// })->name('admin.categories.edit');

// Route::post('admin/categories/update/{id}', function ($id) {
//     $data = request()->except('_token');
//     $category = Category::find($id);
//     $category->update($data);
//     return redirect()->route('admin.categories.index');
// })->name('admin.categories.update');

// Route::post('admin/categories/delete/{id}', function ($id) {
//     $category = Category::find($id);
//     $category->delete();
//     return redirect()->route('admin.categories.index');
// })->name('admin.categories.delete');


Route::get('login', 'Auth\LoginController@getLoginForm')->name('auth.getLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');


// Route::get('/', function () {
//     return view('form');
// });

// Route::post('upload', function (Request $request) {
//     if (!$request->hasFile('image')) {
//         // Nếu không thì in ra thông báo
//         return "Mời chọn file cần upload";
//     }
//     // Nếu có thì thục hiện lưu trữ file vào public/images
//     $image = $request->file('image');
//     $storedPath = $image->move('images', $image->getClientOriginalName());

//     return "Lưu trữ thành công";
// })->name('admin.products.store');



Route::group([
    'middleware' => ['check_login'],
], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['check_admin'],
    ], function () {
        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
        ], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('create', 'UserController@create')->name('create');
            Route::post('store', 'UserController@store')->name('store');
            Route::get('/{user}', 'UserController@show')->name('show');
            Route::get('edit/{user}', 'UserController@edit')->name('edit');
            Route::post('update/{user}', 'UserController@update')->name('update');
            Route::post('delete/{user}', 'UserController@delete')->name('delete');
        });

        Route::group([
            'prefix' => 'categories',
            'as' => 'categories.',
        ], function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('create', 'CategoryController@create')->name('create');
            Route::post('store', 'CategoryController@store')->name('store');
            Route::get('edit/{category}', 'CategoryController@edit')->name('edit');
            Route::post('update/{category}', 'CategoryController@update')->name('update');
            Route::post('delete/{category}', 'CategoryController@delete')->name('delete');
        });

        Route::group([
            'prefix' => 'products',
            'as' => 'products.',
        ], function () {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('create', 'ProductController@create')->name('create');
            Route::post('store', 'ProductController@store')->name('store');
            Route::get('edit/{product}', 'ProductController@edit')->name('edit');
            Route::post('update/{product}', 'ProductController@update')->name('update');
            Route::post('delete/{product}', 'ProductController@delete')->name('delete');
        });
    });
});
