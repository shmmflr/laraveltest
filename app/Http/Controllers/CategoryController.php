<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $parent_menu = Category::where('parent', 0)->get();
        $count = Category::count();
        return view('admin.category.index', compact('parent_menu', 'count'));
    }


    public function create()
    {
        $parent_menu = Category::where('parent', 0)->get();
        return view('admin.category.create', compact('parent_menu'));
    }


    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->back();
    }

    public function show(Category $category)
    {
        $articles = $category->articles()->paginate(8);
        return view('category', compact('articles', 'category'));
    }

    public function edit(Category $category)
    {
        $parent_menu = Category::where('parent', 0)->get();
        return view('admin.category.edit', compact('category', 'parent_menu'));
    }


    public function update(Request $request, Category $category)
    {
        if (isset($request['status'])) {
            $status = $request['status'];
        } else {
            $status = 'off';
        }
        $category->update([
            'sort' => $request['sort'],
            'title' => $request['title'],
            'parent' => $request['parent'],
            'status' => $status
        ]);
        return redirect()->back();
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
