<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreVideoRequest;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;

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
        // handle video url
        if ($request->get('link')) {
            $link = $this->repository->normalizeVideoUrl($request->get('link'));
        } else if ($request->get('avId')){
            $a_id = $request->get('avId');
            preg_match('/\d+/', $a_id, $a_id);
            $a_id = $a_id[0];
            $c_id = $this->repository->getBilibiliCid($a_id);
            $link = $this->repository->normalizeBilibiliUrl($a_id, $c_id);
        }
        $image = $this->repository->normalizeImageUrl($request->get('image'));
        $tags = $this->repository->normalizeTag($request->get('tags'));

        $data = [
            'name' => $request->get('name'),
            'link' => $link,
            'image' => $image,
            'desc' => $request->get('desc'),
            'category_id' => $request->get('category'),
            'download_link' => $request->get('download'),
            'netdisk_key' => $request->get('netdisk_key'),
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
