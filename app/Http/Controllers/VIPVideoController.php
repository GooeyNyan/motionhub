<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Repositories\VIPVideoRepository;
use App\vipVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VIPVideoController extends Controller
{

    protected $repository;

    public function __construct(VIPVideoRepository $Repository)
    {
        $this->middleware('auth')->only('store', 'update', 'edit', 'destroy');
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
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home');
        }

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
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home');
        }

        $duration = $this->repository->normalizeDuration($request->get('duration'));
        $image = $this->repository->normalizeImageUrl($request->get('image'));
        $link = $this->repository->normalizeVideoUrl($request->get('link'));
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
            'download' => $request->get('download'),
            'user_id' => Auth::user()->id
        ];

        $this->repository->createVideo($data, $tags);

        return redirect()->route('vip.index');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($id)
    {
        $video = vipVideo::where('id', $id)->first();

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

        $video = vipVideo::where('id', $video_id)->first();
        $key = $this->repository->keyGenerator($video_id);
        $input = $request->get('key');

        if ($key === $input) {
            $video->users()->attach(Auth::user());
            return back();
        } else {
            return back();
        }
    }
}
