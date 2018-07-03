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

Route::get('/google', 'HomeController@google');

Route::get('/article', 'HomeController@article');

Route::get('shop/{id}', 'HomeController@shop');

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

Route::get('wishlist', 'HomeController@wishlist');
Route::post('del_wishlist', 'HomeController@del_wishlist');

});

Route::group(['middleware' => 'admin'], function() {

});
