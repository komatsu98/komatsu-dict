<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Word;
use App\WordForm;
use App\WordUpdate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ReflectionObject;
use Carbon\Carbon;
use App\Http\Controllers\WordUpdateController;

class WordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $words = Word::latest();

        if (request()->has('tag')) {
            $tag_id = request('tag');
            $words = $words->whereHas('tags', function ($query) use ($tag_id) {
                $query->where('tag_id', $tag_id);
            });
        }

        if (request()->has('month') && request()->has('year')) {
//            $words->filter(request(['month', 'year']));
            $year = date('Y', strtotime(request('year')));
            $words = $words->whereYear('created_at', $year);
            $month = date('m', strtotime(request('month')));
            $words = $words->whereMonth('created_at', $month);
        }

        if (request()->has('search')) {
           $words = $words->where('word', 'LIKE', '%' . trim(request('search'), ' ') . '%');
        }

        $words = $words->get();


        return view('word.index', compact('words'));
    }

    public function create()
    {
        $forms = WordForm::all();
        $update = null;

        return view('word.create', compact('forms', 'update'));
    }

    // convert string to array

    public function multiStringToArray($multi_string)
    {
        $strings = (String)$multi_string;
        $strings = str_replace(" ,", ",", $strings);
        $strings = str_replace(", ", ",", $strings);
        $strings = trim($strings, ",");
        $string_array = explode(",", $strings);

        return $string_array;
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'word' => 'required',
            'form_id' => 'required',
        ]);

        $w = Word::where([['word', $request->word], ['form_id', $request->form_id]])->first();

        if ($w) {
            return back()->withErrors([
                'message' => "Word exists!"
            ]);
        }

        $word = Word::create([
            'word' => request('word'),
            'form_id' => request('form_id'),
            'user_id' => auth()->id()
        ]);

        // add tags

        $tags = $this->multiStringToArray($request->tags);
        $tag_ids = $word->tags()->pluck('tag_id')->all();

        for ($i = 0; $i < sizeof($tags); $i++) {
            if($tags[$i] == '') continue;
            $check = Tag::where('name', $tags[$i])->first();
            if (!$check) {
                $check = Tag::create([
                    'name' => $tags[$i]
                ]);
            }
            array_push($tag_ids, $check->id);
        }
        $word->tags()->sync($tag_ids);

        // create update

        if ($request->meaning_1) {
            for ($i = 1; $i <= $request->fields_total; $i++) {
                WordUpdate::create([
                    'word_id' => $word->id,
                    'user_id' => auth()->id(),
                    'field' => request('field_' . $i),
                    'meaning' => request('meaning_' . $i),
                    'example' => request('example_' . $i),
                    'example_meaning' => request('example_meaning_' . $i),
                    'note' => request('note_' . $i)
                ]);
            }

        }

        return redirect()->route('dict');
    }

    public function show(Word $word)
    {
        return view('word.show', compact('word'));
    }
}
