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
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class VIPVideoRepository
{

    public function createVideo($data, $tags)
    {
        $video = vipVideo::create($data);
        $video->tags()->attach($tags);
        return $video;
    }

    public function getVideoById($id)
    {
        return vipVideo::where('id', $id)->first();
    }

    public function normalizeVideoUrl($url)
    {
        $url = preg_replace('/"/', "'", $url);
        $url = preg_replace("/height='(\d+)'/", "height='420'", $url);
        $url = preg_replace("/width='(\d+)'/", "width='685'", $url);

        return $url;
    }

    public function normalizeBilibiliUrl($a_id)
    {
        return '<iframe src="//www.bilibili.com/blackboard/player.html?aid=' . $a_id . '" width="1440px" height="810px" frameborder="no" scrolling="no"></iframe>"';
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

    public function keyGenerator($video_id, $name = null)
    {
        $salt = "Picasso's horse";

        $username = isset($name) ? $name : Auth::user()->name;

        $secret = $video_id . $salt . $username;
        $hash = hash('sha256', $secret);
        $start_index = strlen($username) < 59 ? strlen($username) : 59;
        $key = substr($hash, $start_index, 6);

        return $key;
    }

    public function getBilibiliCid($a_id)
    {
        $client = new \GuzzleHttp\Client();
        try {
            // 哔哩哔哩视频列表接口
            $response = $client->get('http://www.bilibili.com/widget/getPageList?aid=' . $a_id);
            $cid = \GuzzleHttp\json_decode($response->getBody())[0]->cid;
            return $cid;
        } catch (RequestException $e1) {
            try {
                // ⑨BiLiBiLi
                $response = $client->get('http://9bl.bakayun.cn/API/GetVideoInfo.php?aid=' . $a_id . '&p=1&type=json');
                $cid = \GuzzleHttp\json_decode($response->getBody())->Result->VideoInfo->Cid;
                return $cid;
            } catch (RequestException $e2) {
                return "cid is not found";
            }
        }
    }
}