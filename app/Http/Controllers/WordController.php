<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\Vote;
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
            $str = trim(strtolower(request('search')), ' ');
            $words = $words->where('word', 'LIKE', '%' . $str . '%');
        }


        $words = $words->paginate(15);
//        $words->withPath('/words');

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

        $w = Word::where([['word', strtolower($request->word)], ['form_id', $request->form_id]])->first();

        if ($w) {
            return back()->withErrors([
                'message' => "Word exists!"
            ]);
        }

        $word = Word::create([
            'word' => strtolower(request('word')),
            'form_id' => request('form_id'),
            'user_id' => auth()->id()
        ]);

        // add tags

        $tags = $this->multiStringToArray($request->tags);
        $tag_ids = $word->tags()->pluck('tag_id')->all();

        for ($i = 0; $i < sizeof($tags); $i++) {
            if ($tags[$i] == '') continue;
            $check = Tag::where('name', strtolower($tags[$i]))->first();
            if (!$check) {
                $check = Tag::create([
                    'name' => strtolower($tags[$i])
                ]);
            }
            array_push($tag_ids, $check->id);
        }
        $word->tags()->sync($tag_ids);

        // create update

        if ($request->vi_meaning_1 && $request->en_meaning_1) {
            for ($i = 1; $i <= $request->fields_total; $i++) {
                if(request('vi_meaning_' . $i) && request('en_meaning_' . $i)) {
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
        }

        return redirect()->route('dict');
    }

    public function show(Word $word)
    {
        return view('word.show', compact('word'));
    }

    public function adminWordsIndex()
    {
        $words = Word::orderBy('word')->paginate(15);
        return view('admin.words', compact('words'));
    }

    public function adminWordShow(Word $word)
    {
        return view('admin.word_show', compact('word'));
    }

    public function adminUsersIndex()
    {
        $users = User::orderBy('created_at');
        $search = request('user_search');
        if ($search) {
            $search = trim(strtolower(request('search')), ' ');
            $users = $users->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('student_id', 'LIKE', '%' . $search . '%');
        }
        $users = $users->paginate(40);
        return view('admin.users', compact('users'));
    }

    public function adminUserShow(User $user)
    {
        $updates = $user->word_updates;
        $data = [
            'user' => $user,
            'updates' => $updates
        ];
        return view('admin.user_show', $data);

    }
}
