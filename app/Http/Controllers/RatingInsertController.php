<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


use App\Models\AuthorModel;
use App\Models\BookModel;

class RatingInsertController extends Controller
{
    public function index(): View
    {
        $authors = DB::select('SELECT id, name FROM author ORDER BY name');
        // $books = Book::all();

        return view('ratinginsert', ['authors' => $authors]);
    }

    public function getByAuthor($authorId)
    {
        $books = DB::select('SELECT book.id, book.name FROM book WHERE idAuthor = ? ORDER BY book.name ASC', [$authorId]);
        return response()->json($books);
    }

    public function store(Request $request)
    {

        // dd($request->all());
        // Validate input
        // $validated = $request->validate([
        //     'idBook' => 'required|exists:books,id',
        //     'value' => 'required|integer|min:1|max:10',
        // ]);

        // Insert using query builder (not Eloquent)


        DB::table('rating')->insert([
            'idBook' => $request['idBook'],
            'value' => $request['value'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('index')->with('success', 'Rating submitted!');
        // return response()->json(['success' => true, 'message' => 'Rating submitted!']);
    }
}



// select book.id, book.name as Buku, author.name as Author from book Inner join author on book.idAuthor = author.id;