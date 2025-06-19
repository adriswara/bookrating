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
        $authors = DB::select('select * from author limit 10');

        return view('booklist', ['authors' => $authors]);
    }
}
