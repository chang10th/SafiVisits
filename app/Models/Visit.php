<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Visit extends ApiModel
{
    use HasFactory;

    public static function all($columns=array())
    {
        $response = Http::withToken(Session::get('api_token'))->get(config('api.url').'visit');
        return json_decode($response->body());
    }

    public static function getCurrentVisits($columns=array())
    {
        $response = Http::withToken(Session::get('api_token'))->get(config('api.url').'dashboard');
        return json_decode($response->body());
    }
}
