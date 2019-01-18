<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Article;
use Session;
use App\Http\Requests\ArticleRequest;
class articlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $action=Input::get('action','none');
        if($action=='find'){
            $search = $request->cari;
            $hasil = Article::where('title', 'LIKE', '%' . $search . '%')->paginate(3);
        }
        

        $articles = Article::paginate(3);
        return view('articles.index')->with('articles',$articles);   
    }
    public function search(ArticleRequest $request)
    {
        
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //
        if(Article::create($request->all())){
            Session::flash("notice","Article success created");
        } else {
            Session::flash("notice","Article failed created");
        }
        
        Session::flash("notice","Article success created");
        return redirect()->route("articles.index");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        // $comments =Article::find($id)->comments->sortBy('Comment.created_at');
        return view("articles.show")->with('article',$article);
        // ->with('comments',$comments);
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
        $article = Article::find($id);
        return view('articles.edit')->with('article',$article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        //
        Article::find($id)->update($request->all());
        Session::flash("notice","Article success updated");
        return redirect()->route("articles.show",$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Article::destroy($id);
        Session::flash("notice","Article success deleted");
        return redirect()->route("articles.index");
    }
    
}
