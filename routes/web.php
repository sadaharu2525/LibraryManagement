<?php
// ページ認証
Route::group(['middleware' => 'auth'], function() {
    Route::get('/folders/{id}/books', 'BookController@index')->name('books.index');
    Route::post('/folders/{id}/books', 'BookController@changeStatus');

    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');
    Route::get('/folders/{id}/books/create', 'BookController@showCreateForm')->name('books.create');
    Route::post('/folders/{id}/books/create', 'BookController@create');

    Route::get('/folders/{id}/books/{book_id}/info', 'BookController@showInfoForm')->name('books.info');
    Route::post('/folders/{id}/books/{book_id}/info', 'BookController@info');

    Route::get('/', 'HomeController@index')->name('home');
});
Auth::routes();