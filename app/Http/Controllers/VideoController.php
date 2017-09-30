<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreVideoRequest;
use App\Repositories\VideoRepository;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class VideoController
 * @package App\Http\Controllers
 */
class VideoController extends Controller
{
    /**
     * @var VideoRepository
     */
    protected $videoRepository;

    /**
     * VideoController constructor.
     * @param VideoRepository $videoRepository
     */
    public function __construct(VideoRepository $videoRepository)
    {
        $this->middleware('auth')->only('store', 'update', 'edit', 'destroy');
        $this->videoRepository = $videoRepository;
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home');
        }

        $categories = Category::select('id', 'name')->get();

        return view('videos.create', compact('categories'));
    }

    /**
     * @param StoreVideoRequest $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(StoreVideoRequest $request)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home');
        }

        $link = $this->videoRepository->normalizeVideoUrl($request->get('link'));
        $image = $this->videoRepository->normalizeImageUrl($request->get('image'));
        $tags = $this->videoRepository->normalizeTag($request->get('tags'));

        $data = [
            'name' => $request->get('name'),
            'link' => $link,
            'image' => $image,
            'desc' => $request->get('desc')
        ];

        $this->videoRepository->createVideo($data, $tags);

        return redirect()->route('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->query('video');

        return view('videos.search', compact('query'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vip()
    {
        return view('vip.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vipShow($id)
    {
        return view('vip.detail');
    }

//    api part

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
            ->paginate(10);

        $searchByTag = Tag::where('name', 'like', '%' . $request->query('q') . '%')
            ->first();

        if (!!$searchByTag) {
            $searchByTag = $searchByTag->videos()
                ->select('video_id', 'name', 'image', 'desc')
//                ->get();
                ->paginate(10);
            $videos = compact('searchByName', 'searchByTag');
        } else {
            $videos = $searchByName;
        }
        return $videos;
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
            $searchByTag = $searchByTag->videos()->paginate(10);
        }

        return $searchByTag;
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
}
