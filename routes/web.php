<?php

use Illuminate\Support\Facades\Route;

use Cviebrock\EloquentSluggable\Services\SlugService;


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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['as'=>'admin.','prefix' => 'admin','middleware' => ['auth', 'isAdmin']], function () {

// Route::middleware(['as'=>'admin.','prefix'=> ['auth', 'isAdmin']])->group(function(){ 

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_branch', 'BranchController@index')->name('add_branch');
Route::post('/store_branch', 'BranchController@store')->name('store_branch');
Route::get('/view_branch', 'BranchController@show')->name('view_branch');
Route::get('branchdelete/{id}','BranchController@deldata')->name('branchdelete');
Route::get('edit_branch/{id}','BranchController@edit')->name('edit_branch');
Route::post('update_branch/{id}','BranchController@update')->name('update_branch');
Route::get('countries', 'BranchController@countries');


Route::get('/add_category', 'CategoryController@index')->name('add_category');
Route::post('/store_category', 'CategoryController@store')->name('store_category');
Route::get('/view_category', 'CategoryController@show')->name('view_category');
Route::get('category_delete/{id}','CategoryController@deldata')->name('category_delete');


Route::get('/get_chart', 'ChartController@index')->name('get_chart');
Route::get('/bar_chart', 'BarchartController@barchart')->name('bar_chart');


});

Route::middleware(['auth', 'branchmanager'])->group(function(){ 

Route::get('/dashboard', 'BranchManagerController@index')->name('dashboard');
Route::get('/addbranchcategory', 'CategoryController@addbranchcategory')->name('addbranchcategory');
Route::post('/storebranchcategory', 'CategoryController@storebranchcategory')->name('storebranchcategory');
Route::get('/showbranchcategory', 'CategoryController@showbranchcategory')->name('showbranchcategory');


Route::get('/showsuperadmincategories', 'CategoryController@showsuperadmincategories')->name('showsuperadmincategories');
Route::get('/addtomycategories/{id}', 'CategoryController@addtomycategories')->name('addtomycategories');

Route::get('/information', 'BranchManagerController@information')->name('information');

Route::get('editinformation/{id}','BranchManagerController@editinformation')->name('editinformation');
Route::post('updateinformation/{id}','BranchManagerController@updateinformation')->name('updateinformation');


Route::get('showpages','PagesController@index')->name('showpages');
Route::get('/addpages', 'PagesController@pages')->name('addpages');
Route::post('/store_pages', 'PagesController@storepages')->name('store_pages');
Route::get('edit_pages/{id}','PagesController@edit')->name('edit_pages');
Route::post('update_pages/{id}','PagesController@updatepages')->name('update_pages');
Route::get('pagedelete/{id}','PagesController@delete')->name('pagedelete');

Route::get('/addbanner', 'BannerController@addbanner')->name('addbanner');
Route::get('/showbanner', 'BannerController@index')->name('showbanner');
Route::post('/store_banner', 'BannerController@storebanner')->name('store_banner');
Route::get('edit_banner/{id}','BannerController@edit')->name('edit_banner');
Route::post('update_banner/{id}','BannerController@updatebanner')->name('update_banner');
Route::get('bannerdelete/{id}','BannerController@delete')->name('bannerdelete');





















    
});