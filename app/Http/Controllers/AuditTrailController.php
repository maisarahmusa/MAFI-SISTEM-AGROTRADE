<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuditTrailRequest;
use App\Http\Requests\UpdateAuditTrailRequest;
use App\Models\AuditTrail;
use Illuminate\Http\Request;
use App\Mail\SimpanAuditTrail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



class AuditTrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audittrail = AuditTrail::all();

        return view ('audittrail.index',[
            'audittrail'=>$audittrail
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('audittrail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuditTrailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuditTrailRequest $request)
    {
        $audittrail = new AuditTrail();

        $audittrail->activity = $request->activity;
        // $audittrail->date = $request->date;
        $audittrail->user = $request->user;

        if($request->hasFile('print_audit')){
            $print_audit = $request->file('print_audit')->store('print_audit');
            $audittrail -> print_audit = $print_audit;
        }

        // $print_audit = $request->file('print_audit')->store('print_audit');
        // $audittrail->print_audit = $print_audit ;


        // dd($audittrail);
        $audittrail->save();

        // $email = Auth::user()->email;
        Mail::to('maisarahmusa1998@gmail.com')->send(new SimpanAuditTrail());

        return redirect('/audittrail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function show(AuditTrail $auditTrail, $id)
    {
        $audittrail = AuditTrail::find($id);
        return view('audittrail.show', [
            'audittrail' => $audittrail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditTrail $auditTrail, $id)
    {
        $audittrail = AuditTrail::find($id);
        return view('audittrail.edit', [
            'audittrail' => $audittrail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuditTrailRequest  $request
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuditTrailRequest $request, AuditTrail $auditTrail, $id)
    {
        $audittrail = AuditTrail::find($id);

        // if($request->hasFile('print_audit')){
        //     $audittrail = $request->file('print_audit')->store('print_audit');
        //     $audittrail -> print_audit = $audittrail;
        // }

        $audittrail->activity = $request->activity;
        // $audittrail->date = $request->date;
        $audittrail->user = $request->user;
        // $audittrail->print_audit = $request->print_audit;
        // dd($audittrail);
        $audittrail->save();

        return redirect('/audittrail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditTrail $audittrail)
    {
            // nama kena sama dgn route
            $audittrail->delete();

        return redirect('/audittrail');
    }
}
