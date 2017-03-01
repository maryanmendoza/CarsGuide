<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Twitter;
class FeedController extends Controller
{
    //
    public function twitterUserTimeLine()
    {

        $data = Twitter::getUserTimeline(['count' => 15, 'format' => 'array']);

       // $data =  Twitter::getUserTimeline(['screen_name' => 'CarsGuide', 'count' => 20, 'format' => 'json']);
        return view('tweets',compact('data'));

    }

}
