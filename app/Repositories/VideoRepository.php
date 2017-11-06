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
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

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

    public function normalizeBilibiliUrl($a_id, $c_id)
    {
        return '<iframe width="1440" height="810" src="https://www.bilibili.com/html/html5player.html?cid=' . $c_id . '&aid=' . $a_id . '&pre_ad=0"
    frameborder="0" gesture="media" allowfullscreen>
  </iframe>';
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