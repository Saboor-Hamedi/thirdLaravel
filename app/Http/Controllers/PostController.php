<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{

    // this controller is for post only
    public function index(){
        $posts =  Post::with(['user', 'likes'])->orderBy('created_at', 'DESC')->paginate(3);// this is a collection, as well as select all data from table
        return view('posts.index',[ 
            'posts' => $posts
        ]);
    }
    // show 
    public function show(Post $post){
        return view('posts.show', [
            'post' => $post, 
        ]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        // insert data into post, and access to the user_id which is foreignId
        // here we don't need to put the user_id, 
        // the posts() function will automatically insert us
        $request->user()->posts()->create($request->only('body'));
        return \back();
    }
    // delete the entire post
    public function destroy(Post $post){
       $this->authorize('delete', $post); // this the permission method, 
       // where other is are not allowed to delete the someones else psots
       // php artisan make: Policy PostPolicy, is our policy name
        $post->delete();
        return back();
    }
}
