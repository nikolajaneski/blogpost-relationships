<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;



    // public function getPostDetails() {
    //     DB::table('post_details')->where('post_id', $this->id)->first();

            // $sql = 'SELECT * FROM post_details WHERE post_id = ' . $this->id;
    // }


    // One to One
    public function postDetails() 
    {
        return $this->hasOne(PostDetails::class);
    }


    // One to Many
    // $sql = 'SELECT * FROM comments WHERE post_id = ' . $this->id;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Many to Many

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }
}
