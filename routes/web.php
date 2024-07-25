<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/{user:name}/articles', function (User $user) {
    $data = Category::all();
    $filterTag = request()->query('category');
    Session::put('user_url', request()->fullUrl());
    Session::put('pre_url', null);
    Session::put('dashboard_url', null);

    return view('articles.index', ['articles' => $user->articles, 'categories' => $data, 'filterTag' => $filterTag, 'user' => $user]);
})->name('user.articles');

Route::get('/bookmark/{article:slug}/add', function (Article $article) {
    // dd($article);
    // dd(auth()->user());

    DB::table('user_article')->insert([
        'article_id' => $article->id,
        'user_id' => auth()->user()->id
    ]);

    return redirect()->route('bookmarks');
})->name('bookmark.add');

Route::get('/bookmarks', function () {
    $bookmarkedArticles = auth()->user()->bookmarkedArticles;

    return view('components.bookmarks', ['bookmarkedArticles' => $bookmarkedArticles]);
})->name('bookmarks');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
