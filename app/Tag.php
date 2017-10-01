<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'desc'];

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'video_tag')->withTimestamps();
    }

    public function vipVideos()
    {
        return $this->belongsToMany(vipVideo::class, 'vip_video_tag')->withTimestamps();
    }
}
