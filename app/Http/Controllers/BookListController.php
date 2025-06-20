<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;



class BookListController extends Controller
{
    public function index(): View
    {
        // $books = DB::select('select * from book limit 10');

        $books = DB::select('
        
            SELECT r.id, r.idBook, r.idAuthor, r.idCategory, sum.score ,agg.voter from rating r 
            JOIN (
                SELECT idBook, COUNT(id) as voter
                from rating
                GROUP BY idBook
            ) agg ON r.idBook = agg.idBook
            JOIN(
                SELECT idBook, SUM(value) as score
                from rating
                GROUP by idBook
            ) sum on r.idBook = sum.idbook limit 10
        ');

        return view('booklist', ['books' => $books]);
    }
}



// SELECT r.id, r.idBook, r.idAuthor, agg.voter from rating r 
// JOIN (
// 	SELECT idBook, COUNT(id) as voter
//     from rating
//     GROUP BY idBook
// ) agg ON r.idBook = agg.idBook


// SELECT r.id, r.idBook, r.idAuthor,sum.score ,agg.voter from rating r 
// JOIN (
// 	SELECT idBook, COUNT(id) as voter
//     from rating
//     GROUP BY idBook
// ) agg ON r.idBook = agg.idBook
// JOIN(
// 	SELECT idBook, SUM(value) as score
//     from rating
//     GROUP by idBook
// ) sum on r.idBook = sum.idbook