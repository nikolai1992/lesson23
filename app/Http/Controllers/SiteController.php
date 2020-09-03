<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Subject;
class SiteController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function subjects()
    {
        $subjects = Subject::all();
        return view('site.subjects', compact('subjects'));
    }
    public function blog()
    {
        $articles = Article::paginate(5);
        return view('blog', compact('articles'));
    }
    public function read_article($id)
    {
        $article = Article::find($id);
        return view('one_article', compact('article'));
    }
}
