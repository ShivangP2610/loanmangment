<?php

namespace App\Http\Controllers;

use App\Models\Cam;
use App\Models\Credit;
use App\Models\Customer;
use App\Models\FormOffice;
use App\Models\Creditstage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CamController extends Controller
{
    public function viewdocument()
    {
        $cams = Cam::orderBy('created_at', 'desc')->get();
        $data = compact('cams');
        return view('viewcam')->with($data);

    }

    public function viewdocument1($id)
    {
        $cams = Cam::where('lon_id',$id)->get();
        $back  = "Back";
        $data = compact('cams','back');
        return view('viewcam')->with($data);
    }

    public function create()
    {
        $url = url('/cam/add');
        $title = 'CAM Uplod';
        $btext = "Submit";
        $data = compact('url', 'title', 'btext');
        $loans = FormOffice::where('app_status', 'document done')->get();
        $customers = Customer::all();
        // dd($customers)->count();
        return view('cam')->with(array_merge($data, ['loans' => $loans, 'customers' => $customers]));
    }




    public function store(Request $request)
    {
        //  dd($request->all())
        $request->validate([
            'lon_id' => 'required',
            'customer_id' => 'required',
            'excel_uplod' => 'required|file|mimes:xlsx,xls'
        ]);
        $cam = new Cam();
        $cam->lon_id = $request->lon_id;
        $cam->customer_id = $request->customer_id;
        $file = $request->file('excel_uplod');

        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents/cam', $fileName);
        $cam->excel_uplod = $fileName;
        // dd($file);
        $appstatus = 'cam approved';
        FormOffice::where('loan_id', $request->lon_id)->update(['app_status' => $appstatus]);
        // $FormOffice = FormOffice::find($request->lon_id);
        // $FormOffice->app_status = $request->status;
        // $FormOffice->update();

        $cam->save();
        return redirect()->back()->with('success', 'Document Submit successfully.');
    }


    public function creditcreate (){
        $url = url('/credit/add');
        $title = 'Credit Uplod';
        $btext = "Submit";
        $data = compact('url', 'title', 'btext');

        $loans = FormOffice::where('app_status', 'cam approved')->get();
        $customers = Customer::all();
        // dd($customers)->count();
        return view('credit')->with(array_merge($data, ['loans' => $loans, 'customers' => $customers]));
    }


    public function creditstore(Request $request)
    {
        //  dd($request->all());

        $request->validate([
            'lon_id' => 'required',
            'customer_id' => 'required',
            'cam_uplod' => 'required|file|mimes:xlsx,xls',
            'final_uplod' => 'required|file|mimes:xlsx,xls'
        ]);




        $cam = new Credit();
        $cam->lon_id = $request->lon_id;
        $cam->customer_id = $request->customer_id;

        $file = $request->file('cam_uplod');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents/credit', $fileName);
        $cam->cam_uplod = $fileName;

        $file = $request->file('final_uplod');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents/credit', $fileName);
        $cam->final_uplod = $fileName;

        // $FormOffice = FormOffice::find($request->lon_id);
        // $FormOffice->app_status = $request->status;


        $appstatus = 'credit approved';
        FormOffice::where('loan_id', $request->lon_id)->update(['app_status' => $appstatus]);

        $cam->save();
        return redirect()->back()->with('success', 'Document Submit successfully.');
    }

    public function show($id)
    {
        // // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

        // $reader->setReadDataOnly(TRUE);
        // $uri = "public/storage/resultsheet/Revival Royal Academy_Primary 5B_1572753672.xlsx";

        // $spreadsheet = $reader->load($uri);
        // $worksheet = $spreadsheet->getActiveSheet();

        // return view('student.result', compact('worksheet'));
    }


    public function creditview()
    {
        $creditview = Credit::orderBy('created_at', 'desc')->get();
        $data = compact('creditview');
        return view('viewcredit')->with($data);

    }


    public function downloadCamuplod($id)
{
    // Retrieve document details from database
    $camuplod = Cam::findOrFail($id);
// dd($camuplod);
    // Construct the file path
    $filePath = 'public/documents/cam/' . $camuplod->excel_uplod;
    // dd($filePath);

    // Check if salary slip file exists
    if (Storage::exists($filePath)) {
        return Storage::download($filePath);
    } else {
        abort(404);
    }
}


public function redirectToView(Request $request)
{
    $lon_id = $request->input('lon_id');


}

// shivang add 29-6-2024
// public function addcreditstage(Request $request)
// {

//     $request->validate([
//         'cust_id_main' => 'required',
//         'loan_id_main' => 'required',
//         'requested_amount' => 'required',
//         'requested_tenure' => 'required',
//         'sanctioned_amount' => 'required',
//         'maximum_sanctioned_amount' => 'required',
//         'sanctioned_tenure' => 'required',
//         'maximum_sanctioned_tenure' => 'required',
//         'sanctionedInterest' => 'required',
//         'policyrate' => 'required',
//         'product_discount' => 'required',
//         'package_discount' => 'required',
//         'total_discount' => 'required',
//         'applicable_rate' => 'required',
//         'capital_funded' => 'required',
//         'application' => 'required',
//     ]);

//     $loan_id = $request->loan_id_main;
//     $cust_id = $request->cust_id_main;

//     $existindata =  Creditstage::where('loan_id',$loan_id)->where('cust__id',$cust_id)->first();
//     $id = $existindata->credit_id;

//     $maindata = Creditstage::where('credit_id',$id)->get();

//     if($maindata)
//     {
//         $maindata->requested_amount = $request->requested_amount;
//         $maindata->requested_tenure = $request->requested_tenure;
//         $maindata->sanctioned_amount = $request->sanctioned_amount;
//         $maindata->maximum_sanctioned_amount = $request->maximum_sanctioned_amount;
//         $maindata->sanctioned_tenure = $request->sanctioned_tenure;
//         $maindata->maximum_sanctioned_tenure = $request->maximum_sanctioned_tenure;
//         $maindata->sanctionedInterest = $request->sanctionedInterest;
//         $maindata->policyrate = $request->policyrate;
//         $maindata->product_discount = $request->product_discount;
//         $maindata->package_discount = $request->package_discount;
//         $maindata->total_discount = $request->total_discount;
//         $maindata->applicable_rate = $request->applicable_rate;
//         $maindata->capital_funded = $request->capital_funded;
//         $maindata->application = $request->application;
//         $maindata->save();
//     }
//     else{
//         $data = new Creditstage;

//         $data->loan_id = $request->loan_id_main;
//         $data->cust__id = $request->cust_id_main;
//         $data->requested_amount = $request->requested_amount;
//         $data->requested_tenure = $request->requested_tenure;
//         $data->sanctioned_amount = $request->sanctioned_amount;
//         $data->maximum_sanctioned_amount = $request->maximum_sanctioned_amount;
//         $data->sanctioned_tenure = $request->sanctioned_tenure;
//         $data->maximum_sanctioned_tenure = $request->maximum_sanctioned_tenure;
//         $data->sanctionedInterest = $request->sanctionedInterest;
//         $data->policyrate = $request->policyrate;
//         $data->product_discount = $request->product_discount;
//         $data->package_discount = $request->package_discount;
//         $data->total_discount = $request->total_discount;
//         $data->applicable_rate = $request->applicable_rate;
//         $data->capital_funded = $request->capital_funded;
//         $data->application = $request->application;

//         $data->save();

//         return redirect()->back()->with('success', 'Credit Data Saved Successfully');
//     }


// }

public function addcreditstage(Request $request)
{

    $request->validate([
        'cust_id_main' => 'required',
        'loan_id_main' => 'required',
        'requested_amount' => 'required',
        'requested_tenure' => 'required',
        'sanctioned_amount' => 'required',
        // 'maximum_sanctioned_amount' => 'required',
        'sanctioned_tenure' => 'required',
        // 'maximum_sanctioned_tenure' => 'required',
        'sanctionedInterest' => 'required',
        'policyrate' => 'required',
        'applicable_rate' => 'required',
        'application' => 'required',
    ]);

    $loan_id = $request->loan_id_main;
    $cust_id = $request->cust_id_main;

    // Retrieve the existing data if it exists
    $existindata = Creditstage::where('loan_id', $loan_id)->where('cust__id', $cust_id)->first();

    if ($existindata) {
        // Find the record by its credit_id
        $id = $existindata->credit_id;
        $maindata = Creditstage::find($id);

        if ($maindata) {
            // Update existing data
            $maindata->requested_amount = $request->requested_amount;
            $maindata->requested_tenure = $request->requested_tenure;
            $maindata->sanctioned_amount = $request->sanctioned_amount;
            // $maindata->maximum_sanctioned_amount = $request->maximum_sanctioned_amount;
            $maindata->sanctioned_tenure = $request->sanctioned_tenure;
            // $maindata->maximum_sanctioned_tenure = $request->maximum_sanctioned_tenure;
            $maindata->sanctionedInterest = $request->policyrate;    // sanctionedInterest
            $maindata->policyrate = $request->policyrate;
            $maindata->applicable_rate = $request->applicable_rate;
            $maindata->application = $request->application;
            $maindata->reason  =  $request->reason;
            $maindata->save();
                    } else {
            throw new \Exception("Data not found for credit_id: $id");
        }
    } else {
        // Insert new data
        $data = new Creditstage;
        $data->loan_id = $request->loan_id_main;
        $data->cust__id = $request->cust_id_main;
        $data->requested_amount = $request->requested_amount;
        $data->requested_tenure = $request->requested_tenure;
        $data->sanctioned_amount = $request->sanctioned_amount;
        // $data->maximum_sanctioned_amount = $request->maximum_sanctioned_amount;
        $data->sanctioned_tenure = $request->sanctioned_tenure;
        // $data->maximum_sanctioned_tenure = $request->maximum_sanctioned_tenure;
        $data->sanctionedInterest = $request->policyrate;     // sanctionedInterest
        $data->policyrate = $request->policyrate;
        $data->applicable_rate = $request->applicable_rate;
        $data->application = $request->application;
        $data->reason  =  $request->reason;
        $data->save();
    }

    return redirect()->back()->with('success', 'Credit Data Saved Successfully');
}



}
