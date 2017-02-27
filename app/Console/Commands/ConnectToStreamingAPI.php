<?php
/**
 * Created by PhpStorm.
 * User: maryanmendozanunez
 * Date: 27/02/17
 * Time: 4:13 PM
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\TwitterStream;

class ConnectToStreamingAPI extends Command
{
   protected $signature='connect_to_streaming_api';

   protected $description='Connect to the twitter streaming API';

   protected $twitterStream;


   public function __construct(TwitterStream $twitterStream)
   {
       $this->twitterStream=$twitterStream;
       parent::__construct();
   }

    public function handle()
    {
        $twitter_consumer_key = env('TWITTER_CONSUMER_KEY', '');
        $twitter_consumer_secret = env('TWITTER_CONSUMER_SECRET', '');

        $this->twitterStream->consumerKey=$twitter_consumer_key;
        $this->twitterStream->consumerSecret=$twitter_consumer_secret;
        $this->twitterStream->setTrack(array('Carsguide'));
        $this->twitterStream->consume();
    }
}