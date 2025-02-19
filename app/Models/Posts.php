<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'title', 'author', 'description', 'image'];

    function teacher(){
        return $this->hasOne(Teacher::class , 'author');
    }
}
