<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [ 'email', 'comment'];

    public function saveComment($data){
        $this->email=$data['email'];
        $this->comment=$data['comment'];
        $this->save();
        return 1;
    }
}