<?php

namespace App\Http\Controllers;

use App\Labresult;
use App\treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class labResultsController extends Controller
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

    public function summary(){
        $data = DB::table('labresults')
            ->join('labtests', 'labresults.testId', '=', 'labtests.testId')
            ->join('users', 'labresults.labtechId', '=', 'users.id')
            ->join('register_pats', 'labresults.testPatId', '=', 'register_pats.PatientId')
            ->paginate(4);

        return view('labResults.summary', compact([
            'data'
        ]));
    }

    public function index()
    {
        $labResults = DB::table('labresults')
            ->join('labtests', 'labtests.testId', '=', 'labresults.testId')
            ->join('register_pats', 'labresults.testPatId', '=', 'register_pats.PatientId')
            ->where('labresults.tstatus', '=', '2')
            ->get();
        return view('labResults.index')->with('labResults', $labResults);
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
        $this->validate($request, [
            'editor1'=>'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($resultId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($resultId)
    {
        $edit_result = Labresult::find($resultId);

        $patName = DB::table('register_pats')
            ->join('labresults', 'register_pats.PatientId', '=', 'labresults.testPatId')
            ->where('resultId', '=', $resultId)
            ->value('FullName');
        $testresults = DB::table('labresults')
            ->where('resultId', '=', $resultId)
            ->value('testresults');

        $labdata = DB::select("SELECT testId FROM `labresults` WHERE `resultId` = '$resultId'");
        foreach ($labdata as $lab){
            $data[] = $lab->testId;
            $strId = implode(",", $data);
        }
        $testdata = DB::select("SELECT * FROM `labtests` WHERE `testId` IN ($strId)");
        foreach ($testdata as $test){
            $testNm[] = $test->testName;
        }

        $testName = DB::table('labtests')
            ->join('labresults', 'labtests.testId', '=', 'labresults.testId')
            ->where('resultId', '=', $resultId)
            ->value('testName');

        return view('labResults.edit', compact([
            'edit_result', 'testName', 'patName', 'labdata', 'testNm', 'testresults', 'testdata'
        ]));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $resultId)
    {
        $update_result = Labresult::find($resultId);
        $update_result->testresults = $request->input('editor1');
        $update_result->tstatus = "1";
        $update_result->labtechId = auth()->user()->id;
        $update_result->save();

        //DB::update("UPDATE `labresults` SET `labtechId`= '$user', `testresults`= '$text',
        //`tstatus`= 1,`updated_at`=now() WHERE testPatId ='$resultId'");

        return redirect('labResults')->with('success', 'Update Complete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($resultId)
    {
        //
    }
}
