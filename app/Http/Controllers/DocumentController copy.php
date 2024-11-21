<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Document;
use App\Models\FormOffice;
use Illuminate\Http\Request; 
use App\Models\Proprietor; 
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class DocumentController extends Controller
{
    public function viewdocument()
    {
        Session::forget('customer_id');

        $documents = Document::orderBy('created_at', 'desc')->get();
        $data = compact('documents');
        return view('viewdocument')->with($data);

    }

    public function create()
    {
        $url = url('/document/add');
        $title = 'Document Uplod';
        $btext = "Submit";
        
        $lon = FormOffice::all();
        $loans = FormOffice::where('app_status', 'office approved')->get();
        // $customers = Customer::all();  
        $documents = Document::with('customer', 'loan')->get(); 
        $data = compact('url', 'title', 'btext', 'documents', 'loans'); 
        return view('document', $data);
        // return view('document')->with(array_merge($data, ['loans' => $loans]));
    }

    public function store(Request $request)
    {
    
    // dd($request->all());
 
        $Document = new Document();
        $Document->lon_id = $request->lon_id;
        $Document->customer_id = $request->customermainnid; 

        $Document->proprietor_id = $request->customer_id;


        // $Document->customer_id = $request->customer_id;

        if ($request->hasFile('identity_proof')) {
            $image = $request->file('identity_proof');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); 
            // dd($imageName);
            $image->storeAs('public/documents/identity_proofs', $imageName); 
            // dd($image);
            $Document->identity_proof = $imageName; 
            // dd($Document);
        }

        if ($request->hasFile('bank_statement')) {
            $file = $request->file('bank_statement');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/bank_statements', $fileName);
            $Document->bank_statement = $fileName;
        }

        if ($request->hasFile('salary_slip')) {
            $file = $request->file('salary_slip');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/salary_slips', $fileName); 
            $Document->salary_slip = $fileName;
        } 
         
        $Document->status = ($Document->identity_proof && $Document->bank_statement && $Document->salary_slip) ? 1 : null; 
     
        $Document->save();  // document stage
        $Documentdata = Document::where('lon_id', $request->lon_id)->first();   
        // dd($Documentdata);
         $identity_proof = $Documentdata->identity_proof;
         $bank_statement = $Documentdata->bank_statement;
         $salary_slip = $Documentdata->salary_slip;
         

        // here count dzta strt

        $data = DB::table('customer_details')
        ->select(
            'customer_details.cust_id as customer_id',
            'customer_details.cust_name as customer_name',
            DB::raw('GROUP_CONCAT(proprietor_details.proprietor_name) as proprietor_names'),
            DB::raw('GROUP_CONCAT(proprietor_details.proprietor_id) as proprietor_ids')
        )
        ->leftJoin('proprietor_details', 'customer_details.cust_id', '=', 'proprietor_details.cust_id')
        ->where('customer_details.loan_id', $request->lon_id)
        ->groupBy('customer_details.cust_id')
        ->groupBy('customer_details.cust_name')
        ->get();

        // Calculate the count of customers and total count of proprietor IDs
        $totalCount = 0;
        foreach ($data as $item) {
            // Count each customer and split the proprietor_ids to count each proprietor_id
            $customerCount = 1; // Each row represents one customer
            $proprietorIds = explode(',', $item->proprietor_ids);
            $proprietorCount = count($proprietorIds);
            $totalCount += $customerCount + $proprietorCount;
        }

    
        // heere count data end 
 
                $lonidcount = Document::where('lon_id', $request->lon_id)->where('status', 1)->count();  
                // $statuscount  =  Document::status
                // dd($lonidcount);
               
                // dd($countDocuments);

                // Determine app_status based on document count
                if ($lonidcount == $totalCount) {
                $appstatus = 'document done';
                } else {
                $appstatus = 'office approved';
                }

                // // Update FormOffice based on customer_id or lon_id
                FormOffice::where('loan_id', $request->lon_id)
                ->orWhere('loan_id', $request->lon_id)
                ->update(['app_status' => $appstatus]);
   
        return redirect()->back()->with('success', 'Document Submit successfully.');
    } 






    public function downloadBankStatement($id)
    {
        // Retrieve document details from database
        $document = Document::findOrFail($id);

        // Check if bank statement file exists
        if (Storage::exists('documents/bank_statements/' . $document->bank_statement)) {
            return Storage::download('documents/bank_statements/' . $document->bank_statement);
        } else {
            abort(404); 
        }
    }

    public function downloadSalarySlip($id)
    {
        // Retrieve document details from database
        $document = Document::findOrFail($id);

        // Check if salary slip file exists
        if (Storage::exists('documents/salary_slips/' . $document->salary_slip)) {
            return Storage::download('documents/salary_slips/' . $document->salary_slip);
        } else {
            abort(404); 
        }
    } 



 

public function viewDocumentlist($customer_id)
{
    session()->put('customer_id', $customer_id);
    $documentlist = Document::with('proprietorDetails')->where('customer_id', $customer_id)
                            ->orderBy('created_at', 'desc')
                            ->get();

 
    // dd($documentlist);

    return view('viewdocumentlist', compact('documentlist'));
} 

  


