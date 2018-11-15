<?php

namespace App\Http\Controllers;

use App\Vote;
use App\WordUpdate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vote(WordUpdate $update)
    {
        $vote = Vote::where([['user_id', auth()->id()], ['update_id', $update->id]])->first();
        if ($vote) {
            if ($vote->is_upvote == request('is_upvote')) {
                $vote->delete();
            } else {
                $vote->is_upvote = request('is_upvote');
                $vote->save();
            };
        } else {
            Vote::create([
                'user_id' => auth()->id(),
                'update_id' => $update->id,
                'is_upvote' => request('is_upvote')
            ]);
        }

        return $update->countVotes();
    }
}
