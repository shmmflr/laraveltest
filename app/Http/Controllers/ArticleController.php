<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request['text_search'])) {

            $articles = Article::search($request->all());
            $search_count = $articles->count();
        } else {
            $articles = Article::paginate(8);
        }
        $search_count = $articles->count();
        $count = count(Article::all());

        return view('admin.article.index', compact('articles', 'count', 'search_count'));
    }

    public function create()
    {
        $categories = Category::where('parent', 0)->get();
        return view('admin.article.create', compact('categories'));
    }


    public function store(Request $request)
    {
        if ($request['img']) {
            $file = $request['img'];
            $img = $this->uploadImages($file, 'uploads/article/');
        } else {
            $img = 'img/default.jpg';
        }
        if ($request['cat']) {
            $cat = implode(',', $request['cat']);
        } else {
            $cat = 0;
        }
        if ($request['status']) {
            $status = $request['status'];
        } else {
            $status = 'draft';
        }
        $article = Article::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'cat' => $cat,
            'img' => $img,
            'userId' => auth()->user()->id,
            'status' => $status,
        ]);
        $article->categories()->sync($request['cat']);
        return redirect()->back();
    }


    public function show(Article $article)
    {
        return view('single', compact('article'));

    }


    public function edit(Article $article)
    {
        $categories = Category::where('parent', 0)->get();
        return view('admin.article.edit', compact('article', 'categories'));
    }


    public function update(Request $request, Article $article)
    {
        if ($request['img']) {
            $file = $request['img'];
            $img = $this->uploadImages($file, 'uploads/article/');
        } else {
            $img = $article->img;
        }
        if ($request['cat']) {
            $cat = implode(',', $request['cat']);
        } else {
            $cat = 0;
        }
        if ($request['status']) {
            $status = $request['status'];
        } else {
            $status = 'draft';
        }
        $title = $request['title'];
        $article->update([
            'title' => $title,
            'content' => $request['content'],
            'cat' => $cat,
            'img' => $img,
            'userId' => auth()->user()->id,
            'status' => $status,
        ]);
        $article->categories()->sync($request['cat']);
        return redirect()->route('article.index');
//        return redirect()->action([ArticleController::class, 'index']);
    }

    public function destroy(Article $article)
    {
//        if ($article->img != "img/default.jpg") {
//            unlink($article->img);
//        }
        $article->delete();
        return redirect()->back();
    }
}
