<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends ApiModel
{
    use HasFactory;

    public function __construct($id, $practitioner_id, $employee_id, $attendedDate, $visitstate_id, $practitioner)
    {
        $this->id=$id;
        $this->practitioner_id=$practitioner_id;
        $this->employee_id=$employee_id;
        $this->attendedDate=$attendedDate;
        $this->visitstate_id=$visitstate_id;
        $this->practitioner=$practitioner;
    }

    public static function all($columns=array())
    {
        return self::get('visit');
    }

    public static function find($id)
    {
        return self::get('visit/'.$id);
    }

}
