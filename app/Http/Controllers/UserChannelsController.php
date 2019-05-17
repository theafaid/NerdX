<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\StoreChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use Illuminate\Http\Request;

class UserChannelsController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['show']]);
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
    public function create($username)
    {
        return auth()->user()->username == $username ? view('user.channels.create') : abort(404);
    }


    /**
     * Store a newly created resource in storage.
     * @param StoreChannelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreChannelRequest $request)
    {
        $channel = $request->store();

        return response([
            'msg'         => 'Your channel created successfully',
            'redirectUrl' => route('user.channels.show', [auth()->user()->username, $channel->slug])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return view('channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        return view('user.channels.edit', ['channel' => $channel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Channel $channel, UpdateChannelRequest $request)
    {

        $this->authorize('update', $channel);

        $request->persist($channel);

        return response([
                'msg' => 'Your channel updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
