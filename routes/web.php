<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
// Route::get('/', function () {
//     // $post = Post::find(3);

//     // dd($post->categories);

//     $category = Category::find(1);

//     foreach($category->posts as $post) {
//         echo $post->title;
//     }
//     // dd();
// });


Route::get('/', function() {

    $categories = Category::all();

    return view('post', compact('categories'));
});



Route::post('/create-post', function(Request $request) {


    
    // $tags = explode(', ', $request->tags);


    // foreach($tags as $tag) {
    //     Tag::updateOrCreate()
    // }

    // dd($tags);

    DB::transaction(function() use ($request) {

        // $postId = Post::insertGetId([
        //     'title' => $request->title,
        //     'content' => $request->content
        // ]);

        // dd($postId);
        
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        $postId = $post->id;

        foreach($request->categories as $key => $categoryId) {
            DB::table('post_category')->insert([
                'post_id' => $postId,
                'category_id' => $categoryId
            ]);
        }

    });


    return redirect('/posts');
});

Route::get('/posts', function() {
    
    $posts = Post::with('categories')->get();

    print_r($posts);

});