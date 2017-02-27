<?php
/**
 * Created by PhpStorm.
 * User: maryanmendozanunez
 * Date: 27/02/17
 * Time: 3:47 PM
 */

namespace App;
use OauthPhirehose;
use App\Jobs\ProcessTweet;
use Illuminate\Foundation\Bus\DispatchesJobs;

class TwitterStream extends OauthPhirehose
{
    use DispatchesJobs;

    public function enqueueStatus($status)
    {
        $this->dispatch(new ProcessTweet($status));
    }
}