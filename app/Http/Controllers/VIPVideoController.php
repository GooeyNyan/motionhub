<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Repositories\VIPVideoRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VIPVideoController extends Controller
{

    protected $repository;

    public function __construct(VIPVideoRepository $Repository)
    {
        $this->middleware('admin')->only('create', 'store', 'update', 'edit', 'destroy');
        $this->repository = $Repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vip.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVideoRequest|Request $request
     * @return \Illuminate\Http\Response
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

        $duration = $this->repository->normalizeDuration($request->get('duration'));
        $image = $this->repository->normalizeImageUrl($request->get('image'));
        $tags = $this->repository->normalizeTag($request->get('tags'));

        $data = [
            'name' => $request->get('name'),
            'rank' => $request->get('rank'),
            'duration' => $duration,
            'price' => $request->get('price'),
            'desc' => $request->get('desc'),
            'image' => $image,
            'link' => $link,
            'tb_link' => $request->get('tb_link'),
            'download_link' => $request->get('download'),
            'netdisk_key' => $request->get('netdisk_key'),
            'user_id' => Auth::user()->id
        ];

        $this->repository->createVideo($data, $tags);

        return redirect()->route('vip.index');
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($id)
    {
        $video = $this->repository->getVideoById($id);

        return view('vip.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = $this->repository->getVideoById($id);
        $video->duration = floor($video->duration / 60) . ":" . $video->duration % 60;

        return view('vip.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreVideoRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
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

        $video = $this->repository->getVideoById($id);

        $duration = $this->repository->normalizeDuration($request->get('duration'));
        $image = $this->repository->normalizeImageUrl($request->get('image'));
        $tags = $this->repository->normalizeTag($request->get('tags'));

        $video->update([
            'name' => $request->get('name'),
            'rank' => $request->get('rank'),
            'duration' => $duration,
            'price' => $request->get('price'),
            'desc' => $request->get('desc'),
            'image' => $image,
            'link' => $link,
            'tb_link' => $request->get('tb_link'),
            'download_link' => $request->get('download'),
            'netdisk_key' => $request->get('netdisk_key'),
            'user_id' => Auth::user()->id
        ]);
        $video->tags()->sync($tags);

        return redirect()->route('vip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->query('q');

        return view('vip.search', compact('query'));
    }

    public function keyValidate(Request $request)
    {
        $video_id = $request->get('video_id');

        $video = $this->repository->getVideoById($video_id);
        $key = $this->repository->keyGenerator($video_id);
        $input = $request->get('key');

        if ($key === $input) {
            $video->users()->attach(Auth::user());
            return back();
        } else {
            return back();
        }
    }

    public function keyGenerate($id)
    {
        return view('vip.key.create', compact('id'));
    }

    public function key($id, Request $request)
    {
        $user_id = $request->get('name');
        $name = User::where('id', $user_id)->first()->name;

        $key = $this->repository->keyGenerator($id, $name);

        return view('vip.key.show', compact('key'));
    }
}
