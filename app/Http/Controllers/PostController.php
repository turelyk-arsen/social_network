<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with('user')->get();

        return view('moderator', compact('posts'));
    }

    public function home()
    {
        $posts = Post::with('user')->latest()->take(3)->get();
        return view('welcome', compact('posts'));
    }

    // public function userPost()
    // {
        
    //     $id = Auth::user()->id; 
    //     $posts = Post::where('user_id', $id)->get();
    //     return view('dashboard', compact('posts'));
    // }

//     public function userPost($id)
// {
//     $posts = Post::where('user_id', $id)->get();
//     return view('dashboard', ['posts' => $posts]);
// }
public function userPost()
{
    $userId = Auth::id();
    $posts = Post::where('user_id', $userId)->get();

    return view('dashboard', compact('posts'));
}
    // public function destroy(Post $post)
    // {
    //     // $post = Post::find($post);
    //     $post->delete();
    //     return redirect('/')->with('messege', 'Listing deleted successfully');
    // }

    public function destroy($postId)
{
    $post = Post::find($postId);
    if ($post) {
        $post->delete();
        return redirect('/moderator')->with('message', 'Post deleted successfully');
    } else {
        return redirect('/moderator')->with('error', 'Post not found');
    }
}
    
}