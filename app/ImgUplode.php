<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgUplode extends Model
{
    protected $fillable = [
        'article_id','file'
    ];

    public function article() {
        return $this->belongsTo('App\Article','article_id');
    }
}
