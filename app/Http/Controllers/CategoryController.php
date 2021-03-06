<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create(){
        return view('admin.addcategory');
    }

    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required|string|min:3']);
        Category::create($request->all());
        return back()->with('msg','Category Successfully Added!');
    }

    public function show(){
        $categories = Category::all();
        return view('admin.listcategory', compact('categories'));
    }

    public function destroy(Category $category){
        $category->delete();
        return back()->with('msg','Category Successfully Deleted!');
    }
}
