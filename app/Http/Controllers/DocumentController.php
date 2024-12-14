<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Document;
use App\Models\FormOffice;
use Illuminate\Http\Request;
use App\Models\Proprietor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class DocumentController extends Controller
{
    public function viewdocument()
    {
        Session::forget('customer_id');

        // $documents = Document::orderBy('created_at', 'desc')->get();
        $documents = Document::where('lon_id', session('mainloan_id'))->get();
        // dd($documents);
        // dd($documents);
        $data = compact('documents');
        return view('viewdocument')->with($data);

    }

    public function  viewdocument1($id)
    {
        $documents = Document::where('lon_id',$id)->get();

        $back  = "Back";
        $data = compact('documents','back');
        return view('viewdocument')->with($data);
    }

    public function create()
    {
        $url = url('/document/add');
        $title = 'Document Uplod';
        $btext = "Submit";

        $lon = FormOffice::all();
        // $loans = FormOffice::where('app_status', 'office approved')->get();
        $id = session('mainloan_id');
        $loans = FormOffice::where('loan_id', $id)->get();
        // dd($loans);
        // $customers = Customer::all();
        $documents = Document::with('customer', 'loan')->get();
        $data = compact('url', 'title', 'btext', 'documents', 'loans');
        return view('document', $data);
        // return view('document')->with(array_merge($data, ['loans' => $loans]));
    }

    // public function store(Request $request)
    // {

    // // dd($request->all());

    //     $Document = new Document();
    //     $Document->lon_id = $request->lon_id;
    //     $Document->customer_id = $request->customermainnid;

    //     $Document->proprietor_id = $request->customer_id;


    //     // $Document->customer_id = $request->customer_id;

    //     if ($request->hasFile('identity_proof')) {
    //         $image = $request->file('identity_proof');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         // dd($imageName);
    //         $image->storeAs('public/documents/identity_proofs', $imageName);
    //         // dd($image);
    //         $Document->identity_proof = $imageName;
    //         // dd($Document);
    //     }

    //     if ($request->hasFile('bank_statement')) {
    //         $file = $request->file('bank_statement');
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();
    //         $file->storeAs('public/documents/bank_statements', $fileName);
    //         $Document->bank_statement = $fileName;
    //     }

    //     if ($request->hasFile('salary_slip')) {
    //         $file = $request->file('salary_slip');
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();
    //         $file->storeAs('public/documents/salary_slips', $fileName);
    //         $Document->salary_slip = $fileName;
    //     }

    //     $Document->status = ($Document->identity_proof && $Document->bank_statement && $Document->salary_slip) ? 1 : null;

    //     $Document->save();  // document stage
    //     $Documentdata = Document::where('lon_id', $request->lon_id)->first();
    //     // dd($Documentdata);
    //      $identity_proof = $Documentdata->identity_proof;
    //      $bank_statement = $Documentdata->bank_statement;
    //      $salary_slip = $Documentdata->salary_slip;


    //     // here count dzta strt

    //     $data = DB::table('customer_details')
    //     ->select(
    //         'customer_details.cust_id as customer_id',
    //         'customer_details.cust_name as customer_name',
    //         DB::raw('GROUP_CONCAT(proprietor_details.proprietor_name) as proprietor_names'),
    //         DB::raw('GROUP_CONCAT(proprietor_details.proprietor_id) as proprietor_ids')
    //     )
    //     ->leftJoin('proprietor_details', 'customer_details.cust_id', '=', 'proprietor_details.cust_id')
    //     ->where('customer_details.loan_id', $request->lon_id)
    //     ->groupBy('customer_details.cust_id')
    //     ->groupBy('customer_details.cust_name')
    //     ->get();

    //     // Calculate the count of customers and total count of proprietor IDs
    //     $totalCount = 0;
    //     foreach ($data as $item) {
    //         // Count each customer and split the proprietor_ids to count each proprietor_id
    //         $customerCount = 1; // Each row represents one customer
    //         $proprietorIds = explode(',', $item->proprietor_ids);
    //         $proprietorCount = count($proprietorIds);
    //         $totalCount += $customerCount + $proprietorCount;
    //     }


    //     // heere count data end

    //             $lonidcount = Document::where('lon_id', $request->lon_id)->where('status', 1)->count();
    //             // $statuscount  =  Document::status
    //             // dd($lonidcount);

    //             // dd($countDocuments);

    //             // Determine app_status based on document count
    //             if ($lonidcount == $totalCount) {
    //             $appstatus = 'document done';
    //             } else {
    //             $appstatus = 'office approved';
    //             }

    //             // // Update FormOffice based on customer_id or lon_id
    //             FormOffice::where('loan_id', $request->lon_id)
    //             ->orWhere('loan_id', $request->lon_id)
    //             ->update(['app_status' => $appstatus]);

    //     return redirect()->back()->with('success', 'Document Submit successfully.');
    // }

    public function store(Request $request)
{
    // Check if a document with the specified criteria already exists
    $document = Document::where('lon_id', $request->lon_id)
                        ->where('customer_id', $request->customermainnid)
                        ->where('proprietor_id', $request->customer_id)
                        ->first();
// dd($document);
    // If a document exists, update it; otherwise, create a new one
    // if ($document) {
    //     // Update existing document
    //     if ($request->hasFile('identity_proof')) {
    //         // Handle identity_proof file
    //         $image = $request->file('identity_proof');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->storeAs('public/documents/identity_proofs', $imageName);
    //         $document->identity_proof = $imageName;
    //     }

    //     if ($request->hasFile('bank_statement')) {
    //         // Handle bank_statement file
    //         $file = $request->file('bank_statement');
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();
    //         $file->storeAs('public/documents/bank_statements', $fileName);
    //         $document->bank_statement = $fileName;
    //     }

    //     if ($request->hasFile('salary_slip')) {
    //         // Handle salary_slip file
    //         $file = $request->file('salary_slip');
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();
    //         $file->storeAs('public/documents/salary_slips', $fileName);
    //         $document->salary_slip = $fileName;
    //     }


    //     if ($request->hasFile('business_proof')) {
    //         // Handle business_proof file
    //         $file = $request->file('business_proof');
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();
    //         $file->storeAs('public/documents/business_proof', $fileName);
    //         $document->business_proof = $fileName;
    //     }

    //     if ($request->hasFile('adresss_proof')) {
    //         // Handle adresss_proof file
    //         $file = $request->file('adresss_proof');
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();
    //         $file->storeAs('public/documents/adresss_proof', $fileName);
    //         $document->adresss_proof = $fileName;
    //     }

    //     // Update status based on file presence
    //     $document->status = ($document->identity_proof && $document->bank_statement && $document->salary_slip && $document->business_proof && $document->adresss_proof) ? 1 : null;
    //     // dd($newDocument);
    //     $document->save(); // Save updated document
    // } else {
        // Create new document
        $newDocument = new Document();
        $newDocument->lon_id = $request->lon_id;
        $newDocument->customer_id = $request->customermainnid;
        $newDocument->proprietor_id = $request->customer_id;

        if ($request->hasFile('identity_proof')) {
            $image = $request->file('identity_proof');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/documents/identity_proofs', $imageName);
            $newDocument->identity_proof = $imageName;
        }

        if ($request->hasFile('bank_statement')) {
            $file = $request->file('bank_statement');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/bank_statements', $fileName);
            $newDocument->bank_statement = $fileName;
        }

        if ($request->hasFile('salary_slip')) {
            $file = $request->file('salary_slip');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/salary_slips', $fileName);
            $newDocument->salary_slip = $fileName;
        }

        if ($request->hasFile('business_proof')) {
            // Handle business_proof file
            $file = $request->file('business_proof');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/business_proof', $fileName);
            //    dd(  $fileName);
            $newDocument->business_proof = $fileName;

        }

        if ($request->hasFile('adresss_proof')) {
            // Handle adresss_proof file
            $file = $request->file('adresss_proof');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/adresss_proof', $fileName);
            $newDocument->adresss_proof = $fileName;
        }

        // Set status for new document
        $newDocument->status = ($newDocument->identity_proof && $newDocument->bank_statement && $newDocument->salary_slip && $newDocument->business_proof && $newDocument->adresss_proof) ? 1 : null;


// dd($newDocument);
        $newDocument->save(); // Save new document


    // Update FormOffice based on loan_id
    $lonidcount = Document::where('lon_id', $request->lon_id)->where('status', 1)->count();
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
    // Calculate total count logic
    $totalCount = 0;
    foreach ($data as $item) {
        $customerCount = 1;
        $proprietorIds = explode(',', $item->proprietor_ids);
        $proprietorCount = count($proprietorIds);
        $totalCount += $customerCount + $proprietorCount;
    }

    // Determine app_status based on document count
    $appstatus = ($lonidcount == $totalCount) ? 'document done' : 'office approved';

    FormOffice::where('loan_id', $request->lon_id)->update(['app_status' => $appstatus]);

    return redirect()->back()->with('success', 'Document submitted successfully.');
}




public function downloadBankStatement($id)
{
    // Retrieve document details from database
    $document = Document::findOrFail($id);

    // Construct the file path
    $filePath = 'public/documents/bank_statements/' . $document->bank_statement;

    // Check if salary slip file exists
    if (Storage::exists($filePath)) {
        return Storage::download($filePath);
    } else {
        abort(404);
    }
}








public function downloadSalarySlip($id)
{
    // Retrieve document details from database
    $document = Document::findOrFail($id);

    // Construct the file path
    $filePath = 'public/documents/salary_slips/' . $document->salary_slip;

    // Check if salary slip file exists
    if (Storage::exists($filePath)) {
        return Storage::download($filePath);
    } else {
        abort(404);
    }
}

public function downloadbusnessSlip($id)
{
    // Retrieve document details from database
    $document = Document::findOrFail($id);

    // Construct the file path
    $filePath = 'public/documents/business_proof/' . $document->business_proof;

    // Check if salary slip file exists
    if (Storage::exists($filePath)) {
        return Storage::download($filePath);
    } else {
        abort(404);
    }
}

public function downloadaddressSlip($id)
{
    // Retrieve document details from database
    $document = Document::findOrFail($id);

    // Construct the file path
    $filePath = 'public/documents/address_prrof/' . $document->adresss_proof;

    // Check if salary slip file exists
    if (Storage::exists($filePath)) {
        return Storage::download($filePath);
    } else {
        abort(404);
    }
}






public function viewDocumentlist($customer_id)
{
    // dd('gsgsssgh');
    session()->put('customer_id', $customer_id);
    $documentlist = Document::with('proprietorDetails')->where('customer_id', $customer_id)
                            ->orderBy('created_at', 'desc')
                            ->get();


    // dd($documentlist);
    $back  = "Back";
    return view('viewdocumentlist', compact('documentlist','back'));
}




public function viewDocumentedit($id)
{
    // dd($id);

    $url = url('/document/update');
    $title = 'Document Update';
    $btext = "Submit";


    // $documents = Document::where('proprietor_id',$id)->get();
    $documents = Document::where('id',$id)->get();
    // dd($documents);
    // Check if $id exists as customer_id or proprietor_id
    // $document = Document::find($id);

    if (!$documents) {
        abort(404);
    }

    $lon_id = $documents[0]->lon_id;
    $proprietor_id = $documents[0]->proprietor_id;



    if ($lon_id && $proprietor_id) {
        // dd('dhjdhhdhjh');
        $officedata = FormOffice::where('loan_id', $lon_id)->get();
        $proprietor = Proprietor::where('proprietor_id', $proprietor_id)->first();
        $customer = Customer::where('cust_id', $proprietor_id)->first();
        // dd('sikhsgh');
        $back  = "Back";
        $mainid = $documents[0]->id;
        if ($proprietor) {
            $data = compact('url', 'title', 'btext', 'officedata', 'proprietor','back','mainid');
        } elseif ($customer) {
            $data = compact('url', 'title', 'btext', 'officedata', 'customer','back','mainid');
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
        return Redirect()->back()->with('msg', 'loan id and proprietor_id doesnt match');
    }


}

// shivang 13-12-2024
public function viewDocumenteditlast($id)
{

    $url = url('/document/update');
    $title = 'Document Update';
    $btext = "Submit";


    $documents = Document::where('id',$id)->get();
    // dd($documents);
    // Check if $id exists as customer_id or proprietor_id
    // $document = Document::find($id);

    if (!$documents) {
        abort(404);
    }

    $lon_id = $documents[0]->lon_id;
    $proprietor_id = $documents[0]->proprietor_id;

    if ($lon_id && $proprietor_id) {
        // dd('dhjdhhdhjh');
        $officedata = FormOffice::where('loan_id', $lon_id)->get();
        $proprietor = Proprietor::where('proprietor_id', $proprietor_id)->first();
        $customer = Customer::where('cust_id', $proprietor_id)->first();
        // dd('sikhsgh');
        $back  = "Back";
        $mainid = $documents[0]->id;

        if ($proprietor) {
            $data = compact('url', 'title', 'btext', 'officedata', 'proprietor','back','mainid');
        } elseif ($customer) {
            $data = compact('url', 'title', 'btext', 'officedata', 'customer','back','mainid');
        } else {

            abort(404, 'No data found for this ID.');
        }

        return view('documentedit', $data);
    }

    else{
        return Redirect()->back()->with('msg', 'loan id and proprietor_id doesnt match');
    }


}

public function updatestore(Request $request)
{
    // dd($request->all());

    // $document = Document::where('lon_id', $request->lon_id)
    //                     ->where('customer_id', $request->customermainnid)
    //                     ->where('proprietor_id', $request->customer_id)
    //                     ->first();
    //                     // dd($document);


    // if (!$document) {

    //     return redirect()->back()->with('error', 'Document not found for update.');
    // }

    // $loan_id = $request->lon_id;
    // $pri_id = $request->customer_id;
    // $document->proprietor_id = $request->customer_id;

// dd($request->customer_id);
$docid = $request->docid;
$document = Document::find($docid);
// dd($document);
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

    if ($request->hasFile('business_proof')) {
        // Handle business_proof file
        $file = $request->file('business_proof');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents/business_proof', $fileName);
        $document->business_proof = $fileName;
    }   else{
        $document->business_proof = $document->business_proof;
    }

    if ($request->hasFile('adresss_proof')) {
        // Handle adresss_proof file
        $file = $request->file('adresss_proof');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents/adresss_proof', $fileName);
        $document->adresss_proof = $fileName;
    } else{
        $document->adresss_proof = $document->adresss_proof;
    }
// dd( $document);
    $document->status = ($document->identity_proof && $document->bank_statement && $document->salary_slip && $document->business_proof && $document->adresss_proof) ? 1 : null;
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

// shivang 13-12-2024
public function viewBankStatementmain($id)
{
    // dd($id);
    $document = Document::find($id);

    if ($document && $document->bank_statement) {
        $filePath = storage_path('app/public/documents/bank_statements/' . $document->bank_statement); // Adjust path based on your storage location
        // dd($filePath);
        if (file_exists($filePath)) {
            return response()->file($filePath); // View the file in the browser
        }
    }

    return abort(404, 'File not found.');
}

public function viewsalarymain($id)
{
    // dd($id);
    $document = Document::find($id);

    if ($document && $document->salary_slip) {
        $filePath = storage_path('app/public/documents/salary_slips/' . $document->salary_slip); // Adjust path based on your storage location
        // dd($filePath);
        if (file_exists($filePath)) {
            return response()->file($filePath); // View the file in the browser
        }
    }

    return abort(404, 'File not found.');
}
public function business_proofmain($id)
{
    // dd($id);
    $document = Document::find($id);

    if ($document && $document->business_proof) {
        $filePath = storage_path('app/public/documents/business_proof/' . $document->business_proof); // Adjust path based on your storage location
        // dd($filePath);
        if (file_exists($filePath)) {
            return response()->file($filePath); // View the file in the browser
        }
    }

    return abort(404, 'File not found.');
}
public function adresss_proofmain($id)
{
    // dd($id);
    $document = Document::find($id);

    if ($document && $document->adresss_proof) {
        $filePath = storage_path('app/public/documents/adresss_proof/' . $document->adresss_proof); // Adjust path based on your storage location
        // dd($filePath);
        if (file_exists($filePath)) {
            return response()->file($filePath); // View the file in the browser
        }
    }

    return abort(404, 'File not found.');
}

}

