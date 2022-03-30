<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        return view('visit.index',['visits'=>Visit::all()]);
    }

    public function show($id)
    {
        return view('visit.show',['visit'=>Visit::find($id)]);
    }

    public function createVisitreport($id)
    {
        return view('visit.createVisitreport',['visit'=>Visit::find($id)->visitDetails]);
    }

    public function storeVisitreport($id, Request $request)
    {
        $data = [
            'visit_id'=>$request->visit_id,
            'creationDate'=>$request->creationDate,
            'comment'=>$request->comment,
            'starScore'=>$request->starScore,
            'visitreportstate_id'=>$request->visitreportstate_id,
        ];
        Visit::post('visit/'.$id.'/storeVisitreport',$data);
        return view('visit.show',['visit'=>Visit::find($id)]);
    }
}
