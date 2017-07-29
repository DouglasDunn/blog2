<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getComments()
    {
        return $this->comments()->latest()->get();
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {

            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month')->orderByRaw('created_at desc')->get();
    }
}
