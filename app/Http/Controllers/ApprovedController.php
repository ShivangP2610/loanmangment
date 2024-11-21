<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\FormOffice;
use App\Models\Repayment;
use App\Models\Creditstage;
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

        $creditdata = Creditstage::where('application', 'Approve')->first();
        $loans  =  FormOffice::where('loan_id',$creditdata->loan_id)->get();
        $customers = Customer::where('cust_id',$creditdata->cust__id)->get();


        // dd($creditdatamain);
        return view('approved')->with(array_merge($data, ['loans' => $loans, 'customers' => $customers]));
    }

    public function getloandata(string $id)
    {
        $creditdata = Creditstage::where('loan_id',$id)->get();
        $loans  =  FormOffice::where('loan_id',$id)->get();
        $repaymentdata = Repayment::where('loan_id',$id)->first();

        return response()->json([
            'creditdata' => $creditdata,
            'loans' => $loans,
            'repaymentdata' => $repaymentdata
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'appication_amount' => 'required',
             'disbursaltype'    => 'required',
             'number_disbursals' => 'required',
             'disbursal_to'      => 'required',
             'recovery_type'     => 'required',
             'recovery_sub_type' => 'required',
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
             'interest_startdate'          => 'required',
             'first_installment_date'      => 'required',
             'brokan_prd_adjust'           => 'required',
             'interest_charge_type'        => 'required',
             'interest_charged'            => 'required',
             'actual_date'                 => 'required'
        ]);

         $repaymentdata = Repayment::find($request->loanidmain);
         if(!$repaymentdata)
         {
            $payment_data = new Repayment;
            $payment_data->loan_id = $request->loanidmain;
            $payment_data->cust_id = $request->custidmain;
            $payment_data->application_amount = $request->appication_amount;
            $payment_data->disbursal_type = $request->disbursaltype;
            $payment_data->number_od_disbursal = $request->number_disbursals;
            $payment_data->disbursal_to = $request->disbursal_to;
            $payment_data->recovery_type = $request->recovery_type;
            $payment_data->recovery_sub_type = $request->recovery_sub_type;
            $payment_data->repayment_type = $request->repayment_type;
            $payment_data->repayment_frequency = $request->repayment_frequency;
            $payment_data->tenure = $request->tenure;
            $payment_data->tenure_in = $request->tenure_in;
            $payment_data->installment_type = $request->installment_type;
            $payment_data->installment_based_on = $request->installment_base_on;
            $payment_data->installment_mode = $request->installment_mode;
            $payment_data->number_of_advance_installment = $request->number_of_adva_installment;
            $payment_data->total_number_of_installment = $request->total_number_of_installment;
            $payment_data->policy_rate	= $request->policy_rate;
            $payment_data->rate = $request->rate;
            $payment_data->spread = $request->spread;
            $payment_data->due_day = $request->due_day;
            $payment_data->interest_startdate = $request->interest_startdate;
            $payment_data->first_installment_date = $request->first_installment_date;
            $payment_data->broken_period_adjustment = $request->brokan_prd_adjust;
            $payment_data->interest_charge_type = $request->interest_charge_type;
            $payment_data->interest_charged = $request->interest_charged;
            $payment_data->actual_date = $request->actual_date;

            // Save the new record to the database
            $payment_data->save();

            return redirect()->back()->with('success', 'Repayment Added successfully.');

         }
         else
         {
            $repaymentdata->application_amount = $request->appication_amount;
            $repaymentdata->disbursal_type = $request->disbursaltype;
            $repaymentdata->number_od_disbursal = $request->number_disbursals;
            $repaymentdata->disbursal_to = $request->disbursal_to;
            $repaymentdata->recovery_type = $request->recovery_type;
            $repaymentdata->recovery_sub_type = $request->recovery_sub_type;
            $repaymentdata->repayment_type = $request->repayment_type;
            $repaymentdata->repayment_frequency = $request->repayment_frequency;
            $repaymentdata->tenure = $request->tenure;
            $repaymentdata->tenure_in = $request->tenure_in;
            $repaymentdata->installment_type = $request->installment_type;
            $repaymentdata->installment_based_on = $request->installment_base_on;
            $repaymentdata->installment_mode = $request->installment_mode;
            $repaymentdata->number_of_advance_installment = $request->number_of_adva_installment;
            $repaymentdata->total_number_of_installment = $request->total_number_of_installment;
            $repaymentdata->policy_rate	= $request->policy_rate;
            $repaymentdata->rate = $request->rate;
            $repaymentdata->spread = $request->spread;
            $repaymentdata->due_day = $request->due_day;
            $repaymentdata->interest_startdate = $request->interest_startdate;
            $repaymentdata->first_installment_date = $request->first_installment_date;
            $repaymentdata->broken_period_adjustment = $request->brokan_prd_adjust;
            $repaymentdata->interest_charge_type = $request->interest_charge_type;
            $repaymentdata->interest_charged = $request->interest_charged;
            $repaymentdata->actual_date = $request->actual_date;
            $repaymentdata->save();

            return redirect()->back()->with('success', 'Repayment Updated successfully.');
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
}
