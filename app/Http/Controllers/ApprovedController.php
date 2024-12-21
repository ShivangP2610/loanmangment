<?php

namespace App\Http\Controllers;

use App\Models\Adjustable;
use App\Models\BankDetails;
use App\Models\Customer;
use App\Models\FormOffice;
use App\Models\Repayment;
use App\Models\Creditstage;
use App\Models\Disbursal;
use App\Models\Proprietor;
use Illuminate\Http\Request;

class ApprovedController extends Controller
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
        $url = url('/approved/add');
        $title = 'Approved Upload';
        $btext = "Submit";
        $data = compact('url', 'title', 'btext');
// dd('shshshshshshshshs');


        // $creditdata = Creditstage::where('application', 'Approve')->first();
        // $loans  =  FormOffice::where('loan_id', $creditdata->loan_id)->get();
        // $customers = Customer::where('cust_id', $creditdata->cust__id)->get();
        // dd($creditdatamain);
        // return view('approved')->with(array_merge($data, ['loans' => $loans, 'customers' => $customers]));

        return view('approved')->with(array_merge($data));
    }


    public function disbursal()
    {
        $url = url('/approved/disbursal');
        $title = 'Approved Disbursal';
        $btext = "Submit";
        $data = compact('url', 'title', 'btext');

        // $creditdata = Creditstage::where('application', 'Approve')->first();
        // dd($creditdata);
        // $loans  =  FormOffice::where('loan_id', $creditdata->loan_id)->get();
        // $customers = Customer::where('cust_id', $creditdata->cust__id)->get();


        // dd($creditdatamain);
        // return view('disbursaldetails')->with(array_merge($data, ['loans' => $loans, 'customers' => $customers]));
        return view('disbursaldetails')->with(array_merge($data));
    }

    public function getloandata(string $id)
    {
        $creditdata = Creditstage::where('loan_id', $id)->get();
        $loans  =  FormOffice::where('loan_id', $id)->get();
        $repaymentdata = Repayment::where('loan_id', $id)->first();

        return response()->json([
            'creditdata' => $creditdata,
            'loans' => $loans,
            'repaymentdata' => $repaymentdata
        ]);
    }



    public function getdisbursaldata(string $id)
    {
        $creditdata = Creditstage::where('loan_id', $id)->get();
        $loans  =  FormOffice::where('loan_id', $id)->get();
        $bandetails  = BankDetails::where('loan_id', $id)->get();
        $banknames = BankDetails::where('loan_id', $id)->pluck('bank_name','account_id');
        $disbursalmaindata = Disbursal::where('loan_id', $id)->first();
        $adjustabledata = Adjustable::where('loan_id', $id)->get();
        $repaymentdata = Repayment::where('loan_id', $id)->get();

        return response()->json([
            'creditdata' => $creditdata,
            'loans' => $loans,
            'bankdetails' => $bandetails,
            'disbursal' => $disbursalmaindata,
            'adjustabledata' => $adjustabledata,
            'repaymentdata'  =>  $repaymentdata,
            'banknames'       => $banknames
        ]);
        // dd([
        //     'creditdata' => $creditdata,
        //     'loans' => $loans,
        //     'bankdetails' => $bandetails,
        //     'disbursal' => $disbursalmaindata,
        //     'adjustabledata' => $adjustabledata
        // ]);
    }

    // shivnag 12-12-2024
    public function getbankdata(string $id)
    {
        $bandetails  = BankDetails::where('account_id', $id)->get();
        return response()->json([
            'bankdetails' => $bandetails,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        // dd($request->all());

        // dd('ya re ya a aaagahgahahagh');
        // dd($request->all());
        $request->validate([
            'appication_amount' => 'required',
            // 'disbursaltype'    => 'required',
            // 'number_disbursals' => 'required',
            'sanctioned_amount' => 'required',
            'disbursal_to'      => 'required',
            'recovery_type'     => 'required',
            // 'recovery_sub_type' => 'required',
            'repayment_type'    => 'required',
            'repayment_frequency' => 'required',
            'tenure'              => 'required',
            'tenure_in'           => 'required',
            'installment_type'    => 'required',
            'installment_base_on' => 'required',
            'installment_mode'    => 'required',
            'number_of_adva_installment' => 'required',
            'total_number_of_installment' => 'required',
            'policy_rate'                 => 'required',
            'rate'                        => 'required',
            'spread'                      => 'required',
            'due_day'                     => 'required',
            // 'interest_startdate'          => 'required',
            'first_installment_date'      => 'required',
            'brokan_prd_adjust'           => 'required',
            // 'interest_charge_type'        => 'required',
            // 'interest_charged'            => 'required',
            // 'actual_date'                 => 'required'
        ]);

        $repaymentdata = Repayment::find($request->loanidmain);
        if (!$repaymentdata) {
            $payment_data = new Repayment;
            $payment_data->loan_id = $request->loanidmain;
            $payment_data->cust_id = $request->custidmain;
            $payment_data->application_amount = $request->appication_amount;
            // $payment_data->disbursal_type = $request->disbursaltype;
            $payment_data->sanctioned_amount = $request->sanctioned_amount;


            // $payment_data->number_od_disbursal = $request->number_disbursals;
            $payment_data->disbursal_to = $request->disbursal_to;
            $payment_data->recovery_type = $request->recovery_type;
            // $payment_data->recovery_sub_type = $request->recovery_sub_type;
            $payment_data->repayment_type = $request->repayment_type;
            $payment_data->repayment_frequency = $request->repayment_frequency;
            $payment_data->tenure = $request->tenure;
            $payment_data->tenure_in = $request->tenure_in;
            $payment_data->installment_type = $request->installment_type;
            $payment_data->installment_based_on = $request->installment_base_on;
            $payment_data->installment_mode = $request->installment_mode;
            $payment_data->number_of_advance_installment = $request->number_of_adva_installment;
            $payment_data->total_number_of_installment = $request->total_number_of_installment;
            $payment_data->policy_rate    = $request->policy_rate;
            $payment_data->rate = $request->rate;
            $payment_data->spread = $request->spread;
            $payment_data->due_day = $request->due_day;
            // $payment_data->interest_startdate = $request->interest_startdate;
            $payment_data->first_installment_date = $request->first_installment_date;
            $payment_data->broken_period_adjustment = $request->brokan_prd_adjust;
            $payment_data->till_date = $request->till_installment_date;
            $payment_data->days_num = $request->days_num;
            $payment_data->brk_charge =  $request->brk_charge;
            $payment_data->ads_charge =  $request->ads_charge;
            $payment_data->rem_final_amount =  $request->rem_final_amount;
            $payment_data->advance_installment_to_be_deducted =  $request->advance_installment_to_be_deducted;  
            $payment_data->instal_amount =  $request->instal_amount;
            $payment_data->total_interst =  $request->total_interst;




            // $payment_data->interest_charge_type = $request->interest_charge_type;
            // $payment_data->interest_charged = $request->interest_charged;
            // $payment_data->actual_date = $request->actual_date;

            // Save the new record to the database
            $payment_data->save();

            return redirect()->back()->with('success', 'Repayment Added successfully.');
        } else {
            $repaymentdata->application_amount = $request->appication_amount;
            // $repaymentdata->disbursal_type = $request->disbursaltype;

            $repaymentdata->sanctioned_amount = $request->sanctioned_amount;
            // $repaymentdata->number_od_disbursal = $request->number_disbursals;
            $repaymentdata->disbursal_to = $request->disbursal_to;
            $repaymentdata->recovery_type = $request->recovery_type;
            // $repaymentdata->recovery_sub_type = $request->recovery_sub_type;
            $repaymentdata->repayment_type = $request->repayment_type;
            $repaymentdata->repayment_frequency = $request->repayment_frequency;
            $repaymentdata->tenure = $request->tenure;
            $repaymentdata->tenure_in = $request->tenure_in;
            $repaymentdata->installment_type = $request->installment_type;
            $repaymentdata->installment_based_on = $request->installment_base_on;
            $repaymentdata->installment_mode = $request->installment_mode;
            $repaymentdata->number_of_advance_installment = $request->number_of_adva_installment;
            $repaymentdata->total_number_of_installment = $request->total_number_of_installment;
            $repaymentdata->policy_rate    = $request->policy_rate;
            $repaymentdata->rate = $request->rate;
            $repaymentdata->spread = $request->spread;
            $repaymentdata->due_day = $request->due_day;
            // $repaymentdata->interest_startdate = $request->interest_startdate;
            $repaymentdata->first_installment_date = $request->first_installment_date;
            $repaymentdata->broken_period_adjustment = $request->brokan_prd_adjust;
            // $repaymentdata->till_installment_date = $request->till_date;
            $repaymentdata->till_date = $request->till_installment_date;
            $repaymentdata->days_num = $request->days_num;
            $repaymentdata->brk_charge =  $request->brk_charge;
            $repaymentdata->ads_charge =  $request->ads_charge;
            $repaymentdata->rem_final_amount =  $request->rem_final_amount;
            $repaymentdata->advance_installment_to_be_deducted =  $request->advance_installment_to_be_deducted; 
            $repaymentdata->instal_amount =  $request->instal_amount;
            $repaymentdata->total_interst =  $request->total_interst;



            // $repaymentdata->interest_charge_type = $request->interest_charge_type;
            // $repaymentdata->interest_charged = $request->interest_charged;
            // $repaymentdata->actual_date = $request->actual_date;
            $repaymentdata->save();

            return redirect()->back()->with('success', 'Repayment Updated successfully.');
        }
    }


    public function disbursalstore(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'sanction_amount' => 'required',
            'sanction_date'  => 'required',
            'tenure' => 'required',
            'roi' => 'required',
            // 'app_disbursal_amount' => 'required',
            // 'app_adjustment_amount' => 'required',
            'disbursal_type'  => 'required',
            // 'application_status' => 'required',
            // 'disbursal_date'  => 'required',
            // 'effective_payment_date'   => 'required',
            'payment_mode'    => 'required',
            // 'business_partner_type' => 'required',
            'beneficiary_name'    => 'required',
            'business_acccount_type' => 'required',
            'beneficiary_account_number' => 'required',
            // 'bankvalidation'   => 'required',
            // 'bankdealing'      => 'required',
            'bankcode'      => 'required',
            'bankName'     => 'required',
            'branch'      => 'required',
            // 'location'   => 'required',


        ]);


        $disbursal_data = Disbursal::find($request->loanidmain);
        // dd($disbursal_data );
        if (!$disbursal_data) {
            if ($request->applicant_type == 'BORROWER') {
                $id = $request->partner_name;
                //    $name = Customer::find($id)->select('cust_name');
                $name = Customer::where('cust_id', $id)->pluck('cust_name')->first();
            } else {
                $id = $request->partner_name;
                // $name = Proprietor::find($id)->select('proprietor_name');
                // $name = Proprietor::where('proprietor_id', $id)->pluck('proprietor_name')->first();
            }
            // dd($name);
            $payment_data = new Disbursal;
            $payment_data->loan_id = $request->loanidmain;
            $payment_data->cust_id = $request->custidmain;
            $payment_data->sanction_amount = $request->sanction_amount;
            $payment_data->sanction_date = $request->sanction_date;
            $payment_data->tenure = $request->tenure;
            $payment_data->roi = $request->roi;
            $payment_data->app_disbursal_amount = $request->app_disbursal_amount;
            $payment_data->app_adjustment_amount = $request->app_adjustment_amount;
            $payment_data->disbursal_type = $request->disbursal_type;
            $payment_data->application_status = $request->application_status;
            $payment_data->loan_account_number = $request->loan_account_number;
            $payment_data->disbursal_date = $request->disbursal_date;
            $payment_data->disbursal_amount = $request->disbursal_amount;
            $payment_data->adjustment_amount = $request->adjustment_amount;
            $payment_data->actual_payment_amount = $request->actual_payment_amount;

            $payment_data->bussiness_partner_type = $request->applicant_type;
            // $payment_data->bussiness_partner_name_appant_id = $request->partner_name;
            $payment_data->bussiness_partner_name_appant_name = $request->partner_name;;
            $payment_data->bussiness_disbursal_amount    = $request->bussiness_disbursal_amount;
            $payment_data->bussiness_adjustment_amount = $request->bussiness_adjustment_amount;
            $payment_data->payment_amount = $request->payment_amount;
            $payment_data->effective_payment_date = $request->effective_payment_date;
            $payment_data->payment_mode = $request->payment_mode;
            // $payment_data->business_partner_type = $request->business_partner_type;
            $payment_data->beneficiary_name = $request->beneficiary_name;
            $payment_data->business_acccount_type = $request->business_acccount_type;
            $payment_data->beneficiary_account_number = $request->beneficiary_account_number;
            // $payment_data->bankvalidation = $request->bankvalidation;
            // $payment_data->bankdealing = $request->bankdealing;
            $payment_data->bankcode = $request->bankcode;
            $payment_data->bankName = $request->bankName;
            $payment_data->branch = $request->branch;
            // $payment_data->location = $request->location;
            // $FormOffice = FormOffice::where('loan_id', $request->loanidmain)->first();
            // // dd($FormOffice);
            // $lonaccountnumber = $FormOffice->Prospect_No;
            // $payment_data->loan_account_number = $lonaccountnumber;
            //  dd($request->all());
            // Save the new record to the database
            $payment_data->save();
            session()->forget('mainloan_id');
            // return redirect()->back()->with('success', 'Disbursal Added successfully.');
            return redirect('home')->with('success', 'Disbursal Added successfully.');
        } else {



            if ($request->applicant_type == 'BORROWER') {
                $id = $request->partner_name;
                //    $name = Customer::find($id)->select('cust_name');
                $name = Customer::where('cust_id', $id)->pluck('cust_name')->first();
            } else {
                $id = $request->partner_name;
                // $name = Proprietor::find($id)->select('proprietor_name');
                $name = Proprietor::where('proprietor_id', $id)->pluck('proprietor_name')->first();
            }
            $disbursal_data->sanction_amount = $request->sanction_amount;
            $disbursal_data->sanction_date = $request->sanction_date;
            $disbursal_data->tenure = $request->tenure;
            $disbursal_data->roi = $request->roi;
            $disbursal_data->app_disbursal_amount = $request->app_disbursal_amount;
            $disbursal_data->app_adjustment_amount = $request->app_adjustment_amount;
            $disbursal_data->disbursal_type = $request->disbursal_type;
            $disbursal_data->application_status = $request->application_status;
            $disbursal_data->loan_account_number = $request->loan_account_number;
            $disbursal_data->disbursal_date = $request->disbursal_date;
            $disbursal_data->disbursal_amount = $request->disbursal_amount;
            $disbursal_data->adjustment_amount = $request->adjustment_amount;
            $disbursal_data->actual_payment_amount = $request->actual_payment_amount;

            $disbursal_data->bussiness_partner_type = $request->applicant_type;

            // $disbursal_data->bussiness_partner_name_appant_id = $request->partner_name;

            $disbursal_data->bussiness_partner_name_appant_name = $request->partner_name;;
            $disbursal_data->bussiness_disbursal_amount = $request->bussiness_disbursal_amount;
            $disbursal_data->bussiness_adjustment_amount = $request->bussiness_adjustment_amount;
            $disbursal_data->payment_amount = $request->payment_amount;
            $disbursal_data->effective_payment_date = $request->effective_payment_date;
            $disbursal_data->payment_mode = $request->payment_mode;
            // $disbursal_data->business_partner_type = $request->business_partner_type;
            $disbursal_data->beneficiary_name = $request->beneficiary_name;
            $disbursal_data->business_acccount_type = $request->business_acccount_type;
            $disbursal_data->beneficiary_account_number = $request->beneficiary_account_number;
            // $disbursal_data->bankvalidation = $request->bankvalidation;
            // $disbursal_data->bankdealing = $request->bankdealing;
            $disbursal_data->bankcode = $request->bankcode;
            $disbursal_data->bankName = $request->bankName;
            $disbursal_data->branch = $request->branch;
            // $disbursal_data->location = $request->location;
            $disbursal_data->save();

            session()->forget('mainloan_id'); 
            // return redirect()->back()->with('success', 'Disbursal Updated successfully.');
            return redirect('home')->with('success', 'Disbursal Added successfully.');
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

    // public function getPartners(Request $request)
    // {
    //     $type = $request->type;

    //     if ($type === 'BORROWER') {

    //         $partners = Customer::select('loan_id', 'cust_name')->get();
    //         // dd( $partners);
    //     } elseif ($type === 'CO-BORROWER') {
    //         $partners = Proprietor::select('id', 'name')->get();
    //     } else {
    //         return response()->json(['error' => 'Invalid type'], 400);
    //     }

    //     return response()->json($partners);
    // }

    public function getPartners(Request $request)
    {
        $type = $request->type; // Applicant type: BORROWER or CO-BORROWER
        $loanId = $request->loan_id; // Loan ID
        $customerId = $request->customer_id; // Customer ID
        // dd($customerId);
        // Validate input
        if (!$loanId || !$customerId || !$type) {
            return response()->json(['error' => 'Invalid input data'], 400);
        }

        // Fetch based on applicant type
        if ($type === 'BORROWER') {
            // Get borrowers linked to the given loan and customer
            $partners = Customer::where('loan_id', $loanId)
                ->where('cust_id', $customerId)
                // ->select('cust_id', 'cust_name')
                ->select('cust_id as id', 'cust_name as name')
                ->get();
            // dd(  $partners);
        } elseif ($type === 'CO-BORROWER') {
            // Get co-borrowers (proprietors) associated with the given loan and customer
            $partners = Proprietor::where('loan_id', $loanId)
                ->where('cust_id', $customerId) // Assuming this links Proprietors to Customers
                // ->select('proprietor_id', 'proprietor_name')
                ->select('proprietor_id as id', 'proprietor_name as name')
                ->get();
            // dd($partners);
        } else {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        return response()->json($partners);
    }


    // public function adjustablestore(Request $request)
    // {
    //     // Validate the request
    //     // dd($request->all());
    //     $request->validate([
    //         'charges_details' => 'required|array',
    //         'percentage' => 'array',
    //         'amount' => 'array',
    //     ]);


    //     // $totalAdjustmentAmount = 0;

    //     // Loop through the input arrays and save each row in the database
    //     foreach ($request->charges_details as $index => $charges_detail) {
    //         if (!empty($charges_detail) && $request->amount[$index] != null) {
    //             Adjustable::create([
    //                 'loan_id' => $request->loan_id,
    //                 'cust_id' => $request->customer_id,
    //                 'charges_detail' => $charges_detail,
    //                 'percentage' => $request->percentage[$index] ?? null,
    //                 'amount' => $request->amount[$index] ?? null,
    //                 'total_amount' => $request->total_amount ?? null,
    //             ]);

    //             // $totalAdjustmentAmount += $request->amount[$index];
    //         }
    //     }


    //     $disbursal = Disbursal::where('loan_id', $request->loan_id)
    //         ->where('cust_id', $request->customer_id)
    //         ->first();

    //         $sanction_amount = $disbursal->sanction_amount;
    //         $adjustment_amount = $request->total_amount;
    //         $disbursalmainamount =   $sanction_amount - $adjustment_amount;


    //     if ($disbursal) {
    //         // Update the Disbursal model's fields
    //         $disbursal->app_disbursal_amount = $disbursalmainamount;
    //         $disbursal->app_adjustment_amount = $request->total_amount;
    //         $disbursal->disbursal_amount =  $disbursalmainamount;
    //         $disbursal->adjustment_amount = $request->total_amount;
    //         $disbursal->bussiness_disbursal_amount =  $disbursalmainamount;
    //         $disbursal->bussiness_adjustment_amount =  $request->total_amount;
    //         $disbursal->payment_amount =  $disbursalmainamount;
    //         $disbursal->actual_payment_amount =  $disbursalmainamount;
    //         $disbursal->save();
    //     }

    //     return redirect()->back()->with('success', 'Data has been saved successfully!');
    // }


    public function adjustablestore(Request $request)
    {
        // Validate the request
        $request->validate([
            'charges_details' => 'required|array',
            'percentage' => 'array',
            'amount' => 'array',
        ]);

        // dd($request->all());
        // Loop through the input arrays and save or update each row in the database
        foreach ($request->charges_details as $index => $charges_detail) {
            if (!empty($charges_detail) && $request->amount[$index] != null) {
                // Check if the adjustable entry already exists with the same loan_id and cust_id
                $adjustable = Adjustable::where('loan_id', $request->loan_id)
                    ->where('cust_id', $request->customer_id)
                    ->where('charges_detail', $charges_detail)
                    ->first();

                // If record exists, update it, else create a new record
                if ($adjustable) {
                    // Update the existing record
                    $adjustable->update([
                        'percentage' => $request->percentage[$index] ?? null,
                        'amount' => $request->amount[$index] ?? null,
                        'total_amount' => $request->total_amount ?? null,
                    ]);
                } else {
                    // Create a new record if it doesn't exist
                    Adjustable::create([
                        'loan_id' => $request->loan_id,
                        'cust_id' => $request->customer_id,
                        'charges_detail' => $charges_detail,
                        'percentage' => $request->percentage[$index] ?? null,
                        'amount' => $request->amount[$index] ?? null,
                        'total_amount' => $request->total_amount ?? null,
                    ]);
                }
            }
        }

        // Retrieve the Disbursal record to update it
        $disbursal = Disbursal::where('loan_id', $request->loan_id)
            ->where('cust_id', $request->customer_id)
            ->first();

        if ($disbursal) {
            // Get sanction amount and total adjustment amount
            $sanction_amount = $disbursal->sanction_amount;
            $adjustment_amount = $request->total_amount;
            $disbursalmainamount = $sanction_amount - $adjustment_amount;

            // Update the Disbursal model's fields
            $disbursal->app_disbursal_amount = $disbursalmainamount;
            $disbursal->app_adjustment_amount = $request->total_amount;
            $disbursal->disbursal_amount = $disbursalmainamount;
            $disbursal->adjustment_amount = $request->total_amount;
            $disbursal->bussiness_disbursal_amount = $disbursalmainamount;
            $disbursal->bussiness_adjustment_amount = $request->total_amount;
            $disbursal->payment_amount = $disbursalmainamount;
            $disbursal->actual_payment_amount = $disbursalmainamount;
            $disbursal->save();
        }

        // Return success response
        // return redirect()->back()->with('success', 'Data has been saved successfully!');

        return response()->json([
            'success' => true,
            'message' => 'Data has been saved successfully!',
            // 'total_amount' => $totalAdjustmentAmount,
        ]);

    }
}
