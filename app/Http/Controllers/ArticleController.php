<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
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
        $articles = Article::orderBy('created_at', 'DESC')->get();
        $data = Category::all();
        $filterTag = request()->query('category');

        Session::put('pre_url', request()->fullUrl());
        Session::put('dashboard_url', null);
        Session::put('user_url', null);

        return view('articles.index', ['articles' => $articles, 'categories' => $data, 'filterTag' => $filterTag]);
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
    public function store(ArticleCreateRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['slug'] = str_replace(' ', '-', strtolower($request->title));
        $validatedData['user_id'] = auth()->user()->id;

        Article::create($validatedData);

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
    public function update(ArticleUpdateRequest $request, Article $article)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = str_replace(' ', '-', strtolower($request->title));

        $article->update($validatedData);

        return redirect("/articles/detail/{$article->slug}")->with('update', 'Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(session('pre_url') ?? session('dashboard_url'))->with('delete', 'Article Deleted');
    }
}
