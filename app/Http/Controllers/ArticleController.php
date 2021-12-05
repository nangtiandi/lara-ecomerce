<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth','isAdmin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')->get();
        return view('admin.article.view',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->price = $request->price;
        $article->sale = $request->sale;
        $article->user_id = Auth::id();

        $reName = uniqid()."_post.".$request->photo->extension();
        $request->photo->storeAs('public/images',$reName);
        $article->photo = $reName;
        $article->save();

        return redirect()->back()->with('status','Successfully Created Article');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $articles = Article::all();
        $categories = Category::all();
        return view('admin.article.edit',compact('article','articles','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->price = $request->price;
        $article->sale = $request->sale;
        $article->user_id = Auth::id();

        $reName = uniqid()."_post.".$request->photo->extension();
        $request->photo->storeAs('public/images',$reName);
        $article->photo = $reName;
        $article->update();

        return redirect()->route('article.create')->with('update','Successfully Updated Article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()->with('delete','Successfully Deleted Article');
    }
}
