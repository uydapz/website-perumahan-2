<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GambarArticle extends Model
{
    protected $table = 'gambar_article';
    protected $fillable = ['article_id', 'image'];

    public function article()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }
}
