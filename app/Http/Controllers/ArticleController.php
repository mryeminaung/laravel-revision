<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $articles = Article::latest()->paginate(3);
        $articles = Article::all();
        $data = Category::all();
        Session::put('pre_url', request()->fullUrl());

        return view('articles.index', ['articles' => $articles, 'categories' => $data, 'filterTag' => request()->query('category')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();
        return view('articles.add', ['categories' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id
        ]);
        return redirect('/home')->with('add', 'Article Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // dd($article);
        return view('articles.detail', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $data = Category::all();
        return view('articles.edit', ['article' => $article, 'categories' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id
        ]);
        return redirect("/articles/detail/{$article->id}")->with('update', 'Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(session('pre_url'))->with('delete', 'Article Deleted');
    }
}
