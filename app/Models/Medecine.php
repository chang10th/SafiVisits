<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medecine extends ApiModel
{
    use HasFactory;

    public static function all($columns=array())
    {
        return self::get('medecine');
    }

    public static function find($id)
    {
        return self::get('visit/'.$id);
    }
}
