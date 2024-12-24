@push('title')
    <title>Approved Form</title>
@endpush
@extends('layout.main')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
@section('head')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection
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

        .button-spacing>*:not(:last-child) {
            margin-right: 25px;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">

        </div>

        <div class="content">
            <div class="container-fluid">

                @if (session('success'))
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
                                    <h6 style="font-weight: 700" class="mt-2 ml-2">{{ $title }}</h6>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="lon_id" class="text-nowrap">Loan:</label>
                                        {{-- <select class="form-control loan_id" id="lon_id" name="lon_id">
                                            <option value="" disabled selected>Select a loan</option>
                                            @foreach ($loans as $loan)
                                                <option value="{{ $loan->loan_id }}">{{ $loan->Prospect_No }}</option>
                                                <input type="text" id="loannumber" value="{{$loan->Prospect_No?$loan->Prospect_No:'' }}" hidden>
                                            @endforeach
                                        </select> --}}
                                        <select class="form-control loan_id" id="lon_id" name="lon_id">
                                            <option value="" disabled {{ !session('mainloan_id') ? 'selected' : '' }}>
                                                Select a loan</option>
                                            <option value="{{ session('mainloan_id') }}" selected>
                                                {{ session('mainprospect_No') }}</option>
                                            <input type="text" id="loannumber"
                                                value="{{ session('mainprospect_No') ? session('mainprospect_No') : '' }}"
                                                hidden>
                                            {{-- @foreach ($loans as $loan)
                                                <option value="{{ $loan->loan_id }}">{{ $loan->Prospect_No }}</option>
                                            @endforeach --}}
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

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Disbursal Details</button>

                            <div class="col-md-10" style="text-align:end">
                                <a href="" data-toggle="modal" data-target="#exampleModal1">Charges Details</a>
                            </div>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <form action="{{ route('disbursaldetails') }}" method="POST" id="addCreditForm">
                            @csrf
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">


                                <div class="table-responsive">
                                    <table class="table table1 tblmain">
                                        <thead>
                                            <h5 class="mt-2 mb-2">Application Details</h5>
                                            <tr>
                                                <th class="text-nowrap" style="font-size: 14px !important">Sanctioned Amount
                                                </th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Sanctioned Date
                                                </th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Tenure(Months)
                                                </th>
                                                <th class="text-nowrap" style="font-size: 14px !important">ROI(%)</th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Disbursal Amount
                                                </th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Adjustment Amount
                                                </th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Disbursal Type
                                                </th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Application
                                                    Status</th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Loan Account
                                                    Number</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap" style="text-align: center">
                                                    <input type="number" class="form-control" name="sanction_amount"
                                                        placeholder="" id="sanctioned_amount" readonly>
                                                    <input type="text" class="form-control" id="loanidmain"
                                                        name="loanidmain"
                                                        aria-label="Dollar amount (with dot and two decimal places)" hidden>
                                                    <input type="text" class="form-control" id="custidmain"
                                                        name="custidmain"
                                                        aria-label="Dollar amount (with dot and two decimal places)"
                                                        hidden>
                                                </td>
                                                <td class="text-nowrap" style="text-align: center">
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" id="sanctioned_date"
                                                            name="sanction_date">
                                                        <span class="input-group-text"><i
                                                                class="fa-solid fa-calendar-days"></i></span>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap" style="text-align: center">
                                                    <input type="number" class="form-control" id="tenure"
                                                        name="tenure" readonly size="50">
                                                </td>
                                                <td class="text-nowrap" style="text-align: center">
                                                    <input type="text" class="form-control" id="roi"
                                                        name="roi" readonly>
                                                </td>
                                                <td class="text-nowrap" style="text-align: center">
                                                    <input type="number" class="form-control" id="app_disbursal_amount"
                                                        name="app_disbursal_amount" readonly>
                                                </td>
                                                <td class="text-nowrap" style="text-align: center">
                                                    <input type="number" class="form-control" id="app_adjustment_amount"
                                                        name="app_adjustment_amount" readonly>
                                                </td>
                                                <td class="text-nowrap" style="text-align: center">
                                                    <select class="form-select" id="disbursal_type"
                                                        name="disbursal_type">
                                                        <option value="Single" selected>Single</option>
                                                        <option value="Multiple">Multiple</option>
                                                    </select>
                                                </td>
                                                <td class="text-nowrap" style="text-align: center">
                                                    {{-- <select class="form-select" id="application_status"
                                                        name="application_status">
                                                        <option value="Not Disbursed" selected>Not Disbursed</option>
                                                        <option value="Disbursed">Disbursed</option>
                                                    </select> --}}
                                                    <input type="text" class="form-control" id="application_status"
                                                        name="application_status" readonly>
                                                </td>
                                                <td class="text-nowrap" style="text-align: center">
                                                    <input type="text" class="form-control" id="loan_account_number"
                                                        name="loan_account_number" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>



                                <div class="table-responsive">
                                    <table class="table table1">
                                        <thead>
                                            <h5 class="mt-2 mb-2">Disbursal Entry</h5>
                                            <tr>
                                                {{-- <th class="text-nowrap"><input type="checkbox" name=""
                                                        id=""></th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Entry No</th> --}}
                                                <th class="text-nowrap" style="font-size: 14px !important">Disbursal Date
                                                </th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Disbursal
                                                    Amount</th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Adjustment
                                                    Amount</th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Actual Payment
                                                    Amount</th>
                                                {{-- <th class="text-nowrap" style="font-size: 14px !important">Action</th> --}}

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                {{-- <td><input type="checkbox" name="" id=""></td>
                                                <td>
                                                    <i class="fa-solid fa-angle-up"></i> <a href="">Payee
                                                        Details</a>
                                                </td> --}}
                                                <td>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" id="disbursal_date"
                                                            name="disbursal_date"
                                                            aria-label="Dollar amount (with dot and two decimal places)">
                                                        <span class="input-group-text"><i
                                                                class="fa-solid fa-calendar-days"></i></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">INR<i
                                                                class="fa-solid fa-chevron-down ms-1"></i></span>
                                                        <input type="text" class="form-control" id="disbursal_amount"
                                                            name="disbursal_amount"
                                                            aria-label="Dollar amount (with dot and two decimal places)">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">INR<i
                                                                class="fa-solid fa-chevron-down ms-1"></i></span>
                                                        <input type="text" class="form-control" id="adjustment_amount"
                                                            name="adjustment_amount"
                                                            aria-label="Dollar amount (with dot and two decimal places)"
                                                            readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">INR<i
                                                                class="fa-solid fa-chevron-down ms-1"></i></span>
                                                        <input type="text" class="form-control"
                                                            id="actual_payment_amount" name="actual_payment_amount"
                                                            aria-label="Dollar amount (with dot and two decimal places)"
                                                            readonly>
                                                    </div>
                                                </td>
                                                {{-- <td class="text-nowrap">
                                                    <i class="fa fa-eye"></i><br> <a href="">View Entry Details</a>
                                                </td> --}}

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>



                                <div class="table-responsive">
                                    <table class="table table1">
                                        <thead>
                                            <h5 class="mt-2 mb-2">Payee Details</h5>
                                            <tr>
                                                <th class="text-nowrap" style="font-size: 14px !important">Bussiness
                                                    Partner Type<br>Applicant Type</th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Bussiness
                                                    Partner Name<br>Applicant Name</th>
                                                <th class="text-nowrap" style="font-size: 14px !important;">Disbursal
                                                    Amount (Amount)</th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Adjustment
                                                    Amount (Amount)</th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Payment Amount
                                                    (Amount)</th>

                                                <th class="text-nowrap" style="font-size: 14px !important">Effective
                                                    Payment Date</th>
                                                <th class="text-nowrap" style="font-size: 14px !important">Payment Mode
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>



                                                <td>


                                                    <select class="form-control" id="applicant_type"
                                                        name="applicant_type">
                                                        <option value="" disabled selected>Select Applicant Type
                                                        </option>
                                                        <option value="BORROWER"
                                                            {{ old('applicant_type') == 'BORROWER' ? 'selected' : '' }}>
                                                            BORROWER</option>
                                                        <option value="CO-BORROWER"
                                                            {{ old('applicant_type') == 'CO-BORROWER' ? 'selected' : '' }}>
                                                            CO-BORROWER</option>
                                                    </select>
                                                </td>
                                                <td>


                                                    <select class="form-control" id="partner_name" name="partner_name">
                                                        <option value="" disabled selected>Select a Partner</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" style="white-space: nowrap;">INR<i
                                                                class="fa-solid fa-chevron-down ms-1"></i></span>
                                                        <input type="text" class="form-control"
                                                            name="bussiness_disbursal_amount"
                                                            id="bussiness_disbursal_amount" aria-label="Disbursal Amount"
                                                            readonly>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" style="white-space: nowrap;">INR<i
                                                                class="fa-solid fa-chevron-down ms-1"></i></span>
                                                        <input type="text" class="form-control"
                                                            name="bussiness_adjustment_amount"
                                                            id="bussiness_adjustment_amount"
                                                            aria-label="Adjustment Amount" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" style="white-space: nowrap;">INR<i
                                                                class="fa-solid fa-chevron-down ms-1"></i></span>
                                                        <input type="text" class="form-control" name="payment_amount"
                                                            id="payment_amount" aria-label="Payment Amount" readonly>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control"
                                                            name="effective_payment_date" id="effective_payment_date"
                                                            aria-label="Effective Payment Date">
                                                        <span class="input-group-text"><i
                                                                class="fa-solid fa-calendar-days"></i></span>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <select class="form-select form-control"
                                                        aria-label="Default select example" name="payment_mode"
                                                        id="payment_mode">
                                                        <option selected>Open this select menu</option>
                                                        <option value="check"
                                                            {{ old('payment_mode') == 'check' ? 'selected' : '' }}>Check
                                                        </option>
                                                        <option value="rtgs_neft"
                                                            {{ old('payment_mode') == 'rtgs_neft' ? 'selected' : '' }}>
                                                            Rtgs/Neft</option>
                                                        <option value="transfer_exi_account"
                                                            {{ old('payment_mode') == 'transfer_exi_account' ? 'selected' : '' }}>
                                                            Transfer Existing Account
                                                        </option>
                                                    </select><br>

                                                    <i class="fa-solid fa-chevron-down"></i><a class="btn actionbtn"
                                                        style="color: blue">Payment Details</a>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="table-responsive actionbtnkk" style="display: none;">
                                    <table class="table table1">
                                        <thead>
                                            <h5 class="mt-2 mb-2">Payment Details</h5>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                {{-- <td class="col-3">
                                                    <div class="form-group">
                                                        <label for="businessPartnerType">Business Partner Type</label>
                                                        <select id="businessPartnerType"
                                                            class="form-select mt-1 form-control"
                                                            aria-label="Default select example"
                                                            name="business_partner_type">
                                                            <option selected>Open this select menu</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </td> --}}
                                                {{-- <td class="col-3">
                                                    <div class="form-group">
                                                        <label for="bankName">Bank</label>
                                                        <input id="bankName" name="bankName" class="form-control mt-1"
                                                            type="text" placeholder="Default input"
                                                            aria-label="default input example" readonly>
                                                    </div>
                                                </td> --}}

                                                <td class="col-4">
                                                    <div class="form-group">
                                                        <label for="businessacccountType">Bank</label>
                                                        <select id="bankName" name="bankName"
                                                            class="form-select mt-1 form-control"
                                                            aria-label="Default select example">

                                                        </select>
                                                    </div>
                                                </td>

                                                <td class="col-4">
                                                    <div class="form-group">
                                                        <label for="beneficiaryName">Beneficiary Name</label>
                                                        <input id="beneficiaryName" class="form-control mt-1"
                                                            name="beneficiary_name" type="text"
                                                            placeholder="Default input" aria-label="default input example"
                                                            readonly>
                                                    </div>
                                                </td>
                                                <td class="col-4">
                                                    <div class="form-group">
                                                        <label for="businessacccountType">Beneficiary Name</label>
                                                        <input id="businessacccountType" class="form-control mt-1"
                                                            name="business_acccount_type" type="text"
                                                            placeholder="Default input" aria-label="default input example"
                                                            readonly>
                                                    </div>
                                                </td>
                                                {{-- <td class="col-4">
                                                    <div class="form-group">
                                                        <label for="businessacccountType">Beneficiary Account Type</label>
                                                        <select id="businessacccountType" name="business_acccount_type"
                                                            class="form-select mt-1 form-control"
                                                            aria-label="Default select example">

                                                            <option value="cc">CC</option>
                                                            <option value="od">OD</option>

                                                        </select>
                                                    </div>
                                                </td> --}}

                                            </tr>
                                            <tr>
                                                {{-- <td class="col-3">
                                                    <div class="form-group">
                                                        <label for="bankvalidation">Bank Validation Status</label>
                                                        <input id="bankvalidation" name="bankvalidation"
                                                            class="form-control mt-1" type="text"
                                                            placeholder="bankvalidation"
                                                            aria-label="default input example">
                                                    </div>
                                                </td> --}}
                                                {{-- <td class="col-3">
                                                    <div class="form-group">
                                                        <label for="bankdealing">Dealing Bank</label>
                                                        <input id="bankdealing" name="bankdealing"
                                                            class="form-control mt-1" type="text"
                                                            placeholder="bankdealing" aria-label="default input example">
                                                    </div>
                                                </td> --}}
                                                <td class="col-4">
                                                    <div class="form-group">
                                                        <label for="beneficiaryAccountNumber">Beneficiary Account
                                                            Number</label>
                                                        <input id="beneficiaryAccountNumber"
                                                            name="beneficiary_account_number" class="form-control mt-1"
                                                            type="text" placeholder="Default input"
                                                            aria-label="default input example" readonly>
                                                    </div>
                                                </td>

                                                <td class="col-3">
                                                    <div class="form-group">
                                                        <label for="bankcode">IFSC Code</label>
                                                        <input id="bankcode" name="bankcode" class="form-control mt-1"
                                                            type="text" placeholder="Default input"
                                                            aria-label="default input example" readonly>
                                                    </div>
                                                </td>

                                                <td class="col-3">
                                                    <div class="form-group">
                                                        <label for="beneficiarybranch">Branch</label>
                                                        <input id="beneficiarybranch" name="branch"
                                                            class="form-control mt-1" type="text"
                                                            placeholder="Default input" aria-label="default input example"
                                                            readonly>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{--
                                            <tr>

                                                <td colspan="4" style="text-align: end;">
                                                    <i class="fa-solid fa-building-columns"
                                                        style="margin-right:5px;"></i><a href="">View Bank
                                                        Details</a>
                                                </td>
                                            </tr> --}}

                                            {{-- shivang hide this 16-12-2024   --}}
                                            {{-- <tr>
                                                <td colspan="4">
                                                    <div class="d-flex justify-content-end">
                                                        <!-- Save Button (sets values only) -->
                                                        <button type="button" class="btn btn-primary mt-3"
                                                            id="saveButton">Save</button>
                                                    </div>
                                                </td>

                                                <td colspan="4">
                                                    <div class="d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mt-3">Submit</button>
                                                    </div>
                                                </td>
                                            </tr> --}}


                                        </tbody>
                                    </table>
                                </div>

                                {{-- <div class="table-responsive">
                                    <table class="table table1">
                                        <tbody>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="d-flex justify-content-end">
                                                        <!-- Save Button (sets values only) -->
                                                        <button type="button" class="btn btn-primary mt-3"
                                                            id="saveButton">Save</button>
                                                    </div>
                                                </td>

                                                <td colspan="4">
                                                    <div class="d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mt-3">Submit</button>
                                                    </div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div> --}}
                                <div class="table-responsive">
                                    <table class="table table1">
                                        <tbody>
                                            <tr>
                                                <td colspan="8">
                                                    <div class="d-flex justify-content-end button-spacing mt-3">
                                                        <!-- Save Button -->

                                                        {{-- <a href="{{ route('downloadfinal.pdf', session('mainloan_id')) }}" class="btn btn-primary btn-sm">Download Agreement</a>  --}}
                                                        @if (session('mainloan_id') && \App\Models\Disbursal::where('loan_id', session('mainloan_id'))->exists())
                                                            <a href="{{ route('downloadfinal.pdf', session('mainloan_id')) }}"
                                                                class="btn btn-primary btn-sm">Download Agreement</a>
                                                        @endif
                                                        <button type="button" class="btn btn-primary"
                                                            id="saveButton">Save</button>

                                                        <!-- Submit Button -->
                                                        <button type="submit" class="btn btn-primary">Submit</button>




                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </form>
                        {{-- end for Disbural data --}}

                        {{-- start for repaytment data --}}


                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->
    </div>
    </div>



    {{-- for view schdual popu up --}}
    {{-- for adjustment amount --}}
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adjustable Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="chargesForm" action="/submit-form" method="POST">
                        @csrf

                        <input type="hidden" name="loan_id" id="loan_idpop">
                        <input type="hidden" name="customer_id" id="customer_idpop">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Charges Details</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>

                                    <td><input type="text" class="form-control" name="charges_details[]"
                                            id="charges_detail_1" value="Processing Fee"></td>
                                    <td><input type="text" class="form-control" name="percentage[]"
                                            id="processfeeid"></td>
                                    <td><input type="text" class="form-control amount" name="amount[]"
                                            id="proccefeeamount" readonly></td>
                                </tr>

                                {{-- <tr>
                                    <th scope="row">2</th>
                                    <td><input type="text" class="form-control" name="charges_details[]"
                                            value="GST"></td>
                                    <td><input type="text" class="form-control" name="percentage[]" id="gstid">
                                    </td>
                                              readonly></td>
                                </tr>  --}}
                                <tr>
                                    <th scope="row">2</th>
                                    <td><input type="text" class="form-control" name="charges_details[]"
                                            value="GST On Processing"></td>
                                    <td><input type="text" class="form-control" name="percentage[]" id="gstid">
                                    </td>
                                    <td><input type="text" class="form-control amount" name="amount[]" id="gstamount"
                                            readonly></td>
                                </tr>


                                <tr>
                                    <th scope="row">3</th>
                                    <td><input type="text" class="form-control" name="charges_details[]"
                                            value="Stamp Charges"></td>
                                    <td><input type="text" class="form-control" name="percentage[]"></td>
                                    <td><input type="text" class="form-control amount" name="amount[]"></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td><input type="text" class="form-control" name="charges_details[]"
                                            value="Insurance"></td>
                                    <td><input type="text" class="form-control" name="percentage[]"></td>
                                    <td><input type="text" class="form-control amount" name="amount[]"></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td><input type="text" class="form-control" name="charges_details[]"
                                            value="Existing Loan OutStading"></td>
                                    <td><input type="text" class="form-control" name="percentage[]"></td>
                                    <td><input type="text" class="form-control amount" name="amount[]"></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td><input type="text" class="form-control" name="charges_details[]"
                                            value="Broken Period Interest"></td>
                                    <td><input type="text" class="form-control" name="percentage[]"></td>
                                    <td><input type="text" class="form-control amount" name="amount[]" id="brokenid"
                                            readonly></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td><input type="text" class="form-control" name="charges_details[]"
                                            value="Advance Installment Charges"></td>
                                    <td><input type="text" class="form-control" name="percentage[]"></td>
                                    <td><input type="text" class="form-control amount" name="amount[]"
                                            id="ads_charge" readonly></td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td><input type="text" class="form-control" name="charges_details[]"></td>
                                    <td><input type="text" class="form-control" name="percentage[]"></td>
                                    <td><input type="text" class="form-control amount" name="amount[]"></td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td><input type="text" class="form-control" name="charges_details[]"></td>
                                    <td><input type="text" class="form-control" name="percentage[]"></td>
                                    <td><input type="text" class="form-control amount" name="amount[]"
                                            oninput="calculateTotal()"></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <td colspan="2" style="text-align: end"><strong>Total</strong></td>
                                    <td><input type="text" class="form-control" name="total_amount"
                                            id="total_amount_main" readonly></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="text-center mt-3">
                            {{-- <button type="button"  id="closebtn" class="btn btn-primary">close</button>

                            --}}
                            {{-- <button  id="saveButton" class="btn btn-primary">Save</button> --}}
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {{-- <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                                Close
                            </button> --}}
                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    let app_name;
    $(document).ready(function() {
        // $('#lon_id').change(function() {
        //     // console.log('haasdfgasdfgh');
        //     var loanId = $(this).val();
        //     // alert(loanId);
        //     if (loanId) {
        //         $.ajax({
        //             url: '/get-orignalcustomers/' + loanId,
        //             type: 'GET',
        //             dataType: 'json',
        //             success: function(data) {
        //                 $('#customer_id').empty();
        //                 $.each(data.customers, function(key, customer) {
        //                     $('#customer_id').append($('<option>', {
        //                         value: customer.cust_id,
        //                         text: customer.cust_name
        //                     }));

        //                     let customerId1 = $('#customer_id').val();
        //                     $("#loan_idpop").val(loanId);
        //                     $("#customer_idpop").val(customerId1);
        //                     // alert(customerId1);
        //                     fetchLoanAndCustomerData(loanId, customerId1);

        //                 });

        //             },
        //             error: function(error) {
        //                 console.error("Error fetching customers:", error);
        //             },
        //             complete: function() {
        //                 $('#customer_id').trigger('change');
        //             }
        //         });
        //     } else {
        //         $('#customer_id').empty();
        //     }
        // });

        var selectedLoanId = $('#lon_id').val();
        if (selectedLoanId) {
            $.ajax({
                url: '/get-orignalcustomers/' + selectedLoanId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#customer_id').empty();
                    $.each(data.customers, function(key, customer) {
                        $('#customer_id').append($('<option>', {
                            value: customer.cust_id,
                            text: customer.cust_name
                        }));

                        let customerId1 = $('#customer_id').val();
                        $("#loan_idpop").val(selectedLoanId);
                        $("#customer_idpop").val(customerId1);
                        // alert(customerId1);
                        fetchLoanAndCustomerData(selectedLoanId, customerId1);

                    });

                },
                error: function(error) {
                    console.error("Error fetching customers:", error);
                },
                complete: function() {
                    $('#customer_id').trigger('change');
                }
            });
        }

        $("#adddesicion").on('click', function() {
            var loanId = document.getElementById('lon_id').value;
            if (loanId) {
                $('.modal').modal('show');
                $.ajax({
                    url: '/get-creditdata/' + loanId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        console.log(data);
                        if (data && Object.keys(data).length >
                            0) { // Check if data is not empty
                            $("#requested_amount").val(data.requested_amount);
                            $("#requested_tenure").val(data.requested_tenure);
                            $("#sanctioned_amount").val(data.sanctioned_amount);
                            $("#maximum_sanctioned_amount").val(data
                                .maximum_sanctioned_amount);
                            $("#sanctioned_tenure").val(data.sanctioned_tenure);
                            $("#maximum_sanctioned_tenure").val(data
                                .maximum_sanctioned_tenure);
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
                                $("#sanctionedInterest2").prop("checked", true).val(data
                                    .sanctionedInterest);
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

                        } else {

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
                                $("#sanctionedInterest2").prop("checked", false).val(data
                                    .sanctionedInterest);
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
            } else {
                alert("please select at least one loan application");
            }

        });

        $("input[name='sanctionedInterest']").on('click', function() {
            var val = $(this).val();
            if (val != 0) {
                $('#policyrate').val(val).prop('readonly', true);
                $('#applicable_rate').val(val);
            } else {
                $('#policyrate').val(val).prop('readonly', false);
                $('#applicable_rate').val('');
            }

        });

        $("#policyrate").on('input', function() {
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


        function fetchLoanAndCustomerData(loanId, customerId1) {
            $("#loanidmain").val(loanId);
            $("#custidmain").val(customerId1);

            if (loanId) {
                $.ajax({
                    url: '{{ url('getdisbursaldata') }}/' + loanId,
                    method: 'GET',
                    success: function(response) {

                        console.log(response.banknames);


                        // Populate credit data
                        let $creditdata = response.creditdata;
                        let $bankdetails = response.bankdetails;
                        let $disbursaldata = response.disbursal;
                        let $adjustabledata = response.adjustabledata;
                        let $repaymentdata = response.repaymentdata;
                        let $banknames = response.banknames;

                        // console.log( $repaymentdata[0]['brk_charge']);
                        if ($creditdata && $creditdata.length > 0) {
                            let createdAt = new Date($creditdata[0]['created_at']);
                            let date = createdAt.toISOString().split('T')[0]; // F
                            $("#sanctioned_amount").val($creditdata[0]['sanctioned_amount']);
                            $("#sanctioned_date").val(date);
                            $("#tenure").val($creditdata[0]['sanctioned_tenure']);
                            $("#roi").val($repaymentdata[0]['rate']); // shivnag 14-12-2024


                            // $("#roi").val($creditdata[0]['sanctionedInterest']);

                            // $("#roi").val($creditdata[0]['policyrate']);
                        }

                        // if ($bankdetails) {
                        //     $("#beneficiarybranch").val($bankdetails[0]['branch_address']);
                        //     $("#beneficiaryName").val($bankdetails[0]['account_holder_name']);
                        //     $("#beneficiaryAccountNumber").val($bankdetails[0]['account_number']);
                        //     $("#bankcode").val($bankdetails[0]['ifsc_code']);
                        //     $("#bankName").val($bankdetails[0]['bank_name']);
                        // }

                        if ($banknames && Object.keys($banknames).length >
                            0) { // Ensure banknames is valid and not empty
                            let bankSelect = document.getElementById("bankName");

                            // Clear any existing options in the select box
                            bankSelect.innerHTML = '<option value="">Select Bank Name</option>';

                            // Loop through the banknames object
                            Object.entries($banknames).forEach(([id, name]) => {
                                let option = document.createElement(
                                    "option"); // Create a new option element
                                option.value = id; // Set the value of the option (bank ID)
                                option.textContent =
                                    name; // Set the visible text of the option (bank name)
                                bankSelect.appendChild(
                                    option); // Append the option to the select box
                            });
                        } else {
                            console.error("Bank names data is invalid or empty.");
                        }


                        if ($disbursaldata) {
                            // alert($disbursaldata['bussiness_partner_name_appant_name']);
                            // let y = 'xcscfd';
                            $("#bankvalidation").val($disbursaldata['bankvalidation']);
                            $("#bankdealing").val($disbursaldata['bankdealing']);
                            $("#benklocation").val($disbursaldata['location']);
                            $("#applicant_type").val($disbursaldata['bussiness_partner_type']);
                            $("#applicant_type").trigger('change');
                            $("#app_disbursal_amount").val($disbursaldata['app_disbursal_amount']);
                            app_name = $disbursaldata['bussiness_partner_name_appant_name'];
                            $("#app_adjustment_amount").val($disbursaldata[
                                'app_adjustment_amount']);
                            $("#disbursal_amount").val($disbursaldata['disbursal_amount']);
                            $("#adjustment_amount").val($disbursaldata['adjustment_amount']);

                            $("#bussiness_disbursal_amount").val($disbursaldata[
                                'disbursal_amount']);
                            $("#bussiness_adjustment_amount").val($disbursaldata[
                                'bussiness_adjustment_amount']);
                            $("#actual_payment_amount").val($disbursaldata[
                                'actual_payment_amount']);
                            $("#payment_amount").val($disbursaldata['payment_amount']);

                            $("#partner_name").val($disbursaldata[
                                'bussiness_partner_name_appant_name']);

                            $("#application_status").val($disbursaldata['application_status']);

                            $("#loan_account_number").val($disbursaldata['loan_account_number']);

                            $("#disbursal_date").val($disbursaldata['disbursal_date']);
                            $("#effective_payment_date").val($disbursaldata[
                                'effective_payment_date']);
                            $("#payment_mode").val($disbursaldata['payment_mode']);
                            $("#bankName").val($disbursaldata['bankName']);
                            if ($disbursaldata['bankName']) {
                                bankdata();
                            }


                            // $("#loan_account_number").val($disbursaldata[
                            // 'bussiness_partner_name_appant_name']);

                        }

                        // if ($adjustabledata) {
                        //     $("#charges_detail_1").val($adjustabledata['charges_detail']);
                        //     $("#percentage_1").val($adjustabledata['percentage']);
                        //     $("#amount_1").val($adjustabledata['amount']);
                        // }
                        if ($adjustabledata && $adjustabledata.length > 0) {
                            // Loop through each item in $adjustabledata
                            // .console.log($adjustabledata);

                            let totalAmount = 0;
                            $adjustabledata.forEach((item, index) => {

                                let rowIndex = index + 1; // Row index starts from 1
                                let $row = $(`tbody tr:nth-child(${rowIndex})`);
                                //    alert(item.charges_detail);
                                // Populate existing rows or append new ones if necessary
                                if ($row.length > 0) {
                                    $row.find('input[name="charges_details[]"]').val(item
                                        .charges_detail);
                                    $row.find('input[name="percentage[]"]').val(item
                                        .percentage);
                                    $row.find('input[name="amount[]"]').val(item.amount);
                                } else {
                                    // If no row exists, append new row dynamically
                                    let newRow = `
                                <tr>
                                    <th scope="row">${rowIndex}</th>
                                    <td><input type="text" class="form-control" name="charges_details[]" value="${item.charges_detail || ''}"></td>
                                    <td><input type="text" class="form-control" name="percentage[]" value="${item.percentage || ''}"></td>
                                    <td><input type="text" class="form-control amount" name="amount[]" value="${item.amount || ''}" readonly></td>
                                </tr>`;
                                    $('tbody').append(newRow);
                                }
                                totalAmount += parseFloat(item.amount) || 0;
                            });
                            $('#total_amount_main').val(totalAmount.toFixed(2));
                        }

                        $("#brokenid").val($repaymentdata[0]['brk_charge'] || 0);
                        $("#ads_charge").val($repaymentdata[0]['ads_charge'] || 0);

                        ///////////////

                        // Populate repayment data
                        // let $repaymentdata = response.repaymentdata;
                        // if ($repaymentdata) {
                        //     $("#disbursalType").val($repaymentdata['disbursal_type']);
                        //     $("#numberdisbursal").val($repaymentdata['number_od_disbursal']);
                        //     $("#disbursalTo").val($repaymentdata['disbursal_to']);
                        //     $("#Recovery_Type").val($repaymentdata['recovery_type']);
                        //     $("#Recovery_Sub_Type").val($repaymentdata['recovery_sub_type']);
                        //     $("#Repayment_type").val($repaymentdata['repayment_type']);
                        //     $("#Repayment_Frequency").val($repaymentdata['repayment_frequency']);
                        //     $("#Tanure_in").val($repaymentdata['tenure_in']);
                        //     $("#int_type").val($repaymentdata['installment_type']);
                        //     $("#ins_based_on").val($repaymentdata['installment_based_on']);
                        //     $("#ins_mode").val($repaymentdata['installment_mode']);
                        //     $("#adv_installment").val($repaymentdata[
                        //         'number_of_advance_installment']);
                        //     $("#total_installment").val($repaymentdata[
                        //         'total_number_of_installment']);
                        //     $("#spread").val($repaymentdata['spread']);
                        //     $("#due_day").val($repaymentdata['due_day']);
                        //     $("#sdate").val($repaymentdata['interest_startdate']);
                        //     $("#fins_date").val($repaymentdata['first_installment_date']);
                        //     $("#brk_prd_adjust").val($repaymentdata['broken_period_adjustment']);
                        //     $("#int_chrge_type").val($repaymentdata['interest_charge_type']);
                        //     $("#int_chrged").val($repaymentdata['interest_charged']);
                        //     $("#act_date").val($repaymentdata['actual_date']);
                        // }
                    },
                    error: function(error) {
                        console.error("Error fetching loan data:", error);
                    }
                });


            }

        }

        function bankdata() {
            $bankid = $("#bankName").val();
            $.ajax({
                url: '{{ url('getbankdata') }}/' + $bankid,
                method: 'GET',
                success: function(response) {
                    console.log(response.bankdetails);
                    let $bankdetails = response.bankdetails;
                    if ($bankdetails) {
                        $("#beneficiarybranch").val($bankdetails[0]['branch_address']);
                        $("#beneficiaryName").val($bankdetails[0]['account_holder_name']);
                        $("#beneficiaryAccountNumber").val($bankdetails[0]['account_number']);
                        $("#bankcode").val($bankdetails[0]['ifsc_code']);
                        $("#businessacccountType").val($bankdetails[0]['Type_of_Account']);
                    }
                }
            });
        }

        $(".actionbtn").on("click", function() {
            // Toggle display of the .table-responsive div
            $(".actionbtnkk").each(function() {
                if ($(this).css("display") === "none") {
                    $(this).css("display", "block"); // Show the div
                } else {
                    $(this).css("display", "none"); // Hide the div
                }
            });


        });

    });
</script>

<script>
    $(document).ready(function() {
        // Handle applicant type selection
        $('#applicant_type').change(function() {
            let type = $(this).val(); // Get selected applicant type
            let loanId = $('#lon_id').val(); // Get selected loan ID
            let customerId = $('#customer_id').val(); // Get selected customer ID
            // alert(customerId);
            // alert(type);

            // Ensure all required fields are selected
            if (!loanId || !customerId || !type) {
                // alert('Please select Loan, Customer, and Applicant Type.');
                return;
            }



            $.ajax({
                url: '/get-partners',
                type: 'GET',
                data: {
                    type: type,
                    loan_id: loanId,
                    customer_id: customerId
                },
                success: function(response) {
                    // Clear the dropdown and add the default "Select a Partner" option
                    $('#partner_name').empty().append(
                        '<option value="" disabled selected>Select a Partner</option>');

                    if (response.length > 0) {
                        // Iterate over the response
                        $.each(response, function(index, partner) {
                            // Check if the partner's data exists before appending
                            if (partner.id && partner.name) {
                                $('#partner_name').append(
                                    `<option value="${partner.id}|${partner.name}"
                                ${partner.id == (app_name ? app_name.split("|")[0] : null) ? 'selected' : ''}
                                data-id="${partner.id}"
                                data-name="${partner.name}">
                                ${partner.name}
                        </option>`
                                );
                            }
                        });
                    } else {
                        // No partners found: Add a fallback option
                        $('#partner_name').append(
                            '<option value="" disabled>No partners found</option>');
                    }
                },
                error: function(error) {
                    // Error handling: Add an error option
                    console.error("Error fetching partners:", error);
                    $('#partner_name').empty().append(
                        '<option value="" disabled>Error loading partners</option>');
                }
            });

        });

        // shivang add 12-12-2024
        $("#bankName").on('change', function() {
            $bankid = $(this).val();
            $.ajax({
                url: '{{ url('getbankdata') }}/' + $bankid,
                method: 'GET',
                success: function(response) {
                    console.log(response.bankdetails);
                    let $bankdetails = response.bankdetails;
                    if ($bankdetails) {
                        $("#beneficiarybranch").val($bankdetails[0]['branch_address']);
                        $("#beneficiaryName").val($bankdetails[0]['account_holder_name']);
                        $("#beneficiaryAccountNumber").val($bankdetails[0][
                            'account_number'
                        ]);
                        $("#bankcode").val($bankdetails[0]['ifsc_code']);
                        $("#businessacccountType").val($bankdetails[0]['Type_of_Account']);
                    }
                }
            });
        });

    });
</script>
{{-- ///    --}}
<script>
    $(document).ready(function() {
        // sdjustment amount
        $("#processfeeid").on('input', function() {
            $amount = $('#sanctioned_amount').val();
            $percntgae = $('#processfeeid').val();
            //    alert($percntgae);
            $processfee = $amount * $percntgae / 100;
            $('#proccefeeamount').val($processfee);
            calculatetotalsum();

        });

        // forgst
        $('#gstid').on('input', function() {
            // $amount = $('#sanctioned_amount').val();
            $amount = $('#proccefeeamount').val(); // shivang add this 12-12-24
            $percntgae = $('#gstid').val();

            $gstfee = $amount * $percntgae / 100;
            $('#gstamount').val($gstfee);
            calculatetotalsum();
        });

        $(".amount").on('input', function() {
            calculatetotalsum();
        });

        function calculatetotalsum() {
            let total = 0;
            $(".amount").each(function() {
                let value = parseFloat($(this).val()) || 0;
                total += value;
            });

            let amount = $('#sanctioned_amount').val();
            let disbursalamount = amount - total;
            $("#total_amount_main").val(total.toFixed(2));
            $('#app_disbursal_amount').val(disbursalamount.toFixed(2));
            $('#app_adjustment_amount').val(total.toFixed(2));

            // ("#total_amount_main").val(total.toFixed(2));
            $('#disbursal_amount').val(disbursalamount.toFixed(2));
            $('#adjustment_amount').val(total.toFixed(2));
            $('#actual_payment_amount').val(disbursalamount.toFixed(2));



            $('#bussiness_disbursal_amount').val(disbursalamount.toFixed(2));
            $('#bussiness_adjustment_amount').val(total.toFixed(2));
            $('#payment_amount').val(disbursalamount.toFixed(2));



        }
    });



    //     document.addEventListener('DOMContentLoaded', function () {
    //     const form = document.getElementById('chargesForm');
    //     // const totalAmountInput = document.getElementById('total_amount_main');

    //     form.addEventListener('submit', function (event) {
    //         // alert('duetueefh');
    //         event.preventDefault(); // Prevent the default form submission

    //         // Gather form data
    //         const formData = new FormData(form);

    //         // Send AJAX request
    //         fetch(form.action, {
    //             method: 'POST',
    //             headers: {
    //                 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
    //             },
    //             body: formData,
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             if (data.success) {
    //                 // alert(data.message);
    //                 // totalAmountInput.value = data.total_amount;
    //             } else {
    //                 alert('Error: ' + data.message);
    //             }
    //         })
    //         .catch(error => {
    //             console.error('AJAX request failed:', error);
    //             alert('Failed to save data. Please try again.');
    //         });
    //     });
    // });

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('chargesForm');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Gather form data
            const formData = new FormData(form);

            // Send AJAX request
            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);

                        // form.reset();

                        // const popup = document.getElementById('exampleModal1');
                        // if (popup) {
                        //     popup.style.display = 'none';
                        // }
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('AJAX request failed:', error);
                    alert('Failed to save data. Please try again.');
                });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saveButton = document.getElementById('saveButton');

        saveButton.addEventListener('click', function() {
            // alert("hello");
            $appno = $("#loannumber").val();
            $("#application_status").val("Disbursed");
            $('#loan_account_number').val($appno);

        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saveButton = document.getElementById('saveButton'); // Save button
        const form = document.getElementById('addCreditForm'); // Form reference

        saveButton.addEventListener('click', function(e) {
            e.preventDefault();


            const formData = new FormData(form);


            const appNo = document.getElementById('loannumber').value;
            document.getElementById('application_status').value = "Disbursed";
            document.getElementById('loan_account_number').value = appNo;


            formData.append('application_status', 'Disbursed');
            formData.append('loan_account_number', appNo);

            // Submit form data via AJAX
            fetch("{{ route('disbursaldetails-save') }}", {
                    method: 'POST',
                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    body: formData,
                })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Failed to save data. Check the response.');
                    }
                })
                .then(data => {
                    // alert('Data saved successfully!');
                    window.location.reload(); // Reload the page after success
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving the data.');
                });
        });
    });
</script>
