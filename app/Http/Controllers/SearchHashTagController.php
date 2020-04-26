<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;


class SearchHashTagController extends Controller
{
    /**
     * @string 
     * @return String
     */
    public function show($search_word)
    {
        $twObj = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
        env('TWITTER_CLIENT_SECRET'),
        env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
        env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));

        $req = $twObj->OAuthRequest('https://api.twitter.com/1.1/search/tweets.json','GET',
        array(
            'lang' => 'ja',
            'q' => '%23' . $search_word // #{search_word}}で検索
        ));
        $tweets = json_decode($req);
        $tmpStr = '';
        if (isset($tweets) && empty($tweets->errors)) {
            $tweets = $tweets->statuses;
            $tmpStr .= '<dl>';
            foreach ($tweets as $val) {
                $tmpStr .= '<dt>' .
                    date('Y-m-d H:i:s', strtotime($val->created_at)) .
                    ' [' . $val->user->name . ']' .
                    '</dt>';
                $tmpStr .= '<dd>' . $val->text . '</dt>';
            }
        } else {
            return 'つぶやきはありません。';
        }

        return $tmpStr;
    }
}
