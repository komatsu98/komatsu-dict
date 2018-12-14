<?php

namespace App\Http\Controllers;

use App\Translation;
use App\Word;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $search = null;
        if (request()->has('search')) {
            $search = trim(strtolower(request('search')), ' ');
            $words = Word::where('word', 'LIKE', '%' . $search . '%')->get();
            $translations = Translation::where('title', 'LIKE', '%' . $search . '%')->get();
        }

        return view('home.index', compact('search', 'words', 'translations'));
    }
}
