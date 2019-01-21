<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Article;
use View;
class TableArticlesController extends Controller
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
        return view('tablearticles.index')->with('articles',$articles); 
        //return view('tablearticles.index', ['articles' => $articles]);
    }
    protected $rules =
    [
        'title' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
        'content' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
    ];
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $articles = new Article();
            $articles->title = $request->title;
            $articles->content = $request->content;
            $articles->save();
            return response()->json($articles);
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
        $articles = Article::findOrFail($id);

        return view('tablearticles.show', ['articles' => $articles]);
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
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $articles = Article::findOrFail($id);
            $articles->title = $request->title;
            $articles->content = $request->content;
            $articles->save();
            return response()->json($articles);
        }
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
        $articles = Article::findOrFail($id);
        $articles->delete();

        return response()->json($articles);
    }
}
