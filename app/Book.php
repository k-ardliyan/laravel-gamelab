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

    public function issues()
    {
        // on column 'book_id' where 'is_booked' = 1
        return $this->hasMany('App\Issues', 'book_id');
    }
}
