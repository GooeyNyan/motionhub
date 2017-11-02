<?php
/**
 * Created by PhpStorm.
 * User: Nyan
 * Date: 8/5/2017
 * Time: 4:15 PM
 */

namespace App\Repositories;

use App\Share;
use App\Tag;
use App\Video;

class VideoRepository
{

    public function createVideo($data, $tags)
    {
        $video = Video::create($data);
        $video->tags()->attach($tags);
        return $video;
    }

    public function videoShare($data)
    {
        $video = Share::create($data);
        return $video;
    }

    public function normalizeVideoUrl($url)
    {
        $url = preg_replace('/"/', "'", $url);
        $url = preg_replace("/height='(\d+)'/", "height='810'", $url);
        $url = preg_replace("/width='(\d+)'/", "width='1440'", $url);

        return $url;
    }

    public function normalizeImageUrl($get)
    {
        $match = [];
        preg_match_all('/uploads\/image\/\d{4}\/\d{2}\/\d{2}\/\w+.(jpg?g|gif|svg|png|bmp)/', $get, $match);

        return 'storage/' . $match[0][0];
    }

    public function normalizeTag($tags)
    {
        return collect($tags)->map(function ($tag) {
            if (is_numeric($tag)) {
                return (int)$tag;
            }
            $newTag = Tag::firstOrCreate(['name' => $tag]);

            return $newTag->id;
        })->toArray();
    }
}