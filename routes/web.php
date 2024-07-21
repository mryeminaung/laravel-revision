<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/articles');
});

// article CRUD
Route::controller(ArticleController::class)->group(function () {
    Route::prefix('articles')->group(function () {
        Route::get('/', 'index');
        Route::get('detail/{article:slug}', 'show')->name('article.detail')->whereNumber('id');

        Route::get('delete/{article}', 'destroy')->name('article.delete');
        Route::get('add', 'create')->name('article.create');
        Route::post('store', 'store')->name('article.store');
        Route::get('{article}/edit', 'edit')->name('article.edit');
        Route::match(['put', 'patch'], '{article}/update', 'update')->name('article.update');
    });
});

// comment add, delete
Route::controller(CommentController::class)->group(function () {
    Route::prefix('comments')->group(function () {
        Route::post('add', 'add');
        Route::get('{comment}/delete', 'delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
