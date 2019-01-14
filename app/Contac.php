<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contac extends Model
{
    //
    protected $fillable = ['usr_id', 'email', 'comment'];
    
    public function saveComment($data){
        $this->usr_id = auth()->user()->id;
        $this->email=$data['email'];
        $this->comment=$data['comment'];
        $this->save();
        return 1;
    
    }
}

