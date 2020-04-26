<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class UserTimeLineController extends Controller
{
    /**
     *
     * @return String
     */
    public function show()
    {
        $twObj = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
        env('TWITTER_CLIENT_SECRET'),
        env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
        env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));

        $req = $twObj->OAuthRequest("https://api.twitter.com/1.1/statuses/user_timeline.json","GET",array("count"=>"10"));
        $tw_arr = json_decode($req);
        
        $tmpStr = '';
        if (isset($tw_arr)) {
            foreach ($tw_arr as $key => $val) {
                $tmpStr .=  $tw_arr[$key]->text . "<br/>";
            }
        } else {
            return 'つぶやきはありません。';
        }

        return $tmpStr;
    }
}