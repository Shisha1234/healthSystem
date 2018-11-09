<?php

namespace App\Http\Controllers;

use App\insurance;
use App\registerPat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class regPatientsController extends Controller
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
    public function index()
    {
        $regPat = registerPat::all();
        return view('regPat.index')->with('regPat', $regPat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comp = DB::table('insurecompanies')->get();
        return view('regPat.create')->with('comp', $comp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'idNo' => 'required|unique:register_pats',
            'Tel' => 'required|unique:register_pats|min:9|max:10',
            'place' => 'required',
            'gender' => 'required',
            'status' => 'required'
            ]);

        //saving data in table
        $register = new registerPat;
        $register->FullName = $request->input('name');
        $register->idNo = $request->input('idNo');
        $register->Tel = $request->input('Tel');
        $register->place = $request->input('place');
        $register->gender = $request->input('gender');
        $register->mStatus = $request->input('status');
        $register->yob = $request->input('year');
        $register->empId = auth()->user()->id;
        $register->save();

        return redirect('/regPat/create')->with('Success', 'Patient Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($PatientId)
    {
        $getdata = registerPat::find($PatientId);
        return view('regPat.show')->with('data', $getdata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($PatientId)
    {
        $edit_user = registerPat::find($PatientId);

        if (auth()->user()->id !== $edit_user->empId) {
            return redirect('regPat')->with('error', 'Editing not allowed');
        }
        return view('regPat.edit')->with('edit_user', $edit_user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change($PatientId)
    {
        $changepat = registerPat::find($PatientId);
        $changepat->treat_status = 1;
        $changepat->save();

        $one = DB::table('register_pats')->join('prechecks', 'register_pats.PatientId', '=', 'prechecks.chkPatId')
            ->where([['prechecks.chkstatus', '=', 1], ['register_pats.PatientId', '=', $PatientId]])->value('prechecks.chkstatus');
        if ($one != 1) {
            DB::insert("
        INSERT INTO prechecks(`chkPatId`, `created_at`, `updated_at`) VALUES('$PatientId', now(), now())
        ");

            DB::insert("
        INSERT INTO treatments(`TreatPatId`, `created_at`, `updated_at`) VALUES('$PatientId', now(), now());
        ");
        }

        return redirect('regPat')->with('success', 'Update Complete');
    }

    public function update(Request $request, $PatientId)
    {
        $update_user = registerPat::find($PatientId);
        $update_user->FullName = $request->input('name');
        $update_user->idNo = $request->input('num');
        $update_user->Tel = $request->input('tele');
        $update_user->yob = $request->input('yobb');
        $update_user->place = $request->input('place');
        $update_user->gender = $request->input('gender');
        $update_user->mStatus = $request->input('status');
        $update_user->empId = auth()->user()->id;
        $update_user->save();

        return redirect('regPat')->with('success', 'Update Complete');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($PatientId)
    {
        $del_user = registerPat::find($PatientId);

        if (auth()->user()->id !== $del_user->empId){
            return redirect('regPat')->with('error', 'Not authorized');
        }
        $del_user->delete();
        return redirect('regPat')->with('success', 'Delete Successful');
    }
}