public function viewDocumentedit($id)
{ 
    // dd($id);
    
    $url = url('/document/update');
    $title = 'Document Update';
    $btext = "Submit";
    
  
    $documents = Document::where('proprietor_id',$id)->get(); 
    // dd($documents);
    // Check if $id exists as customer_id or proprietor_id
    // $document = Document::find($id);

    if (!$documents) {
        abort(404); 
    }
    
    $lon_id = $documents[0]->lon_id;
    $proprietor_id = $documents[0]->proprietor_id;

   
    
    if ($lon_id && $proprietor_id) {
        $officedata = FormOffice::where('loan_id', $lon_id)->get();
        $proprietor = Proprietor::where('proprietor_id', $proprietor_id)->first(); 
        $customer = Customer::where('cust_id', $proprietor_id)->first(); 
    
        if ($proprietor) {
            $data = compact('url', 'title', 'btext', 'officedata', 'proprietor');
        } elseif ($customer) {
            $data = compact('url', 'title', 'btext', 'officedata', 'customer');
        } else {
            
            abort(404, 'No data found for this ID.');
        }
    
        // For debugging purposes
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();
    
        // Return view with the $data
        return view('documentedit', $data);
    }
    
    else{
        return Redirect::back()->with('msg', 'loan id and proprietor_id doesnt match');
    }
    

}    

public function updatestore(Request $request)
{ 
    // dd($request);
    
    $document = Document::where('lon_id', $request->lon_id)
                        ->where('customer_id', $request->customermainnid)
                        ->where('proprietor_id', $request->customer_id)
                        ->first(); 
                        // dd($document);

          
    if (!$document) {
    
        return redirect()->back()->with('error', 'Document not found for update.');
    }

    $loan_id = $request->lon_id;
    $pri_id = $request->customer_id;
    $document->proprietor_id = $request->customer_id;
// dd($request->customer_id);
    if ($request->hasFile('identity_proof')) {
        $image = $request->file('identity_proof');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/documents/identity_proofs', $imageName);
        $document->identity_proof = $imageName;
    }
    else{
        $document->identity_proof = $document->identity_proof;
    }

    if ($request->hasFile('bank_statement')) {
        $file = $request->file('bank_statement');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents/bank_statements', $fileName);
        $document->bank_statement = $fileName;
    }
    else{
        $document->bank_statement = $document->bank_statement;
    }

    if ($request->hasFile('salary_slip')) {
        $file = $request->file('salary_slip');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents/salary_slips', $fileName);
        $document->salary_slip = $fileName;
    }
    else{
        $document->salary_slip = $document->salary_slip;
    }  

    if ($request->hasFile('bank_statement')) {
        $file = $request->file('bank_statement');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents/bank_statements', $fileName);
        $document->bank_statement = $fileName;
    } else{
        $document->bank_statement = $document->bank_statement;
    }  

    if ($request->hasFile('salary_slip')) {
        $file = $request->file('salary_slip');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents/salary_slips', $fileName); 
        $document->salary_slip = $fileName;
    } else{
        $document->salary_slip = $document->salary_slip;
    }  


     
    $document->status = ($document->identity_proof && $document->bank_statement && $document->salary_slip) ? 1 : null;
    // Save the updated document
    $document->save();

    // Check if all required documents are uploaded
    $identity_proof = $document->identity_proof;
    $bank_statement = $document->bank_statement;
    $salary_slip = $document->salary_slip;

    // $appstatus = ($identity_proof != null && $bank_statement != null && $salary_slip != null) ? 'document done' : 'document pending';  

    $data = DB::table('customer_details')
    ->select(
        'customer_details.cust_id as customer_id',
        'customer_details.cust_name as customer_name',
        DB::raw('GROUP_CONCAT(proprietor_details.proprietor_name) as proprietor_names'),
        DB::raw('GROUP_CONCAT(proprietor_details.proprietor_id) as proprietor_ids')
    )
    ->leftJoin('proprietor_details', 'customer_details.cust_id', '=', 'proprietor_details.cust_id')
    ->where('customer_details.loan_id', $request->lon_id)
    ->groupBy('customer_details.cust_id')
    ->groupBy('customer_details.cust_name')
    ->get();

    // Calculate the count of customers and total count of proprietor IDs
    $totalCount = 0;
    foreach ($data as $item) {
        // Count each customer and split the proprietor_ids to count each proprietor_id
        $customerCount = 1; // Each row represents one customer
        $proprietorIds = explode(',', $item->proprietor_ids);
        $proprietorCount = count($proprietorIds);
        $totalCount += $customerCount + $proprietorCount;
    }


    // heere count data end 



            $lonidcount = Document::where('lon_id', $request->lon_id)->where('status', 1)->count();  
            // $statuscount  =  Document::status
            // dd($lonidcount);
           
            // dd($countDocuments);

            // Determine app_status based on document count
            if ($lonidcount == $totalCount) {
            $appstatus = 'document done';
            } else {
            $appstatus = 'office approved';
            }

            // // Update FormOffice based on customer_id or lon_id
            FormOffice::where('loan_id', $request->lon_id)
            ->orWhere('loan_id', $request->lon_id)
            ->update(['app_status' => $appstatus]);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Document updated successfully.')->with('appstatus', $appstatus);
}




}

