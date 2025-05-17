<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $table = 'genres';

    protected $fillable = ['name', 'description'];

    public function Books()
    {
        return $this->hasMany(Books::class, 'genre_id');
    }
}
