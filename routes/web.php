<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostDetails;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// One to One
// Route::get('/', function () {
//     $postDetails = PostDetails::find(1);

//     dd($postDetails->post);
// });

// One to Many
// Route::get('/', function () {
//     // $post = Post::find(1);

//     // dd($post->comments);

//     $comment = Comment::find(1);

//     dd($comment->post);
// });

// Many to Many 
Route::get('/', function () {
    // $post = Post::find(3);

    // dd($post->categories);

    $category = Category::find(1);

    foreach($category->posts as $post) {
        echo $post->title;
    }
    // dd();
});
