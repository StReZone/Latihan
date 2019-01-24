<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Article, App\ImgUplode;
use Session;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Validator;
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
        if ($request->ajax()) {
            $articles = Article::where('title', 'LIKE', '%' . $request->cari . '%');
            if($request->sort === "asc"){
                $articles = $articles->orderBy('created_at','asc')->paginate(3);
                $view =(String) view('articles.list')->with('articles',$articles)->render();
                return response()->json(['view' => $view,'status' => 'success']);
            }elseif($request->sort === "desc"){
                $articles = $articles->orderBy('created_at','desc')->paginate(3);
                $view =(String) view('articles.list')->with('articles',$articles)->render();
                return response()->json(['view' => $view,'status' => 'success']);
            }
            $articles = $articles->paginate(3);
            $view =(String) view('articles.list')->with('articles',$articles)->render();
            return response()->json(['view' => $view,'status' => 'success']);
        }else{
            $articles = Article::paginate(3);
            return view('articles.index')->with('articles',$articles);   
        }  
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
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'userfile.*' => 'required|image|mimes:jpeg,png|min:1|max:250'
        ]);

        if ($validation->fails()){
            return redirect()->back()->withInput()->with('errors', $validation->errors());
        }else {
            $article = Article::create($request->all());  
            if ($request->hasFile('userfile')) {
            $files = $request->file('userfile');
            foreach ($files as $file) {
                $destination_path = 'uploads/';
                $filename = str_random(6).'_'.$file->getClientOriginalName();
                $file->move($destination_path, $filename);
                $image = new ImgUplode; 
                $image->article_id = $article->id;
                $image->file = $destination_path . $filename;
                $image->save();   
                    
                }
            }   
            Session::flash("notice","Article success created");
            return redirect()->route("articles.index");
        }
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
        $img = Article::find($id)->ImgUplode;
   
        $comments =Article::find($id)->comments->sortBy('Comment.created_at');
        
        return view("articles.show")->with('article',$article)->with('img',$img);
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
    public function update(Request $request, $id)
    {
    
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
