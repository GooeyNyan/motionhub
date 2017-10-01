<?php

namespace App\Http\Controllers;

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

        $shares = Share::select(['name', 'link', 'desc', 'user_name'])->get();

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
     * @param StoreVideoRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
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
}
