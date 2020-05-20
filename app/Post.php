<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //solo se abbiamo un nome in altra lingua
    // protected $table = 'articles';
    protected $fillable = [
        'title',
        'message',
        'slug',
        'category',
        'author',
        'published',
        'profile_icon'
    ];

}