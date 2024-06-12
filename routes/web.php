<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/articles');
});

// article CRUD
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{article:slug}', [ArticleController::class, 'show'])->name('article.detail')->whereNumber('id');
Route::get('/articles/delete/{article}', [ArticleController::class, 'destroy']);
Route::get('/articles/add', [ArticleController::class, 'create']);
Route::post('/articles/store', [ArticleController::class, 'store']);
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']);
Route::match(['put', 'patch'], '/articles/{article}/update', [ArticleController::class, 'update']);

// comment add, delete
Route::post('/comments/add',[CommentController::class, 'add']);
Route::get('/comments/{comment}/delete',[CommentController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
