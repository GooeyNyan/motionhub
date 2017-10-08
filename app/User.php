<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'confirmation_token', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin'
    ];

    public function videos()
    {
        return $this->belongsToMany(Video::class)->withTimestamps();
    }

    public function vipVideos()
    {
        return $this->belongsToMany(vipVideo::class, 'user_vip_video')->withTimestamps();
    }

    public function isAdmin()
    {
        return $this->is_admin === 1;
    }

    public function permitted($video)
    {
        return !!$this->vipVideos()->where('vip_video_id', $video)->count();
    }
}
