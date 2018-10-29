<?php

namespace App\Http\Controllers;

use App\Medication;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medController extends Controller
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
        $dawa = Medicine::all();
        $current_time = date('Y-m-d H:i:s');
        return view('dawa.index', compact([
            'dawa', 'current_time'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comp = DB::table('Medicines')->get();
        return view('dawa.create')->with('comp', $comp);
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
            'mfBy' => 'required',
            'mfdate' => 'required',
            'expdate' => 'required'
        ]);

        //saving data in table
        $kesho = strtotime("+1 days");
        $exp_time = date('Y-m-d G:i:s', $kesho);
        $register = new Medicine;
        $register->med_name = $request->input('name');
        $register->quantity = $request->input('quant');
        $register->price = $request->input('price');
        $register->manufacturedBy = $request->input('mfBy');
        $register->mfDate = $request->input('mfdate');
        $register->expiry_date = $request->input('expdate');
        $register->pharEmpId = auth()->user()->id;
        $register->del_avTime = $exp_time;
        $register->save();

        /*$Medication = new Medication;
        $Medication->quantity = $request->input('quant');
        $Medication->save();*/

        return redirect('/dawa/create')->with('Success', 'Patient Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($med_id)
    {
        $getdata = Medicine::find($med_id);
        return view('dawa.show')->with('getdata', $getdata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($med_id)
    {
        $edit_med = Medicine::find($med_id);
            //try != instead of !==
        /*if (auth()->user()->id !== $edit_med->pharEmpId) {
            return redirect('dawa')->with('error', 'Editing not allowed');
        }*/
        return view('dawa.edit')->with('edit_med', $edit_med);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $med_id)
    {
        $update_med = Medicine::find($med_id);
        $update_med->med_name = $request->input('name');
        $update_med->quantity = $request->input('quant');
        $update_med->price = $request->input('price');
        $update_med->manufacturedBy = $request->input('mfBy');
        $update_med->mfDate = $request->input('mfdate');
        $update_med->expiry_date = $request->input('expdate');
        $update_med->pharEmpId = auth()->user()->id;
        $update_med->save();

        return redirect('dawa')->with('success', 'Update Complete');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($med_id)
    {
        $del_med = Medicine::find($med_id);

        if (auth()->user()->id !== $del_med->pharEmpId){
            return redirect('dawa')->with('error', 'Not authorized');
        }
        $del_med->delete();
        return redirect('dawa')->with('success', 'Delete Successful');
    }
}
