<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CoCustomer;

class CoCustomerController extends Controller
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
        $url = url('/cocustomer/add');
        $title = 'DETAILS OF CO-BORROWER';
        $btext = "Submit";
        $data = compact('url', 'title', 'btext');
        return view('co_customer')->with($data);
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
            'title.*'              => 'required',
            'fullname.*'           => 'required',
            'relation_type.*'     => 'required',
            'apply_as_customer.*'  => 'required',
            'f_s_name.*'          => 'required',
            'Shareholding.*'       => 'required|numeric',
            'dob.*'               => 'required',
            'Gender.*'            => 'required',
            'Marital_Status.*'    => 'required',
            'Citizenship.*'        => 'required',
            'Residential_type.*'  => 'required',
            'Occupation_type.*'   => 'required',
            // 'different_address.*'  => 'required',
            'current_address.*'    => 'required',
            'current_landmark.*'   => 'required',
            'city.*'               => 'required',
            'District.*'           => 'required',
            'State.*'             => 'required',
            'pincode.*'            => 'required|numeric|digits:6',
            'state_code.*'        => 'required',
            'country_code.*'       => 'required',
            'Residence_type.*'    => 'required',
            'residance_year.*'     => 'required',
            'proof_address.*'    => 'required',
            'per_address.*'       => 'required',
            'per_landmark.*'      => 'required',
            'per_city.*'          => 'required',
            'per_District.*'      => 'required',
            'per_State.*'         => 'required',
            'per_pincode.*'       => 'required|numeric|digits:6',
            'per_state_code.*'    => 'required',
            'per_country_code.*'   => 'required',
            'mobile.*'            => 'required|numeric|digits:10',
            'email.*'             => 'required|email',
            'pan.*'               => 'required',
            // 'form60.*'             => 'required|in:Yes,No',
            'adhar.*'              => 'required',

        ]);
        //   dd($request->all());



        $LoanId = session('application_id');
        $custmoreID = Customer::where('loan_id', $LoanId)->value('cust_id');



        foreach ($request->title as $key => $value) { 
            // @dd($value);
            $co_customer = new CoCustomer;
            $co_customer->loan_id   =  $LoanId;
            $co_customer->cust_id   =  $custmoreID;
            $co_customer->title      = $request['title'][$key];
            $co_customer->co_cust_name  = $request['fullname'][$key];
            $co_customer->relation_with_applicant            = $request['relation_type'][$key];
            $co_customer->applying_as_co_borrower            = $request['apply_as_customer'][$key];
            $co_customer->father_or_spouse_name              = $request['f_s_name'][$key];
            $co_customer->shareholding_with_cust_entity      = $request['Shareholding'][$key];
            $co_customer->Date_of_Birth                      = $request['dob'][$key];
            $co_customer->Gender                             = $request['Gender'][$key];
            $co_customer->Marital_Status                     = $request['Marital_Status'][$key];
            $co_customer->Citizenship                        = $request['Citizenship'][$key];
            $co_customer->Residential_Status                 =  $request['Residential_type'][$key];
            $co_customer->Occupation_type                    = $request['Occupation_type'][$key];

            // $co_customer->Different_from_Permanent_addess    = $request['different_address'][$key]; 

            $co_customer->Current_Residence_Address          = $request['current_address'][$key];
            $co_customer->Current_Landmark                   = $request['current_landmark'][$key];
            $co_customer->Current_City                       = $request['city'][$key];
            $co_customer->Current_District                   = $request['District'][$key];
            $co_customer->Current_State                      = $request['State'][$key];
            $co_customer->Current_pincode                    = $request['pincode'][$key];
            $co_customer->Current_State_code                 = $request['state_code'][$key];
            $co_customer->Current_Country_Code               = $request['country_code'][$key];
            $co_customer->Residence_Type                     = $request['Residence_type'][$key];
            $co_customer->Current_Residences_years           = $request['residance_year'][$key];
            $co_customer->Address_as_per_proof               = $request['proof_address'][$key];
            $co_customer->Permanent_Residence_Address        = $request['per_address'][$key];
            $co_customer->Permanent_Landmark                 = $request['per_landmark'][$key];
            $co_customer->Permanent_City                     = $request['per_city'][$key];
            $co_customer->Permanent_District                 = $request['per_District'][$key];
            $co_customer->Permanent_State                    = $request['per_State'][$key];
            $co_customer->Permanent_pincode                  = $request['per_pincode'][$key];
            $co_customer->Permanent_State_code               = $request['per_state_code'][$key];
            $co_customer->Permanent_Country_Code             = $request['per_country_code'][$key];
            $co_customer->co_cust_Mobile_no                  = $request['mobile'][$key];
            $co_customer->co_cust_email                      = $request['email'][$key];
            $co_customer->co_cust_pannumber                  = $request['pan'][$key];
            // $co_customer->co_cust_Form_60                    = $request['form60'][$key];
            $co_customer->co_cust_adharnumber                = $request['adhar'][$key];

            $co_customer->save();
        }

        return redirect('rpartners/add')->with('success', 'Co-Customer created successfully.');
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
