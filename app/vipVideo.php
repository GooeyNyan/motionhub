<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vipVideo extends Model
{
    protected $fillable = ['name', 'rank', 'duration', 'price', 'desc', 'image', 'link', 'tb_link', 'download', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'vip_video_tag')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_vip_video')->withTimestamps();
    }
}