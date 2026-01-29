<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function showAbout()
    {
        return view('customer.about');
    }

    public function showCats()
    {
        return view('pages.cats');
    }
}
