<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {

    // Dashboard
    public function getDashboard(){

        // Fetch all posts order by desc
        $posts = Post::orderBy('created_at', 'desc')->get();

        // Making posts available in the view
        return view('dashboard', ['posts' => $posts]);
    }

    public function postCreatePost(Request $request){

        // Validation
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        // Create post
        $post = new Post();
        $post-> body = $request['body'];

        // Save post to the currently authenticated user
        $message = 'there was an error';
        if($request->user()->posts()->save($post)){
            $message = 'Post successfully created!';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDeletePost($post_id) {

        // Find post with id
        $post = Post::where('id', $post_id)->first();

        // Only user of this post can delete
        if(Auth::user() != $post->user) {
            return redirect()->back();
        }

        $post->delete();
        
        return redirect()->route('dashboard')->with(['message' => 'Successfully Deleted!']);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postid']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }
}