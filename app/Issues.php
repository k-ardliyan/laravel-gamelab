<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    protected $table = 'issues';

    protected $fillable = [
        'member_id',
        'book_id',
        'issue_date',
        'return_date',
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function book()
    {
        return $this->belongsTo('App\Book');
    }

}
