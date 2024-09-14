<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        Comment::create($validated);

        return back()->with('status', 'Comment added successfully!');
    }

    public function reply(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|string'
        ]);

        Comment::create([
            'blog_id' => $id,
            'content' => $validated['content'],
            'parent_id' => $request->parent_id
        ]);

        return back()->with('status', 'Reply added successfully!');
    }
}
