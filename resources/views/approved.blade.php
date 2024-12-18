@push('title')
    <title>Approved Form</title>
@endpush
@extends('layout.main')

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
                                        @endforeach
                                    </select> --}}
                                        <select class="form-control loan_id" id="lon_id" name="lon_id">
                                            <option value="" disabled {{ !session('mainloan_id') ? 'selected' : '' }}>
                                                Select a loan</option>
                                            <option value="{{ session('mainloan_id') }}" selected>
                                                {{ session('mainprospect_No') }}</option>
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
                    {{-- <h6 style="font-weight: 700">Example Table</h6> --}}
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            {{-- <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Disbursal Details</button> --}}
                            <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Repayment Instrument Details</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">


                        {{-- start for repaytment data --}}
                        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <h6 class="mt-4">All Fields | <span style="color:blue;">Required </span><span
                                    style="color:red;font-size:14px;">*</span></h6>

                            {{-- Payment Details --}}
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <form action="{{ route('repaymentinstrument') }}" method="POST">
                                                    @csrf

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="applicationamount">Application Amount</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">INR<i
                                                                            class="fa-solid fa-chevron-down ms-1"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        id="appication_amount" name="appication_amount"
                                                                        value="{{ old('appication_amount') }}"
                                                                        aria-label="Dollar amount (with dot and two decimal places)"
                                                                        readonly>
                                                                    <input type="text" class="form-control"
                                                                        id="loanidmain" name="loanidmain"
                                                                        aria-label="Dollar amount (with dot and two decimal places)"
                                                                        hidden>
                                                                    <input type="text" class="form-control"
                                                                        id="custidmain" name="custidmain"
                                                                        aria-label="Dollar amount (with dot and two decimal places)"
                                                                        hidden>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="Sanctioned_Amount">Sanctioned Amount</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">INR<i
                                                                            class="fa-solid fa-chevron-down ms-1"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        id="sanctioned_amount" name="sanctioned_amount"
                                                                        value="{{ old('sanctioned_amount') }}"
                                                                        aria-label="Dollar amount (with dot and two decimal places)"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="disbursalType">Disbursal Type</label><br>
                                                        <select id="disbursalType" class="form-select mt-1 form-control" aria-label="Default select example" name="disbursaltype">
                                                            <option selected>Open this select menu</option>
                                                            <option value="One">One</option>
                                                            <option value="Two">Two</option>
                                                            <option value="Three">Three</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                        {{-- <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="numberdisbursal">Number Of Disbursals</label>
                                                        <input id="numberdisbursal" class="form-control mt-1" type="text" name="number_disbursals" placeholder="Default input" aria-label="default input example">
                                                    </div>
                                                </div> --}}
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="disbursalTo">Disbursal To</label>
                                                                <select id="disbursalTo"
                                                                    class="form-select mt-1 form-control"
                                                                    aria-label="Default select example"
                                                                    name="disbursal_to">
                                                                    <option selected>select</option>
                                                                    <option value="Customer"
                                                                        {{ old('disbursal_to') == 'Customer' ? 'selected' : '' }}>
                                                                        Customer</option>
                                                                    <option value="Dealer"
                                                                        {{ old('disbursal_to') == 'Dealer' ? 'selected' : '' }}>
                                                                        Dealer</option>
                                                                    <option value="Seller"
                                                                        {{ old('disbursal_to') == 'Seller' ? 'selected' : '' }}>
                                                                        Seller</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="Recovery_Type">Recovery Type</label><br>
                                                                <select id="Recovery_Type"
                                                                    class="form-select mt-1 form-control"
                                                                    aria-label="Default select example"
                                                                    name="recovery_type">
                                                                    <option selected>select</option>
                                                                    <option value="Installment"
                                                                        {{ old('recovery_type') == 'Installment' ? 'selected' : '' }}>
                                                                        Installment</option>
                                                                    <option value="Interest"
                                                                        {{ old('recovery_type') == 'Interest' ? 'selected' : '' }}>
                                                                        Interest</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    {{-- <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="Recovery_Type">Recovery Type</label><br>
                                                        <select id="Recovery_Type" class="form-select mt-1 form-control" aria-label="Default select example" name="recovery_type">
                                                            <option selected>select</option>
                                                            <option value="Installment">Installment</option>
                                                            <option value="Interest">Interest</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                    {{-- <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="Recovery_Sub_Type">Recovery Sub Type</label>
                                                        <select id="Recovery_Sub_Type" class="form-select mt-1 form-control" aria-label="Default select example" name="recovery_sub_type">
                                                            <option selected>select</option>
                                                            <option value="Revolving">Revolving</option>
                                                            <option value="Non_Revolving">Non Revolving</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Repayment_type">Repayment Type</label>
                                                            <select id="Repayment_type"
                                                                class="form-select mt-1 form-control"
                                                                aria-label="Default select example" name="repayment_type"
                                                                value="{{ old('repayment_type') }}">
                                                                <option selected>select</option>
                                                                <option value="Principal_interest"
                                                                    {{ old('repayment_type') == 'Principal_interest' ? 'selected' : '' }}>
                                                                    Principal + Interest</option>
                                                                <option value="Only_Principal"
                                                                    {{ old('repayment_type') == 'Only_Principal' ? 'selected' : '' }}>
                                                                    Only Principal</option>
                                                                <option value="Only_Interest"
                                                                    {{ old('repayment_type') == 'Only_Interest' ? 'selected' : '' }}>
                                                                    Only Interest</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        
                                                        <div class="form-group">
                                                            <label for="Repayment_Frequency" class="form-label">Repayment Frequency</label>
                                                            <select id="Repayment_Frequency" 
                                                                    class="form-select mt-1 form-control" 
                                                                    aria-label="Select repayment frequency" 
                                                                    name="repayment_frequency">
                                                                <option value="" disabled {{ !old('repayment_frequency') ? 'selected' : '' }}>Select</option>
                                                                <option value="Monthly" 
                                                                        {{ old('repayment_frequency') == 'Monthly' ? 'selected' : '' }}>
                                                                    Monthly
                                                                </option>
                                                                <option value="Quarterly" 
                                                                        {{ old('repayment_frequency') == 'Quarterly' ? 'selected' : '' }}>
                                                                    Quarterly
                                                                </option>
                                                                <option value="Yearly" 
                                                                        {{ old('repayment_frequency') == 'Yearly' ? 'selected' : '' }}>
                                                                    Yearly
                                                                </option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Tanure">Tenure</label>
                                                            <input id="Tanure" class="form-control mt-1"
                                                                type="text" name="tenure"
                                                                value="{{ old('tenure') }}" placeholder="Default input"
                                                                aria-label="default input example" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Tanure_in">Tenure In</label><br>
                                                            <select id="Tanure_in" class="form-select mt-1 form-control"
                                                                aria-label="Default select example" name="tenure_in"
                                                                value="{{ old('tenure_in') }}">
                                                                <option selected>select</option>
                                                                <option value="Month"
                                                                    {{ (isset($tenure_in) && $tenure_in == 'Month') || old('tenure_in') == 'Month' ? 'selected' : '' }}>
                                                                    Month</option>
                                                                <option value="Year"
                                                                    {{ (isset($tenure_in) && $tenure_in == 'Year') || old('tenure_in') == 'Year' ? 'selected' : '' }}>
                                                                    Year</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- <tr>
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
                                    </tr> --}}
                                        <tr>
                                            <td colspan="3"> <!-- Use colspan to span the entire row -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="businessPartnerType">Installment Type</label><br>
                                                            <select id="int_type" class="form-select mt-1 form-control"
                                                                aria-label="Default select example"
                                                                name="installment_type"
                                                                value="{{ old('installment_type') }}">
                                                                <option selected>Open this select menu</option>
                                                                <option value="Equated installment"
                                                                    {{ (isset($installment_type) && $installment_type == 'Equated installment') || old('installment_type') == 'Equated installment' ? 'selected' : '' }}>
                                                                    Equated installment</option>
                                                                {{-- <option value="2">Two</option>
                                                            <option value="3">Three</option> --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="ins_based_on">Installment Based On</label>
                                                            <select id="ins_based_on"
                                                                class="form-select mt-1 form-control"
                                                                aria-label="Default select example"
                                                                name="installment_base_on"
                                                                value="{{ old('installment_base_on') }}">
                                                                <option selected>Open this select menu</option>
                                                                <option value="Rate Base"
                                                                    {{ (isset($installment_base_on) && $installment_base_on == 'Rate Base') || old('installment_base_on') == 'Rate Base' ? 'selected' : '' }}>
                                                                    Rate Base</option>
                                                                {{-- <option value="2">Two</option>
                                                            <option value="3">Three</option> --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="ins_mode">Installment Mode</label><br>
                                                            <select id="ins_mode" class="form-select mt-1 form-control"
                                                                aria-label="Default select example"
                                                                name="installment_mode"
                                                                value="{{ old('installment_mode') }}">
                                                                <option selected>Open this select menu</option>
                                                                <option value="Arrears"
                                                                    {{ (isset($installment_mode) && $installment_mode == 'Arrears') || old('installment_mode') == 'Arrears' ? 'selected' : '' }}>
                                                                    Arrears</option>
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
                                                            <label for="adv_installment">Number Of Advance
                                                                Installment</label>
                                                            <input id="adv_installment" class="form-control mt-1"
                                                                type="text" name="number_of_adva_installment"
                                                                placeholder="Default input"
                                                                value="{{ isset($number_of_adva_installment) ? $number_of_adva_installment : old('number_of_adva_installment') }}"
                                                                aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="total_installment">Total Number Of
                                                                Installment</label>
                                                            <input id="total_installment" class="form-control mt-1"
                                                                type="text" name="total_number_of_installment"
                                                                value="{{ isset($total_number_of_installment) ? $total_number_of_installment : old('total_number_of_installment') }}"
                                                                placeholder="Default input"
                                                                aria-label="default input example">
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
                                                            <input class="form-check-input advance-installment"
                                                                type="checkbox" value="1" id="advanceinstallment"
                                                                name="advance_installment_to_be_deducted"
                                                                value="{{ old('advance_installment_to_be_deducted') }}">
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
                                                            <input id="policy_rate" class="form-control mt-1"
                                                                type="text" name="policy_rate"
                                                                placeholder="Default input"
                                                                value="{{ old('policy_rate') }}"
                                                                aria-label="default input example" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="rate_percentage">Rate (%)</label>
                                                            <input id="rate_percentage" class="form-control mt-1"
                                                                type="text" name="rate"
                                                                value="{{ isset($rate) ? $rate : old('rate') }}"
                                                                placeholder="Default input"
                                                                aria-label="default input example">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="spread">Spread</label>
                                                            <input id="spread" class="form-control mt-1"
                                                                type="text" name="spread"
                                                                value="{{ isset($spread) ? $spread : old('spread') }}"
                                                                placeholder="Default input"
                                                                aria-label="default input example">
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
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="due_day">Due Day</label><br>
                                                            <select id="due_day" class="form-select mt-1 form-control"
                                                                aria-label="Default select example" name="due_day"
                                                                value="{{ old('due_day') }}">
                                                                <option selected>select</option>
                                                                <option value="3"
                                                                    {{ old('due_day') == '3' ? 'selected' : '' }}>3
                                                                </option>
                                                                <option value="5"
                                                                    {{ old('due_day') == '5' ? 'selected' : '' }}>5
                                                                </option>
                                                                <option value="7"
                                                                    {{ old('due_day') == '7' ? 'selected' : '' }}>7
                                                                </option>
                                                                <option value="10"
                                                                    {{ old('due_day') == '10' ? 'selected' : '' }}>10
                                                                </option>
                                                                <option value="16"
                                                                    {{ old('due_day') == '16' ? 'selected' : '' }}>16
                                                                </option>
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
                                                    {{-- <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="intereststartdate">Interest StartDate</label>
                                                        <div class="input-group mb-3">
                                                            <input type="date" name="interest_startdate" id="sdate"  class="form-control"  aria-label="Dollar amount (with dot and two decimal places)">
                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>

                                                        </div>
                                                    </div>
                                                </div> --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="FirstInstallmentdate">First Installment
                                                                Date</label>
                                                            <div class="input-group mb-3">
                                                                <input type="date" name="first_installment_date"
                                                                    value="{{ old('first_installment_date') }}"
                                                                    id="fins_date" class="form-control"
                                                                    aria-label="Dollar amount (with dot and two decimal places)">
                                                                <span class="input-group-text"><i
                                                                        class="fa-solid fa-calendar-days"></i></span>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="brk_prd_adjust">Broken Period
                                                                Adjustment</label><br>
                                                            <select id="brk_prd_adjust"
                                                                class="form-select mt-1 form-control"
                                                                aria-label="Default select example"
                                                                name="brokan_prd_adjust"
                                                                value="{{ old('brokan_prd_adjust') }}">
                                                                <option value="No">No</option>
                                                                <option value="Yes">Yes</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3" hidden>
                                                        <div class="form-group">
                                                            <label for="FirstInstallmentdate">Till Installment Date</label>
                                                            <div class="input-group mb-3">
                                                                <input type="date" name="till_installment_date"
                                                                    id="till_date" class="form-control"
                                                                    value="{{ old('till_installment_date') }}"
                                                                    aria-label="Dollar amount (with dot and two decimal places)">
                                                                <span class="input-group-text"><i
                                                                        class="fa-solid fa-calendar-days"></i></span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1" hidden>
                                                        <div class="form-group">
                                                            <label for="FirstInstallmentdate">Days</label>
                                                            <div class="input-group mb-3">
                                                                <input type="number" name="days_num" id="days_num"
                                                                    class="form-control" value="{{ old('days_num') }}"
                                                                    aria-label="Dollar amount (with dot and two decimal places)"
                                                                    readonly>
                                                                <input type="text" name="brk_charge" id="brk_charge"
                                                                    hidden>
                                                                <input type="text" name="ads_charge" id="ads_charge"
                                                                    hidden>
                                                                <input type="text" name="rem_final_amount"
                                                                    id="rem_final_amount" hidden>

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
                                                    {{-- <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="brk_prd_adjust">Broken Period Adjustment</label><br>
                                                        <select id="brk_prd_adjust" class="form-select mt-1 form-control" aria-label="Default select example" name="brokan_prd_adjust">
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
                                                        <button class="btn btn-secondary" id="calculate">Calculate
                                                            Installment</button>
                                                    </div>
                                                    <div class="col-md-9" style="text-align:end">
                                                        <a href="" data-toggle="modal"
                                                            data-target="#exampleModal">View Repayment Schedule</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"> <!-- Use colspan to span the entire row -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 style="font-weight:800">Installment :
                                                            <span style="font-weight: 500;" id="installment">INR
                                                                0.00</span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </td>

                                            <td colspan="4"> <!-- Use colspan to span the entire row -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="submit"
                                                            class="btn btn-primary mt-3">Submit</button>

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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">RePayment Schedule</h5>
                    <div class="div" style="text-align: end;margin-left:150px;">
                        <button class="btn btn-danger" id="downloadRePayment">Download Repayment Schedual</button>
                    </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
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


        //                 });

        //             },
        //             error: function(error) {
        //                 console.error("Error fetching customers:", error);
        //             }
        //         });
        //     } else {
        //         $('#customer_id').empty();
        //     }
        // });
        // $('#lon_id').change(function () {
        //     let loanId = $(this).val();
        //     fetchCustomersByLoanId(loanId); // Fetch customers
        // });

        var selectedLoanId = $('#lon_id').val();
        if (selectedLoanId) {
            fetchCustomersByLoanId(selectedLoanId); // Fetch customers
        }

        // Function to populate customers based on loan ID
        function fetchCustomersByLoanId(loanId) {
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
                        let customerId = $('#customer_id').val();
                        fetchLoanAndCustomerData(loanId,
                        customerId); // Fetch loan and customer data
                    },
                    error: function(error) {
                        console.error("Error fetching customers:", error);
                    }
                });
            } else {
                $('#customer_id').empty();
            }
        }

        // calling function

        function fetchLoanAndCustomerData(loanId, customerId) {
            // alert(customerId);
            $("#loanidmain").val(loanId);
            $("#custidmain").val(customerId);

            if (loanId) {
                $.ajax({
                    url: '{{ url('getloandata') }}/' + loanId,
                    method: 'GET',
                    success: function(response) {
                        console.log(response.repaymentdata);

                        // Populate credit data
                        let $creditdata = response.creditdata;
                        if ($creditdata && $creditdata.length > 0) {

                            $policy_rate = 18;
                            $rate = $creditdata[0]['policyrate'];
                            $spread = $rate - $policy_rate;
                            $("#appication_amount").val($creditdata[0]['requested_amount']);
                            $("#Tanure").val($creditdata[0]['sanctioned_tenure']);
                            $("#policy_rate").val($policy_rate);
                            $("#rate_percentage").val($creditdata[0]['policyrate']);
                            $("#sanctioned_amount").val($creditdata[0]['sanctioned_amount']);
                            $("#spread").val($spread);
                            $("#total_installment").val($creditdata[0]['sanctioned_tenure']);
                        }

                        // Populate repayment data
                        let $repaymentdata = response.repaymentdata;
                        if ($repaymentdata) {

                            if ($repaymentdata['broken_period_adjustment'] == 'Yes') {
                                $("#till_date").closest('.col-md-3').removeAttr('hidden');
                                $("#days_num").closest('.col-md-1').removeAttr('hidden');
                            }
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
                            $("#adv_installment").val($repaymentdata[
                                'number_of_advance_installment']);
                            $("#total_installment").val($repaymentdata[
                                'total_number_of_installment']);
                            $("#spread").val($repaymentdata['spread']);
                            $("#due_day").val($repaymentdata['due_day']);
                            $("#sdate").val($repaymentdata['interest_startdate']);
                            $("#fins_date").val($repaymentdata['first_installment_date']);
                            $("#brk_prd_adjust").val($repaymentdata['broken_period_adjustment']);
                            $("#int_chrge_type").val($repaymentdata['interest_charge_type']);
                            $("#int_chrged").val($repaymentdata['interest_charged']);
                            $("#act_date").val($repaymentdata['actual_date']);
                            $("#till_date").val($repaymentdata['till_date']);
                            $("#days_num").val($repaymentdata['days_num']);
                            $("#rate_percentage").val($repaymentdata['rate']);


                            if ($repaymentdata['advance_installment_to_be_deducted'] == 1) {
                                // alert('gjkgg');

                                $(".advance-installment").prop("checked", true);
                            } else {
                                $(".advance-installment").prop("checked", false);
                            }


                        }
                    },
                    error: function(error) {
                        console.error("Error fetching loan data:", error);
                    }
                });
            }
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


        // get repayment data
        $('#nav-profile-tab').on('click', function() {
            $loan_id = $("#lon_id").val();
            $cust_id = $("#customer_id").val();

            $("#loanidmain").val($loan_id);
            $("#custidmain").val($cust_id);
            // call ajax here
            $.ajax({
                url: '{{ url('getloandata') }}/' + $loan_id,
                method: 'GET',
                success: function(response) {
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
                    $("#adv_installment").val($repaymentdata[
                        'number_of_advance_installment']);
                    $("#total_installment").val($repaymentdata[
                        'total_number_of_installment']);
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
        // calculate installment
        $('#calculate').on('click', function(event) {
            event.preventDefault();
            $due_day = $("#due_day").val();
            if ($due_day >= 15) {
                getbrokendta();
            }

            $gettime = $("#Tanure_in").val();
            $amount = $("#sanctioned_amount").val(); // channge appication_amount to sectionamount
            $rate = $("#rate_percentage").val(); // change policy rate to rate_percentage
            $tanure = $("#Tanure").val();
            // for month and year
            $instdate = $("#fins_date").val();
            let startdate = new Date($instdate);
            let startmonth = startdate.getMonth();
            let startyear = startdate.getFullYear();
            // alert(startmonth);
            // alert(startyear);
            // alert(startdate);

            if ($gettime == "Month") {
                $r = $rate / 12 / 100;
                $emi1 = $amount * $r * (1 + $r) ** $tanure;
                $emi2 = (1 + $r) ** $tanure - 1;

                $emi3 = $emi1 / $emi2;
                //    $finalemi = Math.round($emi3 * 100) / 100;
                $finalemi = ($emi3 % 1 >= 0.5) ? Math.ceil($emi3) : Math.floor($emi3);
                $("#installment").text("INR " + $finalemi.toFixed(2).toLocaleString('en-IN'));

                // modal data

                let $remainblnc = $amount;
                //    let $opaningblnc = $amount;
                let emiSheet = [];
                let totalEmi = 0,
                    totalPrincipal = 0,
                    totalInterest = 0;

                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                    "Oct", "Nov", "Dec"
                ];
                for (let i = 1; i <= $tanure; i++) {
                    let $opaningblnc = $remainblnc;
                    $interst = $opaningblnc * $r; // cal month interest amount;
                    $newprinciple = $emi3 - $interst;
                    $remainblnc -= $newprinciple;


                    totalEmi += parseFloat($finalemi);
                    totalPrincipal += parseFloat($newprinciple);
                    totalInterest += parseFloat($interst);

                    let currentMonthIndex = (startmonth + i - 1) % 12;
                    let currentYear = startyear + Math.floor((startmonth + i - 1) / 12);

                    let emiDate = new Date(startdate);
                    emiDate.setMonth(startdate.getMonth() + (i - 1));
                    let formattedDate =
                        `${String(emiDate.getDate()).padStart(2, '0')}-${String(emiDate.getMonth() + 1).padStart(2, '0')}-${emiDate.getFullYear()}`;

                    emiSheet.push({
                        srno: i,
                        // months:monthNames[currentMonthIndex],
                        // year:currentYear,
                        date: formattedDate,
                        opaningblnc: parseFloat($opaningblnc).toFixed(2),
                        emi: $finalemi.toFixed(2),
                        principle: $newprinciple.toFixed(2),
                        interest: $interst.toFixed(2),
                        remainblnc: $remainblnc.toFixed(2)
                    });
                }
                let tableHTML = `
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               <th colspan="8" style="text-align:center">Repayment Schedual</th>
                            </tr>
                            <tr>
                                <th>Sr.No</th>
                                <th>Date</th>
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
                        <td class="text-nowrap">${row.srno}</td>
                        <td class="text-nowrap">${row.date}</td>
                        <td class="text-nowrap">${row.opaningblnc}</td>
                        <td class="text-nowrap">${row.emi}</td>
                        <td class="text-nowrap">${row.principle}</td>
                        <td class="text-nowrap">${row.interest}</td>
                        <td class="text-nowrap">${row.remainblnc}</td>
                    </tr>
                `;
                });

                tableHTML += `
                    </tbody>
                      <tfoot>
                        <tr>
                            <td style="text-align: center;"><strong>Total</strong></td>
                            <td></td>
                            <td></td>
                            <td><strong>${totalEmi.toFixed(2)}</strong></td>
                            <td><strong>${totalPrincipal.toFixed(2)}</strong></td>
                            <td><strong>${totalInterest.toFixed(2)}</strong></td>
                            <td></td> <!-- Empty for Remaining Balance -->
                        </tr>
                    </tfoot>
                </table>
            `;

                // Store EMI Table in a Div for Modal
                $("#emiSheet").html(tableHTML);

                if ($("#advanceinstallment").is(":checked")) {
                    $ads_install = $("#adv_installment").val();
                    $advance_amount = $finalemi * $ads_install;
                    $finalamount = $advance_amount.toFixed(2);
                    $remaining_amount = $amount - $finalamount;
                    $("#ads_charge").val($finalamount);
                    $("#rem_final_amount").val($remaining_amount);
                    // alert($remaining_amount);

                }

            }
            // else if($gettime == "Year")
            // {
            //    $r = $rate/100;
            //    $emi1 = $amount*$r*(1+$r)**$tanure;
            //    $emi2 = (1+$r)**$tanure - 1;

            //    $emi3 = $emi1/$emi2;
            //   //    $finalemi = Math.round($emi3 * 100) / 100;
            //    $finalemi = ($emi3 % 1 >= 0.5) ? Math.ceil($emi3) : Math.floor($emi3);
            //    $("#installment").text("INR " + $finalemi.toFixed(2).toLocaleString('en-IN'));

            // }

            // shivang 09-12-2024
            else if ($gettime === "Year") {
                let $r = $rate / 100; // Convert rate to decimal
                let $emi1 = $amount * $r * Math.pow(1 + $r, $tanure);
                let $emi2 = Math.pow(1 + $r, $tanure) - 1;
                let $emi3 = $emi1 / $emi2;

                // Round EMI value
                let $finalemi = Math.round($emi3);

                // Show calculated EMI
                $("#installment").text("INR " + $finalemi.toFixed(2).toLocaleString('en-IN'));

                let $remainblnc = $amount;
                let emiSheet = [];
                let totalEmi = 0,
                    totalPrincipal = 0,
                    totalInterest = 0;

                for (let i = 1; i <= $tanure; i++) {
                    let $opaningblnc = $remainblnc;
                    let $interst = $opaningblnc * $r; // Calculate yearly interest amount
                    let $newprinciple = $emi3 - $interst;
                    $remainblnc -= $newprinciple;

                    // Accumulate totals
                    totalEmi += parseFloat($finalemi);
                    totalPrincipal += parseFloat($newprinciple);
                    totalInterest += parseFloat($interst);

                    // Calculate year for EMI
                    let emiYear = startyear + i - 1; // Increment year based on iteration

                    // Append the EMI details for the current year
                    emiSheet.push({
                        srno: i,
                        year: emiYear,
                        opening_balance: parseFloat($opaningblnc).toFixed(2),
                        emi: parseFloat($finalemi).toFixed(2),
                        principle: parseFloat($newprinciple).toFixed(2),
                        interest: parseFloat($interst).toFixed(2),
                        remaining_balance: parseFloat($remainblnc).toFixed(2)
                    });
                }
                let tableHTML = `
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               <th colspan="8" style="text-align:center">Repayment Schedual</th>
                            </tr>
                            <tr>
                                <th>Sr.No</th>
                                <th>Year</th>
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
                        <td class="text-nowrap">${row.srno}</td>
                        <td class="text-nowrap">${row.year}</td>
                        <td class="text-nowrap">${row.opening_balance}</td>
                        <td class="text-nowrap">${row.emi}</td>
                        <td class="text-nowrap">${row.principle}</td>
                        <td class="text-nowrap">${row.interest}</td>
                        <td class="text-nowrap">${row.remaining_balance}</td>
                    </tr>
                `;
                });

                tableHTML += `
                    </tbody>
                      <tfoot>
                        <tr>
                            <td style="text-align: center;"><strong>Total</strong></td>
                            <td></td>
                            <td></td>
                            <td><strong>${totalEmi.toFixed(2)}</strong></td>
                            <td><strong>${totalPrincipal.toFixed(2)}</strong></td>
                            <td><strong>${totalInterest.toFixed(2)}</strong></td>
                            <td></td> <!-- Empty for Remaining Balance -->
                        </tr>
                    </tfoot>
                </table>
            `;

                // Store EMI Table in a Div for Modal
                $("#emiSheet").html(tableHTML);

                if ($("#advanceinstallment").is(":checked")) {
                    $ads_install = $("#adv_installment").val();
                    $advance_amount = $finalemi * $ads_install;
                    $finalamount = $advance_amount.toFixed(2);
                    $remaining_amount = $amount - $finalamount;
                    $("#ads_charge").val($finalamount);
                    $("#rem_final_amount").val($remaining_amount);
                    // alert($remaining_amount);

                }
                // Display the EMI Sheet
                // console.table(emiSheet);
            } else {
                alert("Please Select Tanure In!!");
            }
        });

        // downlaod data
        //     document.getElementById("downloadRePayment").addEventListener("click", function () {
        //     let table = document.querySelector("#emiSheet table");
        //     if (!table) {
        //         alert("No EMI schedule data available.");
        //         return;
        //     }

        //     let csv = [];
        //     let rows = table.querySelectorAll("thead tr, tbody tr, tfoot tr");

        //     rows.forEach((row) => {
        //         let cols = row.querySelectorAll("th, td");
        //         let rowData = [];

        //         cols.forEach((col) => {
        //             rowData.push(col.innerText.trim());
        //         });

        //         csv.push(rowData.join(","));
        //     });

        //     // Convert array to CSV string
        //     let csvContent = csv.join("\n");

        //     // Create a Blob from the CSV string
        //     let blob = new Blob([csvContent], { type: "text/csv" });
        //     let url = URL.createObjectURL(blob);

        //     // Create a download link and trigger the download
        //     let a = document.createElement("a");
        //     a.href = url;
        //     a.download = "Repayment_Schedule.csv";
        //     a.style.display = "none";
        //     document.body.appendChild(a);
        //     a.click();
        //     document.body.removeChild(a);
        // });

        document.getElementById("downloadRePayment").addEventListener("click", function() {
            let table = document.querySelector("#emiSheet table");
            if (!table) {
                alert("No EMI schedule data available.");
                return;
            }

            let csv = [];
            let rows = table.querySelectorAll("thead tr, tbody tr, tfoot tr"); // Include all rows

            // Handle the header with colspan and title
            let headerRow = table.querySelector(
            "thead tr:nth-child(1)"); // The row with "Repayment Schedule"
            let headerData = ["Repayment Schedule"]; // Title row with a colspan
            csv.push(headerData.join(",")); // Push this title row to CSV

            // Second header row with the actual column names
            let columnsHeader = table.querySelector("thead tr:nth-child(2)");
            let columnsData = Array.from(columnsHeader.querySelectorAll("th")).map(col => col.innerText
                .trim());
            csv.push(columnsData.join(","));

            // Handle the tbody rows with month data
            rows.forEach((row, rowIndex) => {
                let cols = row.querySelectorAll("th, td");
                let rowData = [];

                // Only process tbody rows
                if (row.parentNode.tagName === "TBODY") {
                    rowData = Array.from(cols).map(col => col.innerText.trim());
                }
                // Only add rows with data to CSV
                if (rowData.length > 0) {
                    csv.push(rowData.join(","));
                }
            });

            // Handle the footer row with totals
            let footerRow = table.querySelector("tfoot tr");
            let footerData = Array.from(footerRow.querySelectorAll("td")).map((col, colIndex) => {
                if (colIndex === 0) {
                    return "Total"; // For the "Total" column
                } else if (colIndex === 3 || colIndex === 4 || colIndex === 5) {
                    return col.innerText.trim(); // Total EMI, Principal, and Interest
                } else {
                    return ""; // Empty for the other columns
                }
            });
            csv.push(footerData.join(","));

            // Convert array to CSV string
            let csvContent = csv.join("\n");

            // Create a Blob from the CSV string
            let blob = new Blob([csvContent], {
                type: "text/csv"
            });
            let url = URL.createObjectURL(blob);

            // Create a download link and trigger the download
            let a = document.createElement("a");
            a.href = url;
            a.download = "Repayment_Schedule.csv";
            a.style.display = "none";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });


    });
</script>
<script>
    $(document).ready(function() {
        $("#policy_rate").val(18);

        $("#rate_percentage").on('input', function() {
            $val = $(this).val();
            $policy_rate = $("#policy_rate").val();
            $spread = $val - $policy_rate;
            $("#spread").val($spread);
        });


        $("#brk_prd_adjust").on('change', function() {
            var val = $(this).val();

            if (val === 'Yes') {
                // Show the hidden div by removing the `hidden` attribute
                $("#till_date").closest('.col-md-3').removeAttr('hidden');
            } else {
                // Hide the div by adding the `hidden` attribute
                $("#till_date").closest('.col-md-3').attr('hidden', true);
                $("#days_num").closest('.col-md-1').attr('hidden', true);
            }
        });


        $("#due_day").on('change', function() {
            $val = $(this).val();
            var today = new Date();
            var year = today.getFullYear();
            var month = today.getMonth();
            if ($val <= 15) {
                month += 1;
                if (month > 11) {
                    month = 0;
                    year += 1;
                }
                var targetDate = new Date(year, month, 7);
                var day = String(targetDate.getDate()).padStart(2, '0');
                var formattedMonth = String(targetDate.getMonth() + 1).padStart(2, '0');
                var shortYear = String(targetDate.getFullYear());
                var formattedDate = `${shortYear}-${formattedMonth}-${day}`;
                $("#fins_date").val(formattedDate);
                $("#brk_prd_adjust").val('No');
                $("#till_date").closest('.col-md-3').attr('hidden', true);
                $("#days_num").closest('.col-md-1').attr('hidden', true);
            } else {
                var nextmonth = month + 2;
                if (nextmonth > 11) {
                    nextmonth -= 12;
                    year += 1;
                }
                var targetDate = new Date(year, nextmonth, 7);
                var day = String(targetDate.getDate()).padStart(2, '0');
                var formattedMonth = String(targetDate.getMonth() + 1).padStart(2, '0');
                var shortYear = String(targetDate.getFullYear());
                var formattedDate = `${shortYear}-${formattedMonth}-${day}`;
                $("#fins_date").val(formattedDate);

                // last month
                let lastMonth = nextmonth - 1;
                if (lastMonth < 0) {
                    lastMonth = 11;
                    year -= 1;
                }
                let targetDate1 = new Date(year, lastMonth, 7);
                var day1 = String(targetDate1.getDate()).padStart(2, '0');
                var formattedMonth1 = String(targetDate1.getMonth() + 1).padStart(2, '0');
                var shortYear1 = String(targetDate1.getFullYear());
                var formattedDate1 = `${shortYear1}-${formattedMonth1}-${day1}`;


                $("#brk_prd_adjust").val('Yes');
                $val = $("#brk_prd_adjust").val();
                if ($val === 'Yes') {
                    $("#till_date").closest('.col-md-3').removeAttr('hidden');
                    $("#days_num").closest('.col-md-1').removeAttr('hidden');
                    $("#till_date").val(formattedDate1);

                    // days count
                    var today1 = new Date();
                    var year1 = today1.getFullYear();
                    var month1 = today1.getMonth();
                    let sixtindate = new Date(year1, month1, 16);


                    let diffTime = targetDate1 - sixtindate;
                    let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    $("#days_num").val(diffDays);

                    // broken adjusment chager
                    $amount = $("#sanctioned_amount").val();
                    $rate = $("#rate_percentage").val();

                    let dailyRate = $rate / 365;
                    let dailyCharge = $amount * (dailyRate / 100);
                    let totalCharge = dailyCharge * diffDays;

                    let brk_charge = Math.round(totalCharge);

                    $("#brk_charge").val(brk_charge);

                    // alert(brk_charge);
                }

            }
        });


        // advance installment

        // $('#advanceinstallment').on('change', function () {
        //     if ($(this).is(':checked')) {
        //      $ads_install = $("#adv_installment").val();
        //      alert($ads_install);
        //     }
        // });

    });

    function getbrokendta() {
        $val = $('#due_day').val();
        var today = new Date();
        var year = today.getFullYear();
        var month = today.getMonth();
        if ($val <= 15) {
            month += 1;
            if (month > 11) {
                month = 0;
                year += 1;
            }
            var targetDate = new Date(year, month, 7);
            var day = String(targetDate.getDate()).padStart(2, '0');
            var formattedMonth = String(targetDate.getMonth() + 1).padStart(2, '0');
            var shortYear = String(targetDate.getFullYear());
            var formattedDate = `${shortYear}-${formattedMonth}-${day}`;
            $("#fins_date").val(formattedDate);
            $("#brk_prd_adjust").val('No');
            $("#till_date").closest('.col-md-3').attr('hidden', true);
            $("#days_num").closest('.col-md-1').attr('hidden', true);
        } else {
            var nextmonth = month + 2;
            if (nextmonth > 11) {
                nextmonth -= 12;
                year += 1;
            }
            var targetDate = new Date(year, nextmonth, 7);
            var day = String(targetDate.getDate()).padStart(2, '0');
            var formattedMonth = String(targetDate.getMonth() + 1).padStart(2, '0');
            var shortYear = String(targetDate.getFullYear());
            var formattedDate = `${shortYear}-${formattedMonth}-${day}`;
            $("#fins_date").val(formattedDate);

            // last month
            let lastMonth = nextmonth - 1;
            if (lastMonth < 0) {
                lastMonth = 11;
                year -= 1;
            }
            let targetDate1 = new Date(year, lastMonth, 7);
            var day1 = String(targetDate1.getDate()).padStart(2, '0');
            var formattedMonth1 = String(targetDate1.getMonth() + 1).padStart(2, '0');
            var shortYear1 = String(targetDate1.getFullYear());
            var formattedDate1 = `${shortYear1}-${formattedMonth1}-${day1}`;


            $("#brk_prd_adjust").val('Yes');
            $val = $("#brk_prd_adjust").val();
            if ($val === 'Yes') {
                $("#till_date").closest('.col-md-3').removeAttr('hidden');
                $("#days_num").closest('.col-md-1').removeAttr('hidden');
                $("#till_date").val(formattedDate1);

                // days count
                let diffTime = targetDate1 - today;
                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                $("#days_num").val(diffDays);

                // broken adjusment chager
                $amount = $("#sanctioned_amount").val();
                $rate = $("#rate_percentage").val();

                let dailyRate = $rate / 365;
                let dailyCharge = $amount * (dailyRate / 100);
                let totalCharge = dailyCharge * diffDays;

                let brk_charge = Math.round(totalCharge);

                $("#brk_charge").val(brk_charge);

                // alert(brk_charge);
            }

        }

    }
</script>
