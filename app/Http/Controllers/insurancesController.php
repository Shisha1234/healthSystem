<?php

namespace App\Http\Controllers;

use App\insurance;
use Illuminate\Http\Request;
use DB;

class insurancesController extends Controller
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
        $insure = insurance::all();
        return view('insure.index')->with('insure', $insure);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comp = DB::table('insurecompanies')->get();
        return view('insure.create')->with('comp', $comp);
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
            'insure_id' => 'required',
            'group_id' => 'required',
            'id_no' => 'required',
            'iname' => 'required',
        ]);

        $icomp = insurance::select('compId')->from('insurecompanies')->where('CompName',$request->input('iname'))->value('compId');
        //$icomp = DB::select("SELECT compId FROM insurecompanies WHERE CompName = ".$request->input('iname')."");
        //DB::table('users')->where('username', $username)->value('groupName');

        $insure = new insurance;            // $insure->FullName->where('');
        $insure->iCard_id = $request->input('insure_id');
        $insure->gId = $request->input('group_id');
        $insure->pat_idNo = $request->input('id_no');
        $insure->iCompId = $icomp;
        $insure->empInsId = auth()->user()->id;
        $insure->save();

        return redirect('/insure')->with('Success', 'Info added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($insureId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($insureId)
    {
        $edit_insure = insurance::find($insureId);

        if (auth()->user()->id !== $edit_insure->empInsId) {
            return redirect('insure')->with('error', 'Editing not allowed');
        }
        return view('insure.edit')->with('edit_insure', $edit_insure);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $insureId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($insureId)
    {
        $del_insure = insurance::find($insureId);

        if (auth()->user()->id !== $del_insure->empInsId){
            return redirect('insure')->with('error', 'Not authorized');
        }
        $del_insure->delete();
        return redirect('insure')->with('success', 'Delete Successful');
    }
}
