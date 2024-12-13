<?php

use App\Http\Controllers\CamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RollController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProprietorController;
use App\Http\Controllers\CoCustomerController;
use App\Http\Controllers\RemainingPartnerController;
use App\Http\Controllers\BankDetailsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\RefrrencesController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ApprovedController;
use App\Http\Controllers\LoanController;
use App\Models\Customer;
use App\Models\Document;
use App\Models\FormOffice;
use App\Models\Creditstage;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Route::get('/session-expired', function () {
//     return redirect()->route('login')->with('error', 'Your session has expired. Please log in again.');
// })->name('sessionExpired');

//for admin login and logout'
Route::post('/adminlogin',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);

// home
Route::get('/home',function()
{
    return view('home');
});
Route::get('/alluser',[UserController::class,'index'])->name('alluser');
Route::get('/adduser',[UserController::class,'create']);
Route::post('/adduser',[UserController::class,'store']);
Route::get('/user/edit/{id}',[UserController::class,'edit']);
Route::post('/user/update/{id}',[UserController::class,'update']);
Route::get('/user/delete/{id}',[UserController::class,'destroy']);

// Route::get('/user/delete/{id}',[UserController::class,'destroy'])->name('user.destroy');


    Route::get('/permission',[PermissionController::class,'index'])->name('allpermission');
    Route::get('/permission/add',[PermissionController::class,'create']);
    Route::post('/permission/add',[PermissionController::class,'store']);
    Route::get('/permission/edit/{id}',[PermissionController::class,'edit']);
    Route::post('/permission/update/{id}',[PermissionController::class,'update']);
    Route::get('/permission/delete/{id}',[PermissionController::class,'destroy']);

    //for role

    Route::get('/role',[RollController::class,'index'])->name('allroles');
    Route::get('/role/add',[RollController::class,'create']);
    Route::post('/role/add',[RollController::class,'store']);
    Route::get('/role/edit/{id}',[RollController::class,'edit']);
    Route::post('/role/update/{id}',[RollController::class,'update']);
    Route::get('/role/delete/{id}',[RollController::class,'destroy']);

    //main form
    Route::get('/office/add',[FormController::class,'create'])->name('officeuse');
    Route::post('/office/add',[FormController::class,'store']);

    //customer form
    Route::get('/customer/add',[CustomerController::class,'create'])->name('customeruse');
    Route::post('/customer/add',[CustomerController::class,'store']);

    //proprietor form
    Route::get('/proprietor/add',[ProprietorController::class,'create'])->name('proprietoruse');
    Route::post('/proprietor/add',[ProprietorController::class,'store']);

    //co_Customer form
    Route::get('/cocustomer/add',[CoCustomerController::class,'create'])->name('cocustomeruse'); /////
    Route::post('/cocustomer/add',[CoCustomerController::class,'store']);

    //remining partner
    Route::get('/rpartners/add',[RemainingPartnerController::class,'create'])->name('rpartnersuse');
    Route::post('/rpartners/add',[RemainingPartnerController::class,'store']);

    //bank detsils
    Route::get('/bankdetails/add',[BankDetailsController::class,'create'])->name('babkdetilssuse');
    Route::post('/bankdetails/add',[BankDetailsController::class,'store']);

    //reference details
    Route::get('/reference/add',[RefrrencesController::class,'create'])->name('referencesuse');
    Route::post('/reference/add',[RefrrencesController::class,'store']);

    //gete data from api
    Route::post('getpincodedetails', [FormController::class, 'getpincodedetails'])->name('getpincodedetails');
    Route::post('getstatecodedetails', [FormController::class, 'getStateCodeDetails'])->name('getstatecodedetails');

    //view application
    Route::get('viewappliation',[FormController::class,'viewapplication'])->name('viewapplication');
    // shivang add this 05-12-2024
    Route::get('viewappliation/{loanno}',[FormController::class,'viewapplicationfull'])->name('viewapplicationfull');
    Route::get('viewapplication/{id}',[FormController::class,'show']);
    Route::get('applicatipon/delete/{id}',[FormController::class,'destroy']);

    //pdf  application
    Route::get('viewpdf/{loan_id}',[FormController::class,'viewPdf'])->name('viewpdf');

    Route::get('download-pdf/{loan_id}', [FormController::class, 'downloadPDF'])->name('download.pdf');


    Route::get('document/add',[DocumentController::class,'create']);
    Route::post('document/add',[DocumentController::class,'store'])->name('add-document');
    Route::get('viewdocument',[DocumentController::class,'viewdocument'])->name('viewdocument');
    Route::get('viewdocument1/{id}',[DocumentController::class,'viewdocument1'])->name('viewdocument1');


    ///cam
    Route::get('cam/add',[CamController::class,'create']);
    Route::post('cam/add',[CamController::class,'store'])->name('add-cam');
    Route::get('viewcam',[CamController::class,'viewdocument'])->name('viewcam');
    Route::get('viewcam1/{id}',[CamController::class,'viewdocument1'])->name('viewcam1');


    Route::get('credit/add',[CamController::class,'creditcreate']);
    Route::post('credit/add',[CamController::class,'creditstore'])->name('add-credit');
    // Route::get('viewcredit',[CamController::class,'viewdocument'])->name('viewcredit');

    Route::get('/get-orignalcustomers/{loanId}', function ($loanId) {
        $customers = Customer::where('loan_id', $loanId)->get();
        $officedata = FormOffice::where('loan_id', $loanId)->first(); // shivang 29-
//  dd($customers);
        // //shivang 29-6-2024
        return response()->json([
            'customers' => $customers,
            'officedata' => $officedata
        ]);
        // return response()->json($customers);
    });

    Route::get('/get-creditdata/{loanId}', function ($loanId) {
        // dd($loanId);
        $creditdata = Creditstage::where('loan_id', $loanId)->first();
        // dd($creditdata);

        return response()->json($creditdata);
    });




    // Route::get('/get-customers/{loanId}', function ($loanId) {
    //     // Retrieve customers and proprietor details for the given loan ID
    //     $data = DB::table('customer_details')
    //         ->where('customer_details.loan_id', $loanId)
    //         ->join('proprietor_details', 'customer_details.cust_id', '=', 'proprietor_details.cust_id')
    //         ->select('customer_details.cust_id as customer_id', 'customer_details.cust_name as customer_name', 'proprietor_details.proprietor_name as proprietor_name', 'proprietor_details.proprietor_id as proprietor_id')
    //         ->get();


    //         $customers = [];
    // $proprietors = [];

    // foreach ($data as $item) {

    //     // Add customer details
    //     $customers[] = [
    //         'customer_id' => $item->customer_id,
    //         'customer_name' => $item->customer_name,
    //     ];

    //     // Add proprietor details
    //     $proprietors[] = [
    //         'proprietor_id' => $item->proprietor_id,
    //         'proprietor_name' => $item->proprietor_name,
    //     ];
    // }
    //     // dd($data);
    //     return response()->json([
    //         'customers' => $customers,
    //         'proprietors' => $proprietors,
    //     ]);

    // });
    Route::get('/get-customers/{loanId}', function ($loanId) {
        // Retrieve distinct customers with their corresponding proprietor details for the given loan ID
        $data = DB::table('customer_details')
            ->select(
                'customer_details.cust_id as customer_id',
                'customer_details.cust_name as customer_name',
                'proprietor_details.proprietor_name as proprietor_name',
                'proprietor_details.proprietor_id as proprietor_id'
            )
            ->where('customer_details.loan_id', $loanId)
            ->leftJoin('proprietor_details', 'customer_details.cust_id', '=', 'proprietor_details.cust_id')
            ->groupBy('customer_details.cust_id')
        ->groupBy('customer_details.cust_name')
        ->groupBy('proprietor_details.proprietor_name')
        ->groupBy('proprietor_details.proprietor_id')
            ->get();


        return response()->json($data);
    });



// fetch document data

    Route::get('/get-documents/{customerId}/{lonid1}', function ($customerId ,$lonid1) {

        $data = Document::where('proprietor_id', $customerId)->where('lon_id', $lonid1)->get();
    // dd($data);
        return response()->json($data);
    });

    // shivang 13-12-2024
    Route::get('/get-documentsmain/{docsid}', function ($docsid) {

        $data = Document::where('id', $docsid)->get();
    // dd($data);
        return response()->json($data);
    });



 // downlod document
Route::get('/download/bank-statement/{id}', [DocumentController::class,'downloadBankStatement'])->name('download.bank_statement');
Route::get('/download/salary-slip/{id}', [DocumentController::class,'downloadSalarySlip'])->name('download.salary_slip');
Route::get('/download/business_proof/{id}', [DocumentController::class,'downloadbusnessSlip'])->name('download.business_proof');
Route::get('/download/adresss_proof/{id}', [DocumentController::class,'downloadaddressSlip'])->name('download.adresss_proof');


Route::get('/download/camuplod/{id}', [CamController::class,'downloadCamuplod'])->name('download.cam_uplod');

// Route::get('viewDocumentlist/{customer_id}',[DocumentController::class,'viewDocumentlist'])->name('viewDocumentlist');
Route::get('viewDocumentlist/{customer_id}', [DocumentController::class, 'viewDocumentlist'])->name('viewDocumentlist');
Route::get('viewDocumentedit/{customer_id}', [DocumentController::class, 'viewDocumentedit'])->name('viewDocumentedit');
// shivang
Route::get('viewDocumenteditlast/{customer_id}', [DocumentController::class, 'viewDocumenteditlast'])->name('viewDocumenteditlast');

Route::post('document/update',[DocumentController::class,'updatestore'])->name('update-document');


//pdf  application
Route::get('viewpdf/{loan_id}',[FormController::class,'viewPdf'])->name('viewpdf');

Route::get('download-pdf/{loan_id}', [FormController::class, 'downloadPDF'])->name('download.pdf');
Route::get('/generate-pdf/{loan_id}', [PDFController::class,'generatePDF'])->name('generate.pdf');


// Credit data
// Route::post('creditsatage/add',[CamController::class,'addcreditstage'])->name('add-creditstage');



Route::post('creditsatage/add', [CamController::class, 'addcreditstage2'])->name('add-creditstage');




// approved stage ----shivnang 2-7-2024
Route::get('approved/add',[ApprovedController::class,'create'])->name('approved/add');

Route::get('approved/disbursal',[ApprovedController::class,'disbursal'])->name('approved/disbursal');
Route::get('viewapproved',[ApprovedController::class,'create'])->name('viewapproved');
Route::get('getloandata/{id}',[ApprovedController::class,'getloandata'])->name('getLoanData');

Route::get('getdisbursaldata/{id}',[ApprovedController::class,'getdisbursaldata'])->name('getdisbursaldata');
Route::get('getbankdata/{id}',[ApprovedController::class,'getbankdata'])->name('getbankdata');

Route::post('repayment-instrument',[ApprovedController::class,'store'])->name('repaymentinstrument');

Route::post('disbursal-details',[ApprovedController::class,'disbursalstore'])->name('disbursaldetails');

Route::get('/get-partners', [ApprovedController::class, 'getPartners'])->name('get.partners');
Route::post('/submit-form', [ApprovedController::class, 'adjustablestore'])->name('adjustable.store');


// Route::get('/loan/select/{id}', [LoanController::class, 'selectLoan']);
// Route::post('/loan/save', [LoanController::class, 'saveLoan'])->name('loan.save');
// Route::post('/loan/clearSession', [LoanController::class, 'clearSession'])->name('loan.clearSession');


// Route::get('/', [LoanController::class, 'index'])->name('loan.dashboard');
// Route::get('/loan/select/{loanId}', [LoanController::class, 'selectLoan']);
// Route::post('/loan/clearSession', [LoanController::class, 'clearSession'])->name('loan.clearSession');
// Route::post('/loan/save', [LoanController::class, 'save'])->name('loan.save');

// shivang 133-12-2024
Route::get('/view_bank_statement/{id}', [DocumentController::class, 'viewBankStatementmain'])->name('view.bank_statement_main');
Route::get('/view_salary_slip/{id}', [DocumentController::class, 'viewsalarymain'])->name('view.salary_main');
Route::get('/view_business_proof/{id}', [DocumentController::class, 'business_proofmain'])->name('view.business_proof');
Route::get('/view_adresss_proof/{id}', [DocumentController::class, 'adresss_proofmain'])->name('view.adresss_proof');
Route::get('/view_cam_upload/{id}', [CamController::class, 'camuploadmain'])->name('view.cam_uplod');






