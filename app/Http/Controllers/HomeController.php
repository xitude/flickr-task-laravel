<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = 'https://api.flickr.com';

        $client = new Client([
            'base_uri' => $url,
            'timeout'  => 5.0,
        ]);

        $response = $client->get($url.'/services/feeds/photos_public.gne?format=json');

        $array = json_decode($response->getBody()->getContents(), true); // :'(

        dd($array);

        return view('home');
    }
}
