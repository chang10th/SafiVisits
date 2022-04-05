<?php

namespace App\Http\Controllers;

use App\Models\Medecine;
use App\Models\Practitioner;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function createVisit()
    {
        return view('visit.createVisit',['practitioners'=>Practitioner::all()]);
    }

    public function edit($id)
    {
        return view('visit.edit',[
            'visit'=>Visit::find($id)->visitDetails,
            'error'=>False,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Pour update la date de la visite
        if($request->attendedDate_date.' '.$request->attendedDate_time > Carbon::today())
        {
            $data = [
                'attendedDate'=>$request->attendedDate_date.' '.$request->attendedDate_time,
            ];
            Visit::put('visit/'.$id.'/update',$data);
            return redirect(route('visit.show',['visit'=>Visit::find($id),'id'=>$id]));
        }
        if($request->visitstate_id)
        {
            $data = [
                'visitstate_id'=>$request->visitstate_id,
            ];
            Visit::put('visit/'.$id.'/update',$data);
            return redirect(route('visit.index',['visits'=>Visit::all()]));
        }
        else{
            return view('visit.edit',[
                'visit'=>Visit::find($id)->visitDetails,
                'error'=>True,
            ]);
        }

        // Pour passer la visite en status 'annulée'

    }

    public function deleteForm($id)
    {
        return view('visit.deleteForm',[
            'visit'=>Visit::find($id)->visitDetails,
            'error'=>False,
        ]);
    }

    public function delete($id)
    {
        Visit::destroy('visit/'.$id.'/delete');
        return view('visit.index',['visits'=>Visit::all()]);
    }

    public function storeVisit(Request $request)
    {
        $data = [
            'practitioner_id'=>(int)$request->practitioner_id,
            'employee_id'=>Auth::user()->getAuthIdentifier(),
            'attendedDate'=>$request->attendedDate_date.' '.$request->attendedDate_time,
            'visitstate_id'=>1,
        ];
        Visit::post('visit/storeVisit',$data);
        return view('visit.index',['visits'=>Visit::all()]);
    }

    public function createVisitreport($id)
    {
        return view('visit.createVisitreport',[
            'visit'=>Visit::find($id)->visitDetails,
            'medecines'=>Medecine::all(),
        ]);
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
        return redirect(route('visit.show',['visit'=>Visit::find($id)]));
    }
}
