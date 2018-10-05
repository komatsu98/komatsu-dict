<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Translation;
use App\TranslationSource;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = TranslationSource::all();
        return view('translation.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('translation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'link' => 'required',
            'source_title' => 'required|max:255',
            'trans_title' => 'required|max:255',
            'trans_body' => 'required|max:65535',
            'source_body' => 'required|max:65535',
            'slug' => 'required'
        ]);

        $source = TranslationSource::create([
            'link' => request('link'),
            'title' => request('source_title'),
            'body' => request('source_body'),
            'slug' => request('slug'),
            'user_id' => auth()->id()
        ]);

        Translation::create([
            'source_id' => $source->id,
            'title' => request('trans_title'),
            'body' => request('trans_body'),
            'user_id' => auth()->id()
        ]);

        // add tags
        $wordController = new WordController();
        $tags = $wordController->multiStringToArray(request('tags'));
        $tag_ids = $source->tags()->pluck('tag_id')->all();

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
        $source->tags()->sync($tag_ids);

        return redirect()->route('trans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function show(Translation $translation)
    {
        $body_html = Markdown::convertToHtml($translation->body);

        return view('translation.show', compact('translation', 'body_html'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function edit(Translation $translation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Translation $translation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Translation $translation)
    {
        //
    }
}
