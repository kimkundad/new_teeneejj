<?php

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



Route::auth();
Auth::routes();

Route::get('change/{locale}', function ($locale) {
	App::setLocale($locale);
  session(['locale' => $locale]);
  return Redirect::back();
});

Route::get('/', 'HomeController@index');
Route::get('/map', 'HomeController@map');

Route::get('/presentation', 'HomeController@presentation');

Route::get('/directions', 'HomeController@directions');

Route::get('/contact_us', 'HomeController@contact_us');

Route::get('/history', 'HomeController@history');

Route::post('/sent_myproduct', 'HomeController@sent_myproduct');

Route::post('/add_subscribe', 'HomeController@add_subscribe');

Route::get('/cart', 'HomeController@cart');

Route::get('deleteCart/{id}', 'HomeController@deleteCart');

Route::post('/updateCart', 'HomeController@updateCart');

Route::get('/google', 'HomeController@google');

Route::get('/success_payment', 'HomeController@success_payment');


Route::get('/confirm_payment', 'HomeController@confirm_payment');

Route::post('/add_confirm_payment', 'HomeController@add_confirm_payment');

Route::get('/all_shop', 'HomeController@all_shop');

Route::get('/article', 'HomeController@article');

Route::post('/add_session_value', 'HomeController@add_session_value');
Route::post('/buy_item', 'HomeController@buy_item');


Route::get('shop/{id}', 'HomeController@shop');

Route::get('product/{id}', 'HomeController@product');

Route::get('search', 'HomeController@search');

Route::get('category/{id}', 'HomeController@category');

Route::get('category/{id}/{ratting}', 'HomeController@category_rate');

Route::get('category_price/{id}/{price}', 'HomeController@category_price');


Route::get('/redirect', 'FacebookAuthController@redirect');
Route::get('/callback', 'FacebookAuthController@callback');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/add_wishlist', 'HomeController@add_wishlist');


Route::group(['middleware' => 'auth'], function () {

	Route::get('/payment', 'HomeController@payment');
	Route::post('/add_order', 'HomeController@add_order');
	Route::get('confirmation/', 'HomeController@confirmation');


Route::get('wishlist', 'HomeController@wishlist');
Route::post('del_wishlist', 'HomeController@del_wishlist');

});



Route::group(['middleware' => 'admin'], function() {

	Route::get('admin/first_shop', 'ShopController@first_shop');
	Route::post('add_sort_shop', 'ShopController@add_sort_shop');

	Route::resource('admin/user', 'StudentControlle');
	Route::resource('admin/category', 'CategoryController');
	Route::resource('admin/shop', 'ShopController');
	Route::post('api/post_status_order', 'ShopController@post_status_order');

	Route::post('add_gallery_shop', 'ShopController@add_gallery_shop');
	Route::post('property_image_del', 'ShopController@property_image_del');

	Route::post('add_gallery_shop_2', 'ShopController@add_gallery_shop_2');
	Route::post('property_image_del_2', 'ShopController@property_image_del_2');
	Route::resource('admin/proshop', 'ProshopController');
	Route::post('api/api_post_status_shop', 'ProshopController@api_post_status_shop');
	Route::post('add_gallery_shop_product', 'ProshopController@add_gallery_shop_product');
	Route::post('property_image_del_product', 'ProshopController@property_image_del_product');


});
