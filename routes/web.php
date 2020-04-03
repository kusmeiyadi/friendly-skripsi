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

Auth::routes();

Route::get('get-me', 'TelegramController@getMe');
Route::get('set-hook', 'TelegramController@setWebHook');
Route::post(env('TELEGRAM_BOT_TOKEN') . '/webhook', 'TelegramController@handleRequest');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/pengaduan-online', 'PengaduanController@create')->name('pengaduan-online');
Route::post('/pengaduan/store', 'PengaduanController@store');

//Admin Routes
Route::group(['namespace' => 'Admin'], function(){
  Route::get('admin/home', 'HomeController@index')->name('admin.home');

  Route::post('/notification/pengaduan/notification', 'PengaduanController@notification');

  Route::post('/markAsRead', 'PengaduanController@markAsRead')->name('markAsRead');
  Route::get('/readPengaduan/{pengaduan_id?}', 'PengaduanController@readPengaduan')->name('readPengaduan');

  Route::post('/allMarkAsread', 'PengaduanController@allMarkAsread')->name('allMarkAsread');
  Route::get('/readAllPengaduan', 'PengaduanController@readAllPengaduan')->name('readAllPengaduan');

  Route::group(['middleware' => ['role:Ketua Komisioner']], function () {
       Route::resource('admin/roles', 'RoleController')->except([
           'create', 'show', 'edit', 'update'
       ]);

       Route::resource('admin/users', 'UserController')->except([
           'show'
       ]);

       Route::get('admin/users/roles/{id}', 'UserController@roles')->name('users.roles');
       Route::put('admin/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
       Route::post('admin/users/permission', 'UserController@addPermission')->name('users.add_permission');
       Route::get('admin/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
       Route::put('admin/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');

       Route::resource('admin/pengaduans', 'PengaduanController');
       Route::resource('admin/jenis_kasus', 'JenisKasusController');

       Route::resource('admin/post', 'PostController');
       Route::resource('admin/tag', 'TagController');
       Route::resource('admin/category', 'CategoryController');

       Route::get('admin/pending/pengaduan', 'PengaduanController@pending')->name('pengaduan.pending');
       Route::put('admin/pengaduan/{id}/approve', 'PengaduanController@approval')->name('pengaduan.approve');

       Route::get('admin/pengaduan/{id}/email','PengaduanController@email')->name('pengaduan.email');
       Route::post('admin/pengaduan/sms','PengaduanController@sms')->name('pengaduan.sms');
       Route::get('sms','PengaduanController@sms_view');
   });

  Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
  Route::post('admin-login', 'Auth\LoginController@login');
});

// User Routes
Route::group(['namespace' => 'User'], function(){
  Route::get('/home', 'HomeController@index')->name('user.home');
  Route::get('post', 'PostController@index')->name('post');

  Route::get('formulir-pengaduan', 'PengaduanController@index')->name('formulir-pengaduan');
});
