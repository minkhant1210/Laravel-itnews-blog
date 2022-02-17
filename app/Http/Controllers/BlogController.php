<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $articles = Article::when(isset(request()->search), function ($query){
            $search = request()->search;
            $query->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->latest('id')->paginate(7);
//        return $articles;
        return view('welcome',compact('articles'));
    }
    public function detail($slug){
        $article = Article::where("slug",$slug)->first();
        if (empty($article)){
            return abort(404);
        }
        return view('blog.detail',compact('article'));
    }
    public function baseOnCategory($id){
        $articles = Article::when(isset(request()->search), function ($query){
            $search = request()->search;
            $query->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->where("category_id",$id)->latest('id')->paginate(7);
        return view('welcome',compact('articles'));
    }
    public function baseOnUser($id){
        $articles = Article::when(isset(request()->search), function ($query){
            $search = request()->search;
            $query->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->where("user_id",$id)->with(['user','category'])->latest('id')->paginate(7);
        return view('welcome',compact('articles'));
    }
    public function baseOnDate($date){
        $articles = Article::when(isset(request()->search), function ($query){
            $search = request()->search;
            $query->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->where("created_at",$date)->with(['user','category'])->latest('id')->paginate(7);
        return view('welcome',compact('articles'));
    }
}
