<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practitioner extends ApiModel
{
    /*
    public function __construct($id, $lastname, $firstname, $address, $tel, $notorietyCoeff, $complementarySpeciality, $sectordistric_id)
    {
        $this->id=$id;
        $this->lastname=$lastname;
        $this->firstname=$firstname;
        $this->address=$address;
        $this->tel=$tel;
        $this->notorietyCoeff=$notorietyCoeff;
        $this->complementarySpeciality=$complementarySpeciality;
        $this->sectordistric_id=$sectordistric_id;
    }
    */

    public static function all($columns=array())
    {
        $response = self::get('visit');

        $practitioners = collect(json_decode($response->body()));

        return $practitioners;
    }

    public static function find($id)
    {
        //
    }
}
