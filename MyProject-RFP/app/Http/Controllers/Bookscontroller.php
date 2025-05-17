<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genre;
use App\Models\books;
use App\Models\Comment;
use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;

class Bookscontroller extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(IsAdmin::class, except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = books::all();
        return view('book.tampil', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = genre::all();
        return view ('book.tambah', ['genre' => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required',
            'genre_id' => 'required'
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('image'), $imageName);

        $books = new books;
 
        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->stock = $request->input('stock');
        $books->genre_id = $request->input('genre_id');
        $books->image = $imageName;
 
        $books->save();
 
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = books::find($id);
        return view('book.detail', ['books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = genre::all();
        $books = books::find($id);

        return view('book.edit', ['books' => $books, 'genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'mimes:png,jpg|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required',
            'genre_id' => 'required'
        ]);
        $books = books::find($id);

        if($request->has('image')){
            File::delete('image/'. $books->image);

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('image'), $imageName);

            $books->image = $imageName;
        }

        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->stock = $request->input('stock');
        $books->genre_id = $request->input('genre_id');

        $books->save();
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = books::find($id);
    
        Comment::where('book_id', $id)->delete();
        
        File::delete('image/'. $books->image);
        $books->delete();
        
        return redirect('/books');
        // $books = books::find($id);
        // File::delete('image/'. $books->image);

        // $books->delete();
        // return redirect('/books');
    }
    
}
