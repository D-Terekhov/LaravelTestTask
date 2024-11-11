<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function news() {
        if (cache::has('news')){ 
            return Cache::get('news');
        } else {
            $response = curl_init('https://newsapi.org/v2/everything?q=tesla&from=2024-10-30&sortBy=publishedAt&apiKey=8912160dba7b4533aea11cb4184091da');
            curl_setopt($response, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($response, CURLOPT_USERAGENT, "My user agent");
            $news = json_decode(curl_exec($response));
            Cache::put('news', $news ->articles, $seconds = 900);
            return $news ->articles;
    }
}
    
}