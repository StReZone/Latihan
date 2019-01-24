<?php

namespace App\Http\Controllers;

use App\ImgUplode, App\Article;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;

class ImgUplodeController extends Controller
{
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
        //validator//
        $validation = Validator::make($request->all(), [
            'userfile' => 'required|image|mimes:jpeg,png|min:1|max:250'
        ]);

        //check if it fail//
        if ($validation->fails()){
            return redirect()->back()->withInput()->with('errors', $validation->errors());
        }

        $image = new Image;

        //upload image//
        $file = $request->file('userfile');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);

        //save path image to db//
        $image->file = $destination_path . $filename;
        $image->caption = $request->input('caption');
        $image->save();

        return Redirect::to('articles/'.$request->article_id)->with('message','You just uploaded an image !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImgUplode  $imgUplode
     * @return \Illuminate\Http\Response
     */
    public function show(ImgUplode $imgUplode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImgUplode  $imgUplode
     * @return \Illuminate\Http\Response
     */
    public function edit(ImgUplode $imgUplode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImgUplode  $imgUplode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImgUplode $imgUplode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImgUplode  $imgUplode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImgUplode $imgUplode)
    {
        //
    }
}
