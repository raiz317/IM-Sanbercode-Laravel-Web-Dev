<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class Commentcontroller extends Controller
{
    public function store(Request $request, $book_id)
    {
        $request->validate([
            'summary' => 'required',
        ]);

        $userId = Auth::id();

        $comment = new Comment;
        $comment->content = $request->input('summary');
        $comment->book_id = $book_id;
        $comment->user_id = $userId;

        $comment->save();
        
        return redirect('/books/' . $book_id);

    }
}
