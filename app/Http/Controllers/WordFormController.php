<?php

namespace App\Http\Controllers;

use App\WordForm;
use Illuminate\Http\Request;

class WordFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function create()
    {
        return view('word_form.create');
    }
    public function store()
    {
        WordForm::create(['name' => request('name')]);
        return redirect()->route('dict');
    }
}
