<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Repositories\VideoRepository;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class VideoController
 * @package App\Http\Controllers
 */
class VideoController extends Controller
{
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * @param StoreVideoRequest $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(StoreVideoRequest $request)
    {
        $link = $this->videoRepository->normalizeVideoUrl($request->get('link'));
        $image = $this->videoRepository->normalizeImageUrl($request->get('image'));

        $data = [
            'name' => $request->get('name'),
            'link' => $link,
            'image' => $image,
            'desc' => $request->get('desc')
        ];

        $this->videoRepository->createVideo($data);

        return redirect()->route('home');
    }

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
    public function searchVideo(Request $request)
    {
        return Video::where('name', 'like', '%' . $request->query('video') . '%')
            ->select('id', 'name', 'image', 'desc')
            ->orderBy('name')
            ->paginate(10);
    }
}
