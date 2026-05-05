<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenDataArticle extends Model
{
    //
    protected $table = 'open_data_article';

    protected $fillable = [
        'title',
        'content',
        'author',
        'article_url',
        'published_at'
    ];
    
    protected $hidden = [
        'created_at'
    ];
}
