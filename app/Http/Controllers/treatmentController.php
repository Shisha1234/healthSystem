<?php

namespace App\Http\Controllers;

use App\Medication;
use App\Medicine;
use App\Precheck;
use Illuminate\Support\Facades\DB;
use App\registerPat;
use App\treatment;
use Illuminate\Http\Request;

class treatmentController extends Controller
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
    public function cleared()
    {
        $closed = "closed";
        $clrdPats = DB::select("SELECT * FROM `treatments` JOIN register_pats ON treatments.TreatPatId = register_pats.PatientId WHERE treatments.status = '$closed'");
        return view('diagnosis/cleared', compact([
            'clrdPats'
        ]));
    }
    public function index()
    {
        $diagnosis = DB::table('treatments')
            ->join('register_pats', 'register_pats.PatientId', '=', 'treatments.TreatPatId')
            ->where([
                ['treatments.status', '=', 'open'],
                ['treatments.m_prescription', '=', NULL],
            ])
            ->orderBy('treatments.updated_at', 'DESC')
            ->get();
        $date = date('Y-m-d');
        $getcount = DB::select("SELECT * FROM labresults JOIN treatments JOIN register_pats JOIN labtests 
                    ON labresults.testPatId = treatments.TreatPatId 
                    AND labresults.testPatId = register_pats.PatientId 
                    AND labresults.testId = labtests.testId WHERE labresults.tstatus = 1 
                    AND treatments.m_prescription IS NULL 
                    AND labresults.updated_at > '$date' ORDER BY labresults.updated_at ASC");
        return view('diagnosis.index', compact([
            'diagnosis', 'getcount'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'editor1'=>'required',
        ]);
        $treatPat = new treatment;
        $treatPat->D_description = $request->input('editor1');
        $treatPat->Test_description = $request->input('test');
        $treatPat->m_prescription = $request->input('medicines');
        $treatPat->docId = auth()->user()->id;
        $treatPat->save();

        return redirect('/regPat/create')->with('Success', 'Patient Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($treatmentId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($treatmentId)
    {
        $name = DB::table('register_pats')
            ->join('treatments', 'treatments.TreatPatId', '=', 'register_pats.PatientId')
            ->where('treatments.treatmentId', '=', $treatmentId)
            ->value('FullName');

        $edit_treat = treatment::find($treatmentId);

        $testdata = DB::select("SELECT * FROM labTests");
        $date = date('Y-m-d');
        $getresult = DB::table('labresults')
            ->join('treatments', 'labresults.testPatId', '=', 'treatments.TreatPatId')
            ->where([
                ['treatments.treatmentId', '=', $treatmentId],
                ['labresults.tstatus', '=', 1],
                ['treatments.updated_at', '>', $date],
            ])
            ->value('testresults');

        $getName = DB::table('labtests')
            ->join('treatments', 'labtests.testId', '=', 'treatments.Test_description')
            ->where([
                ['treatments.treatmentId', '=', $treatmentId],
            ])
            ->whereDate('labtests.updated_at', '<',$date )
            ->value('testName');

        $getdata = DB::select("
        SELECT * FROM `treatments` JOIN register_pats JOIN labtests JOIN prechecks 
        ON register_pats.PatientId = treatments.TreatPatId AND labtests.testId = treatments.Test_description 
        AND register_pats.PatientId = prechecks.chkPatId WHERE treatmentId = '$treatmentId' AND 
        prechecks.updated_at > '$date'
        ");
        return view('diagnosis.edit', compact([
            'edit_treat', 'getdata', 'getresult', 'name', 'getName', 'testdata'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $treatmentId)
    {
        $testId = DB::table('labtests')
            ->where('testName', '=', $request->input('test'))
            ->value('testId');
        $prescription = DB::table('treatments')
            ->where('treatmentId', '=', $treatmentId)
            ->value('m_prescription');
        $update_treat = treatment::find($treatmentId);
        $update_treat->D_description = $request->input('editor1');
        $update_treat->Test_description = $testId;
        $update_treat->m_prescription = $request->input('medicines');
        $update_treat->docId = auth()->user()->id;
        if ($prescription != NULL){
            $update_treat->status = "closed";
        }
        $update_treat->save();

        return redirect('diagnosis')->with('success', 'Update Complete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($treatmentId)
    {
        $del_treat = treatment::find($treatmentId);

        if (auth()->user()->id !== $del_treat->docId){
            return redirect('diagnosis')->with('error', 'Not authorized');
        }
        $del_treat->delete();
        return redirect('diagnnosis')->with('success', 'Delete Successful');
    }
}
