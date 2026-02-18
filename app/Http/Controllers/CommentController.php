<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required|string|min:3|max:1000',
        ]);

        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.show', $post)
            ->with('success', 'Comment added successfully!');
    }

    /**
     * Show the form for editing the specified comment.
     */
    public function edit(Comment $comment)
    {
        // Authorization check
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $post = $comment->post;
        return view('comments.edit', compact('comment', 'post'));
    }

    /**
     * Update the specified comment in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // Authorization check
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'content' => 'required|string|min:3|max:1000',
        ]);

        $comment->update($validated);

        return redirect()->route('posts.show', $comment->post)
            ->with('success', 'Comment updated successfully!');
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy(Comment $comment)
    {
        // Authorization check
        if ($comment->user_id !== Auth::id() && $comment->post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $post = $comment->post;
        $comment->delete();

        return redirect()->route('posts.show', $post)
            ->with('success', 'Comment deleted successfully!');
    }

    /**
     * Toggle like on a comment.
     */
    public function toggleLike(Comment $comment)
    {
        $user = Auth::user();

        if ($comment->isLikedBy($user)) {
            // Unlike
            $comment->likes()->detach($user->id);
        } else {
            // Like
            $comment->likes()->attach($user->id);
        }

        return back();
    }
}
