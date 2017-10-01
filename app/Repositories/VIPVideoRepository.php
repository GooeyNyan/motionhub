<?php
/**
 * Created by PhpStorm.
 * User: Nyan
 * Date: 8/5/2017
 * Time: 4:15 PM
 */

namespace App\Repositories;

use App\Tag;
use App\vipVideo;
use Illuminate\Support\Facades\Auth;

class VIPVideoRepository
{

    public function createVideo($data, $tags)
    {
        $video = vipVideo::create($data);
        $video->tags()->attach($tags);
        return $video;
    }

    public function normalizeVideoUrl($url)
    {
        $url = preg_replace('/"/', "'", $url);
        $url = preg_replace("/height='(\d+)'/", "height='420'", $url);
        $url = preg_replace("/width='(\d+)'/", "width='685'", $url);

        return $url;
    }

    public function normalizeImageUrl($get)
    {
        $match = [];
        preg_match_all('/uploads\/image\/\d{4}\/\d{2}\/\d{2}\/\w+.(jpg?g|gif|svg|png|bmp)/', $get, $match);

        return $match[0][0];
    }

    public function normalizeTag($tags)
    {
        return collect($tags)->map(function ($tag) {
            if (is_numeric($tag)) {
                return (int)$tag;
            }
            $newTag = Tag::create(['name' => $tag]);

            return $newTag->id;
        })->toArray();
    }

    public function normalizeDuration($duration)
    {
        $duration = str_replace("：", ":", $duration);
        list($hours, $minutes) = explode(":", $duration);
        return $hours * 60 + $minutes;
    }

    public function keyGenerator($video_id)
    {
        $salt = "Picasso's horse";
        $username = Auth::user()->name;

        $secret = $video_id . $salt . $username;
        $hash = hash('sha256', $secret);
        $start_index = strlen($username) < 59 ? strlen($username) : 59;
        $key = substr($hash, $start_index, 6);

        return $key;
    }
}