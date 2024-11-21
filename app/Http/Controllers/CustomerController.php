<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\FormOffice;

class CustomerController extends Controller
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
        //  dd($id);
        $url = url('/customer/add');
        $title = 'BORROWER DETAILS';
        $btext = "Submit";
        $index = 0;
        //  $borrowerdata  = Customer::find($id);
        $customerData = Customer::where('loan_id', $id)->first();
        // dd($customerData);
        $data = compact('url', 'title', 'btext' , 'index' ,'customerData');
//  dd($data);
        return view('customer')->with($data);
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
            'name_of_borrower'      => 'required',
            'entity_type'           => 'required',
            'date_of_incorporation' => 'required',
            'principal_address'     =>'required',
            'city'                  => 'required',
            'District'              => 'required',
            'State'                 => 'required',
            'pincode'               => 'required|numeric|digits:6',
            'state_code'            => 'required',
            'country_code'          => 'required',
            'permanent_address'     => 'required',
            'per_city'              => 'required',
            'per_District'          => 'required',
            'per_State'             => 'required',
            'per_pincode'           => 'required|numeric|digits:6',
            'per_state_code'        => 'required',
            'per_country_code'      => 'required',
            'corporation_place'     => 'required',
            'telephone'             => 'required|numeric|digits:10',
            'email'                 => 'required|email',
            'industry_type'         => 'required',
            'Segment'               => 'required',
            'gst'                   => 'required',
            'pan'                   => 'required',
            'bussiness_vintage'     => 'required',
        ]);

        // $lastLoanId = FormOffice::latest()->first()->loan_id;
        // $LoanId = session('application_id');
        $id = session()->get('application_id');
        $customerdata = Customer::where('loan_id', $id)->first();
        if($customerdata)
        {

            if(isset($request['entity_type']) && isset($request['name_of_borrower'])) {
                $data1= $request['entity_type'];
                $sub_string = substr($data1, 0, 20);
                }
                // dd($sub_string);
            $customerdata->cust_name = $request['name_of_borrower'];
            $customerdata->cust_entity_type =  $sub_string;
            $customerdata->Date_of_Incorporation = $request['date_of_incorporation'];
            $customerdata->Principal_office_address = $request['principal_address'];
            $customerdata->Principal_City = $request['city'];
            $customerdata->Principal_District = $request['District'];
            $customerdata->Principal_State = $request['State'];
            $customerdata->Principal_pincode = $request['pincode'];
            $customerdata->Principal_State_code = $request['state_code'];
            $customerdata->Principal_Country_Code = $request['country_code'];
            $customerdata->Permanent_office_address = $request['permanent_address'];
            $customerdata->Permanent_City = $request['per_city'];
            $customerdata->Permanent_District = $request['per_District'];
            $customerdata->Permanent_State = $request['per_State'];
            $customerdata->Permanent_pincode = $request['per_pincode'];
            $customerdata->Permanent_State_code = $request['per_state_code'];
            $customerdata->Permanent_Country_Code = $request['per_country_code'];
            $customerdata->Place_of_incorporation = $request['corporation_place'];
            $customerdata->cust_Telephone = $request['telephone'];
            $customerdata->cust_email = $request['email'];
            $customerdata->Type_of_Industry = $request['industry_type'];
            $customerdata->Segment = $request['Segment'];
            $customerdata->cust_gst = $request['gst'];
            $customerdata->cust_pannumber = $request['pan'];
            $customerdata->Overall_Business_Vintage = $request['bussiness_vintage'];
            $customerdata->save();

        }else
        {
            $cust_data = new Customer;
            $cust_data->loan_id =  $id;
            if(isset($request['entity_type']) && isset($request['name_of_borrower'])) {
            $data1= $request['entity_type'];
            $sub_string = substr($data1, 0, 11);
            }
            $cust_data->cust_name = $request['name_of_borrower'];
            $cust_data->cust_entity_type =  $sub_string;
            $cust_data->Date_of_Incorporation = $request['date_of_incorporation'];
            $cust_data->Principal_office_address = $request['principal_address'];
            $cust_data->Principal_City = $request['city'];
            $cust_data->Principal_District = $request['District'];
            $cust_data->Principal_State = $request['State'];
            $cust_data->Principal_pincode = $request['pincode'];
            $cust_data->Principal_State_code = $request['state_code'];
            $cust_data->Principal_Country_Code = $request['country_code'];
            $cust_data->Permanent_office_address = $request['permanent_address'];
            $cust_data->Permanent_City = $request['per_city'];
            $cust_data->Permanent_District = $request['per_District'];
            $cust_data->Permanent_State = $request['per_State'];
            $cust_data->Permanent_pincode = $request['per_pincode'];
            $cust_data->Permanent_State_code = $request['per_state_code'];
            $cust_data->Permanent_Country_Code = $request['per_country_code'];
            $cust_data->Place_of_incorporation = $request['corporation_place'];
            $cust_data->cust_Telephone = $request['telephone'];
            $cust_data->cust_email = $request['email'];
            $cust_data->Type_of_Industry = $request['industry_type'];
            $cust_data->Segment = $request['Segment'];
            $cust_data->cust_gst = $request['gst'];
            $cust_data->cust_pannumber = $request['pan'];
            // $cust_data->Form_60 = $request['form60'];
            $cust_data->Overall_Business_Vintage = $request['bussiness_vintage'];
            $cust_data->save();

        }
        return redirect('/proprietor/add')->with('success', 'Customer created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          session()->put('application_id', $id);

        $url = url('/customer/add');
        $title = 'BORROWER DETAILS';
        $btext = "Submit";
        $index = 0;
        $customerData = Customer::where('loan_id', $id)->first();
        $data = compact('url', 'title', 'btext' , 'index' ,'customerData');
//  dd($data);
        return view('customer')->with($data);
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
