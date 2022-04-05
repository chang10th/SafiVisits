<?php

namespace App\Http\Controllers;

use App\Models\Practitioner;
use Illuminate\Http\Request;

class PractitionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('practitioner.index',['practitioners'=>Practitioner::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function show(Practitioner $practitioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Practitioner $practitioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practitioner $practitioner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practitioner $practitioner)
    {
        //
    }
}
