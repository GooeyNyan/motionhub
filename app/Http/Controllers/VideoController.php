<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;

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
        $this->middleware('auth')->except('vip', 'vipShow');
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
            '$image' => $image,
            'desc' => $request->get('desc')
        ];

        $this->videoRepository->createVideo($data);

        return redirect()->route('home');
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
}
