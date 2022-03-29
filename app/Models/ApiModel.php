<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ApiModel extends Model
{
    protected static function map($array,$attributes=null){
        $class=get_called_class();
        if(is_array($array)){
            $array = collect($array);
        }

        if(null==$attributes){
            $object = new $class();
            $attributes =$object->fillable ;
            unset($object);
        }

        if(get_class($array)==\stdClass::class){
            $array=collect([$array]);
        }

        return $array->map(function($item)use($class,$attributes){
            $object = new $class();
            foreach ($attributes as $key) {
                try {
                    $object->$key = $item->$key;
                }catch (\Exception $e){
                    echo $e->getMessage();
                }
            }
            return $object;
        });
    }

    private static function call($route,$method,$params)
    {
        $response =  json_decode(Http::withToken(Session::get('api_token'))
            ->$method(config('api.url').$route,$params)
            ->body()
        );
//        if(null==$response){
//            dd(Http::withToken(Session::get('api_token'))
//                ->$method(config('api.url').$route,$params)
//                ->body()
//            )
//            ;
//        }
        return $response;
    }

    public static function get($route,$params=[])
    {
        return self::call($route,'get',$params);
    }
    public static function post($route,$params=[])
    {
        return self::call($route,'post',$params);
    }

    public static function destroy($route,$params=[])
    {
        return self::call($route,'delete',$params);
    }

    public static function put($route,$params=[])
    {
        return self::call($route,'put',$params);
    }
}
