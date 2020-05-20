<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'short_content', 'content', 'image', 'type', 'status'];

    public function author() {
        return $this -> belongsTo(Author::class);
    }
}
