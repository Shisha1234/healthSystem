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
        //AND labresults.updated_at > '$date'  dont understand
        $date = date('Y-m-d');
        $getcount = DB::select("SELECT * FROM labresults JOIN treatments JOIN register_pats JOIN labtests 
                    ON labresults.labTreatId = treatments.treatmentId 
                    AND labresults.testPatId = register_pats.PatientId 
                    AND labresults.testId = labtests.testId 
                    WHERE labresults.tstatus = 1 
                    AND treatments.m_prescription IS NULL 
                    ORDER BY labresults.updated_at ASC");

        return view('diagnosis.index', compact([
            'diagnosis', 'getcount', 'next'
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

        $treatTestId = DB::table('treatments')
            ->where('treatmentId', '=', $treatmentId)
            ->value('Test_description');

        $edit_treat = treatment::find($treatmentId);

        $testdata = DB::select("SELECT * FROM labTests");

        //$lab = DB::select("SELECT Test_description FROM `treatments` WHERE `treatmentId` ='$treatmentId'");
        //$lab_array = implode(",", $lab);
        if ($treatTestId != NULL) {
            $lab = DB::select("SELECT Test_description FROM `treatments` WHERE `treatmentId` ='$treatmentId'");
            foreach ($lab as $labbb) {
                $labbl[] = $labbb->Test_description;
                $labb = implode(",", $labbl);
            }
            $labtestId = DB::select("SELECT * FROM `labtests` WHERE `testId` IN ($labb)");
            foreach ($labtestId as $vall) {
                $getlab[] = $vall->testName;
                //$sport = implode(",", $gettest);
            }
        }

        $date = date('Y-m-d');
        $getresult = DB::table('labresults')
            ->join('treatments', 'labresults.labTreatId', '=', 'treatments.treatmentId')
            ->where([
                ['treatments.treatmentId', '=', $treatmentId],
                ['labresults.tstatus', '=', 1],
            ])
            ->value('testresults');
        $medicines = DB::select('SELECT * FROM `medicines`');

        $getdata = DB::select("
        SELECT * FROM `treatments` JOIN register_pats JOIN prechecks 
        ON register_pats.PatientId = treatments.TreatPatId 
        AND treatments.treatCheckId = prechecks.checkId WHERE treatmentId = '$treatmentId'
        ");
        return view('diagnosis.edit', compact([
            'edit_treat', 'getdata', 'getresult', 'name', 'getName', 'testdata', 'getlab', 'treatTestId', 'medicines'
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
        $prescription = DB::table('treatments')
            ->where('treatmentId', '=', $treatmentId)
            ->value('m_prescription');

        $medNm = $request->input('med');
        if ($medNm != NULL){
        $quant = $request->input('quant');
        $impmedNm = '"'.implode('","', $medNm).'"';
        $medId = DB::select("SELECT * FROM `medicines` WHERE `med_name` IN($impmedNm)");
        foreach ($medId as $mId){
            $med[] = $mId->med_id;
            $dawa = implode(",",$med);
        } }
        $testName = $request->input('test');
        if ($testName != NULL){
        $spot_test = '"'.implode('","', $testName).'"';
        $sptest = explode(",", $spot_test);

        $testId = DB::select("SELECT * FROM `labtests` WHERE `testName` IN ($spot_test)");
            foreach ($testId as $val) {
                $gettest[] = $val->testId;
                $sport = implode(",", $gettest);
            }}
        //$spote = json_encode($gettest);
        $update_treat = treatment::find($treatmentId);
        $update_treat->D_description = $request->input('editor1');
        $update_treat->docNotes = $request->input('notes');
        if ($testName != NULL) {
            $update_treat->Test_description = $sport;
        }
        if ($medNm != NULL) {
            $update_treat->m_prescription = $dawa;
        }if ($medNm != NULL) {
        $update_treat->treatmedquant = $quant;
        $update_treat->dosage = $request->input('dose');
    }
        $update_treat->docId = auth()->user()->id;
        if ($prescription != NULL){
            $update_treat->status = "closed";
        }
        $update_treat->save();

        return redirect('diagnosis')->with('Success', 'Update successful');
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
