<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Word;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function translations()
    {
        return $this->hasMany(Translation::class);
    }

    public function word_updates()
    {
        return $this->hasMany(WordUpdate::class);
    }

    //votes give
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function publish(Word $word)
    {
        $this->words()->save($word);
    }

    //vote recieved
    public function count_votes()
    {
        $upvotes = Vote::join('word_updates','votes.update_id','=','word_updates.id')
            ->where([['votes.is_upvote', 1], ['word_updates.user_id', $this->id]])
            ->get();
        $downvotes = Vote::join('word_updates','votes.update_id','=','word_updates.id')
            ->where([['votes.is_upvote', 0], ['word_updates.user_id', $this->id]])
            ->get();
        $data = [
            'upvote' => count($upvotes),
            'downvote' => count($downvotes)
        ];

        return $data;
    }
    //rate recieved
    public function count_rates()
    {
        $uprates = Vote::join('word_updates','votes.update_id','=','word_updates.id')
            ->where([['votes.user_id', 1], ['votes.is_upvote', 1], ['word_updates.user_id', $this->id]])
            ->get();
        $downrates = Vote::join('word_updates','votes.update_id','=','word_updates.id')
            ->where([['votes.user_id', 1], ['votes.is_upvote', 0], ['word_updates.user_id', $this->id]])
            ->get();
        $data = [
            'uprate' => count($uprates),
            'downrate' => count($downrates)
        ];

        return $data;
    }
}
