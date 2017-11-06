<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\vipVideo
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $rank
 * @property int $duration
 * @property int $price
 * @property string $desc
 * @property string $image
 * @property string $link
 * @property string $tb_link
 * @property string $download_link
 * @property string|null $netdisk_key
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereDownloadLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereNetdiskKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereTbLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\vipVideo whereUserId($value)
 */
class vipVideo extends Model
{
    protected $fillable = ['name', 'rank', 'duration', 'price', 'desc', 'image', 'link', 'tb_link', 'download_link', 'netdisk_key', 'user_id'];

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