<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\model;

class books_Users extends model
{
    protected $table = 'user_books';

    public function booksuser()
    {
        return $this->belongsTo(User_books::class);
    }
}
