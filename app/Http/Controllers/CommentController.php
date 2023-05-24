<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('user')->latest()->get();
        return view('post', compact('comments'))->with('message', 'Comment created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('create-comment', ['post' => $post])->with('message', 'Comment created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
        ]);
        Comment::create($validatedData);
        return redirect()->route('show', ['post' => $validatedData['post_id']])->with('message', 'Comment created successfully.');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
        ]);
        $comment->update($validatedData);
        return redirect()->route('show', ['post' => $validatedData['post_id']])->with('message', 'Comment updated successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Comment $comments)
    {
        return view('post', ['comments' => $comments]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment) {
        return view('comment-edit', ['comment'=>$comment])->with('message', 'Comment edit successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('message', 'Your comment delete successfully');
    }
}