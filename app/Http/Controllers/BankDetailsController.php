<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\BankDetails;

class BankDetailsController extends Controller
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
        $id = session()->get('application_id');
        $url = url('/bankdetails/add');
        $title = 'DETAILS OF THE ACCOUNT FOR DISBURSEMENT ';
        $btext = "Submit";
        $bankdata = BankDetails::where('loan_id', $id)->first();
        // dd($bankdata);
        $data = compact('url', 'title', 'btext' ,'bankdata');
        return view('bankdetails')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit();

        $request->validate([

            'name_of_bank'    => 'required',
            'branch_address'  => 'required',
            'accountname'     => 'required',
            'accountnumber'   => 'required|numeric',
            'typeofacount'    => 'required',
            'accountyear'     => 'required',
            'ifsc_code'       => 'required',
            'micr_code'      => 'required'

        ]);

        // $lastcustomerId = Customer::latest()->first()->cust_id;
        // $loanId = Customer::where('cust_id', $lastcustomerId)->value('loan_id');

        // $id = session()->get('application_id');
        $id = session('mainloan_id');
        $customer = Customer::where('loan_id', $id)->first();
        $bankdata = BankDetails::where('loan_id', $id)->first();
        if($bankdata) {

            $bankdata->bank_name            = $request['name_of_bank'];
            $bankdata->branch_address       = $request['branch_address'];
            $bankdata->account_holder_name  = $request['accountname'];
            $bankdata->account_number       = $request['accountnumber'];
            $bankdata->Type_of_Account      = $request['typeofacount'];
            $bankdata->account_oprete_since = $request['accountyear'];
            $bankdata->ifsc_code            = $request['ifsc_code'];
            $bankdata->micr_code            = $request['micr_code'];

            $bankdata->save();
        }
        else{
        $bankdetil = new BankDetails;
        $bankdetil->loan_id                = $id;
        $bankdetil->cust_id                = $customer->cust_id;
        $bankdetil->bank_name              = $request['name_of_bank'];
        $bankdetil->branch_address         = $request['branch_address'];
        $bankdetil->account_holder_name    = $request['accountname'];
        $bankdetil->account_number         = $request['accountnumber'];
        $bankdetil->Type_of_Account         = $request['typeofacount'];
        $bankdetil->account_oprete_since   = $request['accountyear'];
        $bankdetil->ifsc_code              = $request['ifsc_code'];
        $bankdetil->micr_code              = $request['micr_code'];

        $bankdetil->save();
        }


        return redirect('reference/add')->with('success', 'Account details added successfully.');
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
