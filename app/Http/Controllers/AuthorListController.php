<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;



class AuthorListController extends Controller
{
    public function index(): View
    {
        // $authors = DB::select('select * from author limit 10');

        $authors = DB::select('
            SELECT a.name AS author, COUNT(r.idBook) AS voter 
            FROM author a
            JOIN book b ON a.id = b.idAuthor
            JOIN rating r ON b.id = r.idBook
            WHERE r.value > 5 
            GROUP BY a.id, a.name 
            ORDER BY voter DESC
            ');

        return view('authorlist', ['authors' => $authors]);
    }
}


// SELECT a.name AS author, COUNT(r.idBook) AS voter FROM author a
// JOIN book b ON a.id = b.idAuthor
// JOIN rating r ON b.id = r.idBook
// WHERE r.value > 5 GROUP BY a.id, a.name ORDER BY rating_count DESC;