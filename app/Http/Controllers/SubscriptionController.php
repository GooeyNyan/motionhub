<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;

class SubscriptionController extends Controller
{

    /**
     * VideoController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->only('send', 'sendEmailToUsers');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subscription::firstOrCreate(['email' => $request->get('email')]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function send()
    {
        return view('subscribe.send');
    }

    public function sendEmailToUsers(Request $request)
    {
        $template = $request->get('template');
        $emails = Subscription::select('email')->get()->toArray();

        array_map(function ($item) use ($template) {
            $email = $item['email'];
            $data = ['email' => $email];
            $template = new SendCloudTemplate($template, $data);

            Mail::raw($template, function ($message) use ($email) {
                $message->from('motionhub@motionhub.com', 'motionhub');

                $message->to($email);
            });
        }, $emails);
    }
}
