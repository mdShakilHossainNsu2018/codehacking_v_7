<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    private $upload = '/images/';

    protected $fillable = ['photo_path', 'title', 'category_id', 'body', 'user_id'];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }


    public function getPhotoPathAttribute($photo){
        if ($photo){
            return $this->upload.$photo;
        }else{
            return null;
        }
    }
}
