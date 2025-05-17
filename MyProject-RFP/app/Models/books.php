<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $table = 'books';

    protected $fillable = ['title', 'summary', 'image', 'stock', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
     public function comments()
    {
        return $this->hasMany(Comment::class, 'book_id');
    }

}
