<?php

namespace App\Http\Controllers;

use App\Translation;
use App\Word;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (request()->has('search')) {
            $search = request('search');
            $words = Word::where('word', 'LIKE', '%' . trim($search, ' ') . '%')->get();
            $translations = Translation::where('title', 'LIKE', '%' . trim($search, ' ') . '%')->get();
        }
        return view('home.index', compact('search', 'words', 'translations'));
    }
}
