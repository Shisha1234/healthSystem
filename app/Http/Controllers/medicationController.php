<?php

namespace App\Http\Controllers;

use App\Medication;
use App\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medicationController extends Controller
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
        $date = date('Y-m-d');
        $drugs = DB::table('medications')
            ->join('treatments', 'medications.med_treatId', '=', 'treatments.treatmentId')
            ->join('register_pats', 'register_pats.PatientId', '=', 'medications.drugPatId')
            ->where([
                ['medications.med_drugId', '=', NULL],
                ['medications.presd_quant', '=', NULL],
            ])
            ->get();
        return view('drugs.index')->with('drugs', $drugs);
    }

    public function details()
    {
        $pay = DB::table('payments')
            ->join('medicines', 'payments.paydrugId', '=', 'medicines.med_id')
            ->join('register_pats', 'payments.payPatId', '=', 'register_pats.PatientId')
            ->where('payStatus', '=', 0)
            ->get();
        return view('drugs.payments.details', compact([
            'pay'
        ]));
    }

    public function payscript(){
        return view('drugs.payments.payscript');
    }

     public function payment($paymentId)
     {
         $payId = payment::find($paymentId);
         $payment = DB::select("SELECT * FROM `payments` JOIN medicines JOIN register_pats JOIN medications ON payments.paydrugId = medicines.med_id AND payments.F_tions_drugId = medications.drugId AND payments.payPatId = register_pats.PatientId WHERE payments.paymentId = '$paymentId'");

         return view('drugs.payments.payment')
             ->with('payId', $payId)
             ->with('payment', $payment);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comp = DB::table('medications')->get();
        return view('drugs.create')->with('comp', $comp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $drugId)
    {
        $this->validate($request, [
            'prescription' => 'required'
        ]);
        //getting patient Id
        //$patId = $request->session()->get($drugId);
        //$drugName= $request->input('drug_name');
        //$drug_id = DB::table('Medicines')->where('med_name', '=', $drugName)->value('med_id')->get() ;

        //saving data in table
        $add_drug = new Medication();
        $add_drug->presd_quant = $request->input('prescription');
        //$add_drug->drugPatId = $patId;
        //$add_drug->med_drugId = ;
        $add_drug->drugEmpId = auth()->user()->id;
        $add_drug->save();

        return redirect('/drugs/create')->with('Success', 'Patient Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($drugId)
    {
        $getdata = Medication::find($drugId);
        return view('drugs.show')->with('data', $getdata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($drugId)
    {
        $edit_drug = Medication::find($drugId);
        $drug = DB::table('medications')
            ->join('treatments', 'medications.med_treatId', '=', 'treatments.treatmentId')
            ->where('medications.drugId', '=', $drugId)
            ->value('treatments.m_prescription');
        $dquant = DB::table('medications')
            ->join('treatments', 'medications.med_treatId', '=', 'treatments.treatmentId')
            ->where('medications.drugId', '=', $drugId)
            ->value('treatments.treatmedquant');
        $med_drugId = DB::table('medications')
            ->where('drugId', '=', $drugId)
            ->value('med_drugId');

        $drquant = explode(",",$dquant );
        $user = auth()->user()->id;
        $med = DB::select("SELECT * FROM `medicines` WHERE med_id IN ($drug)");
        foreach ($med as $medo){
            $cine[] = $medo->med_name;
            $cineId[] = $medo->med_id;
        }
        $combine = array_combine($drquant, $cine);
        if ($med_drugId === NULL) {
        $combine2 = array_combine($drquant, $cineId);
        //$comIdquan = array_combine();
        //$q = DB::select("SELECT `quantity` FROM `medicines` WHERE `med_name` = '$val'");
            foreach ($combine2 as $key => $val) {
                DB::insert("INSERT INTO `medrecords`(`medNmId`, `dempId`, `quant`, `date`, `recMedId`) VALUES ('$val', '$user', '$key', now(), '$drugId')");
                $q = DB::table('medicines')->where('med_id', '=', $val)
                    ->value('quantity');
                $calquan = $q - $key;
                DB::update("UPDATE `medicines` SET `quantity`='$calquan' WHERE `med_id` ='$val'");
            }
            $mdrugId = implode(",", $cineId);
            $pquant = implode(",", $drquant);
            DB::update("UPDATE `medications` SET `med_drugId`='$mdrugId',`presd_quant`= '$pquant',`updated_at`= now() WHERE drugId = '$drugId'");
        }
        $quan = DB::table('medications')
            ->join('treatments', 'medications.med_treatId', '=', 'treatments.treatmentId')
            ->where('medications.drugId', '=', $drugId)
            ->value('medications.presd_quant');

        $medicines = DB::select('SELECT * FROM `medicines`');
        //$drug = DB::select("SELECT * FROM `medications` JOIN treatments JOIN register_pats ON medications.drugPatId =treatments.TreatPatId AND register_pats.PatientId = treatments.TreatPatId WHERE medications.drugId = '$drugId '");

        return view('drugs.edit', compact([
            'edit_drug', 'drug', 'medicines', 'quan', 'combine'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processpay(Request $request, $paymentId)
    {
        if (isset($_POST['mpesa'])){
            $amount = $request->input('amt');
            $number = $request->input('num');

            $pesapay = payment::find($paymentId);
            $pesapay->payStatus = 1;
            $pesapay->save();
            return view('drugs.payments.payscript', compact([
                'amount', 'number'
            ]));

        }else{
            $updatepay = payment::find($paymentId);
            //$updatepay->totalAmt = $request->input('amt');
            $updatepay->payMode = 1;
            $updatepay->payStatus =1;
            $updatepay->save();
            return redirect('drugs/payments/details');
        }
    }

    public function update(Request $request, $drugId)
    {
        $update_drug = Medication::find($drugId);
        $update_drug->drugEmpId = auth()->user()->id;
        $update_drug->save();

        return redirect('drugs')->with('success', 'Update Complete');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($drugId)
    {
        $del_drug = Medication::find($drugId);

        if (auth()->user()->id !== $del_drug->drugEmpId){
            return redirect('drugs')->with('error', 'Not authorized');
        }
        $del_drug->delete();
        return redirect('drugs')->with('success', 'Delete Successful');
    }
}
