<?php

namespace App\Http\Controllers;

use App\Category;
use App\Share;
use App\Tag;
use App\User;
use App\Video;
use App\vipVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    // User api

//  video api
    /**
     * return hottest videos
     *
     * @param Request $request
     * @return array
     */
    public function getHottestVideos(Request $request)
    {
        return DB::table('videos')
            ->select('id', 'name', 'link', 'image')
            ->orderBy('watched', 'desc')
            ->paginate($request->query('amount'));
    }

    /**
     * return newest videos
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function getNewestVideos(Request $request)
    {
        return Video::select('id', 'name', 'link', 'image')
            ->latest('created_at')
            ->paginate($request->query('amount'));
    }

    /**
     * return videos of type
     *
     * @param Request $request
     * @return mixed
     */
    public function getVideos(Request $request)
    {
        return DB::table('videos')
            ->select('id', 'name', 'link', 'image')
            ->orderBy('watched', 'desc')
            ->paginate($request->query('amount'));
    }

    public function getVIPVideos()
    {
        return DB::table('vip_videos')
            ->latest('created_at')
            ->select('id', 'name', 'image', 'price', 'duration', 'rank', 'tb_link', 'user_id')
            ->paginate(9);
    }

    public function getVideosOfACategory(Request $request)
    {
        $type_id = $request->query('id');
        $type = Category::where('id', $type_id)->first()->name;
        $videos = Video::where('category_id', $type_id)
            ->select('id', 'name', 'link', 'image')
            ->orderBy('watched', 'desc')
            ->paginate(48);
        $data = compact('type', 'videos');
        return $data;
    }

    /**
     * @param Request $request
     */
    public function updateWatched(Request $request)
    {
        $video = Video::find($request->get('id'));
        $video->watched++;
        $video->save();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchVideoByName(Request $request)
    {
        return Video::where('name', 'like', '%' . $request->query('q') . '%')
            ->select('id', 'name', 'image', 'desc')
            ->orderBy('name')
            ->paginate(20);
    }

    /**
     * @param Request $request
     * @return Tag|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Model
     */
    public function searchVideoByTag(Request $request)
    {
        $searchByTag = Tag::where('name', 'like', '%' . $request->query('q') . '%')
            ->first();

        if (!!$searchByTag) {
            $searchByTag = $searchByTag->videos()->paginate(20);
        }

        return $searchByTag;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchVIPVideoByName(Request $request)
    {
        return vipVideo::where('name', 'like', '%' . $request->query('q') . '%')
            ->select('id', 'name', 'image', 'price', 'duration', 'rank', 'tb_link', 'user_id')
            ->orderBy('name')
            ->paginate(9);
    }

    /**
     * @param Request $request
     * @return Tag|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Model
     */
    public function searchVIPVideoByTag(Request $request)
    {
        $searchByTag = Tag::where('name', 'like', '%' . $request->query('q') . '%')
            ->first();

        if (!!$searchByTag) {
            $searchByTag = $searchByTag->vipVideos()->paginate(9);
        }

        return $searchByTag;
    }


    /**
     * get relevant tag of the video
     *
     * @param Request $request
     * @return string
     */
    public function getUsers(Request $request)
    {
        $users = User::select(['id', 'name'])
            ->where('name', 'like', '%' . $request->query('name') . "%")
            ->get();

        return $users;
    }

    /**
     * get relevant tag of the video
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTags(Request $request)
    {
        $tags = Tag::select(['id', 'name'])
            ->where('name', 'like', '%' . $request->query('tag') . "%")
            ->get();

        return $tags;
    }

    public function getDownloadLink(Request $request)
    {
        $video = Video::where('id', $request->get('id'))
            ->select(['download_link', 'netdisk_key'])
            ->first();

        return $video;
    }

//    video share api
    public function getShares(Request $request)
    {
        return Share::select('id', 'name', 'link', 'user_name')
            ->paginate($request->query('amount'));
    }

    public function isAdmin()
    {
        if (Auth::user()->isAdmin()) {
            return true;
        }

        return false;
    }
}
