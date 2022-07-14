<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'cover_image',
        'title',
        'author',
        'isbn',
        'condition',
    ];
}
