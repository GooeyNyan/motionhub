<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['name', 'link', 'image', 'desc'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
