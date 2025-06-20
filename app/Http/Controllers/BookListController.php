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
        
            SELECT distinct b.name as "bookname", a.name as "authorname", c.name as "categoryname", sum.score ,agg.voter from rating r 
			INNER JOIN book b on r.idBook = b.id
            INNER JOIN author a on b.idAuthor = a.id 
            INNER JOIN book_category c on b.idCategory = c.id 
            JOIN (
                SELECT idBook, COUNT(id) as voter
                from rating
                GROUP BY idBook
            ) agg ON r.idBook = agg.idBook
            JOIN(
                SELECT idBook, AVG(value) as score
                from rating
                GROUP by idBook
            ) sum on r.idBook = sum.idbook  
            ORDER BY `sum`.`score` DESC limit 10
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


// SELECT r.id, b.name as "bookname", a.name as "authorname", c.name as "categoryname", sum.score ,agg.voter from rating r 
// 			INNER JOIN book b on r.idBook = b.id
//             INNER JOIN author a on b.idAuthor = a.id 
//             INNER JOIN book_category c on b.idCategory = c.id 
//             JOIN (
//                 SELECT idBook, COUNT(id) as voter
//                 from rating
//                 GROUP BY idBook
//             ) agg ON r.idBook = agg.idBook
//             JOIN(
//                 SELECT idBook, SUM(value) as score
//                 from rating
//                 GROUP by idBook
//             ) sum on r.idBook = sum.idbook;


// SELECT r.id, b.name as "bookname", a.name as "authorname", c.name as "categoryname", sum.score ,agg.voter from rating r 
// 			INNER JOIN book b on r.idBook = b.id
//             INNER JOIN author a on b.idAuthor = a.id 
//             INNER JOIN book_category c on b.idCategory = c.id 
//             JOIN (
//                 SELECT idBook, COUNT(id) as voter
//                 from rating
//                 GROUP BY idBook
//             ) agg ON r.idBook = agg.idBook
//             JOIN(
//                 SELECT idBook, AVG(value) as score
//                 from rating
//                 GROUP by idBook
//             ) sum on r.idBook = sum.idbook  
// ORDER BY `bookname` ASC

// SELECT  distinct b.name as "bookname", a.name as "authorname", c.name as "categoryname", sum.score ,agg.voter from rating r 
// 			INNER JOIN book b on r.idBook = b.id
//             INNER JOIN author a on b.idAuthor = a.id 
//             INNER JOIN book_category c on b.idCategory = c.id 
//             JOIN (
//                 SELECT idBook, COUNT(id) as voter
//                 from rating
//                 GROUP BY idBook
//             ) agg ON r.idBook = agg.idBook
//             JOIN(
//                 SELECT idBook, AVG(value) as score
//                 from rating
//                 GROUP by idBook
//             ) sum on r.idBook = sum.idbook  
// ORDER BY `bookname` ASC;