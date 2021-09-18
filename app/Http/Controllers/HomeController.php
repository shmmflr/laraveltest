<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function index()
    {
        $articles = Article::where('status', 'publish')->paginate(8);
        return view('index', compact('articles'));
    }
}
