<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'password',
    ];
    protected $table = 'teachers';

    function post() {
        return $this->hasMany(Posts::class, 'posts_teachers_id');
    }
}
