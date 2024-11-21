@push('title')
    <title>Application form</title>
@endpush
@extends('layout.main')

@section('main-section')
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
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <!-- <link rel="stylesheet" href="./style.css"> -->
                        <title>IIFL Fianace</title>
                        <style>
                            table {
                                width: 100%;
                                border: 1px solid black;
                                margin-top: 2px;
                            }

                            thead>tr {
                                border: solid thin;
                            }

                            .pt {
                                width: 95%;
                            }

                            .refer1 {
                                display: flex;
                                align-items: center;
                            }

                            #table-1 {
                                width: 100%;
                            }

                            h1 {
                                text-align: center;
                            }

                            .borrow {
                                text-align: center;
                                width: 50%;
                            }

                            input {
                                margin-left: 15px;
                            }

                            .main {
                                display: flex;
                                justify-content: space-between;
                            }

                            .text {
                                width: 300px;
                                height: 100px;
                            }



                            .title {
                                width: 80%;
                            }

                            .tbdata {
                                width: 80%;
                            }

                            .tab-data {
                                width: 70%;
                            }

                            .tab-data1 {
                                width: 70%;
                                height: 100px;
                                text-align: center;
                            }

                            .tables-5 {
                                /* border: 1px solid red; */
                                width: 100%;
                                display: flex;
                                justify-content: space-between;
                            }

                            #nest-table {
                                /* width: 45%;  */
                                width: 50%
                                /* border: 2px solid blue; */
                            }

                            #net-table {
                                width: 45%;
                                /* border: 2px solid yellow; */
                            }

                            .refer {
                                display: flex;
                                justify-content: space-between;
                            }

                            #tfoot {
                                border: none;
                            }

                            .table-r>tr>td {
                                width: 50%;
                                border: solid thin;
                            }

                            #table-6,
                            tr,
                            td {
                                border-collapse: collapse;

                            }

                            span {
                                color: red;
                            }

                            #table-7 {
                                border-collapse: collapse;
                            }

                            #tchild,
                            tr,
                            td {
                                border-collapse: collapse;
                            }

                            .tab-child>tr>td {
                                border: solid thin;
                            }

                            .tab-child1>tr>td {
                                width: 30%;
                                border: solid thin;
                            }

                            .tab-child3>tr>td {
                                width: 30%;
                                height: 20px;
                                border: solid thin;
                            }

                            .tab-child4>tr>td {
                                width: 10%;
                                height: 20px;
                                border: solid thin;
                            }


                            .p-content {
                                text-align: center;
                            }

                            .loan {
                                text-align: center;
                            }

                            p {
                                padding: 0;
                                margin: 0;
                            }

                            .serial {
                                float: right;
                            }

                            h3 {
                                text-align: center;
                            }

                            .accepted {
                                width: 40%;
                                height: 100px;
                            }

                            .ap {
                                margin-left: 18px;
                            }

                            .text1 {
                                width: 300px;
                                height: 100px;
                            }

                            .header {
                                text-align: center;
                            }

                            .d-text {
                                display: flex;
                                align-items: center;
                            }

                            .d-text>div {
                                margin-left: 20px;
                            }

                            #table-22 {
                                border: none;
                                width: 100%;
                            }

                            .d-name {
                                display: flex;
                                justify-content: space-between;
                            }

                            .header-1 {
                                margin-left: 15px;
                            }

                            .tab-tabale {
                                width: 80%;
                            }

                            .letter {
                                height: 400px;
                                width: 100%;
                                background-color: aquamarine;
                            }

                            .section-2 {
                                display: flex;
                            }

                            .section-3 {
                                display: flex;
                                justify-content: space-evenly;
                            }

                            .start {
                                margin-left: 130px;
                            }
                        </style>
                    </head>

                    <body>


                        <!-- table=1 -->
                        <table cellpadding="1px" cellspacing="0" rules="none">
                            <thead>
                                <tr>
                            

                                   
                                    <td colspan="6">
                                        <h1>APPLICATION FORM</h1>

                                       
                                    </td>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                    <td colspan="6">
                                        <div class="main">
                                            <p>For office Use Only</p>
                                            <p>CKYC No: <input type="text" value="{{ $officedata->ckyc_no }}"></p>
                                        </div>
                                    </td>
                                <tr>
                                    <td>Date of Application: </td>
                                    <td>
                                        <input type="text" value="{{ $officedata->date }}">
                                    </td>
                                    <td>Custmer ID:</td>
                                    <td>
                                        <input type="text" value="{{ $officedata->customer_id }}">
                                    </td>
                                    <td>Prospect No: </td>
                                    <td>
                                        <input type="text" value="{{ $officedata->Prospect_No }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tenure(Monts): </td>
                                    <td>
                                        <input type="text" value="{{ $officedata->Months }}">
                                    </td>
                                    <td>Loan Amount(&#8377;): </td>
                                    <td>
                                        <input type="text" value="{{ $officedata->Loan_Amount }}">
                                    </td>
                                    <td>Purpose:</td>
                                    <td>
                                        <input type="text" value="{{ $officedata->Purpose }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">Application Type:

                                        <input type="checkbox" name="new" id="New"
                                            value="{{ $officedata->Application_Type }}"
                                            {{ $officedata->Application_Type == 'new' ? 'checked' : '' }}>


                                        <label for="New">New</label>

                                        <input type="checkbox" name="new" id="Updated" value="{{ $officedata->Application_Type }}"  
                                         {{ $officedata->Application_Type == 'updated' ? 'checked' : ''}}>
                                        <label for="Updated">Updated</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">Account Type:
                                        @php
                                            $checkedValues = ['minor', 'normal', 'kyc'];
                                        @endphp
                                        <input type="checkbox" name="normal" id="normal"
                                            value="{{ $officedata->Account_Type }}"
                                            {{ $officedata->Account_Type == 'normal' ? 'checked' : ''}}>
                                            
                                        <label for="normal">Normal</label>

                                        <input type="checkbox" name="normal"
                                            id="minor"value="{{ $officedata->Account_Type }}"
                                            {{ $officedata->Account_Type == 'minor' ? 'checked' : ''}}>
                                        <label for="minor">Minor</label>

                                        <input type="checkbox" name="normal"
                                            id="kyc"value="{{ $officedata->Account_Type }}"
                                            {{ $officedata->Account_Type == 'kyc' ? 'checked' : ''}}>
                                        <label for="kyc">Aadhar Based OTP E-KYC(in non-face to face Mode)</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <p>(Please fill the form in Block Letters.Any CANCELLATION to be Counter SIGNED)</p>
                                    </td>
                                </tr>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table-2 -->

                        <table id="table-1" cellpadding="1px" cellspacing="0" rules="none">

                            <thead>
                                <tr>
                                    <td colspan="8">
                                        <h3>BORROW DETAILS</h3>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="8"> Name Of Borrower: <input type="text" class="borrower"
                                            value="{{ $customer->cust_name }}"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Borrower Entity Type:</td>
                                    <td colspan="2">
                                        <input type="text" value="{{ $customer->cust_entity_type }}">
                                    </td>
                                    <td colspan="2"> Date of Incorporation:</td>
                                    <td colspan="2">
                                        <input type="text" value="{{ $customer->Date_of_Incorporation }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Principle Office Address/Place of bussiness:</td>
                                    <td colspan="6">
                                        <input type="text" class="borrower"
                                            value="{{ $customer->Principal_office_address }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">City/Village/Town:</td>
                                    <td colspan="2">
                                        <input type="text" value="{{ $customer->Principal_City }}">
                                    </td>
                                    <td>Distric:</td>
                                    <td>
                                        <input type="text" value="{{ $customer->Principal_District }}">
                                    </td>
                                    <td>State: </td>
                                    <td>
                                        <input type="text" value="{{ $customer->Principal_State }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Pin/Post Code:</td>
                                    <td colspan="2">
                                        <input type="text" value="{{ $customer->Principal_pincode }}">
                                    </td>
                                    <td>State/UT Code: </td>
                                    <td>
                                        <input type="text" value="{{ $customer->Principal_State_code }}">
                                    </td>
                                    <td>ISQ 3166 Country Code:</td>
                                    <td>
                                        <input type="text" value="{{ $customer->Principal_Country_Code }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Place of Incorporation:</td>
                                    <td colspan="6">
                                        <input type="text" class="borrower"
                                            value="{{ $customer->Place_of_incorporation }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Telephone(Office): </td>
                                    <td colspan="2">
                                        <input type="number" value="{{ $customer->cust_Telephone }}">
                                    </td>
                                    <td colspan="2">E-Mail Address:</td>
                                    <td colspan="2">
                                        <input type="email" value="{{ $customer->cust_email }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Type of Industry/Profession:</td>
                                    <td colspan="2">
                                        <input type="text" value="{{ $customer->Type_of_Industry }}">
                                    </td>
                                    <td>Segment:</td>
                                    <td>
                                        <input type="text" value="{{ $customer->Segment }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>GST:</td>
                                    <td>
                                        <input type="text" value="{{ $customer->cust_gst }}">
                                    </td>
                                    <td> PAN:</td>
                                    <td><input type="text" value="{{ $customer->cust_pannumber }}"></td>
                                    <td> Form 60:</td>
                                    <td>
                                        <input type="text" value="{{ $customer->Form_60 }}">
                                    </td>
                                    <td>Overall Buisness Vintage:</td>
                                    <td>
                                        <input type="text" value="{{ $customer->Overall_Business_Vintage }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
 
                        <table cellpadding="1px" cellspacing="0" rules="none"> 
                            @foreach ( $Proprietors as  $Proprietor )
                            <thead> 
                                
                                <tr >
                                    <td colspan="6" >
                                        <div style="display: flex; justify-content:center;">
                                        <h3>{{ $loop->iteration}} . </h3>
                                        <h3 style="margin-left: 50px; ">DETAIL OF PROPRIETOR / MANAGING DIRECTOR</h3>
                                         </div>
                                    </td>
                                </tr>
                            </thead> 
                           
                            <tbody>
                                <tr>
                                    <td rowspan="7"><img src="./images1.jpeg"></td>
                                </tr>
                                <tr>
                                    <td>Title:</td>
                                    <td colspan="4"> <input type="text" class="title"
                                            value="{{ $Proprietor->title }}"></td>
                                </tr>
                                <tr>
                                    <td>Full Name: </td>
                                    <td colspan="4">
                                        <input type="text" class="title" value="{{ $Proprietor->proprietor_name }}">
                                    </td>
                                </tr>
                                <tr>

                                
                                    <td colspan="6">Relation with Applicant
                                        <input type="checkbox" name="name" id="partner"  value="{{ $Proprietor->relation_with_applicant }}" {{ $Proprietor->relation_with_applicant == 'Partner' ? 'checked' : ''}}>
                                        <label for="partner">Partner</label>


                                        <input type="checkbox" name="name" id="director" value="{{ $Proprietor->relation_with_applicant }}" {{ $Proprietor->relation_with_applicant == 'Director' ? 'checked' : ''}}>
                                        <label for="director">Director</label>

                                        <input type="checkbox" name="name" id="proprietor" value="{{ $Proprietor->relation_with_applicant }}" {{ $Proprietor->relation_with_applicant == 'Proprietor' ? 'checked' : ''}}>
                                        <label for="proprietor">Proprietor</label>

                                        <input type="checkbox" name="name" id="promoter" value="{{ $Proprietor->relation_with_applicant }}" {{ $Proprietor->relation_with_applicant == 'Promoter' ? 'checked' : ''}}>
                                        <label for="promoter">Promoter</label>


                                        <input type="checkbox" name="name" id="karta" value="{{ $Proprietor->relation_with_applicant }}" {{ $Proprietor->relation_with_applicant == 'karta' ? 'checked' : ''}}>
                                        <label for="karta">Karta</label>

                                        <input type="checkbox" name="name" id="benificialy" value="{{ $Proprietor->relation_with_applicant }}" {{ $Proprietor->relation_with_applicant == 'benificialy' ? 'checked' : ''}}>
                                        <label for="benificialy">Benificialy</label>

                                        <input type="checkbox" name="name" id="other" value="{{ $Proprietor->relation_with_applicant }}" {{ $Proprietor->relation_with_applicant == 'other' ? 'checked' : ''}}>
                                        <label for="other">Other</label>


                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Applying As Co-Borrower:
                                        <input type="checkbox" id="yes" value="{{ $Proprietor->applying_as_co_borrower }}" {{ $Proprietor->applying_as_co_borrower == 'Yes' ? 'checked' : ''}}>
                                        <label for="yes">Yes</label>
                                        <input type="checkbox" id="no" value="{{ $Proprietor->applying_as_co_borrower }}" {{ $Proprietor->applying_as_co_borrower == 'No' ? 'checked' : ''}}>
                                        <label for="no">No</label>
                                    </td>
                                    <td>Father Name/Spouse Name: </td>
                                    <td colspan="2">
                                        <input type="text" value="{{ $Proprietor->father_or_spouse_name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shareholding % in Borrowing Entity</td>
                                    <td colspan="4">
                                        <input type="text" value="{{ $Proprietor->applying_as_co_borrower }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marital Status:</td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Marital_Status }}">
                                    </td>
                                    <td>Citizenship:</td>
                                    <td colspan="2">
                                        <input type="text" value="{{ $Proprietor->Citizenship }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td> Residential Status:</td>
                                    <td colspan="6">
                                        <input type="checkbox" value="{{ $Proprietor->Residential_Status }}" {{ $Proprietor->Residential_Status == 'Resident Individual' ? 'checked' : ''}}><label>Resident Individual</label>
                                        <input type="checkbox" value="{{ $Proprietor->Residential_Status }}" {{ $Proprietor->Residential_Status == 'Non Resident India' ? 'checked' : ''}}><label>Non Resident India</label>
                                        <input type="checkbox" value="{{ $Proprietor->Residential_Status }}" {{ $Proprietor->Residential_Status == 'Foreign National' ? 'checked' : ''}}><label>Foreign National</label>
                                        <input type="checkbox"  value="{{ $Proprietor->Residential_Status }}" {{ $Proprietor->Residential_Status == 'Person of Indian Origin' ? 'checked' : ''}}><label>Person of Indian Origin</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2">Occupation type:</td>
                                    <td colspan="6">
                                        <input type="checkbox" value="{{ $Proprietor->Occupation_type }}" {{ $Proprietor->Occupation_type == 'Service' ? 'checked' : ''}}><label>Service:(Private Selector/Public Selector/Govt.Selector)</label>
                                        <input type="checkbox"  value="{{ $Proprietor->Occupation_type }}" {{ $Proprietor->Occupation_type == 'Business' ? 'checked' : ''}}><label>Business</label>
                                        <input type="checkbox"  value="{{ $Proprietor->Occupation_type }}" {{ $Proprietor->Occupation_type == 'Not categorized' ? 'checked' : ''}}><label>Not Categirized</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <input type="checkbox" value="{{ $Proprietor->Occupation_type }}" {{ $Proprietor->Occupation_type == 'Others' ? 'checked' : ''}}><label>Others:(Profrssional/Self Employed/Retired/Housewife/Student)</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Different From Permenant Address?</td>
                                    <td colspan="8">
                                        <input type="checkbox" value="{{ $Proprietor->Different_from_Permanent_addess }}" {{ $Proprietor->Different_from_Permanent_addess == 'Yes' ? 'checked' : ''}} >
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Current Residence Addresss: </td>
                                    <td colspan="8">
                                        <input type="text" class="title" value="{{ $Proprietor->Current_Residence_Address}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Landmark: </td>
                                    <td colspan="8"> <input type="text" class="title" value="{{ $Proprietor->Current_Landmark}}"></td>
                                </tr>
                                <tr>
                                    <td>City/Town/Village:</td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Current_City}}">
                                    </td>
                                    <td>District: </td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Current_District}}">
                                    </td>
                                    <td>State:</td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Current_State}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pin/Post code:</td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Current_pincode}}">
                                    </td>
                                    <td>State/UT Code: </td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Current_State_code}}">
                                    </td>
                                    <td>ISO 3166 Country Code:</td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Current_Country_Code}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resident Type</td>
                                    <td>
                                        <input type="checkbox" value="{{ $Proprietor->Residence_Type }}" {{ $Proprietor->Residence_Type == 'Rented' ? 'checked' : ''}}><label>Rented</label>
                                        <input type="checkbox" value="{{ $Proprietor->Residence_Type }}" {{ $Proprietor->Residence_Type == 'Owned' ? 'checked' : ''}}><label>Owned</label>
                                        <input type="checkbox" value="{{ $Proprietor->Residence_Type }}" {{ $Proprietor->Residence_Type == 'Parental' ? 'checked' : ''}}><label>Parental</label>
                                        <input type="checkbox" value="{{ $Proprietor->Residence_Type }}" {{ $Proprietor->Residence_Type == 'Other' ? 'checked' : ''}}><label>Other</label>

                                    </td>
                                    <td>No. of years in Current Residence:</td>
                                    <td>
                                        <input type="number"  value="{{ $Proprietor->Current_Residences_years }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address as per proof of address/proof of identity</td>
                                    <td colspan="6"><input type="checkbox" value="{{ $Proprietor->Address_as_per_proof }}" {{ $Proprietor->Address_as_per_proof == 'Yes' ? 'checked' : ''}}></td>
                                </tr>
                                <tr>
                                    <td>Permanent Residence Address:</td>
                                    <td colspan="6"><input type="text" value="{{ $Proprietor->Permanent_Residence_Address }}"></td>
                                </tr>
                                <tr>
                                    <td>Landmark:</td>
                                    <td colspan="6"><input type="text" value="{{ $Proprietor->Permanent_Landmark }}"></td>
                                </tr>
                                <tr>
                                    <td>City/Town/Village:</td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Permanent_City }}">
                                    </td>
                                    <td>District: </td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Permanent_District }}">
                                    </td>
                                    <td>State:</td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Permanent_State }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pin/Post code:</td>
                                    <td> <input type="text" value="{{ $Proprietor->Permanent_pincode }}"></td>
                                    <td>State/UT Code: </td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Permanent_State_code }}">
                                    </td>
                                    <td>ISO 3166 Country Code:</td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->Permanent_Country_Code }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile No.</td>
                                    <td colspan="2">
                                        <input type="number" value="{{ $Proprietor->proprietor_Mobile_no }}">
                                    </td>
                                    <td>E-Mail Address: </td>
                                    <td colspan="2">
                                        <input type="email" value="{{ $Proprietor->proprietor_email }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>PAN: </td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->proprietor_pannumber }}">
                                    </td>
                                    <td>From 60: </td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->proprietor_Form_60 }}">
                                    </td>
                                    <td>AADHAR No: </td>
                                    <td>
                                        <input type="text" value="{{ $Proprietor->proprietor_adharnumber }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody> 
                            @endforeach
                        </table>

                        <table cellpadding="1px" cellspacing="0" rules="none"> 
                            @foreach ( $CoCustomers as  $CoCustomer )
                            <thead>
                                <tr>
                                    <td colspan="6">   
                                        <div style="display: flex; justify-content:center;">
                                        <h3>{{ $loop->iteration}} . </h3>
                                        <h3 style="margin-left: 50px; ">DETAILS OF CO-BORROWER</h3> 
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="7"><img src="./images1.jpeg"></td>
                                </tr>
                                <tr>
                                    <td>Title:</td>
                                    <td colspan="4"> <input type="text" class="title" value="{{$CoCustomer->title}}"></td>
                                </tr>
                                <tr>
                                    <td>Full Name: </td>
                                    <td colspan="4">
                                        <input type="text" class="title" value="{{$CoCustomer->co_cust_name}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">Relation with Applicant
                                        <input type="checkbox" name="relation_with_applicant[]" id="partner" value="partner" {{$CoCustomer->relation_with_applicant == 'Partner' ? 'checked' : ''}}>
                                        <label for="partner">Partner</label>
                                    
                                        <input type="checkbox" name="relation_with_applicant[]" id="director" value="director" {{$CoCustomer->relation_with_applicant == 'Director' ? 'checked' : ''}}>
                                        <label for="director">Director</label>
                                    
                                        <input type="checkbox" name="relation_with_applicant[]" id="proprietor" value="proprietor" {{$CoCustomer->relation_with_applicant == 'Proprietor' ? 'checked' : ''}}>
                                        <label for="proprietor">Proprietor</label>
                                    
                                        <input type="checkbox" name="relation_with_applicant[]" id="promoter" value="promoter" {{$CoCustomer->relation_with_applicant == 'Promoter' ? 'checked' : ''}}>
                                        <label for="promoter">Promoter</label>
                                    
                                        <input type="checkbox" name="relation_with_applicant[]" id="karta" value="karta" {{$CoCustomer->relation_with_applicant == 'Karta' ? 'checked' : ''}}>
                                        <label for="karta">Karta</label>
                                    
                                        <input type="checkbox" name="relation_with_applicant[]" id="benificialy" value="benificialy" {{$CoCustomer->relation_with_applicant == 'Beneficiary' ? 'checked' : ''}}>
                                        <label for="benificialy">Beneficiary</label>
                                    
                                        <input type="checkbox" name="relation_with_applicant[]" id="other" value="other" {{$CoCustomer->relation_with_applicant == 'Other' ? 'checked' : ''}}>
                                        <label for="other">Other</label>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td colspan="2">Applying As Co-Borrower:
                                        <input type="checkbox" id="yes" value="Yes" {{$CoCustomer->applying_as_co_borrower == 'Yes' ? 'checked' : ''}}>
                                        <label for="yes">Yes</label>
                                        <input type="checkbox" id="no" value="No" {{$CoCustomer->applying_as_co_borrower == 'No' ? 'checked' : ''}}>
                                        <label for="no">No</label>
                                    </td>
                                    <td>Father Name/Spouse Name: </td>
                                    <td colspan="2">
                                        <input type="text" value="{{$CoCustomer->father_or_spouse_name}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shareholding % in Borrowing Entity</td>
                                    <td colspan="4">
                                        <input type="text" value="{{$CoCustomer->shareholding_with_cust_entity}}" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marital Status:</td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Marital_Status}}">
                                    </td>
                                    <td>Citizenship:</td>
                                    <td colspan="2">
                                        <input type="text" value="{{$CoCustomer->Citizenship}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td> Residential Status:</td>
                                    <td colspan="6">
                                        <input type="checkbox" value="{{$CoCustomer->Residential_Status}}" {{$CoCustomer->Residential_Status == 'Resident Individual'  ? 'checked' : ''}}><label>Resident Individual</label>
                                        <input type="checkbox" value="{{$CoCustomer->Residential_Status}}" {{$CoCustomer->Residential_Status == 'Non Resident India'  ? 'checked' : ''}}><label>Non Resident India</label>
                                        <input type="checkbox" value="{{$CoCustomer->Residential_Status}}" {{$CoCustomer->Residential_Status == 'Foreign National'  ? 'checked' : ''}}><label>Foreign National</label>
                                        <input type="checkbox" value="{{$CoCustomer->Residential_Status}}" {{$CoCustomer->Residential_Status == 'Person of Indian Origin'  ? 'checked' : ''}}><label>Person of Indian Origin</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2">Occupation type:</td>
                                    <td colspan="6">
                                        <input type="checkbox"><label>Service:(Private Selector/Public
                                            Selector/Govt.Selector)</label>
                                        <input type="checkbox" value="{{$CoCustomer->Occupation_type}}" {{$CoCustomer->Occupation_type == 'Business'  ? 'checked' : ''}}><label>Business</label>
                                        <input type="checkbox" value="{{$CoCustomer->Occupation_type}}" {{$CoCustomer->Occupation_type == 'Not Categirized'  ? 'checked' : ''}}><label>Not Categirized</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <input type="checkbox" value="{{$CoCustomer->Occupation_type}}" {{$CoCustomer->Occupation_type == 'Other'  ? 'checked' : ''}}><label>Others:(Profrssional/Self
                                            Employed/Retired/Housewife/Student)</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Different From Permenant Address?</td>
                                    <td colspan="8">
                                        <input type="checkbox" value="{{$CoCustomer->Different_from_Permanent_addess}}" {{$CoCustomer->Different_from_Permanent_addess == 'Yes'  ? 'checked' : ''}}>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Current Residence Addresss: </td>
                                    <td colspan="8">
                                        <input type="text" class="title" value="{{$CoCustomer->Current_Residence_Address}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Landmark: </td>
                                    <td colspan="8"> <input type="text" class="title" value="{{$CoCustomer->Current_Landmark}}"></td>
                                </tr>
                                <tr>
                                    <td>City/Town/Village:</td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Current_City}}">
                                    </td>
                                    <td>District: </td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Current_District}}">
                                    </td>
                                    <td>State:</td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Current_State}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pin/Post code:</td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Current_pincode}}">
                                    </td>
                                    <td>State/UT Code: </td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Current_State_code}}">
                                    </td>
                                    <td>ISO 3166 Country Code:</td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Current_Country_Code}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resident Type</td>
                                    <td>
                                        <input type="checkbox" name="residence_type" value="Rented" {{$CoCustomer->Residence_Type == 'Rented' ? 'checked' : ''}}><label>Rented</label>
                                        <input type="checkbox" name="residence_type" value="Owned" {{$CoCustomer->Residence_Type == 'Owned' ? 'checked' : ''}}><label>Owned</label>
                                        <input type="checkbox" name="residence_type" value="Parental" {{$CoCustomer->Residence_Type == 'Parental' ? 'checked' : ''}}><label>Parental</label>
                                        <input type="checkbox" name="residence_type" value="Other" {{$CoCustomer->Residence_Type == 'Other' ? 'checked' : ''}}><label>Other</label>
                                    </td>
                                    
                                    <td>No. of years in Current Residence:</td>
                                    <td>
                                        <input type="number" value="{{$CoCustomer->Current_Residences_years}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address as per proof of address/proof of identity</td>
                                    <td colspan="6"><input type="checkbox" value="{{$CoCustomer->Address_as_per_proof}} {{$CoCustomer->Address_as_per_proof == 'Yes' ? 'checked' : ''}}"></td>
                                </tr>
                                <tr>
                                    <td>Permanent Residence Address:</td>
                                    <td colspan="6"><input type="text" value="{{$CoCustomer->Permanent_Residence_Address}}"></td>
                                </tr>
                                <tr>
                                    <td>Landmark:</td>
                                    <td colspan="6"><input type="text" value="{{$CoCustomer->Permanent_Landmark}}"></td>
                                </tr>
                                <tr>
                                    <td>City/Town/Village:</td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Permanent_City}}">
                                    </td>
                                    <td>District: </td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Permanent_District}}">
                                    </td>
                                    <td>State:</td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Permanent_State}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pin/Post code:</td>
                                    <td> <input type="text" value="{{$CoCustomer->Permanent_pincode}}"></td>
                                    <td>State/UT Code: </td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Permanent_State_code}}">
                                    </td>
                                    <td>ISO 3166 Country Code:</td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->Permanent_Country_Code}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile No.</td>
                                    <td colspan="2">
                                        <input type="number" value="{{$CoCustomer->co_cust_Mobile_no}}">
                                    </td>
                                    <td>E-Mail Address: </td>
                                    <td colspan="2">
                                        <input type="email" value="{{$CoCustomer->co_cust_email}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>PAN: </td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->co_cust_pannumber}}">
                                    </td>
                                    <td>From 60: </td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->co_cust_Form_60}}">
                                    </td>
                                    <td>AADHAR No: </td>
                                    <td>
                                        <input type="text" value="{{$CoCustomer->co_cust_adharnumber}}">
                                    </td>
                                </tr>
                            </tbody> 
                            @endforeach
                        </table>

                        <!-- table-3 -->

                        <table cellpadding="1px" cellspacing="0" rules="none"> 
                            @foreach ( $Remainingpartners as  $Remainingpartner )
                            <thead>
                                <tr>
                                    <td colspan="3"> 
                                        <div style="display: flex; justify-content:center;">
                                            <h3>{{ $loop->iteration}} . </h3>
                                        <h3 style="margin-left: 50px; ">DETAILS OF REMAINING PARTNERS/DIRECTORS</h3> 
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Full Name</td>
                                    <td><input type="text" class="tbdata" value="{{$Remainingpartner->partners_name}}"></td>
        
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td><input type="text" class="tbdata" value="{{$Remainingpartner->Date_of_Birth}}"></td>
                                    
                                </tr>
                                <tr>
                                    <td>PAN No.</td>
                                    <td><input type="text" class="tbdata" value="{{$Remainingpartner->partners_pannumber}}"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Residental Address</td>
                                    <td><input type="text" class="tbdata" value="{{$Remainingpartner->partners_Residence_Address}}"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Tel/Mobile</td>
                                    <td><input type="text" class="tbdata" value="{{$Remainingpartner->partners_Mobile_no}}"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Work Experience</td>
                                    <td><input type="text" class="tbdata" value="{{$Remainingpartner->partners_workexp}}"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Shareholding % in borrowing entity</td>
                                    <td><input type="text" class="tbdata" value="{{$Remainingpartner->shareholding_with_cust_entity}}"></td>
                                    
                                </tr>
                            </tbody>  
                            @endforeach
                        </table>

                        <!-- table4 -->

                        <table id="table-4" cellpadding="1px" cellspacing="0" rules="none"> 
                            @foreach ( $BankDetailes as  $BankDetaile )
                            <thead>
                                <tr>
                                    <td colspan="4"> 
                                        <div style="display: flex; justify-content:center;">
                                            <h3>{{ $loop->iteration}} . </h3>
                                        <h3 style="margin-left: 50px; ">DETAILS OF ACCOUNT FOR DISBURSEMENT</h3> 
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name Of Bank</td>
                                    <td colspan="3"> <input type="text" class="tab-data" value={{$BankDetaile->bank_name}}></td>
                                </tr>
                                <tr>
                                    <td>Branch Address</td>
                                    <td colspan="3"><input type="text" class="tab-data" value={{$BankDetaile->branch_address}}></td>
                                </tr>
                                <tr>
                                    <td>Account Holder Name</td>
                                    <td><input type="text" class="tab-data" value={{$BankDetaile->account_holder_name}}></td>
                                    <td>Account Number</td>
                                    <td> <input type="text" class="tab-data" value={{$BankDetaile->account_number}}></td>
                                </tr>
                                <tr>
                                    <td>Type of Account</td>
                                    <td> <input type="text" class="tab-data" value={{$BankDetaile->Type_of_Account}}></td>
                                    <td>Account Operational Since</td>
                                    <td><input type="text" class="tab-data" value={{$BankDetaile->account_oprete_since}}></td>
                                </tr>
                                <tr>
                                    <td>IFSC Code</td>
                                    <td><input type="text" class="tab-data" value={{$BankDetaile->ifsc_code}}></td>
                                    <td>MICR Code:</td>
                                    <td><input type="text" class="tab-data" value={{$BankDetaile->micr_code}}></td>
                                </tr>
                            </tbody> 
                            @endforeach

                        </table>


                        <!--  old tables-5  --> 
                        {{-- <div class="tables-5">
                            
                            @foreach ($References as  $Reference)
                                
                            
                            <table id="nest-table">
                                <thead>
                                    <tr>
                                        <td colspan="4">
                                            <div class="refer">
                                                <h3>REFERENCES</h3>
                                                <p>REFERENCE-1</p>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td colspan="3"><input type="text" class="pt"></td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td colspan="3"><input type="text" class="pt"></td>
                                    </tr>
                                    <tr>
                                        <td>City:</td>
                                        <td><input type="text"></td>
                                        <td>Pincode:</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>State:</td>
                                        <td><input type="text"></td>
                                        <td>Country:</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td><input type="text"></td>
                                        <td>Mobile:</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td colspan="3"><input type="email" class="pt"></td>
                                    </tr>
                                    <tr>
                                        <td>Pelation With Applicant:</td>
                                        <td colspan="3"><input type="text" class="pt"></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <table id="net-table">
                                <thead>
                                    <tr>
                                        <td colspan="4">
                                            <div class="refer1">
                                                <h3>REFERENCES-2</h3>
                                                <p>(NON-RELATIVE)</p>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td colspan="3"><input type="text" class="pt"></td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td colspan="3"><input type="text" class="pt"></td>
                                    </tr>
                                    <tr>
                                        <td>City:</td>
                                        <td><input type="text"></td>
                                        <td>Pincode:</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>State:</td>
                                        <td><input type="text"></td>
                                        <td>Country:</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td><input type="text"></td>
                                        <td>Mobile:</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td colspan="3"><input type="email" class="pt"></td>
                                    </tr>
                                    <tr>
                                        <td>Pelation With Applicant:</td>
                                        <td colspan="3"><input type="text" class="pt"></td>
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                            
                        </div> --}} 

                        <div class="tables-5">
                            @foreach ($References as $key => $Reference)
                                <!-- Check if it's the start of a new row -->
                                @if ($key % 10 == 0)
                                    <div class="row">
                                @endif
                        
                                <!-- Reference table -->
                                <table id="nest-table">
                                    <thead>
                                        <tr>
                                            <td colspan="4">
                                                <div class="refer">
                                                    <h3>REFERENCES</h3>
                                                    <p>REFERENCE-{{$key + 1}}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td colspan="3"><input type="text" class="pt" value="{{ $Reference['Name'] }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td colspan="3"><input type="text" class="pt" value="{{ $Reference['Address'] }}"></td>
                                        </tr>
                                        <tr>
                                            <td>City:</td>
                                            <td><input type="text" value="{{ $Reference['City'] }}"></td>
                                            <td>Pincode:</td>
                                            <td><input type="text" value="{{ $Reference['pincode'] }}"></td>
                                        </tr>
                                        <tr>
                                            <td>State:</td>
                                            <td><input type="text" value="{{ $Reference['State'] }}"></td>
                                            <td>Country:</td>
                                            <td><input type="text" value="{{ $Reference['Country'] }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td><input type="text" value="{{ $Reference['Phone'] }}"></td>
                                            <td>Mobile:</td>
                                            <td><input type="text" value="{{ $Reference['Mobile'] }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td colspan="3"><input type="email" class="pt" value="{{ $Reference['Email'] }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Pelation With Applicant:</td>
                                            <td colspan="3"><input type="text" class="pt" value="{{ $Reference['Relation_with_applicant'] }}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                        
                                <!-- Check if it's the end of a row or the last item -->
                                @if (($key + 1) % 10 == 0 || $loop->last)
                                    </div> <!-- Close the row -->
                                @endif
                            @endforeach
                        </div>
                        

                        <table id="tfoot">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table6 -->
                        <table id="table-6">
                            <tbody class="table-r">
                                <tr>
                                    <td><span>Nature of Facility</span></td>
                                    <td><span>Business Loan</span></td>
                                </tr>
                                <tr>
                                    <td>Facility Type</td>
                                    <td>Term Loan</td>
                                </tr>
                                <tr>
                                    <td>Loan Amount()</td>
                                    <td>2000000.0</td>
                                </tr>
                                <tr>
                                    <td>Tenure(Month)</td>
                                    <td>36</td>
                                </tr>
                                <tr>
                                    <td>Rate of Intrest(p.a) Fixed</td>
                                    <td>17.50%</td>
                                </tr>
                                <tr>
                                    <td>Mode od Payment</td>
                                    <td>NACH</td>
                                </tr>
                                <tr>
                                    <td>Processing Fees + Gst(non-refundable)</td>
                                    <td>47200.00</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table7 -->

                        <table id="table-7">
                            <thead>
                                <tr>
                                    <td colspan="3"><span>SCHEDUALE OF CHARGES</span></td>
                                </tr>
                            </thead>
                            <tbody class="table-r">
                                <tr>
                                    <td>Cheque / ACH Charges</td>
                                    <td>500/ + GST per instance</td>
                                </tr>
                                <tr>
                                    <td>Cheque / ACH Swapping Charges, No-dutieis Certificate</td>
                                    <td>500/ + GST per instance</td>
                                </tr>
                                <tr>
                                    <td>Duplicate Statement / Duplicate Amortisation / Penal/Default
                                        Interest24% per annum</td>
                                    <td>200/ + GST per instance Repayment schedule</td>
                                </tr>
                                <tr>
                                    <td>Prepayment / Foreclosure Charges</td>
                                    <td>
                                        <p>1. In the event the Borrower wishes to voluntarily prepay the Facility
                                            in part or in full, it shall make a written request to the Lender at least
                                            7 Business Days prior to the intended date of prepayment. The
                                            Lender may, at its sole discretion, allow or disallow the request of the
                                            Borrower.<br>
                                            2. Borrower may prepay the facility in part only upto to 25% of the
                                            outstanding principal amount. Part payment shall be allowed only
                                            once in a year and twice during the Loan tenure.<br>
                                            3. The prepayments under the Facility shall be subject top repayment
                                            charges as specified below:</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <table id="tchild">
                                            <tbody class="tab-child">
                                                <tr>
                                                    <td><span>Period</span></td>
                                                    <td><span>Prepayment/Forclouser Charges</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Within 6 months from the
                                                        date of first drawdown</td>
                                                    <td>7% of the outstanding loan amount
                                                        together with applicable taxes</td>
                                                </tr>
                                                <tr>
                                                    <td>On and from the 7th month
                                                        and up till 24th month from
                                                        the date of first drawdown</td>
                                                    <td>5% of the outstanding loan amount
                                                        together with applicable taxes</td>
                                                </tr>
                                                <tr>
                                                    <td>after 24 months from date of
                                                        first drawdown</td>
                                                    <td>4% of the outstanding loan amount
                                                        together with applicable taxes</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Loan Cencellation</td>
                                    <td>Interest will be charged for the interim period between date of
                                        Disbursement & date of loan cancellation</td>
                                </tr>
                                <tr>
                                    <td>Disbursement & date of loan cancellation
                                        Documentation Charges, Security Creation and Perfection
                                        Charges, Property Valuation Charges Inspection Charges, Stamp
                                        Duty Charges, Legal Collection & Incidental Charges, Any other
                                        charges from case to case basis</td>
                                    <td>At Actuals</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table8 -->

                        <table>
                            <thead>
                                <tr>
                                    <td>DOCUMENTS CHECKLIST</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <p>You will need to submit the following documents for availing of a credit
                                            facility:</p>
                                        <ul>
                                            <li>KYC Documents – Identity Proof & Address Proof of the Borrower and all the
                                                Co-Borrowers</li>
                                            <li>PAN Card of Borrower and all the Co-Borrowers</li>
                                            <li>VAT returns of this year / GST Registration certificate / Last year ITR</li>
                                            <li>Last 3 months bank statement of main operative business account</li>
                                            <li>Property (residence or office) ownership proof</li>
                                            <li>Signed copy of Standard Terms (Term Loan Facility)</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Additional document(s) as may be required for credit assessment<br><br><br><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table9 -->

                        <table>
                            <thead>
                                <tr>
                                    <td>KEY LOAN FEATURES</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <li>Speedy approval</li>
                                    </td>
                                    <td>
                                        <li>Minimal paperwork</li>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <li>No collateral security required</li>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <li>Tenure from 12 months to 36 months</li>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>ROI Based on credit evaluation process</p>
                                        <p>At IIFL we have adopted risk based pricing, which is arrived by taking into
                                            account, broad
                                            parameters like the customers financial and
                                            credit profile. Applicable interest rates are arrived at taking into account the
                                            prevailing
                                            market rates at the time of sanctioning.</p>
                                        <p>Accordingly, the rate of interest may change from time to time as may be
                                            intimated by IIFL. The
                                            details are also available on our website:
                                            www.iifl.com.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table10 -->

                        <table>
                            <thead>
                                <tr>
                                <tr>
                                    <td>DECLARATION</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <li>The Borrower(s) confirm having read and understood terms of the Application Form
                                            which would
                                            apply to the Facility being requested under this
                                            Application Form.</li>
                                        <li>The Borrower(s) understand that sanction of the Facility and any disbursement
                                            there under is at
                                            the sole discretion of India IIFL Finance Limited (IIFL)
                                            (Formerly known as “IIFL Holdings Limited”) which reserves its right to reject
                                            the Application
                                            (with or without notice to the Borrower), and that IIFL shall
                                            not be responsible/liable in any manner whatsoever for such rejection or any
                                            delay in notifying
                                            me of such rejection. The Borrower(s) understand and
                                            agree that IIFL and/ or its group companies reserve the rights to retain the
                                            photographs and
                                            documents submitted with this application. The Borrower(s)
                                            undertake to promptly inform IIFL about any change in any of the information
                                            furnished. The
                                            Borrower(s) further undertake to provide any further
                                            information/ documents that IIFL and/ or its group companies and/ or its agents
                                            may require.
                                        </li>
                                        <li>The Borrower(s) confirm that IIFL shall have the discretion to change
                                            prospectively the rate of
                                            interest and other charges applicable to the Facility.</li>
                                        <li>In case there are more than one Borrower(s), each Borrower(s) agrees and
                                            undertakes that each of
                                            the Borrower(s) shall be jointly and severally be
                                            liable to make payments under the Loan</li>
                                        <li>The Borrower(s) represent that each Borrower, its directors/partners (if any)
                                            has not been
                                            declared insolvent nor have any insolvency/ bankruptcy
                                            proceeding been initiated against them. Borrower(s) represent that information
                                            furnished in this
                                            application is true and correct. Borrower(s) represent
                                            that none of the applicants have defaulted on any loan repayments with any of
                                            its creditors.
                                        </li>
                                        <li>The Borrower(s) have no objection to IIFL and/ or its group companies and/ or
                                            its agents
                                            providing me/us information on various products, offers and
                                            services provided by IIFL and/ or its group companies through any mode
                                            (including telephone
                                            calls, SMSs/ emails, letters etc.) and authorize IIFL and/ or
                                            its group companies and/ or its agents for the above purpose. The Borrower(s)
                                            confirm that laws
                                            in relation to the unsolicited communication referred in
                                            "National Do Not Call Registry" as laid down by 'TELECOM REGULATORY AUTHORITY OF
                                            INDIA' will not
                                            be applicable for such information/
                                            communication to the Borrower.</li>
                                        <li>
                                            Borrower(s) agrees and accept that IIFL may in its sole discretion, by its self
                                            or through
                                            authorised persons, advocate, agencies, bureau, etc. verify any
                                            information given, check credit references, employment details and obtain credit
                                            reports to
                                            determine creditworthiness from time to time.
                                        </li>
                                        <li>Borrower(s) acknowledges the consent given by the Borrower and such third
                                            parties (as required)
                                            to IIFL to obtain Borrower’s KYC and credit related
                                            information/documents from third parties including Unique Identification
                                            Authority of India,
                                            Credit Information Bureau of India Ltd and other entities
                                            and also further consents that IIFL may, by its self or through authorized
                                            persons, verify any
                                            information given, check credit references, employment
                                            details and obtain KYC related documents or credit reports to determine
                                            genuineness of the
                                            Borrower and/or creditworthiness from time to time. The
                                            Borrower further acknowledges the consent to Unique Identification Authority of
                                            India or such
                                            any other such third party consenting to sharing of
                                            information with respect to the Borrower with IIFL.</li>
                                        <li>Borrower(s) have no objection to IIFL or any of its subsidiaries exchanging and
                                            sharing
                                            information with its affiliates, regulatory bodies, government
                                            and credit agencies and other such authority as may be required.</li>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table11 -->
                        <table>
                            <thead>
                                <tr>
                                    <td>UNDERTAKING</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <p>I/We have applied for loan facility with IIFL. The application will be appraised
                                            and processed as
                                            per the internal policy of IIFL. The
                                            application may be rejected in case I/ we fail to comply with the internal
                                            policy of IIFL. IIFL
                                            has appraised me/ us about the same in detail
                                            including eligibility criteria, documentation, etc.</p><br>
                                        <p>In submitting the above applicaon, I/We the undersigned, solemnly affirm that the
                                            details of loan
                                            terms / condions inclusive of all charges
                                            have been read by me / us in full / read out to me / us (in vernacular) is
                                            understood and do
                                            hereby accept by me / us by signing this
                                            Applicaon physically and/or electronically (through accessing the link and/or
                                            vide OTP
                                            confirmaon, Electronic and Digital Signatures,
                                            Aadhaar authencaon and such other and further means as it was available and
                                            known to me/us by
                                            using my/our registered E-mail ID and
                                            the mobile number).</p><br><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table12 -->

                        <table>
                            <thead>
                                <tr>
                                    <td>FOR OFFICE USE ONLY</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="p-content">
                                            <p> <b>IIFL Finance Limited (IIFL) (Formerly known as "IIFL Holdings
                                                    Limited")</b>
                                            <p>
                                            <p> CIN: L67100MH1995PLC093797 / RBI CoR No. N -13.02386</p>
                                            <p> Regd. Office: IIFL House, Sun Infotech Park, Road No. 16V, Plot No. B-23,
                                                Thane Industrial
                                                Area,
                                                Wagle Estate,</p>
                                            <p>Thane - 400 604 • Tel: (91-22) 4103 5000 • Fax: (91-22) 2580 6654</p>
                                            <p> Corporate Office: 802, 8 Floor, Hub Town Solaris, N.S. Phadke Marg, Vijay
                                                Nagar, Andheri
                                                East,
                                                Mumbai - 400 069 • Tel: (91-22) 6788 1000 • Fax: (91-22) 6788 1010</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table13 -->

                        <table>

                            <thead>
                                <tr>
                                    <p class="serial">Serial No: &nbsp;&nbsp; <input type="text"></p>
                                    <td class="loan" colspan="3"><b>
                                            LOAN AGREEMENT</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <p>The person(s) named in the Schedule-cum-Key Fact Statement hereto (hereinafter
                                            referred to as the
                                            "Schedule") being borrowers and co-borrowers,
                                            hereinafter collecvely referred to as "Borrower" which expression shall, unless
                                            it be repugnant
                                            to the context or meaning thereof, be deemed to
                                            mean and include his/her heirs, administrators and executors.
                                        </p>
                                        <p>
                                            <b>In favour of:</b>
                                        </p>
                                        <p>
                                            IIFL Finance Limited (IIFL) (Formerly known as “IIFL Holdings Limited”), a
                                            Finance company
                                            incorporated under the provisions of the Companies Act,
                                            1956 having its Regd. Office: IIFL th House, Sun Infotech Park, Road No. 16V,
                                            Plot No. B-23,
                                            Thane Industrial Area, Wagle Estate, Thane - 400 604 •
                                            Corporate Office: 802, 8 Floor, Hub Town Solaris, N.S. Phadke Marg, Vijay Nagar,
                                            Andheri East,
                                            Mumbai - 400 069 and a branch office at the place
                                            menoned in the Schedule hereto (hereinafter referred to as the "IIFL" which
                                            expression shall,
                                            unless it be repugnant to the context or meaning
                                            thereof, be deemed to mean and include its successors, transferees and assign.
                                            In case of there
                                            being more than one Borrowers (i.e. there being coborrowers),
                                            the reference to the term "Borrower" shall be deemed to be as if it were plural
                                            and this
                                            document shall be read accordingly as if made
                                            and liabilies undertaken by each of then) jointly and severally. Reference to
                                            the masculine
                                            gender includes reference to the feminine and neuter
                                            genders and vice versa.
                                        </p>
                                        <p>
                                            <b>The Borrower hereby irrevocably and uncondionally agrees to abide by the
                                                following agreement:
                                                Applicaon & Disbursement</b>
                                        </p>
                                        <p>
                                            1. Pursuant to the applicaon made by the Borrower in the Loan Applicaon Form
                                            ("Applicaon"), IIFL
                                            has sanconed the non-revolving loan not
                                            exceeding the amount menoned in the Schedule hereto (hereinafter referred to as
                                            "Loan"), and the
                                            Borrower agrees to borrow the same, subject to
                                            and upon the agreement contained in the Applicaon and/or this document. IIFL may
                                            disburse the
                                            Loan or any part thereof ("Disbursement") at its
                                            own discreon. Notwithstanding anything contained herein: (i) IIFL may at its
                                            sole discreon,
                                            suspend or cancel the Loan if the same is not ulized within
                                            15 days of the issuance of instrument/instrucon for Disbursement; or (ii) the
                                            Borrower may
                                            cancel the Loan within 15 days of Disbursement;
                                            provided that in case of each (i) and (ii) the cancellaon shall take effect only
                                            when the
                                            Borrower has paid to IIFL in full the total Outstanding Balance
                                            (defined hereinafter) including all the interest, and all other charges. The
                                            Borrower shall use
                                            the Loan only for the purpose stated in the Applicaon
                                            and not for any other purpose including making investment in the capital market
                                            or any speculave
                                            or illegal or an-social purpose and restricted by
                                            RBI from me to me.
                                        </p>

                                        <p>
                                            <b>Repayment:</b>
                                        </p>
                                        <p>2. The Loan, interest, compound interest, default interest, any other charges,
                                            dues and monies
                                            payable, costs and expenses reimbursable, as
                                            outstanding from me to me and whether any of them due or not, are hereinafter
                                            collecvely
                                            referred to as "Outstanding Balance". The Borrower shall
                                            pay interest on the Loan, the unpaid due interest and all other outstanding
                                            charges and monies
                                            (except the default interest), at the rate of interest
                                            specified in the Schedule hereto, on the outstanding daily balance from the date
                                            of
                                            Disbursement, compoundable at monthly rests. IIFL in its sole
                                            discreon would be entled to change the said rate of interest from me to me
                                            including on account
                                            of changes made by the Reserve Bank of India,
                                            which would be inmated to the Borrower(s) and would be binding upon the
                                            Borrower(s). The
                                            Borrower shall also pay and bear all interest tax, if any,
                                            as applicable from me to me. The Borrower(s) shall repay the Loan and pay the
                                            interest that is
                                            due from me to me by way of Equated Monthly
                                            Installments (EMIs) as specified in the Schedule or as may be specified by IIFL
                                            from me to me
                                            (me being the essence of the contract). The Borrower
                                            has perused, understood and agreed to IIFL's method of calculang EMIs as also
                                            the appropriaon
                                            thereof into principal and interest. The payment of
                                            all the monies by the Borrower including EMIs shall be made on or before the
                                            respecve due dates,
                                            at such place as IIFL may require, without any setoff
                                            or counterclaim or withholding or deducon (save as required by law in which case
                                            the amount
                                            payable by the Borrower to IIFL shall be increased
                                            to the amount which aer making such deducon or withholding equals the original
                                            due amount as if
                                            no withholding or deducon were required), by
                                            way of one or more modes and instruments including post-dated cheques ("PDCs"),
                                            Electronic
                                            Clearing System ("ECS"), Naonal Automated Clearing
                                            House ("NACH") instrucons/ other mode/ instrument, as acceptable to IIFL from me
                                            to me. If any
                                            due date falls on a non-business day of IIFL, the
                                            payment shall be made by the Borrower on the immediately preceding business day
                                            of IIFL. In case
                                            of cheques/ other instrument, the payment shall
                                            be deemed to have been made by the Borrower only at the point of me the sum is
                                            credited and
                                            realized fully in IIFL's account irrespecve of the date
                                            of instrument or me of receipt or presentaon of instrument. In case of any
                                            default, the Borrower
                                            shall without prejudice to IIFL's other rights and
                                            remedies, pay addional /default interest at the rate menoned in the Schedule
                                            hereto/ Applicaon
                                            or as may be prescribed by IIFL, over and above the
                                            then applicable rate of interest ll full payment is made/default is cured. This
                                            liability shall
                                            not act as jusficaon for any default.Serial No.
                                        </p>
                                        <p>
                                            3. The Borrower(s) shall pay to IIFL, the charges, fees, commissions, etc,
                                            specified in the
                                            Schedule hereto/ Applicaon or as specified by IIFL from me
                                            to me, within such me or upon occurrence of such events as specified and if not
                                            specified then
                                            forthwith upon demanded by IIFL. All other present
                                            and future costs and expenses, taxes (as applicable from me to me), any related
                                            levy, stamp
                                            duty, in all jurisdicons, in relaon to the this/other
                                            documents/any transacon pursuant thereto, irrespecve of who the beneficiary is,
                                            shall be borne
                                            and payable solely by the Borrower, including for
                                            creaon, enforcement, preservaon of security, recovery, iniang/defending/pursuing
                                            any legal
                                            proceedings/ acons by IIFL. In case of any such sums if
                                            paid or incurred by IIFL, the Borrower shall be liable to reimburse the same to
                                            IIFL in full
                                            forthwith
                                        </p>
                                        <p>
                                            4. Any payments made by/on behalf/for the Borrower or any realisaons in relaon
                                            to the Loan,
                                            security shall be appropriated towards the
                                            Outstanding Balance and/or Liabiles (as defined hereinafter) in the following
                                            order:
                                            (a) Firstly, towards principal amount(s); (b) Secondly, towards interest ; (c)
                                            Thirdly, towards
                                            addional/default interest and (d) Fourthly, towards cost,
                                            expenses, charges, commissions, fees, taxes and levies (wherever applicable)
                                            incurred by IIFL.
                                            Any statement of account furnished by IIFL shall be
                                            accepted by and be binding on the Borrower(s) and shall be conclusive proof of
                                            the correctness
                                            of the amounts menoned therein except for any
                                            manifest error therein. Notwithstanding any of the provisions of the Indian
                                            Contract Act, 1872
                                            or any other applicable law or anything contained in
                                            this Secon, IIFL may, at their absolute discreon, appropriate any payments made
                                            by the Borrower
                                            in any manner and/or appropriate the same
                                            towards any other dues payable by the Borrower under any other arrangements
                                            entered into between
                                            the Borrower and IIFL and such appropriaon
                                            by IIFL shall be final and binding on the Borrower in all respects.
                                        </p>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p>
                                            5. Notwithstanding anything stated in any document, the connuaon of the Loan
                                            shall be at sole
                                            and absolute discreon of IIFL and IIFL may at
                                            any me in its sole discreon and without assigning any reason call upon the
                                            Borrower to pay the
                                            Outstanding Balance and upon such demand
                                            by IIFL, the Borrower shall, within 48 hours of being so called upon, pay the
                                            whole of the
                                            Outstanding Balance to IIFL without any delay or
                                            demur.
                                        </p>
                                        <p>
                                            Pursuant to the Reserve Bank of India vide their Notification on "Prudential
                                            norms on Income
                                            Recognition, Asset Classification and
                                            Provisioning pertaining to Advances - Clarifications" dated 12th November 2021
                                            you/ the Borrower
                                            shall note the following loan classification
                                            structure:
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table id="tchild">
                                            <tbody class="tab-child1">
                                                <tr>
                                                    <td><b>CLASSIFICATION</b></td>
                                                    <td><b>DPD BUCKET RANGE</b></td>
                                                    <td><b>EXAMPLE</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Standard</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>SMA - 0</td>
                                                    <td>Upto 30 days</td>
                                                    <td>If due date of a loan amount is March 31, 2021 and full dues
                                                        are not received before the day-end process for this date,
                                                        the date of overdue shall be March 31, 2021. It shall get
                                                        tagged as SMA - 0 on March 31, 2021</td>
                                                </tr>
                                                <tr>
                                                    <td>SMA - 1</td>
                                                    <td>More than 30 days & Upto 60 days</td>
                                                    <td>Continuing from above, if the account continues to remain
                                                        overdue, then it shall get tagged as SMA - 1 upon running
                                                        day-end process on April 30, 2021 i.e. upon completion of
                                                        30 days of being continuously overdue</td>
                                                </tr>
                                                <tr>
                                                    <td>SMA - 2</td>
                                                    <td>More than 60 days & Upto 90 days</td>
                                                    <td>Continuing from above, if the account continues to remain
                                                        overdue, it shall get tagged as SMA - 2 upon running dayend
                                                        process on May 30, 2021 i.e. upon completion of 60
                                                        days of being continuously overdue</td>
                                                </tr>
                                                <tr>
                                                    <td>Non-Performing Asset (NPA)</td>
                                                    <td>More than 90 days</td>
                                                    <td>Continuing from the above, if it continues to remain
                                                        overdue further, it shall get classified as NPA upon running
                                                        day-end process on June 29, 2021. Once an account
                                                        becomes NPA, i.e. remains continue overdue amount* and
                                                        its DPD becomes 0. Any partial payments made will not
                                                        change the NPA status.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <h4>Prepayment:</h4>
                                        <p>
                                            6. The Borrower shall be entled to prepay the Loan in part or in full : (i) only
                                            if IIFL permits
                                            the same upon at least 15 days wrien noce from
                                            Borrower communicang intenon to prepay in part or full at IIFL's lending branch;
                                            and (ii)
                                            subject to such condions as IIFL may prescribe
                                            including payment of the prepayment charges for part or full prepayment as
                                            menoned in the
                                            Schedule hereto/ Applicaon or as specified from
                                            me to me by IIFL. Full prepayment shall take effect only when enre Outstanding
                                            Balance has been
                                            paid to and realized by IIFL.
                                            Insurance:
                                        </p>
                                        <p>
                                            7. IIFL may at its own discreon and upon Borrower's request, also finance the
                                            Borrower for the
                                            insurance premium of insurance policy taken
                                            by Borrower as per Borrower's own wish from any insurance company of Borrower's
                                            choice, which
                                            sum(s) shall be added to the principal
                                            amount under the Loan and all the terms and condions shall be addionally
                                            applicable thereto All
                                            expenses, charges, fees, taxes etc as
                                            applicable on any such insurance shall be incurred and paid by the Borrower,
                                            however in case
                                            paid by IIFL on Borrower's behalf, the Borrower
                                            shall reimburse the same to IIFL within 24 hours of IIFL's demand. The Borrower
                                            shall instruct
                                            the insurance company to add IIFL as loss payee
                                            in any such insurance policy.
                                        </p>
                                        <p><b>Security:</b></p>
                                        <p>8. The Borrower shall furnish and create such security from me to me in favour of
                                            or for the
                                            benefit of the, IIFL, of such value, in such form
                                            and in such manner, as may be deemed fit by IIFL, forthwith upon so required by
                                            IIFL. IIFL shall
                                            also have the right to spulate any other and
                                            further terms and condions that it may deem fit at any me prior to or aer the
                                            grant of the Loan,
                                            which shall be binding on the Borrower.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p><b>Representation:</b></p>
                                        <p>9. Each of the Borrowers represent(s) and warrant(s) that (which shall be deemed
                                            to have been
                                            repeated to IIFL on the date of the
                                            Disbursement and on each date thereaer ll enre repayment):<br>
                                            (a) The Borrower is a cizen of India and a major (in terms of age) and is of
                                            sound mind and is
                                            competent to contract and enter into and
                                            perform his/her obligaons contemplated under this document/ other document/in
                                            respect of the
                                            Loan;<br>
                                            (b) There is no impediment or restricon, whether under law, judgement, order,
                                            award, contract or
                                            otherwise, for any of the Borrowers
                                            entering into and/or performing any of the transacons contemplated by this/other
                                            documents/ in
                                            respect of the Loan and all approvals and
                                            consents, wherever necessary have been duly obtained and are and will connue to
                                            be in full
                                            force;<br>
                                            (c) The execuon hereof constutes legal, valid and binding obligaons of the
                                            Borrower.<br>
                                            (d) That there is no Event of Default exisng;<br>
                                            (e) All declaraons made by Borrower are true and complete and no material
                                            informaon has been
                                            suppressed / withheld.
                                        </p>
                                        <p><b>Negative Covenants</b></p>
                                        <p>10. The Borrower covenants and agrees that, save and except with the prior,
                                            specific and express
                                            wrien consent of IIFL, the 'Borrower shall
                                            not: (a) create, assume or incur any further indebtedness to any person; or lend
                                            or advance any
                                            amounts to any person; or undertake any
                                            guarantee or security obligaon; (b) except in favour of IIFL, sell, license,
                                            let, lease,
                                            transfer, alienate, dispose of in any manner whatsoever,
                                            surrender or otherwise encumber any of its assets, rights, tle or interest,
                                            receivables, or any
                                            part thereof; or create, facilitate or permit to
                                            exist any charge, encumbrance or lien of any kind whatsoever over any of its
                                            property or grant
                                            any opon or other right to purchase, lease or
                                            otherwise acquire, any such assets or part thereof; (c) permit or effect any
                                            direct or indirect
                                            change in the legal or beneficial ownership or
                                            control; (d) Change/ cease/ rere from/ terminate/ resign from the present
                                            employment/
                                            profession/business disclosed in the Applicaon; or
                                            change, terminate or open any IIFL account.</p>
                                        <p><b>Event of Default:</b></p>
                                        <p>11. The following events shall constute events of default (each an "Event of
                                            Default"), and upon
                                            the occurrence of any of them the enre
                                            Outstanding Balance shall become immediately due and payable by the Borrower and
                                            further enable
                                            IIFL inter alia to recall the enre
                                            Outstanding Balance and/or enforce any .security and transfer/sell the same
                                            and/or take, iniate
                                            and pursue any acons/proceedings as
                                            deemed necessary by IIFL for recovery of the dues:<br>
                                            (a) Failure on Borrower's part to perform any of the obligaons or terms or
                                            condions or covenants
                                            applicable in relaon to the Loan including
                                            under this/other documents including non-payment in full of any part of the
                                            Outstanding Balance
                                            when due or when demanded by IIFL;<br>
                                            (b) any misrepresentaons or misstatement by the Borrower; or<br>
                                            (c) occurrence of any circumstance or event which adversely affects Borrower's
                                            ability/capacity
                                            to pay/repay the Outstanding Balance or any
                                            part thereof or perform any of the obligaons;<br>
                                            (d) If any aachment, distress, execuon or other process against the Borrower/its
                                            assets or any
                                            of the security is threatened, enforced or levied
                                            upon by any person; or<br>
                                            (e) fall, reducon or decrease, in the opinion of IIFL, in value of any security
                                            lower than the
                                            value required by IIFL;<br>
                                            (f) the event of death, insolvency, failure in business, commission of an act of
                                            Bankruptcy of
                                            the Borrower, or change or terminaon of
                                            employment/profession/business for any reason whatsoever.</p>
                                        <p><b>Consequence of Default:</b></p>
                                        <p>12. Notwithstanding the aforestated, upon happening/occurrence of any Event of
                                            Default, without
                                            prejudice to IIFL’s rights and remedies
                                            under contract or law, and without necessity of any demand upon or noce to the
                                            Borrower, all of
                                            which are hereby expressly waived by the
                                            Borrower, and notwithstanding anything to the contrary contained herein or in
                                            any of the
                                            security documents (as the case may be), IIFL may
                                            at its absolute discreon, pursue any or all of the following, and whether
                                            simultaneously or
                                            independently or otherwise,:<br>
                                            (i) declare the enre Outstanding Balance and all of the obligaons of the
                                            Borrower to IIFL
                                            hereunder, to have become due and payable by the
                                            Borrower to IIFL forthwith thereupon, in which event the Borrower shall be
                                            liable to forthwith
                                            pay to IIFL the enre Outstanding Balance;<br>
                                            (ii) to enforce the Security (if any) or any part thereof, including by selling,
                                            transferring or
                                            disposing of the assets/ some or any part thereof
                                            either by means of private treaty or public aucon or otherwise, with or without
                                            the intervenon
                                            of any Court/ tribunal;<br>
                                            (iii) to exercise, iniate and pursue any action, rights, noces, remedies, any
                                            proceedings
                                            (including ligaon), whether civil, criminal or otherwise
                                            in nature, and including for recovery of Outstanding Balance. Noce</p>
                                        <p>13. IIFL may however without being obligated to do so, in its sole and absolute
                                            discreon, on
                                            occurrence of any Event of Default or any event
                                            which aer the noce or lapse of me or both would constute an Event of Default,
                                            give noce to the
                                            Borrower in wring specifying the nature of
                                            such Event of Default or of such event and where the Event of Default is capable
                                            of being cured
                                            or remedied, specify a me period within
                                            which such Event of Default or event is to be cured to the sasfacon of IIFL,
                                            failing which IIFL
                                            shall be entled to pursue all or any of the acons as
                                            contemplated under Clause B hereunder.</p>
                                        <p>14. Notwithstanding the actions undertaken by IIFL pursuant to clause, all the
                                            provisions of this
                                            Agreement shall connue in full force and
                                            effect as herein specifically provided ll the Final Selement Date.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <b>Securitization/ Assignment:</b>
                                        <p>15. IIFL shall at any me, without any consent of or notice to the Borrower(s) be
                                            entled to
                                            securitize, sell, assign, discount or transfer all or any
                                            part of IIFL's rights and obligaons under the Loan, this document or any other
                                            document, to any
                                            person(s) and in such manner and on such
                                            terms as IIFL may decide. Borrower shall not be entled to directly or indirectly
                                            assign or in
                                            any manner transfer, whether in whole or part, any
                                            rights, the benefit or obligaon under the Loan, this/other document.</p>
                                        <p>16. IIFL shall be entitled at its discretion to engage/ avail of, at the risk and
                                            cost of the
                                            Borrower, services of any person/third party service
                                            provider/agent/agency, for anything required to be done for/ in relaon to/
                                            pursuant to the Loan,
                                            including collecons, recovery of dues,
                                            enforcement of security, geng or verifying any informaon of the Borrower/
                                            assets, and any
                                            necessary or incidental lawful acts/ deeds/ maers
                                            and things connected thereto, as IIFL may deem fit.</p>
                                        <b>Grievance Redressal Mechanism:</b>
                                        <p>It is our constant endeavor to provide the Borrower with the best possible
                                            service and care. In
                                            case of any grievances (including concerns
                                            about staff behavior), the Borrower may reach out to the representatives below
                                            at any time
                                            between 10.00 AM and 6.00 PM Monday to
                                            Friday except public holidays. The Lender is committed to providing grievance
                                            redressal in a
                                            timely manner.</p>
                                        <b>1.Grievance Redressal Official cum Nodal Officer</b>
                                        <p>You are requested to address all their grievances at the first instance to the
                                            Grievance
                                            Redressal Official cum Nodal Officer ("GRO/NO "). The
                                            contact details of the GRO/NO are as provided below. Other details related to
                                            the grievance
                                            redressal mechanism are available at
                                            https://www.iifl.com/nbfc/grievance-redressalprocedure</p>
                                        <b>Designation: Nodal Officer</b>
                                        <p>Address: IIFL Finance Ltd , IIFL House, Sun Infotech Park, Road No.16V, Plot No
                                            B23, Thane
                                            Industrial Estate Area, Wagle Estate, Thane 400604<br>
                                            Contact Number: +91 22 4520 5810 / +91 22 6817 8410<br>
                                            Email ID: nodalofficer@iifl.com Grievance redressal -
                                            https://www.iifl.com/nbfc/grievance-redressal-procedure The GRO/NO shall
                                            endeavor
                                            to resolve the grievance within a period of one month from the date of receipt
                                            of a grievance.
                                        </p>
                                        <b>2.Complaints to Ombudsman</b>
                                        <p>In case no response is received from the GRO/NO within one month from the date of
                                            making a
                                            representation to the Lender, or if the
                                            Borrower is not satisfied with the response so received, a complaint may be made
                                            in accordance
                                            with the 'The Ombudsman Scheme for Non-
                                            Banking Financial Companies, 2018'/ The Banking Ombudsman Scheme 2006, as
                                            amended from time to
                                            time, ("Ombudsman Scheme ") to the
                                            Ombudsman in whose jurisdiction the Lender's office is located. For contact
                                            details of the
                                            Ombudsman and for salient features of the
                                            Ombudsman Scheme, please refer to Annexure - A of the Fair Practices Code
                                            adopted by the Lender
                                            and available on our website [website]. A
                                            copy of the Ombudsman Scheme is available on the website of the Reserve Bank of
                                            India at
                                            www.rbi.org.in and is also available with our
                                            GRO/NO.</p>
                                        <b>06- Set off, Counter Claims & General Lien:</b>
                                        <p>a. In respect of all and any of Borrower's present and future liabilities to
                                            IIFL, its
                                            affiliates, group entities, parent, subsidiaries, any of their
                                            branches (collectively "Relevant Entities"), whether under this document or
                                            under any other
                                            bligation/loan/facilities/borrowings/document,
                                            whether such liabilities are/be crystallised, actual or contingent, primary or
                                            collateral or
                                            several or jointly with others, whether in same
                                            currency or different currencies, whether as principal debt or and/or as
                                            guarantor and/or
                                            otherwise howsoever (collectively "Liabilities"),
                                            each of IIFL and the Relevant Entities shall in addition to any general lien or
                                            similar right to
                                            which any of them as NBFC may be entitled by
                                            law, practice, custom or otherwise, have a specific and special lien on all the
                                            Borrower's
                                            present and future stocks, shares, securities,
                                            property, book debts, all moneys in all accounts whether current, savings,
                                            overdraft, fixed or
                                            other deposits, held with or in custody, legal or
                                            constructive, with IIFL and/or any Relevant Entities, now or in future, whether
                                            in same or
                                            different capacity of the Borrower, and whether
                                            severally or jointly with others, whether for any other relationship, safe
                                            custody, collection,
                                            or otherwise, whether ih same currency or
                                            different currencies; and<br>
                                            b. Separately, each of IIFL and the Relevant Entities shall have the specific
                                            and express right
                                            to, without notice to and without consent of the
                                            Borrower, set-off, transfer, sell, realize, adjust, appropriate all such amounts
                                            in all accounts
                                            (whether prematurely or upon maturity as per
                                            IIFL's discretion), securities, amounts and property as aforesaid for the
                                            purpose of realizing
                                            or against any of dues in respect of any of the
                                            Liabilities whether ear-marked for any particular Liability or flat, combine or
                                            consolidate all
                                            or any of accounts of the Borrower and set-off any
                                            monies, whether of same type or nature or not and whether held in same capacity
                                            or not including
                                            upon happening of any of the events of
                                            default mentioned in any of the documents pertaining to the respective
                                            Liabilities or upon any
                                            default in payment of any part of any of the
                                            Liabilities. IIFL and the Relevant Entities shall be deemed to have and hold and
                                            continue to
                                            have first charge on any assets including any
                                            security that has been/ will be created in respect of the Loan, as security also
                                            for any of the
                                            other Liabilities and all the rights and powers
                                            vested in IIFL in terms of any security or charge created for the Loan shall be
                                            available to
                                            IIFL and/or the Relevant Entities also in respect of
                                            such other Liabilities, irrespective of the fact whether the Loan is at any time
                                            outstanding,
                                            repaid or satisfied or not and even after the Loan
                                            has been repaid or prepaid.</p>
                                        <b>Miscellaneous:</b>
                                        <p>17. It shall be the sole responsibility of the Customer to provide IIFL with the
                                            correct GST
                                            registration number at the time of on-boarding.
                                            Further, IIFL will not be responsible for the verification of GSTIN and loss of
                                            credit arising
                                            on account of furnishing incorrect GST registration
                                            number to IIFL. In case the Customer fails to furnish a GST registration number,
                                            the Party will
                                            be treated as “Unregistered"<br><br>
                                            18. IIFL shall have the right to not return the Applicaon, the photographs,
                                            informaon and
                                            documents submied by the Borrower. IIFL shall,
                                            without noce to or without any consent of the Borrower, be absolutely entled and
                                            have full
                                            right, power and authority to make disclosure of
                                            any informaon relang to Borrower including personal informaon, details in relaon
                                            to documents,
                                            Loan, defaults, security, obligaons of
                                            Borrower, to the Credit Informaon Bureau of India (CIBIL) and/or any other
                                            governmental/regulatory/ statutory or private agency/enty, credit
                                            bureau, RBI, IIFL's other branches/ subsidiaries / affiliates I rang agencies,
                                            service
                                            providers, other IIFLs / financial instuons, any third pares,
                                            any assignes/ potenal assignees or transferees, who may need the informaon and
                                            may process the
                                            informaon, publish in such manner and
                                            through such medium as may be deemed necessary by the publisher/ IIFL/ RBI,
                                            including publishing
                                            the name as part of willful defaulter's list
                                            from me to me, as also use for KYC information verification, credit risk
                                            analysis, or for other
                                            related purposes.
                                            In this connecon, the Borrower waives the privilege of privacy and privity of
                                            contract. IIFL
                                            shall have the right, without noce to or without any
                                            consent of the Borrower, to approach, make enquiries, obtain informaon, from any
                                            person
                                            including other IIFLs/ finance enes/ credit
                                            bureaus, Borrower's employer/family members, any other person related to the
                                            Borrower, to obtain
                                            any informaon for assessing track
                                            record, credit risk, or for establishing Contact with the Borrower or for the
                                            purpose of
                                            recovery of dues from the Borrower. Further Borrower
                                            shall also be interested in receiving any other informaon about various products
                                            of IIFL or its
                                            relave enes through calls/ mails/ leers or any
                                            other communicaon mode and Borrower shall waive its privilege under the
                                            guidelines of TRAI or
                                            any other such similar statutory authority.
                                        </p>
                                        <b>Notices:</b>
                                        <p>19.Any notice, approvals, instrucons, demand and 'other communicaons given or
                                            made by IIFL shall
                                            be deemed to be duly given and served if
                                            sent by normal post, courier, registered Post, facsimile, electronic mail,
                                            personal delivery,
                                            sms or by pre-paid registered mail addressed to the
                                            Borrower's address, phone/ mobile number, fax number or email as given in the
                                            Applicaon (or at
                                            the address changed on which IIFL's
                                            acknowledgment is duly obtained as hereinafter menoned) and such noce and
                                            service shall be
                                            deemed to take effect on the third working
                                            day following the date of the posng thereof in case of normal post, courier,
                                            registered post, at
                                            the me of delivery if given by personal
                                            delivery, upon receipt of a transmission report if given by facsimile, upon
                                            sending the
                                            electronic mail or sms if given by electronic mail or sms.
                                            The Borrower undertakes to keep IIFL informed at all mes in wring of any change
                                            in the mailing
                                            address, email id, phone and mobile number
                                            (s) as provided in the Applicaon and to obtain IIFL's wrien acknowledgment on
                                            the inmaon given
                                            to IIFL for any such change.</p>
                                        <b>Jurisdiction & Arbitration:</b>
                                        <p>20. The Loan, this document/other documents, shall be governed by the laws of
                                            India. The pares
                                            hereto expressly agree that all disputes
                                            arising out of and/or relang to the Loan, this or any other Relevant document
                                            shall be subject
                                            to the exclusive jurisdicon of the court/tribunal
                                            of the city/place in which the branch of IIFL from where the Disbursement has
                                            been made is
                                            situate, provided that the exclusivity aforesaid
                                            shall bind the Borrower and IIFL shall be entled to pursue the same in any other
                                            court of
                                            competent jurisdicon at any other place; such
                                            dispute shall be referred to arbitraon in accordance with the provisions of the
                                            Arbitraon and
                                            Conciliaon Act, 1996 as may be amended, or its
                                            re- enactment, by a sole arbitrator, appointed by IIFL. The arbitraon
                                            proceedings shall be
                                            conducted in English language and held at the place
                                            more parcularly menoned in the SCHEDULE of the present agreement hereunder. The
                                            costs of such
                                            arbitraon shall be borne by the losing
                                            Party or otherwise as determined in the arbitraon award If a party is required
                                            to enforce an
                                            arbitral award by legal acon of any kind, the party
                                            against whom such legal acon is taken shall pay all reasonable costs and
                                            expenses and aorney's
                                            fees, including any cost of addional ligaon or
                                            arbitraon taken by the party seeking to enforce the award.<br><br>
                                            21. This document, Applicaon and other documents have been explained to the
                                            Borrower in the
                                            language known to the Borrower and the
                                            Borrower has read and understood the same.</p>
                                        <h2>Co-Borrower/ Authorised Signatory of the Co-Borrower</h2>
                                        <p>To accepted, confirmed and declared all the clauses viz. 1 to 21 on all the page
                                            no’s 1 to 4 of
                                            ‘Terms and Condions of Loan’ documents,
                                            the Schedule, all contents thereof including all the</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>BORROWER(NAME&SIGN)

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="borrow">
                                            <input type="text" class="text">
                                            <p>CO-BORROWER</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <br><br><b>The Borrower(s) have affixed their signatures aer verifying and
                                            understanding the
                                            contents of this document, at the end of the Schedule.

                                        </b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <!-- table14 -->

                        <table id="tchild">
                            <tbody class="tab-child">
                                <tr>
                                    <td colspan="4">
                                        <h3>SCHEDULE-CUM-KEY FACT STATEMENT</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Loan Account No</td>
                                    <td>SL5254519</td>
                                    <td>Place of Execution</td>
                                    <td>SURAT</td>
                                </tr>
                                <tr>
                                    <td>Date of Signing</td>
                                    <td>13-Dec-2023</td>
                                    <td>IIFL Branch</td>
                                    <td>BM21-SURAT-RING ROAD</td>
                                </tr>
                                <tr>
                                    <td>Name of the Borrower:</td>
                                    <td colspan="3">SOAHIL HARDAWARE AND GENERAL STORES</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table15 -->

                        <table id="tchild">
                            <tbody class="tab-child1">
                                <tr>
                                    <td colspan="4">
                                        <h3>LOAN DETAILS</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Loan Amount (A)</td>
                                    <td>
                                        <p class="serial">2000000.00</p>
                                    </td>
                                    <td>Loan Tenure</td>
                                    <td>
                                        <p class="serial">36</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Insurance Financed incl. GST (B)</td>
                                    <td>
                                        <p class="serial">21636.8045</p>
                                    </td>
                                    <td>Instalment Frequency</td>
                                    <td>Monthly</td>
                                </tr>
                                <tr>
                                    <td>*TPP Financed (C)</td>
                                    <td></td>
                                    <td>EMI Scheme (Advance / Arrears)</td>
                                    <td>Arrears</td>
                                </tr>
                                <tr>
                                    <td>Stamp duty charges (D)</td>
                                    <td>As Applicable</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Disbursement Amount (= A+B+CD)</td>
                                    <td>Loan Amount post deduction of
                                        allcharges as on Date of
                                        Disbursement</td>
                                    <td>EMI Start Date</td>
                                    <td>As Applicable</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>EMI End Date</td>
                                    <td>As Applicable</td>
                                </tr>
                                <tr>
                                    <td>Interest Rate (Fixed)</td>
                                    <td>
                                        <p class="serial">17.50</p>
                                    </td>
                                    <td>Advance EMI Amount</td>
                                    <td>As Applicable</td>
                                </tr>
                                <tr>
                                    <td>Advance EMI (No's)</td>
                                    <td>As Applicable</td>
                                    <td>EMI Amount</td>
                                    <td>
                                        <p class="serial">71804.00</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>EMI (No's)</td>
                                    <td>
                                        <p class="serial">36</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table16 -->

                        <table id="tchild">
                            <p>*Thrid Party Product</p>
                            <tbody class="tab-child1">
                                <tr>
                                    <td colspan="4">
                                        <h3>CHARGES (All charges are non-refundable post disbursement of loan)</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Processing Charges (Amount) ₹ 40000.00 + GST</td>
                                </tr>
                                <tr>
                                    <td>Cheque / ACH Return Charges:
                                        ₹500/- + GST</td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td>Cheque/ACH Swapping
                                        ChargesDuplicate No dues
                                        Certificate</td>
                                    <td>₹500/- + GST</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Taxes: At actuals, applicable presently or in future</td>
                                    <td colspan="2">Date on which annual outstanding balance statement will be issued :-
                                        31stMay</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Default Interest / Late Payment charges for the overdue period on
                                        (EMI /Principal overdue): - 24% per annum</td>
                                    <td colspan="2">Loan Cancellation Charges: NIL Note: Interest would be charged for
                                        theinterim period between date of disbursement & date of loan
                                        cancellation.</td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p>Loan Prepayment Charges for part or full prepayment:<br>
                                            Foreclosure charges are on Principal outstanding balance and Part Payment
                                            charges on Part
                                            Payment amount.<br>
                                            01 - 06 Months of EMI repayment: 7% + GST (Subject to approval from Business
                                            Head)<br>
                                            07 - 24 Months of EMI repayment: 5%+ GST<br>
                                            > 24 Months of EMI repayment :4 %+ GST<br>
                                            Note: Part Payment allowed up to 25% of Principal Outstanding. It is allowed
                                            only once in a year
                                            and twice during Loan tenure. Government
                                            Taxes and otherlevies as applicable, would be charged additionally</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">CAC/ Documentation Charges - IF APPLICABLE</td>
                                    <td colspan="2">Legal Collection & Incidental Charges : At Actuals</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Other Charges, commissions, fees:-
                                        As per Applicaon or as may be specified by IIFL</td>
                                    <td colspan="2">Stamp Duty & Other Statutory Charges : As per applicable laws of the
                                        StateStamp Duty</td>
                                </tr>
                                <tr>
                                    <td>Details of Security / Collateral</td>
                                    <td></td>
                                    <td colspan="2">Duplicate Statement / Amortization / Repayment Schedule /
                                        Agreement /Sanction Letter etc., Charges: ₹ 200/- + GST
                                        *Third Party Product</td>
                                </tr>
                            </tbody>
                        </table>

                        <small><b>Do not sign this agreement if it is BLANK. Please ensure all relevant secons and columns
                                are completely
                                filled to your sasfacon and then only sign the agreement.</b></small>

                        <!-- table17 -->

                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <small>Name and Signatures of the Borrower/s SOAHIL HARDAWARE AND GENERAL
                                            STORES__________________________________________________________________
                                            I/We the Borrower/s hereby declare that I/We have read (and/or being read over
                                            and explained),
                                            verified, understood and irrevocably agreed the terms and condions of this
                                            Agreement, other related documents and Schedule/s (inclusive of the Standard
                                            Terms and
                                            Condions), and authencated accuracy and correctness of the same by signing this
                                            Agreement and other related documents physically or/and electronically through
                                            accessing the
                                            link and/or vide OTP confirmaon, Electronic and Digital Signatures, Aadhaar
                                            authencaon and such other and further means as it was available and me/us by
                                            using my/our
                                            registered E-mail ID and the mobile number, and/or compleng online formalies
                                            constute electronic communicaons shall be deemed to the acceptance of this
                                            Agreement and its
                                            Schedule thereof and this is a legally binding agreement between us and IIFL.
                                            I/We, the Borrower/s consented to receive the electronic communicaons, and agree
                                            that all
                                            agreements, informaon, disclosures, and other communicaons provided to us
                                            electronically, via email and on IIFL Site, sasfy any legal requirement that
                                            such communicaon be
                                            in wring and legally bound. I/We agree to be bound by this Agreement or any
                                            other related documents hereof. I/We state that a copy of the Standard Terms has
                                            been duly
                                            provided by IIFL and received by me/us.
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="accepted">
                                        <p class="ap">Accepted by IIFL (Signed by Authorised Signatory)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>WITNESS DECLARATION BORROWER (S) SIGNS IN VERNACULAR LANGUAGE:</h4>
                                        <p>The contents of the Loan Applicaon Form & Loan Agreement have been explained by
                                            me to the
                                            Borrower in English (name of language in
                                            which Borrower have signed) and the same have been understood by the Borrower
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table id="tchild">
                                            <tbody class="tab-child3">
                                                <tr>
                                                    <td>Name of Witness</td>
                                                    <td>Address of Witness</td>
                                                    <td>Signature of Witness</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>(Place of Arbitration)</h4>
                                        <p>Dispute Resolution by Arbitration.</p>
                                        <p>All disputes, differences and / or claim or questions arising out of these
                                            presents or in any way
                                            touching or concerning the same or as to
                                            constructions, meaning or effect thereof or as to the right, obligations and
                                            liabilities of the
                                            parties here under may be referred to and settles
                                            by arbitration, to be hep in accordance with the provisions of the Arbitrations
                                            and Conciliation
                                            Act, 1996 or any statutory amendments
                                            thereof, of a sole arbitrator to be nominated by the Lender/ IIFL, and in the
                                            event of death,
                                            unwillingness, refusal, neglect, inability or
                                            incapability of a person so appointed to act as an arbitrator, the Lender/ IIFL
                                            may appoint a
                                            new arbitrator to be a sole arbitrator. The
                                            arbitrator shall not be required to give any reasons for the award and the award
                                            of the
                                            arbitrator shall be final and binding on all parties
                                            concerned. The arbitration proceedings shall be help at Mumbai or the place
                                            decided by the
                                            Lender/ IIFL. The Arbitration Clause shall be in
                                            English language.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-text">
                                            <div>
                                                <input type="text" class="text1">
                                                <p class="header">BORROWER(NAME&SIGN)
                                                </p>
                                            </div>

                                            <div>
                                                <input type="text" class="text1">
                                                <p class="header">CO-BORROWER</p>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>

                        <!-- table19 -->

                        <table id="tchild">
                            <tbody class="tab-child1">
                                <h3>POST DATED CHEQUE ACKNOWLEDGMENT LETTER</h3>
                                <tr>
                                    <td>Loan Agreement Number</td>
                                    <td>SL5254519</td>
                                </tr>
                                <tr>
                                    <td>Name of Borrower</td>
                                    <td>SOAHIL HARDAWARE AND GENERAL STORES</td>
                                </tr>
                                <tr>
                                    <td>EMI Repayment Mode (Circle the correct Mode)</td>
                                    <td>Normal PDC</td>
                                </tr>
                                <tr>
                                    <td>Repayment Instructions provided by (Circle the Correct Option)</td>
                                    <td>Applicant I Co-applicant</td>
                                </tr>
                                <tr>
                                    <td>Co-borrower Name (For Repayment Instructions provided by co-borrower)</td>
                                    <td>Panjwani Sikandar S</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table20 -->

                        <table id="tchild">
                            <tbody class="tab-child1">
                                <h3>MENTION THE COUNT OF CHEQUE RECEIVED</h3>
                                <tr>
                                    <td>Cheque Received</td>
                                    <td>(A)Cheques Dated</td>
                                    <td>(B)Cheques Undated</td>
                                </tr>
                                <tr>
                                    <td>Cheque Amount</td>
                                    <td>(A)Filled</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Account Type</td>
                                    <td>Saving Bank Account</td>
                                    <td>Current or Cash Credit</td>
                                </tr>
                                <tr>
                                    <td>Cheques Handed over to Mr / Mrs.</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Sourcing Channel Name</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table21 -->

                        <table id="tchild">
                            <tbody class="tab-child4">
                                <tr>
                                    <td><b>Drawee Bank</b></td>
                                    <td><b>Bank Account No.</b></td>
                                    <td><b>MICR code</b></td>
                                    <td><b>Cheque Branch</b></td>
                                    <td><b>Cheque City</b></td>
                                    <td colspan="2"><b>Cheque No.</b></td>
                                    <td colspan="2"><b>Cheque Date</b></td>
                                    <td><b>Cheque Amount</b></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>From</b></td>
                                    <td><b>To</b></td>
                                    <td><b>From</b></td>
                                    <td><b>To</b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table22 -->
                        <table id="table-22">
                            <tbody>
                                <tr>
                                    <td><br><br><br><br>
                                        <p>I ____________________________________________ hereby confirm that I have handed
                                            over
                                            ____________________________________________ cheques detailed above towards
                                            repayment of EMI for
                                            the loan already taken / to be
                                            taken from IIFL and that all cheques were drawn in favour of "IIFL Finance
                                            Limited A/c
                                            ____________________________________________
                                            Loan" and have also recorded my name on the reverse side of the cheques.</p>
                                        <br><br>
                                        <small>Do not sign this agreement if it is BLANK. Please ensure all relevant secons
                                            and columns are
                                            completely filled to your sasfacon and then only sign the agreement</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td><br><br>
                                        <div class="d-name">
                                            <div>
                                                <label for="date">Date:</label>
                                                <input type="text" id="date">
                                            </div>
                                            <div>
                                                <label for="date">Borrower Name:</label>
                                                <input type="text" id="date">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><br>
                                        <div>
                                            <input type="text" class="text1">
                                            <p class="header-1"> BORROWER(NAME&SIGN)
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table23 -->

                        <table id="tchild">
                            <tbody class="tab-child4">
                                <tr>
                                    <td colspan="4">
                                        <h3>FOR OFFICE USE ONLY</h3>
                                        <p class="header"><b>This is to confirm that physical cheques were cross tallied
                                                with the above
                                                schedule and found correct.</b></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Sales Execuve Of DSA/DDSA</td>
                                    <td>CPA/ IIFL Staff</td>
                                    <td>CPU Staff</td>
                                </tr>
                                <tr>
                                    <td>Signature</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- para -->

                        <h3>Application for disbursement through RTGS/NEFT</h3>
                        <h3>(Real Time Gross Settlement/National Electronic Funds Transfer)</h3>

                        <p>Date:<br><br></p>
                        <p>To <br><br><br></p>

                        <p><b>IIFL,<br>
                                Retail Assets.<br><br><br></b></p>

                        <p>With reference to my applicaon for Loan, I hereby request IIFL to credit the disbursement
                            proceeds of the said
                            Loan directly into my Bank
                            Account (details of my Bank Account as given below) through the Real Time Gross Selements
                            (RTGS)/ Naonal
                            Electronic Funds Transfer (NEFT)
                            facility offered by RBI.</p>

                        <p><b>My/ Our Bank Details:</b></p>

                        <!-- table 24-->
                        <table id="tchild">
                            <tbody class="tab-child3">
                                <tr>
                                    <td>Beneficiary Name (Account Title as held with your Bank)</td>
                                    <td>SOAHIL HARDAWARE AND GENERAL STORES</td>
                                </tr>
                                <tr>
                                    <td>Bank Account No.</td>
                                    <td>998799629</td>
                                </tr>
                                <tr>
                                    <td>Centre (Location)</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Name of the Bank</td>
                                    <td>INDIAN BANK</td>
                                </tr>
                                <tr>
                                    <td>Name of the Branch<br>
                                        (Provide Full address of the Bank Branch)</td>
                                    <td>Halar road &nbsp;&nbsp;&nbsp;&nbsp;valsad Gujarat 396001</td>
                                </tr>
                                <tr>
                                    <td>Account Type</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Savings(10)/ Current(11)/ Overdraft(13)</td>
                                    <td>Cash Credit</td>
                                </tr>
                                <tr>
                                    <td>* IFSC Code (Contact your Bank and obtain the same)</td>
                                    <td>IDIB000V059</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br><br>
                                        <p>&nbsp;&nbsp;Yours Sincerely,<br><br></p>
                                        <div>
                                            <input type="text" class="text1">
                                            <p class="header-1"> BORROWER(NAME&SIGN)
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- paragraph -->
                        <br><br><br>
                        <p>I/We do hereby confirm that I/we have been availing this loan by signing this document physically
                            and/or through
                            accessing the link and/or
                            vide OTP confirmaon, Electronic and Digital Signatures, Aadhaar authencaon and such other and
                            further means as
                            it was available and known
                            to me/us by using my/our registered E-mail ID and the mobile number.</p><br><br><br>

                        <table id="tchild">
                            <tbody class="tab-tabale">
                                <tr>
                                    <td>
                                        <small>
                                            <p>*Indian Financial System Code (IFSC) is an alpha numeric code designed to
                                                uniquely idenfy the
                                                respecve bank branches in India. This is 11-digit code with first 4
                                                characters
                                                represenng the Banks code, the next character reserved as control character
                                                (Presently 0
                                                appears in the fih posion) and remaining 6 characters to idenfy the branch.
                                                B</p>
                                        </small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- para3 -->

                        <h3>BT ANNEXURE</h3>
                        <p class="header">On the Letter Head of IIFL</p>

                        <br><br>
                        <p>Date:</p>

                        <br><br>
                        <p>To:</p>

                        <br><br><br>
                        <p>Name of the Company/Bank Address</p>
                        <br>
                        <p>Pin Code</p><br><br><br>

                        <b>
                            <p>Sub:- Payment against Loan Account No.</p>
                        </b><br><br>

                        <p>Dear Sir,</p><br><br>

                        <p>Please find enclosed herewith chq no
                            ________________________________________________________________________________ Dated
                            _______________________________________________ drawn on
                            ____________________________________________________________towards closure of
                            above loan account of (Name of Customer)<br><br><br>
                            Kindly acknowledge receipt.<br><br>
                            Thanking You,</p><br><br>

                        <p><b>Yours Faithfully, For IIFL</b></p><br><br>

                        <p><b>Authorized Signatory</b></p><br><br><br>


                        <!-- para4 -->
                        <h3>Declaration of Mailing Address</h3>

                        <p>To</p><br><br>

                        <p>IIFL Finance Limited (IIFL)<br>
                            ________________________BM21-SURAT-RING ROAD__________________________________________________
                            Branch<br>
                            Pin code<br><br></p>

                        <p><b>Subject: Confirmaon of mailing address for</b></p><br>

                        <p>I _____________SOAHIL HARDAWARE AND GENERAL<br>
                            STORES_________________________________________________________________________________________________________
                            the undersigned
                            desirous of availing loan from India IIFL Finance Limited (IIFL) hereby declare that my mailing
                            (current)
                            address is as below:</p><br><br><br>

                        <p><b>Mailing address (Provide full address)</b></p><br><br>

                        <p>
                            ___________0, manek bhavan Kailash road Valsad, valsad,gujarat<br>
                            396001____________________________________________________________________________________________________________
                            ________________________________________________________________________________________________________________________________________________________________________
                            ________________________________________________________________________________________________________________________________________________________________________
                        </p><br>

                        <div class="d-name">
                            <div>
                                <lable>City & Pin code &nbsp;&nbsp;</lable>
                                <input type="text">
                            </div>
                            <div>
                                <lable>Landmark &nbsp;&nbsp;</lable>
                                <input type="text">
                            </div>
                        </div><br><br>

                        <p><b>Permanent address (Provide full address)</b></p><br><br>

                        <p>
                            ___________13 a,shreenagar society Halar road,near kaleshwar mandir Valsad,gujarat<br>
                            396001____________________________________________________________________________________________________________
                            ________________________________________________________________________________________________________________________________________________________________________
                            ________________________________________________________________________________________________________________________________________________________________________
                        </p><br>

                        <div class="d-name">
                            <div>
                                <lable>City & Pin code &nbsp;&nbsp;</lable>
                                <input type="text">
                            </div>
                            <div>
                                <lable>Landmark &nbsp;&nbsp;</lable>
                                <input type="text">
                            </div>
                        </div>
                        <br><br>

                        <p>Further I declare that I do not have any proof of my current address. I am subming
                            _____________________________
                            as proof of my
                            permanent address, the said property is owned by me / my parents / my relave
                            _____________________________ (name
                            and relaonship)<br><br>
                            and _____________________________ (Parents / relave) is living on said property
                            presently.<br><br>
                            I have submied I want IIFL to send all communicaons regarding my loan account to my above
                            menoned mailing
                            address.
                            I have no objecon IIFL conducng verificaon of my present and permanent address.<br><br>
                            The above informaon is true and can be updated by IIFL in its records.<br><br>
                            I/We do hereby confirm that I/we have been availing this loan by signing this document
                            physically and/or through
                            accessing the link and/or<br><br>
                            vide OTP confirmaon, Electronic and Digital Signatures, Aadhaar authencaon and such other and
                            further means as
                            it was available and known<br><br>
                            to me/us by using my/our registered E-mail ID and the mobile number.</p><br><br>

                        <div>
                            <lable>Borrower Signature &nbsp;&nbsp;&nbsp;</lable>
                            <input type="text">
                        </div>

                        <div>
                            <lable>Name of the Borrower &nbsp;&nbsp;&nbsp;</lable>
                            <input type="text">
                        </div>
                        <div>
                            <lable>Date &nbsp;&nbsp;&nbsp;</lable>
                            <input type="text">
                        </div>

                        <!-- para5 -->
                        <h3>Open NACH undertaking</h3>

                        <p>To<br><br>
                            The Manager,<br><br>
                            IIFL Finance Limited (IIFL)<br><br>
                            Subject: Declaraon towards NACH mandate<br><br>
                            In order to ensure mely repayment of the Loan/ loan(s) monthly instalment, penales, costs and/or
                            any other
                            outstanding amount(s) due in
                            respect of the Loan/ loan(s), obtained/availed from IIFL Finance Limited (”IIFL”) from me to me,
                            l hereby
                            authorize IIFL to submit the mandate
                            duly signed by me, to/ before the bank with whom l have the bank account, details of which are
                            menoned in the
                            mandate, for the purpose of
                            debing my said bank account for/with theamount(s) and the frequency as specified in the Mandate
                            form bearing No.
                            _______________________________________ dated _______________________________________<br><br>
                            In case I obtain more than one Loan/ loan from IIFL and I choose to make the repayment under all
                            such loan(s) by
                            debing the bank account,
                            details of which are provided in the mandate and the loans that subsequently may be availed , I
                            confirm that my
                            said bank account can be
                            debited as and when the mandate is presented by IIFL on or aer the respecve due dates of monthly
                            instalments of
                            each such loan
                            sanconed/that may be sanconed, unl the amounts due and payable in respect of all such loans are
                            duly paid by me.
                            I also authorize the bank
                            with which I am maintaining and operang the account and to debit my account for charges towards
                            the mandate
                            verificaons and transacons
                            bounced due to insufficient funds as applicable.<br><br>
                            I hereby declare and state that the above referred Mandate Form is valid and can be ulised for
                            the Loan referred
                            to there in and/or for all
                            further enhancements/ fresh/addional loans.<br><br>
                            I hereby declare that the parculars given above are correct and complete. If the transacon is
                            delayed or not
                            effected at all for all reasons of
                            incomplete or incorrect informaon, I would not hold the us instuon and/or IIFL
                            responsible.<br><br>
                            I further undertake that the mandate given by me shall remain valid and binding unl all the
                            amount due and
                            payable by me under all the
                            loans taken from IIFL are duly paid to the sasfacon of IIFL and that I shall not iniate any
                            step/acon leading to
                            cancellaon of the mandate, or
                            closure of bank account or for dishonour of the mandate without prior approval in wring from
                            IIFL.<br><br>
                            I/We do hereby confirm that I/we have been availing this loan by signing this declaraon
                            physically and/or
                            through accessing the link and/or
                            vide OTP confirmaon, Electronic and Digital Signatures, Aadhaar authencaon and such other and
                            further means as
                            it was available and known
                            to me/us by using my/our registered E-mail ID and the mobile number.</p><br><br>

                        <div>
                            <lable>Name of the Borrower &nbsp;&nbsp;&nbsp;</lable>
                            <input type="text">
                        </div>

                        <!-- LETTER -->

                        <div class="letter">
                            <h1>SME BUSINESS LOAN SANCTION LETTER</h1>
                        </div>


                        <!-- section2 -->

                        <lable>Date: &nbsp;&nbsp;&nbsp;&nbsp;</lable>
                        <input type="text"><br><br>


                        <lable>Reference NO: &nbsp;&nbsp;&nbsp;&nbsp;</lable>
                        <input type="text"><br><br><br>

                        <p>To, [insert names and address of each borrower/ co-borrower] (collectively the “Borrower”)</p>
                        <br><br><br>

                        <div>
                            <div><label>Name </label></div>
                            <div class="section-3">
                                <input type="text">
                                <input type="text">
                                <input type="text">
                            </div>
                        </div><br>

                        <div>
                            <div>
                                <label>Address </label>
                            </div>
                            <div class="section-3">
                                <input type="text">
                                <input type="text">
                                <input type="text">
                            </div>
                        </div>

                        <p><b>Subject: Sanction Letter</b></p><br><br><br>

                        <p>Dear Sir,</p><br><br>

                        <p>1. Please refer to your application for financial assistance from IIFL Finance Limited
                            (”Lender”).<br>
                            2. We are, at your request, agreeable to extend to you the below mentioned credit facilities,
                            subject to the
                            terms and conditions set out
                            hereunder.<br>
                            3. In case these terms and conditions are acceptable to you, we request you to return the
                            duplicate copy of this
                            sanction letter duly signed in
                            token of acceptance of the terms and conditions secified herein within [ ] days from the date of
                            receipt of this
                            letter.<br>
                            4. The Borrower(s) understands that the Lender has adopted risk based pricing, which is arrived
                            by taking into
                            account, broad parameters like
                            the customer’s financial and credit profile. Further, the Borrower(s) acknowledges and confirms
                            that the Lender
                            shall have the discretion to
                            change prospectively the rate of interst and other charges applicable to the Facility.<br>
                            5. The Borrower(s) understands that all payment receipts are provided electronically only.
                            However, if physical
                            payment confirmation is
                            required, please obtain the same from our branch on paying nominal charges.<br>
                            The following summary of terms and conditions (the “Term Sheet”) provides indicative terms and
                            conditions for
                            the transaction
                            contemplated herein. This Term Sheet is not meant to be, nor should it be construed as a
                            commitment by IIFL for
                            the transaction. The closing
                            of any financial transaction would be subject to various conditions precedent, including without
                            limitation, the
                            conditions set forth in this
                            Term Sheet and internal approvals. This Term Sheet contains a statement of present intention on
                            the part of the
                            parties and it is not intended
                            to create a legal, binding obligation until the specific documentation has been duly executed
                            and delivered.</p>
                        <br><br>

                        <p><b>Term Sheet</b></p>

                        <!-- table24 -->

                        <table id="tchild">
                            <tbody class="tab-child3">
                                <tr>
                                    <td>Name of the Borrower(s)</td>
                                    <td>SOAHIL HARDAWARE AND GENERAL STORES</td>
                                </tr>
                                <tr>
                                    <td>Address of the Borrower(s)</td>
                                    <td>0, manek bhavan Kailash road Valsad, valsad,gujarat 396001</td>
                                </tr>
                                <tr>
                                    <td>Name of the Guarantor</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Nature of Facility</td>
                                    <td>Term Loan Facility</td>
                                </tr>
                                <tr>
                                    <td>Prospect Number</td>
                                    <td>SL5254519</td>
                                </tr>
                                <tr>
                                    <td>Facility limit</td>
                                    <td>
                                        <p class="serial">2000000.00</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rate of Interest</td>
                                    <td>
                                        <p class="serial">17.50</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Additional Interest</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Due Date(s)</td>
                                    <td>
                                        <p class="serial">3</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tenure</td>
                                    <td>
                                        <p class="serial">36</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Account for Payments/ Repayment</td>
                                    <td>998799629-IDIB000V059</td>
                                </tr>
                                <tr>
                                    <td>Security</td>
                                    <td>The Facilities shall be secured by:<br>
                                        A first ranking exclusive security interest over of the<br>
                                        Panjwani Sikandar S<br>
                                        . The security shall be created andperfected upfront / no later than<br>
                                        [_14_] from the first disbursement.</td>
                                </tr>
                                <tr>
                                    <td>Other sanction conditions</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <br><br>
                        <!-- table26 -->
                        <p><b>Schedule of Charges</b></p>

                        <table class="tchild">
                            <tbody class="tab-child3">
                                <tr>
                                    <td>Processing Fees + Tax (non-refundable)</td>
                                    <td>
                                        <p class="serial">47200.00</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Credit Assessment Charges</td>
                                    <td>
                                        <p class="serial">0.00</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table27 -->
                        <table id="tchild">
                            <tbody class="tab-child3">
                                <tr>
                                    <td>Insurance Amount + Tax</td>
                                    <td colspan="2">
                                        <p class="serial">21636.8045</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Net Disbursement Amount</td>
                                    <td colspan="2">
                                        <p class="serial">1911026.2000</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>EMI Amount</td>
                                    <td colspan="2">
                                        <p class="serial">71804.00</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>One Assist Charges</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Prepayment / Foreclosure Charges</td>
                                    <td colspan="2">
                                        1. In the event the Borrower wishes to voluntarily prepay the Facility in part orin
                                        full, it
                                        shall make a written request to the Lender at least [_14_] BusinessDays prior to the
                                        intended date of prepayment. IIFL may, at its solediscretion, allow or disallow the
                                        request of the Borrower.<br>
                                        2. Borrower may prepay the facility in part only upto to 25% of the
                                        outstandingprincipal amount. Part payment shall be allowed only once in a year
                                        andtwice during the Loan tenure.<br>
                                        3. The prepayments under the Facility shall be subject top repayment chargesas
                                        specified below:
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Period</td>
                                    <td>Prepayment/ ForeclosureCharges</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Within 6 months from the date of
                                        firstdrawdown</td>
                                    <td>7% of the outstanding loanamount together
                                        with applicabletaxes.</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>On and from the 7th month and up
                                        till24th month from the date of
                                        firstdrawdown</td>
                                    <td>5% of the outstanding loanamount together
                                        with applicabletaxes.</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>after 24 months from date of
                                        firstdrawdown</td>
                                    <td>4% of the outstanding loanamount together
                                        with applicabletaxes.</td>
                                </tr>
                                <tr>
                                    <td>Charges for cheque bounce, cheque dishonor,
                                        cheque swap, SI/ECS dishonor,no-dues,
                                        document retrieval, duplicate statement /
                                        repayment schedule etc.</td>
                                    <td>Particulars</td>
                                    <td>Charges</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Cheque/ ACH Return Charges</td>
                                    <td>Rs 500 + GST per instance</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Cheque/ ACH Swap Charges</td>
                                    <td>Rs 500 + GST per instance</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Duplicate No dues certificate
                                        PenalCharge</td>
                                    <td>24% per annum + GST</td>
                                </tr>
                                <tr>
                                    <td>Other charges including documentation charges,
                                        security creation andperfection charges,
                                        property valuation charges , inspection charges,
                                        stampduty charges, document digitalization
                                        service charges Additional interest pending
                                        security creation and perfection</td>
                                    <td colspan="2">At actuals</td>
                                </tr>
                                <tr>
                                    <td>Documentation</td>
                                    <td colspan="2">The Facilities are subject to documentation being in a form
                                        acceptable to IIFL.
                                        All necessary documentation shall be completed no later than [_ 14 _] daysfrom the
                                        date of this Sanction Letter.</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- para -->
                        <p><b>for Office use only:</b></p><br><br><br>

                        <p>On behalf of <b> IIFL Finance Limited</b></p><br><br>

                        <label>Name</label><input type="text" class="start"><br>

                        <label>Authorized Signatory</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"><br><br>
                        <p>Agreed and Acceptance by borrower(s):</p><br><br><br>

                        <p>I/We the Borrower/s hereby declare that I/We have read (and/or being read over and explained),
                            verified, understood and irrevocably agreed
                            the terms and conditions of this Sanction Letter by signing this Letter physically or/and
                            electronically through accessing the link and/or vide
                            OTP confirmation, Electronic and Digital Signatures, Aadhaar authentication and such other and
                            further means as it was available and me/us
                            by using my/our registered E-mail ID and the mobile number, and/or completing online forms
                            constitute electronic communications shall be
                            deemed to be the acceptance of this Letter. I/We, the Borrower consent to receive the electronic
                            communications, and agree that all
                            communications, notices, disclosures, and other communications provided to us electronically,
                            via email and on the Site, satisfy any legal
                            requirement that such communication be in writing and legally bound.</p><br><br>
                        <p>Agreed and accepted by the Borrower:</p><br><br><br>

                        <label>Name</label><input type="text">
                        <p>(Signature of Borrower(s) or Signed by its Authorized Signatory)</p>
                        <label>Date:</label><input type="text">

                    </body>


                    </html>





                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection  


{{-- <script>
    document.getElementById('downloadPDF').addEventListener('click', function() { 
        alert('hello');
        var doc = new jsPDF();
        doc.autoTable({ html: 'table' });
        doc.save('application_form.pdf');
    });
</script> --}}
{{-- <script>
    document.getElementById('generatePdfBtn').addEventListener('click', function() {
        // Send AJAX request to generate PDF 
        alert('hello');
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("generate-pdf") }}');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.responseType = 'blob';
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Create blob URL for the response
                var blob = new Blob([xhr.response], { type: 'application/pdf' });
                var url = window.URL.createObjectURL(blob);
                // Create a temporary link element to trigger the download
                var a = document.createElement('a');
                a.href = url;
                a.download = 'document.pdf';
                document.body.appendChild(a);
                a.click();
                // Remove the temporary link element
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
            }
        };
        xhr.send(JSON.stringify({}));
    });
</script> --}}
