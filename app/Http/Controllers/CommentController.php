<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'comment' => 'required'
        ]);

        Comment::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Commentaire ajouté.');
    }

    public function destroy($id)
    {
        // Eager load the vehicle relationship
        $comment = Comment::with('vehicle')->findOrFail($id);

        // Check if the authenticated user is the owner of the comment or the vehicle
        if (auth()->id() !== $comment->user_id && auth()->id() !== $comment->vehicle->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Delete the comment
        $comment->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function edit(Comment $comment)
    {
        // Check if the authenticated user is the owner of the comment
        if (auth()->id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        // Check if the authenticated user is the owner of the comment
        if (auth()->id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'comment' => 'required',
        ]);

        $comment->update(['comment' => $request->comment]);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }


}
