<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\Word;
use App\WordUpdate;
use Illuminate\Http\Request;

class WordUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Word $word)
    {
        return view('update.index', compact('word'));
    }

    public function create(Word $word)
    {
        $update = null;
        return view('update.create', compact('word', 'update'));
    }

    public function store(Word $word)
    {
        $this->validate(request(), [
            'vi_meaning_1' => 'required',
            'en_meaning_1' => 'required'
        ]);

        //create many
        if (request('vi_meaning_1') && request('en_meaning_1')) {
            for ($i = 1; $i <= request('fields_total'); $i++) {
                WordUpdate::create([
                    'word_id' => $word->id,
                    'user_id' => auth()->id(),
                    'field' => request('field_' . $i),
                    'vi_meaning' => request('vi_meaning_' . $i),
                    'en_meaning' => request('en_meaning_' . $i),
                    'example' => request('example_' . $i),
                    'example_meaning' => request('example_meaning_' . $i),
                    'note' => request('note_' . $i)
                ]);
            }

        }

        return redirect('/words/' . $word->id);
    }

    public function edit(WordUpdate $update)
    {
        return view('update.edit', compact('update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Word $word
     * @return \Illuminate\Http\Response
     */
    public function update(WordUpdate $update)
    {
        $this->validate(request(), [
//            'field_1' => 'required',
            'vi_meaning_1' => 'required',
            'en_meaning_1' => 'required'

        ]);
        if ($update->user != User::find(auth()->id())) {
           return back()->withErrors([
               'message' => 'Only the owner can edit!'
           ]);
        }

        $update->update([
            'field' => request('field_1'),
            'vi_meaning' => request('vi_meaning_1'),
            'en_meaning' => request('en_meaning_1'),
            'example' => request('example_1'),
            'example_meaning' => request('example_meaning_1'),
            'note' => request('note_1'),
        ]);

        return redirect()->to('/words/' . $update->word->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Word $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(WordUpdate $update)
    {
        foreach($update->votes() as $vote)
        {
            $vote->delete();
        }

        $update->delete();

        return back();
    }
}
