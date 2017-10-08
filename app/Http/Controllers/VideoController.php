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
    protected $repository;

    /**
     * VideoController constructor.
     * @param VideoRepository $videoRepository
     */
    public function __construct(VideoRepository $videoRepository)
    {
        $this->middleware(['auth', 'admin'])->only('create', 'store');
        $this->repository = $videoRepository;
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();

        return view('videos.create', compact('categories'));
    }

    /**
     * @param StoreVideoRequest $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(StoreVideoRequest $request)
    {
        $link = $this->repository->normalizeVideoUrl($request->get('link'));
        $image = $this->repository->normalizeImageUrl($request->get('image'));
        $tags = $this->repository->normalizeTag($request->get('tags'));

        $data = [
            'name' => $request->get('name'),
            'link' => $link,
            'image' => $image,
            'desc' => $request->get('desc')
        ];

        $this->repository->createVideo($data, $tags);

        return redirect()->route('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->query('q');
        $categories = Category::select('id', 'name')->get();

        return view('videos.search', compact('query', 'categories'));
    }
}
