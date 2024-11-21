@push('title')
<title>Approved Form</title>
@endpush
@extends("layout.main")

@section('main-section')
 <style>
.visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    margin: -1px;
    padding: 0;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}

 </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>

    <div class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="row">

                <div class="col-lg-12">
                    <form action="{{ route('add-credit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 d-flex justify-content-between">
                            <div>
                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{$title}}</h6>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="lon_id" class="text-nowrap">Loan:</label>
                                    <select class="form-control loan_id" id="lon_id" name="lon_id">
                                        <option value="" disabled selected>Select a loan</option>
                                        @foreach ($loans as $loan)
                                            <option value="{{ $loan->loan_id }}">{{ $loan->Prospect_No }}</option>
                                        @endforeach
                                    </select>
                                    @error('lon_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="customer_id" class="text-nowrap">Customer:</label>
                                    <select class="form-control" id="customer_id" name="customer_id">
                                        <option value="" disabled selected>Select a customer</option>
                                        </select>
                                    @error('customer_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">{{$btext}}</button>
                                <button type="Reset" class="btn btn-primary">Reset</button>

                           </div> --}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                {{-- <h6 style="font-weight: 700">Example Table</h6> --}}
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Disbursal Details</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Repayment Instrument Details</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                    {{-- start for Disbural data --}}
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                        {{-- appication detilas --}}
                        <div class="table-responsive">
                            <table class="table table1">
                                <thead>
                                    <h5 class="mt-2 mb-2">Application Details</h5>
                                <tr>
                                    <th class="text-nowrap" style="font-size: 14px !important">Sanctioned Amount</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">Sanctioned Date</th>
                                    {{-- <th class="text-nowrap" style="font-size: 14px !important">Available Amount</th> --}}
                                    {{-- <th class="text-nowrap" style="font-size: 14px !important">Maximum Sanctioned Amount</th> --}}
                                    <th class="text-nowrap" style="font-size: 14px !important">Tenure</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">ROI</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">Disbursal Amount</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">Disbursal Type</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">Application Status</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">Loan Account Number</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-nowrap" style="text-align: center">50000</td>
                                    <td class="text-nowrap" style="text-align: center">2-7-2024</td>
                                    {{-- <td class="text-nowrap" style="text-align: center">45000</td> --}}
                                    {{-- <td class="text-nowrap" style="text-align: center">48000</td> --}}
                                    <td class="text-nowrap" style="text-align: center">12</td>
                                    <td class="text-nowrap" style="text-align: center">19.50% </td>
                                    <td class="text-nowrap" style="text-align: center">0</td>
                                    <td class="text-nowrap" style="text-align: center">Single</td>
                                    <td class="text-nowrap" style="text-align: center">Not Disbursed</td>
                                    <td class="text-nowrap" style="text-align: center">N/A</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                         {{--disbursal details  --}}
                         {{-- <div class="table-responsive">
                            <table class="table table1">
                                <thead>
                                    <h5 class="mt-2 mb-2">Disbursal Details</h5>
                                <tr>
                                    <th class="text-nowrap" style="font-size: 14px !important">Agreement Booklet Serial No</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">Lan To Be Linked</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">Loan Curtailment</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">Remark</th>
                                    <th class="text-nowrap" style="font-size: 14px !important">View Details</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <textarea id="w3review" name="w3review" rows="1" cols="30" class="form-control">
                                                At w3schools.com you will learn how to make a website.
                                            </textarea>
                                        </div>

                                    </td>
                                    <td class="text-nowrap"><input type="checkbox" class="bg-red"></td>
                                    <td class="text-nowrap"><i class="fa fa-comment"></i></td>
                                    <td>
                                        <i class="fa fa-eye"></i></br><a href="">View Details</a>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                         </div>    --}}

                        {{-- disbursal entry --}}
                        <div class="table-responsive">
                            <table class="table table1">
                                <thead>
                                    <h5 class="mt-2 mb-2">Disbursal Entry</h5>
                                    <tr>
                                        <th class="text-nowrap"><input type="checkbox" name="" id=""></th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Entry No</th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Disbursal Date</th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Disbursal Amount</th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Adjustment Amount</th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Actual Payment Amount</th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td >
                                        <i class="fa-solid fa-angle-up"></i> <a href="">Payee Details</a>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" readonly>
                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                          </div>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">INR<i class="fa-solid fa-chevron-down ms-1"></i></span>
                                            <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" readonly>
                                          </div>
                                    </td>

                                    <td>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">INR<i class="fa-solid fa-chevron-down ms-1"></i></span>
                                            <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" readonly>
                                          </div>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">INR<i class="fa-solid fa-chevron-down ms-1"></i></span>
                                            <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" readonly>
                                          </div>
                                    </td>
                                    <td class="text-nowrap">
                                        <i class="fa fa-eye"></i><br> <a href="">View Entry Details</a>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>

                        {{--  --}}

                        {{-- Payee Details --}}

                        <div class="table-responsive">
                            <table class="table table1">
                                <thead>
                                    <h5 class="mt-2 mb-2">Payee Details</h5>
                                    <tr>
                                        <th class="text-nowrap" style="font-size: 14px !important">Bussiness Partner Type<br>Applicant Type</th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Bussiness Partner Name<br>Applicant Name</th>
                                        <th class="text-nowrap" style="font-size: 14px !important;">Disbursal Amount (Amount)</th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Adjustment Amount (Amount)</th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Payment Amount (Amount)</th>
                                        {{-- <th class="text-nowrap" style="font-size: 14px !important">Credit Period</th> --}}
                                        <th class="text-nowrap" style="font-size: 14px !important">Effective Payment Date</th>
                                        <th class="text-nowrap" style="font-size: 14px !important">Payment Mode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-select form-control" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
                                        </td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" style="white-space: nowrap;">INR<i class="fa-solid fa-chevron-down ms-1"></i></span>
                                                <input type="text" class="form-control"  aria-label="Disbursal Amount" readonly>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" style="white-space: nowrap;">INR<i class="fa-solid fa-chevron-down ms-1"></i></span>
                                                <input type="text" class="form-control"  aria-label="Adjustment Amount" readonly>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" style="white-space: nowrap;">INR<i class="fa-solid fa-chevron-down ms-1"></i></span>
                                                <input type="text" class="form-control"  aria-label="Payment Amount" readonly>
                                            </div>
                                        </td>
                                        {{-- <td>
                                            <input class="form-control" type="text" placeholder="Default input" aria-label="Credit Period" readonly>
                                        </td> --}}
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" aria-label="Effective Payment Date" readonly>
                                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <select class="form-select form-control" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="check">Check</option>
                                                <option value="rtgs_neft">Rtgs/Neft</option>
                                                <option value="transfer_exi_account">Transfer Existing Account</option>
                                            </select><br>
                                            <i class="fa-solid fa-chevron-down"></i> <a href="">Patment Details</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        {{-- Payment Details --}}
                        <div class="table-responsive">
                            <table class="table table1">
                                <thead>
                                    <h5 class="mt-2 mb-2">Payment Details</h5>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="businessPartnerType">Business Partner Type</label>
                                                <select id="businessPartnerType" class="form-select mt-1 form-control" aria-label="Default select example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="beneficiaryName">Beneficiary Name</label>
                                                <input id="beneficiaryName" class="form-control mt-1" type="text" placeholder="Default input" aria-label="default input example" readonly>
                                            </div>
                                        </td>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="businessacccountType">Beneficiary Account Type</label>
                                                <select id="businessacccountType" class="form-select mt-1 form-control" aria-label="Default select example">
                                                    {{-- <option selected>Open this select menu</option> --}}
                                                    {{-- <option value="savong">Saving</option> --}}
                                                    <option value="cc">CC</option>
                                                    <option value="od">OD</option>

                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="beneficiaryAccountNumber">Beneficiary Account Number</label>
                                                <input id="beneficiaryAccountNumber" class="form-control mt-1" type="text" placeholder="Default input" aria-label="default input example" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="bankvalidation">Bank Validation Status</label>
                                                <input id="bankvalidation" class="form-control mt-1" type="text" placeholder="Default input" aria-label="default input example" readonly>
                                            </div>
                                        </td>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="bankdealing">Dealing Bank</label>
                                                <input id="bankdealing" class="form-control mt-1" type="text" placeholder="Default input" aria-label="default input example" readonly>
                                            </div>
                                        </td>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="bankcode">IFSC Code</label>
                                                <input id="bankcode" class="form-control mt-1" type="text" placeholder="Default input" aria-label="default input example" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="bankName">Bank</label>
                                                <input id="bankName" class="form-control mt-1" type="text" placeholder="Default input" aria-label="default input example" readonly>
                                            </div>
                                        </td>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="beneficiarybranch">Branch</label>
                                                <input id="beneficiarybranch" class="form-control mt-1" type="text" placeholder="Default input" aria-label="default input example" readonly>
                                            </div>
                                        </td>
                                        <td class="col-3">
                                            <div class="form-group">
                                                <label for="benklocation">Banking Location</label>
                                                <input id="benklocation" class="form-control mt-1" type="text" placeholder="Default input" aria-label="default input example" readonly>
                                            </div>
                                        </td>
                                        {{-- <td class="col-3" style="padding: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="igmorepayment">
                                                <label class="form-check-label" for="igmorepayment">
                                                  Ignore For Payment
                                                </label>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align: end;">
                                            <i class="fa-solid fa-building-columns" style="margin-right:5px;"></i><a href="">View Bank Details</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    {{-- end for Disbural data --}}

                    {{-- start for repaytment data --}}
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                       <h6 class="mt-4">All Fields | <span style="color:blue;">Required </span><span style="color:red;font-size:14px;">*</span></h6>

                        {{-- Payment Details --}}
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <form action="{{ route('repaymentinstrument')}}" method="POST">
                                                @csrf

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="applicationamount">Application Amount</label>
                                                        <div class="input-group mb-3">
                                                                        <span class="input-group-text">INR<i class="fa-solid fa-chevron-down ms-1"></i></span>
                                                            <input type="text" class="form-control" id="appication_amount" name="appication_amount" aria-label="Dollar amount (with dot and two decimal places)" readonly>
                                                            <input type="text" class="form-control" id="loanidmain" name="loanidmain" aria-label="Dollar amount (with dot and two decimal places)" hidden>
                                                            <input type="text" class="form-control" id="custidmain" name="custidmain" aria-label="Dollar amount (with dot and two decimal places)" hidden>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="disbursalType">Disbursal Type</label><br>
                                                        <select id="disbursalType" class="form-select mt-1 form-control" aria-label="Default select example" name="disbursaltype">
                                                            <option selected>Open this select menu</option>
                                                            <option value="One">One</option>
                                                            <option value="Two">Two</option>
                                                            <option value="Three">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="numberdisbursal">Number Of Disbursals</label>
                                                        <input id="numberdisbursal" class="form-control mt-1" type="text" name="number_disbursals" placeholder="Default input" aria-label="default input example">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="disbursalTo">Disbursal To</label>
                                                        <select id="disbursalTo" class="form-select mt-1 form-control" aria-label="Default select example" name="disbursal_to">
                                                            <option selected>select</option>
                                                            <option value="Customer">Customer</option>
                                                            <option value="Dealer">Dealer</option>
                                                            <option value="Seller">Seller</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="Recovery_Type">Recovery Type</label><br>
                                                        <select id="Recovery_Type" class="form-select mt-1 form-control" aria-label="Default select example" name="recovery_type">
                                                            <option selected>select</option>
                                                            <option value="Installment">Installment</option>
                                                            <option value="Interest">Interest</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="Recovery_Sub_Type">Recovery Sub Type</label>
                                                        <select id="Recovery_Sub_Type" class="form-select mt-1 form-control" aria-label="Default select example" name="recovery_sub_type">
                                                            <option selected>select</option>
                                                            <option value="Revolving">Revolving</option>
                                                            <option value="Non_Revolving">Non Revolving</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="Repayment_type">Repayment Type</label>
                                                        <select id="Repayment_type" class="form-select mt-1 form-control" aria-label="Default select example" name="repayment_type">
                                                            <option selected>select</option>
                                                            <option value="Principal_interest">Principal + Interest</option>
                                                            <option value="Only_Principal">Only Principal</option>
                                                            <option value="Only_Interest">Only Interest</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="Repayment_Frequency">Repayment Frequency</label>
                                                        <select id="Repayment_Frequency" class="form-select mt-1 form-control" aria-label="Default select example" name="repayment_frequency">
                                                            <option selected>select</option>
                                                            <option value="Monthly">Monthly</option>
                                                            <option value="Quterly">Quterly</option>
                                                            <option value="Yearly">Yearly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Tanure">Tenure</label>
                                                        <input id="Tanure" class="form-control mt-1" type="text"  name="tenure"  placeholder="Default input" aria-label="default input example" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Tanure_in">Tenure In</label><br>
                                                        <select id="Tanure_in" class="form-select mt-1 form-control" aria-label="Default select example" name="tenure_in">
                                                            <option selected>select</option>
                                                            <option value="Month">Month</option>
                                                            <option value="Year">Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="businessPartnerType">Installment Type</label><br>
                                                        <select id="int_type" class="form-select mt-1 form-control" aria-label="Default select example" name="installment_type">
                                                            <option selected>Open this select menu</option>
                                                            <option value="Equated installment">Equated installment</option>
                                                            {{-- <option value="2">Two</option>
                                                            <option value="3">Three</option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="ins_based_on">Installment Based On</label>
                                                        <select id="ins_based_on" class="form-select mt-1 form-control" aria-label="Default select example" name="installment_base_on">
                                                            <option selected>Open this select menu</option>
                                                            <option value="Rate Base">Rate Base</option>
                                                            {{-- <option value="2">Two</option>
                                                            <option value="3">Three</option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="ins_mode">Installment Mode</label><br>
                                                        <select id="ins_mode" class="form-select mt-1 form-control" aria-label="Default select example" name="installment_mode">
                                                            <option selected>Open this select menu</option>
                                                            <option value="Arrears">Arrears</option>
                                                            {{-- <option value="2">Two</option>
                                                            <option value="3">Three</option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="adv_installment">Number Of Advance Installment</label>
                                                        <input id="adv_installment" class="form-control mt-1" type="text"  name="number_of_adva_installment" placeholder="Default input" aria-label="default input example">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="total_installment">Total Number Of Installment</label>
                                                        <input id="total_installment" class="form-control mt-1" type="text" name="total_number_of_installment" placeholder="Default input" aria-label="default input example">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="advanceinstallment" name="advance_installment_to_be_deducted">
                                                        <label class="form-check-label" for="advanceinstallment">
                                                            Advance Installment to be deducted
                                                        </label>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="Downpayment">
                                                        <label class="form-check-label" for="Downpayment">
                                                            Downpayment Paid Directly
                                                        </label>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td colspan="4"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="anchor_type">Anchor Type</label><br>
                                                        <select id="anchor_type" class="form-select mt-1 form-control" aria-label="Default select example">
                                                            <option selected>Open this select menu</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="anchor_rate">Anchor Rate</label>
                                                        <input id="anchor_rate" class="form-control mt-1" type="text" placeholder="Default input" aria-label="default input example" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="int_crg_method">Interest Charge Method</label><br>
                                                        <select id="int_crg_method" class="form-select mt-1 form-control" aria-label="Default select example">
                                                            <option selected>Open this select menu</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="int_rate_type">Interest Rate Type</label><br>
                                                        <select id="int_rate_type" class="form-select mt-1 form-control" aria-label="Default select example">
                                                            <option selected>select</option>
                                                            <option value="Fixed">Fixed</option>
                                                            <option value="Flexi">Flexi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td colspan="4"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="policy_rate">Policy Rate</label>
                                                        <input id="policy_rate" class="form-control mt-1" type="text"  name="policy_rate" placeholder="Default input" aria-label="default input example" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="rate_percentage">Rate (%)</label>
                                                        <input id="rate_percentage" class="form-control mt-1" type="text" name="rate" placeholder="Default input" aria-label="default input example" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="spread">Spread</label>
                                                        <input id="spread" class="form-control mt-1" type="text" name="spread" placeholder="Default input" aria-label="default input example">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="margin-top: 30px;">
                                                    <a href="">Rate Waiver History</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="due_day">Due Day</label><br>
                                                        <select id="due_day" class="form-select mt-1 form-control" aria-label="Default select example" name="due_day">
                                                            <option selected>select</option>
                                                            <option value="3">3</option>
                                                            <option value="5">5</option>
                                                            <option value="7">7</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-3" style="margin-top:40px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="upfront_interest" name="upfront_interset">
                                                        <label class="form-check-label" for="advanceinstallment">
                                                            Upfront Interest
                                                        </label>
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="intereststartdate">Interest StartDate</label>
                                                        <div class="input-group mb-3">
                                                            <input type="date" name="interest_startdate" id="sdate"  class="form-control"  aria-label="Dollar amount (with dot and two decimal places)">
                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="FirstInstallmentdate">First Installment Date</label>
                                                        <div class="input-group mb-3">
                                                            <input type="date" name="first_installment_date" id="fins_date"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="4"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                {{-- <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Broken Period Adjustment</label><br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="exampleRadioOptions" id="radioYes" value="yes">
                                                            <label class="form-check-label" for="radioYes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="exampleRadioOptions" id="radioNo" value="no">
                                                            <label class="form-check-label" for="radioNo">No</label>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="brk_prd_adjust">Broken Period Adjustment</label><br>
                                                        <select id="brk_prd_adjust" class="form-select mt-1 form-control" aria-label="Default select example" name="brokan_prd_adjust">
                                                            {{-- <option selected>Open this select menu</option> --}}
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                            {{-- <option value="3">Three</option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="int_chrge_type">Interest Charge Type</label><br>
                                                        <select id="int_chrge_type" class="form-select mt-1 form-control" aria-label="Default select example" name="interest_charge_type">
                                                            {{-- <option selected>Open this select menu</option> --}}
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                            {{-- <option value="3">Three</option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="int_chrged">Interest Charged</label><br>
                                                        <select id="int_chrged" class="form-select mt-1 form-control" aria-label="Default select example" name="interest_charged">
                                                            <option selected>Open this select menu</option>
                                                            <option value="One">One</option>
                                                            <option value="Two">Two</option>
                                                            <option value="Three">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="Actualdate">Actual Date</label>
                                                        <div class="input-group mb-3">
                                                            <input type="date"  name="actual_date" id="act_date" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="int_chrged">Moratorium</label><br>
                                                        <select id="int_chrged" class="form-select mt-1 form-control" aria-label="Default select example">

                                                            <option value="No">No</option>
                                                            <option value="Yes">Yes</option>

                                                        </select>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </td>

                                    </tr>
                                    {{-- <tr>
                                        <td colspan="4"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="upfront_interest">
                                                        <label class="form-check-label" for="advanceinstallment">
                                                            Upfront Interest
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr> --}}
                                    {{-- <tr>
                                        <td colspan="4"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                              <div class="col-md-12">
                                                <h6 style="font-weight:800">Capital Funded :
                                                    <span style="font-weight: 500;">INR 15,18,887.00</span>
                                                </h6>
                                              </div>
                                            </div>
                                        </td>

                                    </tr> --}}
                                    <tr>
                                        <td colspan="4"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <button class="btn btn-secondary" id="calculate">Calculate Installment</button>
                                                </div>
                                                <div class="col-md-9" style="text-align:end">
                                                   <a href="" data-toggle="modal" data-target="#exampleModal">View Repayment Schedule</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                              <div class="col-md-12">
                                                <h3 style="font-weight:800">Installment :
                                                    <span style="font-weight: 500;" id="installment">INR 0.00</span>
                                                </h3>
                                              </div>
                                            </div>
                                        </td>

                                        <td colspan="4"> <!-- Use colspan to span the entire row -->
                                            <div class="row">
                                              <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary mt-3">Submit</button>

                                              </div>
                                            </div>
                                        </td>
                                    </form>



                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- end for Repayment data --}}
                </div>
            </div>

        </div>

    </div>

        </div>
        <!-- /.container-fluid -->
      </div>
</div>

{{-- for view schdual popu up --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">RePayment Schedule</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="emiSheet"></div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

$(document).ready(function() {
    $('#lon_id').change(function() {
        // console.log('haasdfgasdfgh');
        var loanId = $(this).val();
        // alert(loanId);
        if (loanId) {
            $.ajax({
                url: '/get-orignalcustomers/' + loanId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#customer_id').empty();
                    $.each(data.customers, function(key, customer) {
                        $('#customer_id').append($('<option>', {
                            value: customer.cust_id,
                            text: customer.cust_name
                        }));


                    });

                },
                error: function(error) {
                    console.error("Error fetching customers:", error);
                }
            });
        } else {
            $('#customer_id').empty();
        }
    });

    $("#adddesicion").on('click',function()
    {
        var loanId = document.getElementById('lon_id').value;
        if(loanId)
        {
            $('.modal').modal('show');
            $.ajax({
                url: '/get-creditdata/' + loanId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {

                    console.log(data);
                    if (data && Object.keys(data).length > 0) { // Check if data is not empty
                        $("#requested_amount").val(data.requested_amount);
                        $("#requested_tenure").val(data.requested_tenure);
                        $("#sanctioned_amount").val(data.sanctioned_amount);
                        $("#maximum_sanctioned_amount").val(data.maximum_sanctioned_amount);
                        $("#sanctioned_tenure").val(data.sanctioned_tenure);
                        $("#maximum_sanctioned_tenure").val(data.maximum_sanctioned_tenure);
                        $("#policyrate").val(data.policyrate);
                        $("#product_discount").val(data.product_discount);
                        $("#package_discount").val(data.package_discount);
                        $("#total_discount").val(data.total_discount);
                        $("#applicable_rate").val(data.applicable_rate);
                        $("#capital_funded").val(data.capital_funded);
                        // Set the radio buttons for sanctionedInterest
                        if (data.sanctionedInterest === "8") {
                            $("#sanctionedInterest1").prop("checked", true);
                        } else {
                            $("#sanctionedInterest2").prop("checked", true).val(data.sanctionedInterest);
                        }

                        // Set the radio buttons for application status
                        if (data.application === "Approve") {
                            $("#Approve").prop("checked", true);
                        } else if (data.application === "Reject") {
                            $("#Reject").prop("checked", true);
                        } else if (data.application === "Hold") {
                            $("#Hold").prop("checked", true);
                        }

                        $("#credit_id").val(data.credit_id);

                    }
                    else{

                        $("#sanctioned_amount").val('');
                        $("#maximum_sanctioned_amount").val('');
                        $("#sanctioned_tenure").val('');
                        $("#maximum_sanctioned_tenure").val('');
                        $("#policyrate").val('');
                        $("#product_discount").val('');
                        $("#package_discount").val('');
                        $("#total_discount").val('');
                        $("#applicable_rate").val('');
                        $("#capital_funded").val('');
                        // Set the radio buttons for sanctionedInterest
                        if (data.sanctionedInterest === "8") {
                            $("#sanctionedInterest1").prop("checked", true);
                        } else {
                            $("#sanctionedInterest2").prop("checked", false).val(data.sanctionedInterest);
                        }

                        // Set the radio buttons for application status
                        if (data.application === "Approve") {
                            $("#Approve").prop("checked", false);
                        } else if (data.application === "Reject") {
                            $("#Reject").prop("checked", false);
                        } else if (data.application === "Hold") {
                            $("#Hold").prop("checked", false);
                        }



                    }
                },
                error: function(error) {
                    console.error("Error fetching customers:", error);
                }
            });
        }
        else
        {
            alert("please select at least one loan application");
        }

    });

    $("input[name='sanctionedInterest']").on('click', function() {
        var val = $(this).val();
        if(val != 0)
        {
            $('#policyrate').val(val).prop('readonly', true);
            $('#applicable_rate').val(val);
        }
        else{
            $('#policyrate').val(val).prop('readonly', false);
            $('#applicable_rate').val('');
        }

    });

    $("#policyrate").on('input',function(){
        var val = $(this).val();
        $('#applicable_rate').val(val);

    });

    $("#package_discount").on('input', function() {
        var pr_discount = parseFloat($("#product_discount").val()) || 0;
        var pckg_discount = parseFloat($(this).val()) || 0;

        var total_amount = pr_discount + pckg_discount;
        $("#total_discount").val(total_amount);

        var maximum_sanctioned_amount = parseFloat($("#maximum_sanctioned_amount").val()) || 0;
        var apval = maximum_sanctioned_amount - total_amount;

        $("#capital_funded").val(apval);
    });


    // get repayment data
    $('#nav-profile-tab').on('click', function () {
         $loan_id = $("#lon_id").val();
         $cust_id = $("#customer_id").val();

         $("#loanidmain").val($loan_id);
         $("#custidmain").val($cust_id);
         // call ajax here
         $.ajax({
            url: '{{ url("getloandata") }}/' + $loan_id,
            method: 'GET',
            success: function(response)
            {
                console.log(response.repaymentdata);
                $creditdata = response.creditdata;
                $("#appication_amount").val($creditdata[0]['requested_amount']);
                $("#Tanure").val($creditdata[0]['requested_tenure']);
                $("#policy_rate").val($creditdata[0]['policyrate']);
                $("#rate_percentage").val($creditdata[0]['policyrate']);

                // repayment data
                $repaymentdata = response.repaymentdata;
                $("#disbursalType").val($repaymentdata['disbursal_type']);
                $("#numberdisbursal").val($repaymentdata['number_od_disbursal']);
                $("#disbursalTo").val($repaymentdata['disbursal_to']);
                $("#Recovery_Type").val($repaymentdata['recovery_type']);
                $("#Recovery_Sub_Type").val($repaymentdata['recovery_sub_type']);
                $("#Repayment_type").val($repaymentdata['repayment_type']);
                $("#Repayment_Frequency").val($repaymentdata['repayment_frequency']);
                $("#Tanure_in").val($repaymentdata['tenure_in']);
                $("#int_type").val($repaymentdata['installment_type']);
                $("#ins_based_on").val($repaymentdata['installment_based_on']);
                $("#ins_mode").val($repaymentdata['installment_mode']);
                $("#adv_installment").val($repaymentdata['number_of_advance_installment']);
                $("#total_installment").val($repaymentdata['total_number_of_installment']);
                $("#spread").val($repaymentdata['spread']);
                $("#due_day").val($repaymentdata['due_day']);
                $("#sdate").val($repaymentdata['interest_startdate']);
                $("#fins_date").val($repaymentdata['first_installment_date']);
                $("#brk_prd_adjust").val($repaymentdata['broken_period_adjustment']);
                $("#int_chrge_type").val($repaymentdata['interest_charge_type']);
                $("#int_chrged").val($repaymentdata['interest_charged']);
                $("#act_date").val($repaymentdata['actual_date']);
            }
         });
    });

    // calculate installment
    $('#calculate').on('click', function(event) {
        event.preventDefault();
        $gettime = $("#Tanure_in").val();
        $amount = $("#appication_amount").val();
        $rate   = $("#policy_rate").val();
        $tanure = $("#Tanure").val();

        if($gettime == "Month")
        {
           $r = $rate/12/100;
           $emi1 = $amount*$r*(1+$r)**$tanure;
           $emi2 = (1+$r)**$tanure - 1;

           $emi3 = $emi1/$emi2;
        //    $finalemi = Math.round($emi3 * 100) / 100;
           $finalemi = ($emi3 % 1 >= 0.5) ? Math.ceil($emi3) : Math.floor($emi3);
           $("#installment").text("INR " + $finalemi.toFixed(2).toLocaleString('en-IN'));

           // modal data

           let $remainblnc = $amount;
        //    let $opaningblnc = $amount;
           let emiSheet  = [];

           for(let i=1;i<=$tanure;i++)
           {
              let $opaningblnc = $remainblnc;
              $interst = $opaningblnc*$r;  // cal month interest amount;
              $newprinciple = $emi3 - $interst;
              $remainblnc -= $newprinciple;


              emiSheet.push({
                month:i,
                opaningblnc: parseFloat($opaningblnc).toFixed(2),
                emi:$finalemi.toFixed(2),
                principle:$newprinciple.toFixed(2),
                interest:$interst.toFixed(2),
                remainblnc:$remainblnc.toFixed(2)
              });
           }
                let tableHTML = `
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Opaning Balance</th>
                                <th>EMI (INR)</th>
                                <th>Principal (INR)</th>
                                <th>Interest (INR)</th>
                                <th>Balance (INR)</th>
                            </tr>
                        </thead>
                        <tbody>
                `;
                emiSheet.forEach((row) => {
                tableHTML += `
                    <tr>
                        <td>${row.month}</td>
                        <td>${row.opaningblnc}</td>
                        <td>${row.emi}</td>
                        <td>${row.principle}</td>
                        <td>${row.interest}</td>
                        <td>${row.remainblnc}</td>
                    </tr>
                `;
            });

            tableHTML += `
                    </tbody>
                </table>
            `;

            // Store EMI Table in a Div for Modal
            $("#emiSheet").html(tableHTML);

        }
        else if($gettime == "Year")
        {
           $r = $rate/100;
           $emi1 = $amount*$r*(1+$r)**$tanure;
           $emi2 = (1+$r)**$tanure - 1;

           $emi3 = $emi1/$emi2;
          //    $finalemi = Math.round($emi3 * 100) / 100;
           $finalemi = ($emi3 % 1 >= 0.5) ? Math.ceil($emi3) : Math.floor($emi3);
           $("#installment").text("INR " + $finalemi.toFixed(2).toLocaleString('en-IN'));

        }
        else
        {
            alert("Please Select Tanure In!!");
        }
    });

});

</script>