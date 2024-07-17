<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing-page.home.index');
    }

    public function matches()
    {
        return view('landing-page.matches.index');
    }

    public function players()
    {
        return view('landing-page.players.index');
    }

    public function blog()
    {
        return view('landing-page.blog.index');
    }

    public function contact()
    {
        return view('landing-page.contact.index');
    }
}
