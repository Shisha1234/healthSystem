<?php

namespace App\Http\Controllers;

use App\Precheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class precheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public  function summary()
    {
        $check = DB::table('prechecks')
            ->join('register_pats', 'prechecks.chkPatId', '=', 'register_pats.PatientId')
            ->where('prechecks.checkId', '!=', NULL)
            ->limit('50')
            ->get();

        return view('check.summary')->with('check', $check);
    }

    public function index()
    {
        $sql = Precheck::all();

        $check = DB::table('prechecks')
            ->join('register_pats', 'prechecks.chkPatId', '=', 'register_pats.PatientId')
            ->where('chkstatus', '=', '1')
            ->get();

        return view('check.index', compact([
            'check', 'sql'
        ]));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($checkId)
    {
        $getdata = DB::table('prechecks')
            ->join('register_pats', 'prechecks.chkPatId', '=', 'register_pats.PatientId')
            ->where('prechecks.checkId', '!=', NULL)
            ->limit('50')
            ->get();
        return view('check.show', compact([
            'getdata'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($checkId)
    {
        $edit_check = Precheck::find($checkId);

        $chkpat = DB::table('prechecks')
            ->join('register_pats', 'prechecks.chkPatId', '=', 'register_pats.PatientId')
            ->where('prechecks.checkId', '=', $checkId)
            ->value('FullName');

        return view('check.edit', compact([
            'edit_check', 'chkpat'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $checkId)
    {
        $update_user = Precheck::find($checkId);
        $update_user->height = $request->input('height');
        $update_user->weight = $request->input('weight');
        $update_user->temperature = $request->input('temp');
        $update_user->pulseRate = $request->input('pulse');
        $update_user->bPressure = $request->input('bp');
        $update_user->chkempId = auth()->user()->id;
        $update_user->chkstatus = 0;
        $update_user->save();

        return redirect('check')->with('success', 'Update Complete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($checkId)
    {
        $del_chk = Precheck::find($checkId);

        if (auth()->user()->id !== $del_chk->chkempId){
            return redirect('check')->with('error', 'Not authorized');
        }
        $del_chk->delete();
        return redirect('check')->with('success', 'Delete Successful');
    }
}
