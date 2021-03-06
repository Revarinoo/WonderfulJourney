<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\CreateBlogRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('CreateArticle')->only('create');
        $this->middleware('auth')->except("fullstory","categorize");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('user.addblog', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlogRequest $request)
    {
        $input = $request->all();
        $file = $request->file('image');
        $imgname = time() .$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $imgname);
        $input['user_id'] = Auth::user()->id;
        $input['image'] = $imgname;
        Article::create($input);
        return back()->with('msg','Create Blog Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if(Auth::check()){
            if (Auth::user()->id != $user->id && Auth::user()->role !="Admin")
                return abort('403');

            return view('user.showblog',compact('user'));
        }
        return abort('403');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->image != null)
            Storage::delete('public/images/' . $article->image);
        $article->delete();
        return back()->with('msg','Article Successfully Deleted!');
    }

    public function fullstory(Article $article){
        $categories = Category::all();
        return view('fullstory', compact('article', 'categories'));
    }

    public function categorize($name){
        $categories = Category::all();
        $categories2 = Category::where('name',$name)->get();
        return view('categorize', compact('categories', 'categories2'));
    }
}

