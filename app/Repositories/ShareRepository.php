<?php
/**
 * Created by PhpStorm.
 * User: Nyan
 * Date: 8/5/2017
 * Time: 4:15 PM
 */

namespace App\Repositories;

use App\Share;

/**
 * Class ShareRepository
 * @package App\Repositories
 */
class ShareRepository
{
    /**
     * 创建分享视频
     *
     * @param $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function videoShare($data)
    {
        $video = Share::create($data);
        return $video;
    }
}