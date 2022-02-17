<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiIndex(){
        $articles = Article::when(isset(request()->search), function ($query){
            $search = request()->search;
            $query->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->latest('id')->paginate(4);
        return $articles;
    }

    public function index()
    {
//        $all = Article::all();
//        foreach ($all as $a){
//            $a->slug = Str::slug($a->title);
//            $a->excerpt = Str::words($a->description,50);
//            $a->update();
//        }
//        return $all;

        $articles = Article::when(isset(request()->search), function ($query){
            $search = request()->search;
            $query->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->latest('id')->paginate(4);
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:5",
            "category" => "required|exists:categories,id"
        ]);

        //save article
        $article = new Article();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->description = $request->description;
        $article->excerpt = Str::words($request->description,50);
        $article->category_id = $request->category;
        $article->user_id = Auth::id();
        $article->save();

        //auto create thumbnail folder
        if (!Storage::exists('/public/thumbnail')){
            Storage::makeDirectory('/public/thumbnail');
        }

        //save photo
        if ($request->hasFile('photos')){
            foreach ($request->file('photos') as $photo){
                //save original photo in storage
                $newName = uniqid()."_photo.".$photo->extension();
                $photo->storeAs('/public/photo/',$newName);

                //save thumbnail photo in public
                $img = Image::make($photo);
                $img->fit(300,300);
                $img->save('storage/thumbnail/'.$newName);

                //save photo name in database
                $photo = new Photo();
                $photo->name = $newName;
                $photo->user_id = Auth::id();
                $photo->article_id = $article->id;
                $photo->save();
            }
        }
        return redirect()->route('article.index')->with("message", $article->title." article is created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
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
        $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:5",
            "category" => "required|exists:categories,id"
        ]);

        if ($article->title != $request->title){
            $article->slug = Str::slug($request->title);
        }
        $article->title = $request->title;
        $article->description = $request->description;
        $article->excerpt = Str::words($request->description,50);
        $article->category_id = $request->category;
        $article->update();

        return redirect()->route('article.index')->with("message", $article->title." article is updated");
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

        foreach ($article->photos as $photo) {
            //delete from file
            Storage::delete('public/photo/'.$photo->name);
            Storage::delete('public/thumbnail/'.$photo->name);
        }

        $article->photos()->delete();

//        return redirect()->back()->with("deleteMessage", $article->title." is deleted");
        return redirect()->route('article.index',['page'=>request()->page])->with("deleteMessage", $article->title." is deleted");
    }
}
