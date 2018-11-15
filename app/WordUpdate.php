<?php

namespace App;

use Illuminate\Http\Request;

class WordUpdate extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'update_id');
    }

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function countVotes()
    {
        $upvote = $this->votes()->where('is_upvote', 1)->get();
        $downvote = $this->votes()->where('is_upvote', 0)->get();
        $data = [
            'upvote' => count($upvote),
            'downvote' => count($downvote)
        ];

        return $data;
    }

    public function rate()
    {
        //upvoted by admin
        $uprate = $this->votes()->where([['is_upvote', 1],['user_id',1]])->get();
        $downrate = $this->votes()->where([['is_upvote', 0],['user_id',1]])->get();

        $data = [
            'uprate' => count($uprate),
            'downrate' => count($downrate)
        ];
        return $data;
    }
}

