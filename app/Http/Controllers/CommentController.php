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
        return view('post', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('create-comment', ['post' => $post]);
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
        return redirect()->route('show', ['post' => $validatedData['post_id']])->with('success', 'Comment created successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);
        $comment->update($validatedData);
        return redirect()->back()->with('success', 'Коментар успішно оновлено.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Your post delete successfully');
    }
}