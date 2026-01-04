<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $fillable = ['title', 'deskripsi', 'image'];

    public function gambar()
    {
        return $this->hasMany(GambarArticle::class, 'article_id');
    }
}
