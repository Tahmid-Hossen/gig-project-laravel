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

Route::get('/', function () {
    return view('pages.index');
});

Route::get('aboutus','HelloController@about')->name('about');

Route::get('/services', 'HelloController@Ami')->name('service');

Route::get('/contact', 'ContactConroller@contact')->name('contact');

Route::get('add/category', 'BlogController@AddCategory')->name('add.category');
Route::get('all/category', 'BlogController@AllCategory')->name('all.category');
Route::post('store/category', 'BlogController@StoreCategory')->name('store.category');
Route::get('view/category/{id}', 'BlogController@ViewCategory');
Route::get('delete/category/{id}', 'BlogController@DeleteCategory');
Route::get('edit/category/{id}', 'BlogController@EditCategory');
Route::post('update/category/{id}', 'BlogController@UpdateCategory');



// Blog post crued are here
// Route::get('/create-blog', 'BlogController@write')->name('create-blog');
Route::get('write/post', 'PostController@WritePost')->name('write.post');
Route::post('store/post', 'PostController@StorePost')->name('store.post');
Route::get('all/post', 'PostController@AllPost')->name('all.post');
Route::get('view/post/{id}', 'PostController@ViewPost');
Route::get('/blogs', 'HelloController@showPost')->name('blog.post');
Route::get('edit/post/{id}', 'PostController@EditPost');
Route::post('update/post/{id}', 'PostController@UpdatePost');
Route::get('delete/post/{id}', 'PostController@DeletePost');
// Route::get('/', 'HelloController@index');