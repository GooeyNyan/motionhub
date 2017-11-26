<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreVideoRequest;
use App\Repositories\VideoRepository;
use App\Video;
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
        $this->middleware(['auth', 'admin'])->only('create', 'store', 'edit', 'update');
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
        if ($request->get('avId')) {
            $a_id = $request->get('avId');
            preg_match_all("/(\d+)/", $a_id, $matches);
            $a_id = $matches[0][0];
            $page_id = isset($matches[0][1]) ? $matches[0][1] : "1";
            $link = $this->repository->normalizeBilibiliUrl($a_id, $page_id);
        } else if ($request->get('link')) {
            $link = $this->repository->normalizeVideoUrl($request->get('link'));
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

    public function edit($id)
    {
        $video = $this->repository->getVideoById($id);
        $categories = Category::select('id', 'name')->get();

        return view("videos.edit", compact('video', 'categories'));
    }

    /**
     * @param StoreVideoRequest $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function update(StoreVideoRequest $request, $id)
    {
        // handle video url
        if ($request->get('avId')) {
            $a_id = $request->get('avId');
            preg_match_all("/(\d+)/", $a_id, $matches);
            $a_id = $matches[0][0];
            $page_id = isset($matches[0][1]) ? $matches[0][1] : "1";
            $link = $this->repository->normalizeBilibiliUrl($a_id, $page_id);
        } else if ($request->get('link')) {
            $link = $this->repository->normalizeVideoUrl($request->get('link'));
        }
        $image = $this->repository->normalizeImageUrl($request->get('image'));
        $tags = $this->repository->normalizeTag($request->get('tags'));

        $video = $this->repository->getVideoById($id);

        $video->update([
            'name' => $request->get('name'),
            'link' => $link,
            'image' => $image,
            'desc' => $request->get('desc'),
            'category_id' => $request->get('category'),
            'download_link' => $request->get('download'),
            'netdisk_key' => $request->get('netdisk_key'),
        ]);
        $video->tags()->sync($tags);

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

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route("home");
    }
}
