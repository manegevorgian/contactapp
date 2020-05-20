<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['first_name', 'last_name', 'user_name', 'role', 'email', 'phone', 'password'];

    public function posts() {
        return $this -> hasMany(Post::class);
}}
