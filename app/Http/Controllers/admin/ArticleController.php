<?php

namespace App\Http\Controllers\admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new Article();
        $title = "Create new article";
        return view('admin.articles.form', compact('model', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            "name" => 'max:191|required',
        ]);
        $data = $request->all();
        if($request->file('image'))
        {
            $logo = $request->file('image');
            $filename = random_int(10000000, 99999999).time().".".$logo->getClientOriginalExtension();
            Image::make($logo)->save(public_path('/image/news/'.$filename));
            $image2 = '/image/news/'.$filename;
            $data["image"] = $image2;
        }
        Article::create($data);
        return redirect()->route('article.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        $model = $article;
        $title = "Edit article";
        return view('admin.articles.form', compact('model', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $this->validate($request, [
            "name" => 'max:191|required',
        ]);
        $data = $request->all();
        if($request->file('image'))
        {
            $logo = $request->file('image');
            $filename = random_int(10000000, 99999999).time().".".$logo->getClientOriginalExtension();
            Image::make($logo)->save(public_path('/image/news/'.$filename));
            $image2 = '/image/news/'.$filename;
            $data["image"] = $image2;
        }
        $article->update($data);
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
        return redirect()->route('article.index');
    }
}
