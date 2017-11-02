<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['name', 'link', 'image', 'desc', 'category_id', 'download_link', 'netdisk_key'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

//    关联标签
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'video_tag')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
