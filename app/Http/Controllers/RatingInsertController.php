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

    public function getByCategory($categoryId)
    {
        $books = DB::select('SELECT book.id, book.name FROM book WHERE idCategory = ?', [$categoryId]);
        return response()->json($books);
    }
}
