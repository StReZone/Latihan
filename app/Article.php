<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    //protected $table ='article';
    protected $fillable = [
        'title','content'
    ];
    public static function valid() 
    {
        return array(
            'content' => 'required'
        );
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','article_id');
    }

    public function ImgUplode()
    {
        return $this->hasMany('App\ImgUplode','article_id');
    }

    public static function getExcerpt($str, $startPos = 0, $maxLength = 50) 
    {
        if(strlen($str) > $maxLength) {
            $excerpt   = substr($str, $startPos, $maxLength - 6);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt   = substr($excerpt, 0, $lastSpace);
            $excerpt  .= ' [...]';
        } else {
            $excerpt = $str;
        }

        return $excerpt;
    }
    
}
