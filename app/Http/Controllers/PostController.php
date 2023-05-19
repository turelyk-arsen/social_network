<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with('user')->latest()->get();

        return view('moderator', compact('posts'));
    }

    public function indexAll()
    {
        // $posts = Post::all();
        $posts = Post::with('user')->get();

        // return view('posts', compact('posts'));

        return view('posts', [
            // 'listings' => Listing::latest()->filter(request(['tag']))->get(),
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->get(),
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4),
            // 'posts' => Post::latest()->filter(request(['tag', 'search']))->simplePaginate(4),
            // 'posts' => Post::latest()->filter(request(['tag']))->get()->simplePaginate(6),
            'posts' => Post::latest()->filter(request(['tag', 'search']))->simplePaginate(6),

        ]);
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

    // public function destroy($postId)
    // {
    //     $post = Post::find($postId);
    //     if ($post) {
    //         $post->delete();
    //         return redirect('/moderator')->with('message', 'Post deleted successfully');
    //     } else {
    //         return redirect('/moderator')->with('error', 'Post not found');
    //     }
    // }
    
    // public function show(Post $post)
    // {
    //     return view('post', [
    //         'post' => $post
    //     ]);
    // }
    public function show($postId)
{
    $post = Post::findOrFail($postId);
    $comments = Comment::where('post_id', $postId)->latest()->get();
    $user = User::findOrFail($post->user_id);

    return view('post', compact('post', 'comments', 'user'));
}

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $form = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'tags' => 'required',
            'content' => 'required',
        ]);

        $form['user_id'] = Auth::id();

        if($request->hasFile('image')) {
            $form['image'] = $request->file('image')->store('photos', 'public');
        }

        Post::create($form);
        // Post::create($request->all());
        return redirect('/posts')->with('message', 'Your post created successfully.');
    }

    public function edit(Post $post) {
        return view('post-edit', ['post'=>$post]);
    }

    public function update(Request $request, Post $post) {
        $form = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'tags' => 'required',
            'content' => 'required',
        ]);

        $form['user_id'] = Auth::id();

        if($request->hasFile('image')) {
            $form['image'] = $request->file('image')->store('photos', 'public');
        }

        $post->update($form);
        return redirect('/posts')->with('message', 'Your post update successfully.');
    }
    
    public function destroy (Post $post) {
        $post->delete();
        return redirect('/posts')->with('message','Your post delete successfully');
    }

    public function dest (Post $post) {
        $post->delete();
        return redirect('/')->with('message','Your post delete successfully');
    }
}