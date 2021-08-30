<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index');

Route::get('/builds', 'PageController@buildsPaginator')->name('builds');
Route::get('/builds/{tier}', 'PageController@buildsTier')->name('buildsTier');
Route::get('/hardware', 'PageController@hardwarePaginator')->name('hardware');
Route::get('/hardware/category-{category}', 'PageController@filter_hardwarePaginator')->name('hardware_filter');
Route::get('/accessories', 'PageController@accessoriesPaginator')->name('accessories');
Route::get('/about', 'PageController@about')->name('about');


Route::get('sendEmail', 'PageController@sendEmail')->name('sendEmail');

Route::prefix('cart')->group(function () {
    Route::get('/', 'cartController@cart')->name('cart');
    Route::post('/add/{id}', 'cartController@add')->name('cart.add');
    Route::post('/plus/{id}', 'cartController@plus')->where('id', '[0-9]+')->name('cart.plus');
    Route::post('/minus/{id}', 'cartController@minus')->where('id', '[0-9]+')->name('cart.minus');
    Route::post('/remove/{id}', 'cartController@remove')->where('id', '[0-9]+')->name('cart.remove');
    Route::post('/clear', 'cartController@clear')->name('cart.clear');

    Route::get('/confirmation', 'cartController@confirmation')->name('cart.confirmation');
    Route::post('/confirm', 'cartController@confirm')->name('cart.confirm');
});








Route::group([
    'prefix' => 'admin',
    'namespace' => 'Auth\admin',
    'middleware' => 'auth',
    'middleware' => 'admincheck'

], function () {
    Route::get('/all-images', 'PageController@TestPage')->name('admin.test');
    Route::post('/all-images/FileDelete/{image}', 'PageController@TestPageDelete')->name('admin.filedelite')->where('image', '[A-Za-z0-9]+.+[A-Za-z0-9]');

    Route::get('/home', 'PageController@home')->name('admin.home');
    Route::get('/orders', 'PageController@orders')->name('admin.orders');
    Route::get('/order/{id}', 'PageController@order')->name('admin.order');
    Route::post('/order_processing_end/{id}', 'PageController@endProccessing')->name('admin.endProcessing');


    Route::resource('products', 'productController');
    Route::post('products/{product}/vis_change', 'productController@vis_change')->name('products.vis_change');
    Route::resource('categories', 'CategoryController');
    Route::resource('brands', 'BrandController');
    Route::resource('hardwares', 'HardwareController');
    Route::resource('pcbuilders', 'pcbuilderController');
    Route::post('pcbuilders/{pc_build}/hide', 'pcbuilderController@hide')->name('pcbuilders.hide');
    Route::post('pcbuilders/{pc_build}/restore', 'pcbuilderController@restore')->name('pcbuilders.restore');

    // Route::get('/test', 'pageController@test');
});

// Route::group(['namespace' => 'auth\admin'],function () {
//     Route::resource('hardwares', 'HardwareController')->only(['show']);
//     Route::resource('pcbuilders', 'pcbuilderController')->only(['show']);
// });

Route::get('build/{build}', 'PageController@buildView')->name('buildView');
Route::get('hardware/{hardware}', 'PageController@hardwareView')->name('hardwareView');
Route::get('accessory/{accessory}', 'PageController@accessoryView')->name('accessoryView');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('profile', 'usercontroller@userprofile')->name('userprofile')->middleware('auth');
Route::get('profile/orders', 'usercontroller@userprofile')->name('userOrders')->middleware('auth');
Route::post('profile/update__userinfo', 'usercontroller@update__userinfo')->name('update__userinfo')->middleware('auth');

Route::get('ПомощьПокупателям', 'PageController@userprofile')->name('customerHelp');
Route::get('FAQ', 'PageController@footer_FAQ')->name('FAQ');
Route::get('Copyrights', 'PageController@footer_CC')->name('Copyrights');
Route::get('ПроблемыСтоваром', 'PageController@footer_ProductProblems')->name('ProductProblems');
Route::get('delivery', 'PageController@footer_BuyInformation')->name('BuyInformation');
Route::get('warranty', 'PageController@footer_warranty')->name('Warranty');

