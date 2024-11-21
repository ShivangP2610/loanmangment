<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; 
use App\Models\FormOffice;
use App\Models\References;

class RefrrencesController extends Controller
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
        $url = url('/reference/add');
        $title = 'REFERENCES';
        $btext = "Submit"; 
        $Refernces = References::where('loan_id', $id)->get(); 
        $numRows = $Refernces->count();
        
        if($numRows != 0)
        {
            $data = compact('url', 'title', 'btext' ,'Refernces');
            return view('refernce')->with($data);
        }
        else{
            $data = compact('url', 'title', 'btext');
            return view('refernce_copy')->with($data);
        }
        
    // dd($numRows);
    // foreach ($Refernces as $Refernce) {
    //     dd($Refernce);
       

    // }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name.*'                 =>'required',
            'address.*'              => 'required',
            'city.*'                 => 'required',
            'pincode.*'              => 'required|numeric|digits:6',
            'state.*'                => 'required',
            'country.*'              => 'required',
            'phone.*'                => 'required|numeric|digits:10',
            'mobile.*'               => 'required|numeric|digits:10',
            'email.*'                => 'required|email',
            'applicntrelation.*'     => 'required'
        ]);

       


        $id = session()->get('application_id');
        $customer = Customer::where('loan_id', $id)->first();
        $Refernces = References::where('loan_id', $id)->get(); 
       
        if ($Refernces->isNotEmpty()) {
            foreach ($Refernces as $key => $Refernce) {   
                $ref_id =  $Refernce->ref_id;
                 
                // $ref_id->delete();  
                References::where('ref_id', $ref_id)->delete();
            } 
       
            
        } 
        foreach ($request->name as $key => $value) { 
            $ref = new References;
            $ref->loan_id                 = $id;
            $ref->cust_id                 = $customer->cust_id;
            $ref->Name                    = $request->name[$key];
            $ref->Address                 = $request->address[$key];
            $ref->City                    = $request->city[$key];
            $ref->pincode                 = $request->pincode[$key];
            $ref->State                   = $request->state[$key];
            $ref->Country                 = $request->country[$key];
            $ref->Phone                   = $request->phone[$key];
            $ref->Mobile                  = $request->mobile[$key];
            $ref->Email                   = $request->email[$key];
            $ref->Relation_with_applicant = $request->applicntrelation[$key];
            $ref->save();
        } 

        $FormOffice = FormOffice::where('loan_id' ,$ref->loan_id)->first(); 
    //    dd($FormOffice);
        $FormOffice->app_status = 'office approved'; 
        $FormOffice->update();
        
      
      

        return redirect()->back()->with('success', 'References created successfully.');

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
