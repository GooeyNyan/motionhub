<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShareRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Repositories\ShareRepository;
use App\Repositories\VideoRepository;
use App\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    /**
     * @var VideoRepository
     */
    protected $repository;


    public function __construct(ShareRepository $shareRepository)
    {
        $this->middleware('auth')->only('store');
        $this->repository = $shareRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home');
        }

        $shares = Share::select(['id', 'name', 'link', 'desc', 'user_name'])->get();

        return view('share.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('share.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreShareRequest $request
     * @return \Illuminate\Http\Response
     * @internal param $
     */
    public function store(StoreShareRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'link' => $request->get('link'),
            'desc' => $request->get('desc'),
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name
        ];

        $this->repository->videoShare($data);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Share::where('id', $id)->first()->delete();
        return redirect()->route('share.index');
    }
}
