<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDetails extends Model
{
    use HasFactory;


    // One to One
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
