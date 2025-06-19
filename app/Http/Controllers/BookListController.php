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
        $books = DB::select('select * from book limit 10');

        return view('booklist', ['books' => $books]);
    }
}
