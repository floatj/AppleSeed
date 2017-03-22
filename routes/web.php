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

//首頁
Route::get('/', function () {
    return view('dashboard');
});

//測試頁
Route::get('/test', function () {
    return view('test');
});

//Dictionary -- CreateFromJson
Route::get('/dict/create/json', 'DictController@create_from_json');

//Dictionary -- Search by key
Route::get('/dict/search', 'DictController@showSearch');
Route::post('/dict/search', 'DictController@search');

//Dictionary -- Search Collection
Route::get('/dict/searchCollection', 'DictController@showSearchCollection');
Route::post('/dict/searchCollection', 'DictController@searchCollection');

//Dictionary -- default resource router
Route::resource('dict', 'DictController');
