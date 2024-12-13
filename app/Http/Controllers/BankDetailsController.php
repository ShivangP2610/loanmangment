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
        // $id = session()->get('application_id'); 

        $id1 = session()->get('application_id'); 
        if ($id1){ 
            $id = session()->get('application_id');

        }else{
            $id = session('mainloan_id');
        } 
        // $id = session('mainloan_id'); 
        // dd($id);
        $url = url('/bankdetails/add');
        $title = 'DETAILS OF THE ACCOUNT FOR DISBURSEMENT ';
        $btext = "Submit";
        $bankdetails = BankDetails::where('loan_id', $id)->get(); 
        // dd($bankdetails);

        $numRows = $bankdetails->count();

        if($numRows != 0)
        {
            // dd('kyre');
            $data = compact('url', 'title', 'btext' ,'bankdetails');
            return view('bankdetails')->with($data);
        }
        else{
            // dd('test');
            $data = compact('url', 'title', 'btext');
            return view('bankdetails_copy')->with($data);
        }

        // dd($bankdata);
        // $data = compact('url', 'title', 'btext' ,'bankdetails');
        // return view('bankdetails')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {


    //     // echo "<pre>";
    //     // print_r($request->all());
    //     // echo "</pre>";
    //     // exit();

    //     $request->validate([

    //         'name_of_bank.*'    => 'required',
    //         'branch_address.*'  => 'required',
    //         'accountname.*'     => 'required',
    //         'accountnumber.*'   => 'required|numeric',
    //         'typeofacount.*'    => 'required',
    //         'accountyear.*'     => 'required',
    //         'ifsc_code.*'       => 'required',
    //         'micr_code.*'      => 'required'

    //     ]);

    //     // $lastcustomerId = Customer::latest()->first()->cust_id;
    //     // $loanId = Customer::where('cust_id', $lastcustomerId)->value('loan_id');

    //     $id = session()->get('application_id');
    //     $customer = Customer::where('loan_id', $id)->first();
    //     $bankdata = BankDetails::where('loan_id', $id)->first();
    //     if($bankdata) {

    //         $bankdata->bank_name            = $request['name_of_bank'];
    //         $bankdata->branch_address       = $request['branch_address'];
    //         $bankdata->account_holder_name  = $request['accountname'];
    //         $bankdata->account_number       = $request['accountnumber'];
    //         $bankdata->Type_of_Account      = $request['typeofacount'];
    //         $bankdata->account_oprete_since = $request['accountyear'];
    //         $bankdata->ifsc_code            = $request['ifsc_code'];
    //         $bankdata->micr_code            = $request['micr_code'];

    //         $bankdata->save();
    //     }
    //     else{
    //     $bankdetil = new BankDetails;
    //     $bankdetil->loan_id                = $id;
    //     $bankdetil->cust_id                = $customer->cust_id;
    //     $bankdetil->bank_name              = $request['name_of_bank'];
    //     $bankdetil->branch_address         = $request['branch_address'];
    //     $bankdetil->account_holder_name    = $request['accountname'];
    //     $bankdetil->account_number         = $request['accountnumber'];
    //     $bankdetil->Type_of_Account         = $request['typeofacount'];
    //     $bankdetil->account_oprete_since   = $request['accountyear'];
    //     $bankdetil->ifsc_code              = $request['ifsc_code'];
    //     $bankdetil->micr_code              = $request['micr_code'];

    //     $bankdetil->save();
    //     }


    //     return redirect('reference/add')->with('success', 'Account details added successfully.');
    // }

    public function store(Request $request)
{

    //    echo "<pre>";
    //     print_r($request->all());
    //     echo "</pre>";
    //     exit();

    // Validate the request for all input fields
    $request->validate([
        'name_of_bank.*'    => 'required',
        'branch_address.*'  => 'required',
        'accountname.*'     => 'required',
        'accountnumber.*'   => 'required|numeric',
        'typeofacount.*'    => 'required',
        'accountyear.*'     => 'required',
        'ifsc_code.*'       => 'required',
        'micr_code.*'       => 'required',
    ]);

    // $id = session()->get('application_id');
    // $customer = Customer::where('loan_id', $id)->first();

    // $id = session()->get('application_id'); 


    $id1 = session()->get('application_id'); 
        if ($id1){ 
            $id = session()->get('application_id');

        }else{
            $id = session('mainloan_id');
        }  
    // dd($id);
    $customer = Customer::where('loan_id', $id)->first();
    // dd($customer);

    $Bankdetails = BankDetails::where('loan_id', $id)->get();
    // dd($Bankdetails);

    if ($Bankdetails->isNotEmpty()) {
        foreach ($Bankdetails as $key => $Bankdetail) {
            $account_id =  $Bankdetail->account_id;
            // dd($account_id);
            BankDetails::where('account_id', $account_id)->delete();
        }


    }

    foreach ($request->name_of_bank as $key => $value) {
        $bank = new BankDetails;
        $bank->loan_id                 = $id;
        $bank->cust_id                 = $customer->cust_id;
        $bank->bank_name                    = $request->name_of_bank[$key];
        $bank->branch_address                 = $request->branch_address[$key];
        $bank->account_holder_name                    = $request->accountname[$key];
        $bank->account_number                 = $request->accountnumber[$key];
        $bank->Type_of_Account                   = $request->typeofacount[$key];
        $bank->account_oprete_since                 = $request->accountyear[$key];
        $bank->ifsc_code                   = $request->ifsc_code[$key];
        $bank->micr_code                  = $request->micr_code[$key];

        $bank->save();
    }


    // foreach ($request->name_of_bank as $index => $bankName) {
    //     // Find the existing bank record by `loan_id` and `account_number`
    //     $bankdata = BankDetails::where('loan_id', $id)
    //         ->where('account_number', $request->accountnumber[$index])
    //         ->first();

    //     if ($bankdata) {
    //         // Update existing record
    //         $bankdata->update([
    //             'bank_name'            => $bankName,
    //             'branch_address'       => $request->branch_address[$index],
    //             'account_holder_name'  => $request->accountname[$index],
    //             'account_number'       => $request->accountnumber[$index],
    //             'Type_of_Account'      => $request->typeofacount[$index],
    //             'account_oprete_since' => $request->accountyear[$index],
    //             'ifsc_code'            => $request->ifsc_code[$index],
    //             'micr_code'            => $request->micr_code[$index],
    //         ]);
    //     } else {
    //         // Create new record
    //         BankDetails::create([
    //             'loan_id'                => $id,
    //             'cust_id'                => $customer->cust_id,
    //             'bank_name'              => $bankName,
    //             'branch_address'         => $request->branch_address[$index],
    //             'account_holder_name'    => $request->accountname[$index],
    //             'account_number'         => $request->accountnumber[$index],
    //             'Type_of_Account'        => $request->typeofacount[$index],
    //             'account_oprete_since'   => $request->accountyear[$index],
    //             'ifsc_code'              => $request->ifsc_code[$index],
    //             'micr_code'              => $request->micr_code[$index],
    //         ]);
    //     }
    // }

    return redirect('reference/add')->with('success', 'Account details processed successfully.');
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
