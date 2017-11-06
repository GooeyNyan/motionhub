<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Video
 *
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $image
 * @property string|null $desc
 * @property int $watched
 * @property string|null $download_link
 * @property string|null $netdisk_key
 * @property int $category_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereDownloadLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereNetdiskKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereWatched($value)
 */
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
