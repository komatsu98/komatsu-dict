<?php

namespace App;

class Word extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function form()
    {
        return $this->belongsTo(WordForm::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'word_tag', 'word_id', 'tag_id');
    }

    public function updates()
    {
        return $this->hasMany(WordUpdate::class);
    }

    public function getShownUpdates()
    {
        $updates = $this->updates;
        $updates->map(function ($update) {
            $update['upvote'] = $update->countVotes()['upvote'];
            $update['downvote'] = $update->countVotes()['downvote'];
            $update['uprate'] = $update->rate()['uprate'];
            $update['downrate'] = $update->rate()['downrate'];
        });
//        dd($updates);
        $fields = $updates->groupBy('field');
        $updates = $fields->map(function ($field) {
            $rates = $field->where('uprate', $field->max('uprate'));
            $votes = $rates->where('upvote', $rates->max('upvote'));
            $field = $votes->where('downvote', $votes->min('downvote'));
            return $field->first();
        })->values();

//        dd($updates);
        return $updates;
    }
}
