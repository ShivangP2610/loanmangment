<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Remainingpartner;
use Illuminate\Support\Facades\Validator;

class RemainingPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $id = session()->get('application_id');

        $id1 = session()->get('application_id');
        if ($id1){
            $id = session()->get('application_id');

        }else{
            $id = session('mainloan_id');
        }
        $url = url('/rpartners/add');
        $title = 'DETAILS OF REMAINING PARTNERS / DIRECTORS';
        $btext = "Submit";
        $Remainingdata = Remainingpartner::where('loan_id', $id)->get();
        $data = compact('url', 'title', 'btext' ,'Remainingdata');
        //  dd($Remainingdata);
        return view('remaining_partners')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //        echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit();
        $request->validate([
            // 'ckyc_no'             => 'required',
            'full_name_first.*' => 'nullable',
            'dob_day.*'         => 'nullable',
            'pan_no_1.*'         => 'nullable',
            'ADDRESS.*'       => 'nullable',
            'MOBILE.*'         => 'nullable|min:10|max:10',
            'WorkExperience'    =>   'nullable',
            'Shareholding'    => 'nullable',
        ]);

        $lastcustomerId = Customer::latest()->first()->cust_id;
        $loanId = Customer::where('cust_id', $lastcustomerId)->value('loan_id');

        // $id = session()->get('application_id');
        // $id = session('mainloan_id');

        $id1 = session()->get('application_id');
        if ($id1){
            $id = session()->get('application_id');

        }else{
            $id = session('mainloan_id');
        }

        $customer = Customer::where('loan_id', $id)->first();
        $Remainingpartners = Remainingpartner::where('loan_id', $id)->get();



        $requestData = $request->all();

        // Flag to track if any partners were saved
        $partnersSaved = false;
        if ($Remainingpartners->isNotEmpty()) {


            foreach ($Remainingpartners as $key => $Remainingpartne) {
                // dd($Remainingpartne);
                $co_partner_id =  $Remainingpartne->co_partner_id;
                //  dd($ref_id);
                // $ref_id->delete();
                Remainingpartner::where('co_partner_id', $co_partner_id)->delete();
            }


        }
        // Loop through the input arrays and insert non-blank values
        for ($i = 0; $i < count($requestData['full_name_first']); $i++) {
            if (!empty($requestData['full_name_first'][$i])) {
                $rpartner = new Remainingpartner;
                $rpartner->loan_id                         = $id;
                $rpartner->cust_id                         = $customer->cust_id;
                $rpartner->partners_name                   = $requestData['full_name_first'][$i];
                $rpartner->Date_of_Birth                   = date('Y-m-d', strtotime(str_replace('-', '/', $requestData['dob_day'][$i])));
                $rpartner->partners_pannumber              = $requestData['pan_no_1'][$i];
                $rpartner->partners_Residence_Address      = $requestData['ADDRESS'][$i];
                $rpartner->partners_Mobile_no              = $requestData['MOBILE'][$i];
                $rpartner->partners_workexp                = $requestData['WorkExperience'][$i];
                $rpartner->shareholding_with_cust_entity   = $requestData['Shareholding'][$i];
                $rpartner->save();

                // Set the flag to true if any partner is saved
                $partnersSaved = true;
            }
        }

        // Check if any partners were saved
        if ($partnersSaved) {
            // Redirect back with a success message
            return redirect('bankdetails/add')->with('success', 'Partners created successfully.');
        } else {
            // Redirect back with an error message if no partners were saved
            return redirect()->back()->with('error', 'No partners data provided.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
