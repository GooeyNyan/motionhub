<?php
/**
 * Created by PhpStorm.
 * User: Nyan
 * Date: 8/5/2017
 * Time: 4:15 PM
 */

namespace App\Repositories;

use App\Video;

class VideoRepository
{
    public function normalizeVideoUrl($url)
    {
        $url = preg_replace('/"/', "'", $url);
        $url = preg_replace("/height='(\d+)'/", "height='810'", $url);
        $url = preg_replace("/width='(\d+)'/", "width='1440'", $url);

        return $url;
    }

    public function createVideo($data)
    {
        return Video::create($data);
    }

    public function normalizeImageUrl($get)
    {
        $match = [];
        preg_match_all('/uploads\/image\/\d{4}\/\d{2}\/\d{2}\/\w+.(jpg?g|gif|svg|png|bmp)/', $get, $match);

        return $match[0][0];
    }
}