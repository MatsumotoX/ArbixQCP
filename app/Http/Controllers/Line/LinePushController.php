<?php

namespace App\Http\Controllers\Line;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use App\Line\LinePush;
use Session;

class LinePushController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lines.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating data
        $this->validate($request, array(
            'message' => 'required',
        ));

        //store in the database
        $line = new LinePush;

        $line->message = $request->message;
        $line->type = "admin";

        $line->save();

        Session::flash('success', 'A message was successfully sent!');

        $this->pushMessage($request->message);

        return redirect()->route('lines.index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function pushMessage($message)
    {
        $channelSecret = getenv('LINEBOT_CHANNEL_SECRET') ?: '';
        $channelToken = getenv('LINEBOT_CHANNEL_TOKEN') ?: '';

        $bot = new LINEBot(new CurlHTTPClient($channelToken), [
            'channelSecret' => $channelSecret,
        ]);
        
        $this->bot = $bot;

        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
        $this->bot->pushMessage('C25cf6c120577cb6086ec575eb40cf6c6', $textMessageBuilder);

    }
}
