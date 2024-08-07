<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = User::find(Auth::id())->articles()->orderBy('created_at', 'DESC')->get();
        Session::put('dashboard_url', request()->fullUrl());
        Session::put('pre_url', null);

        return view('home', ['articles' => $articles]);
    }
}
