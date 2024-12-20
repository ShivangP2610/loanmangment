<!DOCTYPE html>
<html>
<head>
    <title>Borrower Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .background-logo {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1; /* Transparent for watermark effect */
            z-index: -1; /* Send to the background */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }
        th, td {
            /* border: 1px solid #000; */

            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .paddingmain {
            padding: 0px;
            background-color: lightgray;
            border:1px solid black;
        }
        .paddingmain h5{
            padding: 0px;
            margin: 0px;
        }
        .borderclass, .borderclass1, .borderclass2, .borderclass3 {
            border: 1px solid #000;
        }
        .data-field
        {
            border:1px solid black;
            width:100%;
            font-size: 12px;
            padding:1px 4px 1px 4px;
        }

        .inner-table {
            width: 100%;
            border-collapse: collapse;
        }
        .inner-table td {
            padding: 8px;
            border: none;
        }
        /* .tblborder
        {
            border:1px solid black !important;
        } */
         .border1{
            border-bottom:none;
            border-top:none;
         }
         .fontstyle
         {
            font-size:14px;
         }
         .fontstylemain
         {
            font-size:14px;
            color: red;
            font-weight: 600;
         }
        .boxhight{
            height: 40px;
        }
        .widthheight
        {
            height:20px;
            margin-top:10px;
            width:30%;
        }
        .tblebordertd td{
            border: 1px solid black;
            padding: 0px 5px;
        }
        .tblborder{
            border: none !important;
        }


    </style>
</head>
<body>
    <div>
        <img src="{{ asset('admin/dist/img/logo.jpeg') }}" alt="Background Logo" class="background-logo" style="width: 600px; height: 600px; box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);">
    </div>
    <div class="div" style="text-align: right; margin:15px 0px;">
        <img id="logo" src="{{ asset('admin/dist/img/logo.jpeg') }}" alt="Company Logo" style="max-width: 200px; max-height: 100px; margin: 0 auto;">
    </div>
    <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align: center;">APPLICATION FORM</h5>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 50%;" colspan="2" class="fontstyle">
                    For Office Use Only
                </td>
                <td style="width: 50%; text-align: right;" class="fontstyle">
                    CKYC No.: <span class="data-field">{{ $officedata->ckyc_no }}</span>
                </td>
            </tr>
            <tr class="borderclass">
                <td style="width: 33.33%;" class="fontstyle">
                    Application Date: <span class="data-field">{{ $officedata->date }}</span>
                </td>
                <td style="width: 33.33%;" class="fontstyle">
                    Customer ID: <span class="data-field">{{ $officedata->customer_id }}</span>
                </td>
                <td style="width: 33.33%;" class="fontstyle">
                    Prospect No.: <span class="data-field">{{ $officedata->Prospect_No }}</span>
                </td>
            </tr>
            <tr class="borderclass1">
                <td style="width: 33.33%;" class="fontstyle">
                    Tenure (Months): <span class="data-field">{{ $officedata->Months }}</span>
                </td>
                <td style="width: 33.33%;" class="fontstyle">
                    Loan Amount (₹): <span class="data-field">{{ $officedata->Loan_Amount }}</span>
                </td>
                <td style="width: 33.33%;" class="fontstyle">
                    Purpose: <span class="data-field">{{ $officedata->Purpose }}</span>
                </td>
            </tr>
            <tr class="borderclass2">
                <td colspan="3" class="fontstyle">Application Type:
                    <input type="checkbox" name="new" id="New"  value="{{ $officedata->Application_Type}}"
                                            {{ $officedata->Application_Type == 'new' ? 'checked' : '' }}>
                    <label for="New">New</label>
                    <input type="checkbox" name="new" id="Updated"  value="{{ $officedata->Application_Type}}"
                                            {{ $officedata->Application_Type == 'updated' ? 'checked' : '' }}>
                    <label for="Updated">Updated</label>

                </td>
            </tr>
            <tr class="borderclass3">
                <td colspan="3" class="fontstyle">Account Type:
                    <input type="checkbox" name="normal" id="normal" value="{{$officedata->Account_Type}}" {{ $officedata->Account_Type == 'normal' ? 'checked' : ''}}>
                    <label for="normal">Normal</label>
                    <input type="checkbox" name="normal" id="minor" value="{{$officedata->Account_Type}}" {{ $officedata->Account_Type == 'minor' ? 'checked' : ''}}>
                    <label for="minor">Minor</label>
                    <input type="checkbox" name="normal" id="kyc" value="{{$officedata->Account_Type}}"  {{ $officedata->Account_Type == 'kyc' ? 'checked' : ''}}>
                    <label for="kyc">Aadhar Based OTP E-KYC (in non-face to face Mode)</label>
                </td>
            </tr>
        </tbody>
    </table>
   <p style="font-size:12px;">(Please fill the form in BLOCK Letters. Any CANCELLATIONS to be counter SIGNED)</p>
    <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align:left;">Borrower Details</h5>
                </td>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <!-- Image Column spanning 6 rows -->
                <td  rowspan="" style="border:1px solid black !important; vertical-align: top; text-align: start;">
                    <img src="path/to/image.jpg" alt="Borrower Image" style="width:100%; max-width:150px; height:auto; display:block; margin:auto;">
                </td>
            </tr> --}}

            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr >
                            <td width="30%" class="fontstyle">Name of Borrower: </td>
                            <td width="70%" style="border-right: none !important" class="data-field">{{ $customer->cust_name }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table style="border:none !important;">
                        <tr>
                            <td width="60%" class="fontstyle" >Borrower Entity Type:<span class="data-field" style="margin-left:25px;">{{ $customer->cust_entity_type}}</span></td>
                            <td width="40%" class="fontstyle">Date of Incorporation:<span class="data-field" style="margin-left:30px;">{{ $customer->Date_of_Incorporation}}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="30%" class="fontstyle">Principal office address / Place of Business: </td>
                            <td width="70%" style="border-right: none !important" class="data-field">{{ $customer->Principal_office_address }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="33%" class="fontstyle">City/Town/Village: <span class="data-field" style="margin-left:43px;">{{ $customer->Principal_City }}</span></td>
                            <td width="33%" class="fontstyle">District: <span class="data-field" style="margin-left:51px;">{{ $customer->Principal_District }}</span></td>
                            <td width="33%" class="fontstyle">State: <span class="data-field" style="margin-left:50px;">{{ $customer->Principal_State }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="33%" class="fontstyle">Pin/Post Code: <span class="data-field" style="margin-left:62px;">{{ $customer->Principal_pincode }}</span></td>
                            <td width="33%" class="fontstyle">State/UT code: <span class="data-field" style="margin-left:5px;">{{ $customer->Principal_State_code }}</span></td>
                            <td width="33%" class="fontstyle">ISO 3166 Country Code: <span class="data-field" style="margin-left:5px;">{{ $customer->Principal_Country_Code }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="30%" class="fontstyle">Permanent office Address: </td>
                            <td width="70%" style="border-right: none !important" class="data-field">{{ $customer->Permanent_office_address }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="33%" class="fontstyle">City/Town/Village: <span class="data-field" style="margin-left:43px;">{{ $customer->Permanent_City }}</span></td>
                            <td width="33%" class="fontstyle">District: <span class="data-field" style="margin-left:51px;">{{ $customer->Permanent_District }}</span></td>
                            <td width="33%" class="fontstyle">State:<span class="data-field" style="margin-left:50px;">{{ $customer->Permanent_State }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="33%" class="fontstyle">Pin/Post Code: <span class="data-field" style="margin-left:62px;">{{ $customer->Permanent_pincode }}</span></td>
                            <td width="33%" class="fontstyle">State/UT code: <span class="data-field" style="margin-left:5px;">{{ $customer->Permanent_State_code }}</span></td>
                            <td width="33%" class="fontstyle">ISO 3166 Country Code: <span class="data-field" style="margin-left:5px;">{{ $customer->Permanent_Country_Code }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="30%" class="fontstyle">Place of incorporation: </td>
                            <td width="70%" style="border-right: none !important" class="data-field">{{ $customer->Place_of_incorporation }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="50%" class="fontstyle">Telephone (office):  <span class="data-field" style="margin-left:39px">{{ $customer->cust_Telephone }}</span></td>
                            <td width="50%" class="fontstyle">E-mail Address:  <span class="data-field" style="margin-left:44px">{{ $customer->cust_email }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="50%" class="fontstyle">Type of Industry/ Profession: <span class="data-field">{{ $customer->Type_of_Industry }}</span></td>
                            <td width="50%" class="fontstyle">Segment:  <span class="data-field" style="margin-left:83px">{{ $customer->Segment }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="23%" class="fontstyle">GST:  <span class="data-field">{{ $customer->cust_gst }}</span></td>
                            <td width="22%" class="fontstyle">PAN:  <span class="data-field">{{ $customer->cust_pannumber }}</span></td>
                            <td width="20%" class="fontstyle">Form 60:  <span class="data-field">{{ $customer->Form_60 }}</span></td>
                            <td width="35%" class="fontstyle">Overall Business Vintage:  <span class="data-field">{{ $customer->Overall_Business_Vintage }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p></p>
    <p></p>
    {{--  here for DETAILS OF PROPRIETOR / MANAGING PARTNER/ MANAGING DIRECTOR --}}
    @foreach ( $Proprietors as  $Proprietor )
    <table>

        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align:left;">DETAILS OF CO-BORROWER</h5>
                </td>
            </tr>
        </thead>

        <tbody>

            <tr>
                <!-- Image Column spanning 6 rows -->
                <td rowspan="1" width="30%"  style="border:1px solid black !important;">
                    <!-- Assuming the image source is specified here -->
                    <img src="path/to/image.jpg" alt="Borrowr Image" style="width:100%; height:100px;">
                </td>
                <!-- Other Fields Column -->
                <td colspan="2">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="30%" class="fontstyle">Title</td>
                            <td width="70%" class="data-field">{{ $Proprietor->title }}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Full Name:</td>
                            <td width="70%" class="data-field">{{ $Proprietor->proprietor_name }}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Relation with Applicant:</td>
                            <td width="70%" class="data-field">

                                <input type="checkbox" name="Partner" id="Partner" value=" {{ $Proprietor->relation_with_applicant }}" {{ $Proprietor->relation_with_applicant == 'Partner' ? 'checked' : '' }}>
                                <label for="Partner">Partner</label>
                                <input type="checkbox" name="Director" id="Director" value=" {{ $Proprietor->relation_with_applicant }} " {{ $Proprietor->relation_with_applicant == 'Director' ? 'checked' : '' }}>
                                <label for="Director">Director</label>

                                <input type="checkbox" name="Proprietor" id="Proprietor" value=" {{ $Proprietor->relation_with_applicant }} " {{ $Proprietor->relation_with_applicant == 'Proprietor' ? 'checked' : '' }}>
                                <label for="Proprietor">Proprietor</label>
                                <input type="checkbox" name="Promoter" id="Promoter" value=" {{ $Proprietor->relation_with_applicant }} " {{ $Proprietor->relation_with_applicant == 'Promoter' ? 'checked' : '' }}>
                                <label for="Promoter">Promoter</label>
                                <input type="checkbox" name="Karta" id="Karta" value=" {{ $Proprietor->relation_with_applicant }} "{{ $Proprietor->relation_with_applicant == 'Karta' ? 'checked' : '' }} >
                                <label for="Karta">Karta</label>
                                <input type="checkbox" name="Benificiary" id="Benificiary" value=" {{ $Proprietor->relation_with_applicant }} "{{ $Proprietor->relation_with_applicant == 'Benificiary' ? 'checked' : '' }}>
                                <label for="Benificiary">Benificiary</label>
                                <input type="checkbox" name="Others" id="Others" value=" {{ $Proprietor->relation_with_applicant }} " {{ $Proprietor->relation_with_applicant == 'Others' ? 'checked' : '' }}>
                                <label for="Others">Others</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Applying as Co-Borrower</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Partner" id="Partner" value="{{ $Proprietor->applying_as_co_borrower }}"  {{$Proprietor->applying_as_co_borrower == 'Partner'  ?  'checked' : '' }}>
                                <label for="Yes">Partner</label>
                                <input type="checkbox" name="No" id="No" value=" {{ $Proprietor->applying_as_co_borrower }}"   {{$Proprietor->applying_as_co_borrower == 'No' ? 'checked' : ''}}>
                                <label for="No">No</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">Date of Birth
                                            <span class="data-field" style="margin-left:29px;">{{ $Proprietor->Date_of_Birth }}</span>
                                        </td>
                                        <td width="50%" class="fontstyle">Gender:
                                            <span class="data-field" style="margin-left:39px;">{{ $Proprietor->Gender }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">Marital Status:
                                            <span class="data-field" style="margin-left:18px;">{{ $Proprietor->Marital_Status }}</span>
                                        </td>
                                        <td width="50%" class="fontstyle">Citizenship:
                                            <span class="data-field" style="margin-left:18px;">{{ $Proprietor->Citizenship }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- Other Fields Column -->
                <td colspan="3">
                    <table width="100%" style="border-bottom:1px solid black !important;">
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">Father Name/ Spouse Name:
                                            <span class="data-field" style="margin-left:31px;">{{ $Proprietor->father_or_spouse_name}}</span>
                                        </td>
                                        <td width="50%" class="fontstyle">Shareholding % in Borrowing Entity:
                                            <span class="data-field" style="margin-left:18px;">{{ $Proprietor->shareholding_with_cust_entity}}</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Residential Status:</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Resident Individual" id="Resident Individual" value=" {{ $Proprietor->Residential_Status}}" {{ $Proprietor->Residential_Status  == 'Resident Individual'  ?  'checked' : ''}}>
                                <label for="Resident Individual">Resident Individual</label>
                                <input type="checkbox" name="Non Resident India" id="Non Resident India" value=" {{ $Proprietor->Residential_Status}} " {{ $Proprietor->Residential_Status  == 'Non Resident India'  ?  'checked' : ''}}" >
                                <label for="Non Resident India">Non Resident India</label>
                                <input type="checkbox" name="Foreign National" id="Foreign National" value="  {{ $Proprietor->Residential_Status}} " {{ $Proprietor->Residential_Status  == 'Foreign National'  ?  'checked' : ''}}" >
                                <label for="Foreign National">Foreign National</label>
                                <input type="checkbox" name="Person of Indian Origin" id="Person of Indian Origin" value="  {{ $Proprietor->Residential_Status}} " {{ $Proprietor->Residential_Status  == 'Person of Indian Origin'  ?  'checked' : ''}} >
                                <label for="Person of Indian Origin">Person of Indian Origin</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Occupation type:</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Service" id="Service" value=" {{ $Proprietor->Occupation_type}} " {{ $Proprietor->Occupation_type == 'Service' ? 'checked' : '' }}>
                                <label for="Service">Service: (Private Sector/ Public Sector / Govt. Sector) </label>
                                <input type="checkbox" name="Business" id="Business" value="{{ $Proprietor->Occupation_type}} " {{ $Proprietor->Occupation_type == 'Business' ? 'checked' : '' }}>
                                <label for="Business">Business</label>
                                <input type="checkbox" name="Not categorized" id="Not categorized" value="{{ $Proprietor->Occupation_type}} " {{ $Proprietor->Occupation_type == 'Not categorized' ? 'checked' : '' }}>
                                <label for="Not categorized">Not categorized</label>
                                <input type="checkbox" name="Others" id="Others" value="{{ $Proprietor->Occupation_type}} " {{ $Proprietor->Occupation_type == 'Others' ? 'checked' : '' }}>
                                <label for="Others"> Others: (Professional / Self Employed / Retired / Housewife/Student)</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Different from Permanent addess?</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Yes" id="Yes" value="{{ $Proprietor->Different_from_Permanent_addess}} " {{ $Proprietor->Different_from_Permanent_addess == 'Yes' ? 'checked' : '' }}>
                                <label for="Yes">Yes</label>
                                <input type="checkbox" name="No" id="No" value="{{ $Proprietor->Different_from_Permanent_addess}} " {{ $Proprietor->Different_from_Permanent_addess == 'No' ? 'checked' : '' }}>
                                <label for="No">No</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Current Residence Address:</td>
                            <td width="70%" class="data-field">{{ $Proprietor->Current_Residence_Address}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Landmark:</td>
                            <td width="70%" class="data-field">{{ $Proprietor->Current_Landmark}} </td>
                        </tr>

                        {{-- here  --}}
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="33%" class="fontstyle">City/Town/Village: <span class="data-field" style="margin-left:42px;">{{  $Proprietor->Current_City}}</span></td>
                                        <td width="33%" class="fontstyle">District: <span class="data-field" style="margin-left:50px;">{{  $Proprietor->Current_District}}</span></td>
                                        <td width="33%" class="fontstyle">State:<span class="data-field" style="margin-left:50px;">{{  $Proprietor->Current_State}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="33%" class="fontstyle">Pin/Post Code: <span class="data-field" style="margin-left:62px;">{{   $Proprietor->Current_pincode}}</span></td>
                                        <td width="33%" class="fontstyle">State/UT code: <span class="data-field" style="margin-left:5px;">{{   $Proprietor->Current_State_code}}</span></td>
                                        <td width="33%" class="fontstyle">ISO 3166 Country Code: <span class="data-field" style="margin-left:5px;">{{   $Proprietor->Current_Country_Code}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            {{-- here this raw work is pending --}}
            <tr>
                 <!-- Other Fields Column -->
                 <td colspan="3">
                    <table width="100%" style="border:none !important;">

                        <tr>
                            <td colspan="3">
                                <table width="100%">
                                    <tr>
                                        <td width="65%" class="fontstyle">Residence Type::
                                            <input type="checkbox" name="Rented" id="Rented" value=" {{ $Proprietor->Residence_Type}} " {{ $Proprietor->Residence_Type == 'Rented' ? 'checked' : '' }} style="margin-left:20px;">
                                            <label for="Rented">Rented</label>
                                            <input type="checkbox" name="Owned" id="Owned" value=" {{ $Proprietor->Residence_Type }} " {{ $Proprietor->Residence_Type == 'Owned' ? 'checked' : '' }} >
                                            <label for="Owned">Owned</label>
                                            <input type="checkbox" name="Parental" id="Parental" value="{{ $Proprietor->Residence_Type }} " {{ $Proprietor->Residence_Type == 'Parental' ? 'checked' : '' }}>
                                            <label for="Parental">Parental</label>
                                            <input type="checkbox" name="Other" id="Other" value="{{ $Proprietor->Residence_Type}} " {{ $Proprietor->Residence_Type == 'Other' ? 'checked' : '' }}>
                                            <label for="Other"> Other</label>
                                        </td>
                                        <td width="35%" class="fontstyle" style="margin-left:15px;">No. of years in current residence: <span class="data-field" style="margin-left:5px;">{{$Proprietor->Current_Residences_years }} </span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Address as per proof of address/ proof of identity</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Yes" id="Yes" value=" {{ $Proprietor->Address_as_per_proof}} " {{ $Proprietor->Address_as_per_proof == 'Yes' ? 'checked' : '' }}>
                                <label for="Yes">Yes</label>
                                <input type="checkbox" name="No" id="No" value=" {{ $Proprietor->Address_as_per_proof}} " {{ $Proprietor->Address_as_per_proof == 'No' ? 'checked' : '' }} >
                                <label for="No">No</label>

                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Permanent Residence Address:</td>
                            <td width="70%" class="data-field"> {{ $Proprietor->Permanent_Residence_Address}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Landmark:</td>
                            <td width="70%" class="data-field">{{ $Proprietor->Permanent_Landmark }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="33%" class="fontstyle">City/Town/Village: <span class="data-field" style="margin-left:42px;">{{ $Proprietor->Permanent_City}}</span></td>
                                        <td width="33%" class="fontstyle">District: <span class="data-field" style="margin-left:50px;">{{ $Proprietor->Permanent_District}}</span></td>
                                        <td width="33%" class="fontstyle">State:<span class="data-field" style="margin-left:50px;">{{ $Proprietor->Permanent_State}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="33%" class="fontstyle">Pin/Post Code: <span class="data-field" style="margin-left:62px;">{{ $Proprietor->Permanent_pincode}}</span></td>
                                        <td width="33%" class="fontstyle">State/UT code: <span class="data-field" style="margin-left:5px;">{{ $Proprietor->Permanent_State_code}}</span></td>
                                        <td width="33%" class="fontstyle">ISO 3166 Country Code: <span class="data-field" style="margin-left:5px;">{{ $Proprietor->Permanent_Country_Code}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">Telephone (office):  <span class="data-field" style="margin-left:39px">{{ $Proprietor->proprietor_Mobile_no}}</span></td>
                                        <td width="50%" class="fontstyle">E-mail Address:  <span class="data-field" style="margin-left:44px">{{ $Proprietor->proprietor_email}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="36%" class="fontstyle">PAN:<span class="data-field" style="margin-left:127px;">{{ $Proprietor->proprietor_pannumber}}</span></td>
                                        <td width="20%" class="fontstyle">Form 60:<span class="data-field" style="margin-left:27px;">{{ $Proprietor->proprietor_Form_60}}</span></td>
                                        <td width="44%" class="fontstyle">AADHAR No.:<span class="data-field" style="margin-left:16px;">{{ $Proprietor->proprietor_adharnumber}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                        <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                        <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                    </tr>
                                    <tr>
                                        <td class="fontstyle"><span class="data-field">BORROWER (NAME & SIGN)</span></td>
                                        <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                        <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>


    </table>
    @endforeach
    {{-- here for DETAILS OF DETAILS OF CO-BORROWER  --}}
     <!-- <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align:left;">DETAILS OF CO-BORROWER</h5>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>

                <td rowspan="1" width="30%"  style="border:1px solid black !important;">

                    <img src="path/to/image.jpg" alt="Borrower Image" style="width:100%; height:100px;">
                </td>

                <td colspan="2">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="30%" class="fontstyle">Title</td>
                            <td width="70%" class="data-field">Mr</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Full Name:</td>
                            <td width="70%" class="data-field">Panjwani Sikandar S</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Relation with Applicant:</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Partner" id="Partner" value="">
                                <label for="Partner">Partner</label>
                                <input type="checkbox" name="Director" id="Director" value="" checked>
                                <label for="Director">Director</label>
                                <input type="checkbox" name="Proprietor" id="Proprietor" value="" checked>
                                <label for="Proprietor">Proprietor</label>
                                <input type="checkbox" name="Promoter" id="Promoter" value="" checked>
                                <label for="Promoter">Promoter</label>
                                <input type="checkbox" name="Karta" id="Karta" value="" checked>
                                <label for="Karta">Karta</label>
                                <input type="checkbox" name="Benificiary" id="Benificiary" value="" checked>
                                <label for="Benificiary">Benificiary</label>
                                <input type="checkbox" name="Others" id="Others" value="" checked>
                                <label for="Others">Others</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Applying as Co-Borrower</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Partner" id="Partner" value="">
                                <label for="Partner">Partner</label>
                                <input type="checkbox" name="No" id="No" value="" checked>
                                <label for="No">No</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">Date of Birth
                                            <span class="data-field" style="margin-left:43px;">30-May-1957</span>
                                        </td>
                                        <td width="50%" class="fontstyle">Gender:
                                            <span class="data-field" style="margin-left:39px;">Male</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%">
                                    <tr>
                                        <td width="50%" class="fontstyle">Marital Status:
                                            <span class="data-field" style="margin-left:31px;">Married</span>
                                        </td>
                                        <td width="50%" class="fontstyle">Citizenship:
                                            <span class="data-field" style="margin-left:18px;">Indian</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>

                <td colspan="3">
                    <table width="100%" style="border-bottom:1px solid black !important;">
                        <tr>
                            <td colspan="3">
                                <table width="100%">
                                    <tr>
                                        <td width="50%" class="fontstyle">Father Name/ Spouse Name:
                                            <span class="data-field" style="margin-left:31px;">SADRUDIN</span>
                                        </td>
                                        <td width="50%" class="fontstyle">Shareholding % in Borrowing Entity:
                                            <span class="data-field" style="margin-left:18px;">12</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Residential Status:</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Resident Individual" id="Resident Individual" value="">
                                <label for="Resident Individual">Resident Individual</label>
                                <input type="checkbox" name="Non Resident India" id="Non Resident India" value="" checked>
                                <label for="Non Resident India">Non Resident India</label>
                                <input type="checkbox" name="Foreign National" id="Foreign National" value="" checked>
                                <label for="Foreign National">Foreign National</label>
                                <input type="checkbox" name="Person of Indian Origin" id="Person of Indian Origin" value="" checked>
                                <label for="Person of Indian Origin">Person of Indian Origin</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Occupation type:</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Service" id="Service" value="">
                                <label for="Service">Service: (Private Sector/ Public Sector / Govt. Sector) </label>
                                <input type="checkbox" name="Business" id="Business" value="" checked>
                                <label for="Business">Business</label>
                                <input type="checkbox" name="Not categorized" id="Not categorized" value="" checked>
                                <label for="Not categorized">Not categorized</label>
                                <input type="checkbox" name="Others" id="Others" value="" checked>
                                <label for="Others"> Others: (Professional / Self Employed / Retired / Housewife/Student)</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Different from Permanent addess?</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Yes" id="Yes" value="">
                                <label for="Yes">Yes</label>
                                <input type="checkbox" name="No" id="No" value="" checked>
                                <label for="No">No</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Current Residence Address:</td>
                            <td width="70%" class="data-field">13 a,shreenagar society Halar road,near kaleshwar mandir Valsad,gujarat 396001</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Landmark:</td>
                            <td width="70%" class="data-field">Near By Kaleshwar Mandir</td>
                        </tr>

                        {{-- here  --}}
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="33%" class="fontstyle">City/Town/Village: <span class="data-field" style="margin-left:48px;">SURAT</span></td>
                                        <td width="33%" class="fontstyle">District: <span class="data-field" style="margin-left:50px;">Valsad</span></td>
                                        <td width="33%" class="fontstyle">State:<span class="data-field" style="margin-left:50px;">GUJARAT</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="33%" class="fontstyle">Pin/Post Code: <span class="data-field" style="margin-left:66px;">396001</span></td>
                                        <td width="33%" class="fontstyle">State/UT code: <span class="data-field" style="margin-left:5px;">GJ</span></td>
                                        <td width="33%" class="fontstyle">ISO 3166 Country Code: <span class="data-field" style="margin-left:5px;">IN</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="65%" class="fontstyle">Residence Type
                                            <input type="checkbox" name="Rented" id="Rented" value="" style="margin-left:55px;">
                                            <label for="Rented">Rented</label>
                                            <input type="checkbox" name="Owned" id="Owned" value="" checked>
                                            <label for="Owned">Owned</label>
                                            <input type="checkbox" name="Parental" id="Parental" value="" checked>
                                            <label for="Parental">Parental</label>
                                            <input type="checkbox" name="Other" id="Other" value="" checked>
                                            <label for="Other"></label>
                                        </td>
                                        <td width="35%" class="fontstyle">No. of years in current residence<span class="data-field" style="margin-left:5px;">12</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Address as per proof of address/ proof of identity</td>
                            <td width="70%" class="data-field">
                                <input type="checkbox" name="Yes" id="Yes" value="">
                                <label for="Yes">Yes</label>
                                <input type="checkbox" name="No" id="No" value="" checked>
                                <label for="No">No</label>

                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Permanent Residence Address:</td>
                            <td width="70%" class="data-field">13 a,shreenagar society Halar road,near kaleshwar mandir Valsad,gujarat 396001</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Landmark:</td>
                            <td width="70%" class="data-field">Near By Kaleshwar Mandir</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="33%" class="fontstyle">City/Town/Village: <span class="data-field" style="margin-left:48px;">SURAT</span></td>
                                        <td width="33%" class="fontstyle">District: <span class="data-field" style="margin-left:50px;">Valsad</span></td>
                                        <td width="33%" class="fontstyle">State:<span class="data-field" style="margin-left:50px;">GUJARAT</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="33%" class="fontstyle">Pin/Post Code: <span class="data-field" style="margin-left:66px;">396001</span></td>
                                        <td width="33%" class="fontstyle">State/UT code: <span class="data-field" style="margin-left:5px;">GJ</span></td>
                                        <td width="33%" class="fontstyle">ISO 3166 Country Code: <span class="data-field" style="margin-left:5px;">IN</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">Telephone (office):  <span class="data-field" style="margin-left:43px">9824050660</span></td>
                                        <td width="50%" class="fontstyle">E-mail Address:  <span class="data-field" style="margin-left:44px">sohil_hardware@yahoo.com</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="36%" class="fontstyle">PAN:<span class="data-field" style="margin-left:131px;">ABGPP6638J</span></td>
                                        <td width="20%" class="fontstyle">Form 60:<span class="data-field" style="margin-left:27px;">NO</span></td>
                                        <td width="44%" class="fontstyle">AADHAR No.:<span class="data-field" style="margin-left:16px;">456545654565</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>

                 <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                        <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                        <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                    </tr>
                                    <tr>
                                        <td class="fontstyle"><span class="data-field">BORROWER (NAME & SIGN)</span></td>
                                        <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                        <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>

    </table> -->
    <p></p>
    <p></p>
    {{-- here for DETAILS OF REMAINING PARTNERS / DIRECTORS --}}
    <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align:left;">DETAILS OF REMAINING PARTNERS / DIRECTORS</h5>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="20%">Full Name</td>
                            <td width="80%">
                            {{-- <input type="text" value="{{$Remainingpartners[0]->partners_name ? $Remainingpartners[0]->partners_name : ''}}" class="widthheight"></input>
                            <input type="text"  value="{{$Remainingpartners[1]->partners_name ? $Remainingpartners[1]->partners_name : ''}}" class="widthheight"></input>
                            <input type="text"   value="{{$Remainingpartners[2]->partners_name ? $Remainingpartners[2]->partners_name : ''}}"  class="widthheight"></input> --}}
                            @if (isset($Remainingpartners[0]) && $Remainingpartners[0] !== null)
                            <input type="text" value="{{ $Remainingpartners[0]->partners_name ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[1]) && $Remainingpartners[1] !== null)
                                <input type="text" value="{{ $Remainingpartners[1]->partners_name ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[2]) && $Remainingpartners[2] !== null)
                                <input type="text" value="{{ $Remainingpartners[2]->partners_name ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                        </td>


                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="20%">Date of Birth</td>
                            <td width="80%">
                            {{-- <input type="text" value="{{$Remainingpartners[0]->Date_of_Birth ? $Remainingpartners[0]->Date_of_Birth : ''}}" class="widthheight"></input>
                            <input type="text"  value="{{$Remainingpartners[1]->Date_of_Birth ? $Remainingpartners[1]->Date_of_Birth : ''}}"class="widthheight"></input>
                            <input type="text"  value="{{$Remainingpartners[2]->Date_of_Birth ? $Remainingpartners[2]->Date_of_Birth : ''}}"class="widthheight"></input> --}}
                            @if (isset($Remainingpartners[0]) && $Remainingpartners[0] !== null)
                            <input type="text" value="{{ $Remainingpartners[0]->Date_of_Birth ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[1]) && $Remainingpartners[1] !== null)
                                <input type="text" value="{{ $Remainingpartners[1]->Date_of_Birth ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[2]) && $Remainingpartners[2] !== null)
                                <input type="text" value="{{ $Remainingpartners[2]->Date_of_Birth ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif
                        </td>


                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="20%">PAN No.</td>
                            <td width="80%">
                            {{-- <input type="text"  value="{{$Remainingpartners[0]->partners_pannumber ? $Remainingpartners[0]->partners_pannumber : ''}}" class="widthheight"></input>
                            <input type="text"  value="{{$Remainingpartners[1]->partners_pannumber ? $Remainingpartners[1]->partners_pannumber : ''}}" class="widthheight"></input>
                            <input type="text"  value="{{$Remainingpartners[2]->partners_pannumber ? $Remainingpartners[2]->partners_pannumber : ''}}" class="widthheight"></input> --}}
                            @if (isset($Remainingpartners[0]) && $Remainingpartners[0] !== null)
                            <input type="text" value="{{ $Remainingpartners[0]->partners_pannumber ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[1]) && $Remainingpartners[1] !== null)
                                <input type="text" value="{{ $Remainingpartners[1]->partners_pannumber ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[2]) && $Remainingpartners[2] !== null)
                                <input type="text" value="{{ $Remainingpartners[2]->partners_pannumber ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif
                        </td>


                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="20%">Residential Address</td>
                            <td width="80%">
                            {{-- <input type="text" value="{{$Remainingpartners[0]->partners_Residence_Address ? $Remainingpartners[0]->partners_Residence_Address : ''}}" class="widthheight"></input>
                            <input type="text" value="{{$Remainingpartners[1]->partners_Residence_Address ? $Remainingpartners[1]->partners_Residence_Address : ''}}" class="widthheight"></input>
                            <input type="text" value="{{$Remainingpartners[2]->partners_Residence_Address ? $Remainingpartners[2]->partners_Residence_Address : ''}}" class="widthheight"></input> --}}
                            @if (isset($Remainingpartners[0]) && $Remainingpartners[0] !== null)
                            <input type="text" value="{{ $Remainingpartners[0]->partners_Residence_Address ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[1]) && $Remainingpartners[1] !== null)
                                <input type="text" value="{{ $Remainingpartners[1]->partners_Residence_Address ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[2]) && $Remainingpartners[2] !== null)
                                <input type="text" value="{{ $Remainingpartners[2]->partners_Residence_Address ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif
                        </td>


                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="20%">Tel/Mobile</td>
                            <td width="80%">
                            {{-- <input type="text" value="{{$Remainingpartners[0]->partners_Mobile_no ? $Remainingpartners[0]->partners_Mobile_no : ''}}" class="widthheight"></input>
                            <input type="text"  value="{{$Remainingpartners[1]->partners_Mobile_no ? $Remainingpartners[1]->partners_Mobile_no : ''}}" class="widthheight"></input>
                            <input type="text"  value="{{$Remainingpartners[2]->partners_Mobile_no ? $Remainingpartners[2]->partners_Mobile_no : ''}}" class="widthheight"></input> --}}
                            @if (isset($Remainingpartners[0]) && $Remainingpartners[0] !== null)
                            <input type="text" value="{{ $Remainingpartners[0]->partners_Mobile_no ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[1]) && $Remainingpartners[1] !== null)
                                <input type="text" value="{{ $Remainingpartners[1]->partners_Mobile_no ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[2]) && $Remainingpartners[2] !== null)
                                <input type="text" value="{{ $Remainingpartners[2]->partners_Mobile_no ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif
                        </td>


                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="20%">Work Experience</td>
                            <td width="80%">
                            {{-- <input type="text" value="{{$Remainingpartners[0]->partners_workexp ? $Remainingpartners[0]->partners_workexp : ''}}"  class="widthheight"></input>
                            <input type="text" value="{{$Remainingpartners[1]->partners_workexp ? $Remainingpartners[1]->partners_workexp : ''}}"  class="widthheight"></input>
                            <input type="text" value="{{$Remainingpartners[2]->partners_workexp ? $Remainingpartners[2]->partners_workexp : ''}}"  class="widthheight"></input> --}}
                            @if (isset($Remainingpartners[0]) && $Remainingpartners[0] !== null)
                            <input type="text" value="{{ $Remainingpartners[0]->partners_workexp ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[1]) && $Remainingpartners[1] !== null)
                                <input type="text" value="{{ $Remainingpartners[1]->partners_workexp ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[2]) && $Remainingpartners[2] !== null)
                                <input type="text" value="{{ $Remainingpartners[2]->partners_workexp ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif
                        </td>


                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="20%">Shareholding % in borrowing entity</td>
                            <td width="80%">
                            {{-- <input type="text"  value="{{$Remainingpartners[0]->shareholding_with_cust_entity ? $Remainingpartners[0]->shareholding_with_cust_entity : ''}}" class="widthheight"></input>
                            <input type="text"  value="{{$Remainingpartners[1]->shareholding_with_cust_entity ? $Remainingpartners[1]->shareholding_with_cust_entity : ''}}" class="widthheight"></input>
                            <input type="text"  value="{{$Remainingpartners[2]->shareholding_with_cust_entity ? $Remainingpartners[2]->shareholding_with_cust_entity : ''}}" class="widthheight"></input> --}}
                            @if (isset($Remainingpartners[0]) && $Remainingpartners[0] !== null)
                            <input type="text" value="{{ $Remainingpartners[0]->shareholding_with_cust_entity ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[1]) && $Remainingpartners[1] !== null)
                                <input type="text" value="{{ $Remainingpartners[1]->shareholding_with_cust_entity ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif

                            @if (isset($Remainingpartners[2]) && $Remainingpartners[2] !== null)
                                <input type="text" value="{{ $Remainingpartners[2]->shareholding_with_cust_entity ?? '' }}" class="widthheight">
                            @else
                                <input type="text" value="" class="widthheight">
                            @endif
                        </td>


                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p></p>
    <p></p>

    {{-- here for DETAILS OF THE ACCOUNT FOR DISBURSEMENT  --}}
    <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align:left;">DETAILS OF THE ACCOUNT FOR DISBURSEMENT</h5>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="3">
                    <table width="100%" style="border:none !important;">

                    @foreach ( $BankDetailes as  $BankDetaile )
                    <tr>
                        <td colspan="2" style="font-weight: bold; text-align: left; padding: 10px 0;">Bank Detail {{ $loop->iteration }}</td>
                    </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Name of Bank:</td>
                            <td width="70%" class="data-field">{{ $BankDetaile->bank_name }}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Branch Address:</td>
                            <td width="70%" class="data-field">{{ $BankDetaile->branch_address}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="65%" class="fontstyle">Account Holder Name:  <span class="data-field" style="margin-left:15px">{{ $BankDetaile->account_holder_name}}</span></td>
                                        <td width="35%" class="fontstyle">Account Number:  <span class="data-field" style="margin-left:44px">{{ $BankDetaile->account_number}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="65%" class="fontstyle">Type of Account:<span class="data-field" style="margin-left:54px">{{ $BankDetaile->Type_of_Account}}</span></td>
                                        <td width="35%" class="fontstyle">Account Operational Since<span class="data-field" style="margin-left:35px">{{ $BankDetaile->account_oprete_since}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="65%" class="fontstyle">IFSC Code:<span class="data-field" style="margin-left:86px">{{ $BankDetaile->ifsc_code}}</span></td>
                                        <td width="35%" class="fontstyle">MICR Code:<span class="data-field" style="margin-left:50px">{{ $BankDetaile->micr_code}}
                                        </span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>

        </tbody>
    </table>
    <p></p>
    <p></p>
    {{-- here for REFERENCES --}}

    <table>
        <thead>
            <tr>
                <td width="50%" class="paddingmain">
                    <h5 style="text-align:left;">REFERENCES</h5>
                </td>
                <td width="50%" class="paddingmain">
                    <h5 style="text-align:left;">REFERENCE-2 (NON-RELATIVE)</h5>
                </td>
            </tr>
        </thead>
        <tbody>

            <tr>
            @foreach ($References as  $Reference)
                <td>
                    <table width="100%" style="border:1px solid black !important;">
                        <tr>
                            <td width="30%" class="fontstyle">Name:</td>
                            <td width="70%" class="data-field">{{ $Reference->Name}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Address:</td>
                            <td width="70%" class="data-field">{{ $Reference->Address}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">City: <span class="data-field" style="margin-left:47px">{{ $Reference->City}}</span></td>
                                        <td width="50%" class="fontstyle">Pincode: <span class="data-field" style="margin-left:37px">{{ $Reference->pincode}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">Phone:<span class="data-field" style="margin-left:34px">{{ $Reference->Phone}}</span></td>
                                        <td width="50%" class="fontstyle">Mobile:<span class="data-field" style="margin-left:50px">{{ $Reference->Mobile}}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Email:</td>
                            <td width="70%" class="data-field">{{ $Reference->Email}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Relation With Applicant:</td>
                            <td width="70%" class="data-field">{{ $Reference->Relation_with_applicant}}</td>
                        </tr>
                    </table>


                </td>
                  @endforeach
                <!-- <td>
                    <table width="100%" style="border:1px solid black !important;">
                        <tr>
                            <td width="30%" class="fontstyle">Name:</td>
                            <td width="70%" class="data-field">shivang</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Address:</td>
                            <td width="70%" class="data-field">13 a,shreenagar society Halar road,near kaleshwar mandir Valsad,gujarat 396001</td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">City: <span class="data-field" style="margin-left:47px">Surat</span></td>
                                        <td width="50%" class="fontstyle">Pincode: <span class="data-field" style="margin-left:37px">396445</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="50%" class="fontstyle">Phone:<span class="data-field" style="margin-left:34px">9687256936</span></td>
                                        <td width="50%" class="fontstyle">Mobile:<span class="data-field" style="margin-left:50px">396019098</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Email:</td>
                            <td width="70%" class="data-field">[Email]</td>
                        </tr>
                        <tr>
                            <td width="30%" class="fontstyle">Relation With Applicant:</td>
                            <td width="70%" class="data-field">[Relation]</td>
                        </tr>
                    </table>

                </td> -->
            </tr>

            <tr>
                <!-- Other Fields Column -->
                <td colspan="3">
                   <table width="100%" style="border:none !important;">
                       <tr>
                           <td colspan="3">
                               <table width="100%" style="border:none !important;">
                                   <tr>
                                       <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                       <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                       <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                   </tr>
                                   <tr>
                                       <td class="fontstyle"><span class="data-field">BORROWER (NAME & SIGN)</span></td>
                                       <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                       <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                   </tr>
                               </table>
                           </td>
                       </tr>
                   </table>
               </td>
           </tr>
        </tbody>
    </table>

    <p></p>
    {{-- here for  --}}
    {{-- <table class="tblborder">
        <tbody>
            <td colspan="3">
                <table width="100%" style="border:none !important" class="tblebordertd">
                    <tr>
                        <td width="50%" class="fontstylemain">Nature Of Facility</td>
                        <td width="50%" class="fontstylemain">Business Loan</td>
                    </tr>
                    <tr>
                        <td width="50%" class="fontstyle">Facility Type</td>
                        <td width="50%" class="fontstyle">Term Loan</td>
                    </tr>
                    <tr>
                        <td width="50%" class="fontstyle">Loan Amount(₹)</td>
                        <td width="50%" class="fontstyle">2000000.00</td>
                    </tr>
                    <tr>
                        <td width="50%" class="fontstyle">Tenure (Month)</td>
                        <td width="50%" class="fontstyle">36</td>
                    </tr>
                    <tr>
                        <td width="50%" class="fontstyle">Rate of Interest (p.a.) fixed</td>
                        <td width="50%" class="fontstyle">17.50%</td>
                    </tr>
                    <tr>
                        <td width="50%" class="fontstyle">Mode of Payment </td>
                        <td width="50%" class="fontstyle">NACH</td>
                    </tr>
                    <tr>
                        <td width="50%" class="fontstyle">Processing Fees + GST (non-refundable) </td>
                        <td width="50%" class="fontstyle">47200.00</td>
                    </tr>
                </table>
            </td>
        </tbody>
    </table> --}}
     <p></p>

     {{-- here for  --}}
     {{-- <table class="tblborder">
        <tbody>
            <tr>
                <td colspan="2">
                    <table width="100%" style="border:none !important;" class="tblebordertd">
                        <tr>
                            <td colspan="2" width="100%" class="fontstylemain" style="text-align:center;">SCHEDULE OF CHARGES</td>
                        </tr>
                        <tr>
                            <td width="50%" class="fontstyle">Cheque / ACH Return Charges</td>
                            <td width="50%" class="fontstyle">500/ + GST per instance</td>
                        </tr>
                        <tr>
                            <td width="50%" class="fontstyle">Cheque / ACH Swapping Charges, No-dutieis Certificate</td>
                            <td width="50%" class="fontstyle">500/ + GST per instance</td>
                        </tr>
                        <tr>
                            <td width="50%" class="fontstyle">Duplicate Statement / Duplicate Amortisation / Penal/Default
                                                              Interest24% per annum</td>
                            <td width="50%" class="fontstyle">200/ + GST per instance Repayment schedule</td>
                        </tr>
                        <tr>
                            <td width="50%" class="fontstyle">Prepayment / Foreclosure Charges</td>
                            <td width="50%" class="fontstyle">1. In the event the Borrower wishes to voluntarily prepay the Facility
                                                                in part or in full, it shall make a written request to the Lender at least
                                                                7 Business Days prior to the intended date of prepayment. The
                                                                Lender may, at its sole discretion, allow or disallow the request of the
                                                                Borrower.
                                                                2. Borrower may prepay the facility in part only upto to 25% of the
                                                                outstanding principal amount. Part payment shall be allowed only
                                                                once in a year and twice during the Loan tenure.
                                                                3. The prepayments under the Facility shall be subject top repayment
                                                                charges as specified below:</td>
                        </tr>
                        <tr>
                            <td width="50%" class="fontstyle"></td>
                            <td width="50%" class="fontstyle">
                                <table width="100%" style="border:none !important;">
                                    <tr>
                                        <td width="40%" class="fontstylemain">Period</td>
                                        <td width="60%" class="fontstylemain">Prepayment/ Foreclosure Charge</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fontstyle">Within 6 months from the
                                                                              date of first drawdown </td>

                                        <td width="60%" class="fontstyle">7% of the outstanding loan amount
                                                                              together with applicable taxes.</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fontstyle">On and from the 7th month
                                                                              and up till 24th month from the date of first drawdown </td>


                                        <td width="60%" class="fontstyle">5% of the outstanding loan amount
                                                                              together with applicable taxes</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fontstyle">after 24 months from date of
                                                                              first drawdown</td>

                                        <td width="60%" class="fontstyle">4% of the outstanding loan amount
                                                                              together with applicable taxes</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" class="fontstyle">Loan Cancellation</td>
                            <td width="50%" class="fontstyle">Interest will be charged for the interim period between date of
                                                              Disbursement & date of loan cancellation</td>
                        </tr>
                        <tr>
                            <td width="50%" class="fontstyle">Documentation Charges, Security Creation and Perfection
                                                                Charges, Property Valuation Charges Inspection Charges, Stamp
                                                                Duty Charges, Legal Collection & Incidental Charges, Any other
                                                                charges from case to case basis</td>
                            <td width="50%" class="fontstyle">At Actuals</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table> --}}
    {{-- <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p> --}}
    {{-- here for DOCUMENTS CHECKLIST --}}
    {{-- <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align:left;">DOCUMENTS CHECKLIST</h5>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="fontstyle" colspan="3">
                    <p>You will need to submit the following documents for availing of a credit facility:</p>
                    <p>• KYC Documents – Identity Proof & Address Proof of the Borrower and all the Co-Borrowers</p>
                    <p>• PAN Card of Borrower and all the Co-Borrowers</p>
                    <p>• VAT returns of this year / GST Registration certificate / Last year ITR</p>
                    <p>• Last 3 months bank statement of main operative business account</p>
                    <p>• Property (residence or office) ownership proof</p>
                    <p>• Signed copy of Standard Terms (Term Loan Facility)</p>
                </td>
            </tr>
            <tr>
                <td class="fontstyle" colspan="3" style="border: 1px solid black;">
                    Additional document(s) as may be required for credit assessment
                </td>
            </tr>
            <tr>
                <!-- Other Fields Column -->
                <td colspan="3">
                   <table width="100%" style="border:none !important;">
                       <tr>
                           <td colspan="3">
                               <table width="100%" style="border:none !important;">
                                   <tr>
                                       <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                       <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                       <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                   </tr>
                                   <tr>
                                       <td class="fontstyle"><span class="data-field">BORROWER (NAME & SIGN)</span></td>
                                       <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                       <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                   </tr>
                               </table>
                           </td>
                       </tr>
                   </table>
               </td>
           </tr>
        </tbody>
    </table>
    <p></p> --}}
     {{-- here for KEY LOAN FEATURES --}}
     {{-- <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align:left;">KEY LOAN FEATURES</h5>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="fontstyle" colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="50%" class="fontstyle">
                                <p>• Speedy approval</p>
                                <p>• No collateral security required</p>
                                <p>• Tenure from 12 months to 36 months</p>
                            </td>
                            <td width="50%" class="fontstyle">
                                <p>• Minimal paperwork</p>
                                <p>• Easy EMI repayments</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="fontstyle" colspan="3" style="border: 1px solid black;">
                    ROI Based on credit evaluation process
                    <p>
                        At FinDrop Capital we have adopted risk based pricing, which is arrived by taking into account, broad parameters like the customers financial and
                        credit profile. Applicable interest rates are arrived at taking into account the prevailing market rates at the time of sanctioning.
                        Accordingly, the rate of interest may change from time to time as may be intimated by FinDrop Capital. The details are also available on our website:
                        www.FinDrop Capital.com.
                    </p>
                </td>
            </tr>

        </tbody>
    </table>
    <p></p> --}}
    {{-- here for DECLARATION --}}
    <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align:left;">DECLARATION</h5>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="fontstyle" colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="100%" class="fontstyle">
                                <p>
                                    • The Borrower(s) confirm having read and understood terms of the Application Form which would apply to the Facility being requested under this Application Form.<br>
                                    • The Borrower(s) understand that sanction of the Facility and any disbursement thereunder is at the sole discretion of India FinDrop Capital Finance Limited (FinDrop Capital) (Formerly known as “FinDrop Capital Holdings Limited”) which reserves its right to reject the Application (with or without notice to the Borrower), and that FinDrop Capital shall not be responsible/liable in any manner whatsoever for such rejection or any delay in notifying me of such rejection. The Borrower(s) understand and agree that FinDrop Capital and/or its group companies reserve the rights to retain the photographs and documents submitted with this application. The Borrower(s) undertake to promptly inform FinDrop Capital about any change in any of the information furnished. The Borrower(s) further undertake to provide any further information/documents that FinDrop Capital and/or its group companies and/or its agents may require.<br>
                                    • The Borrower(s) confirm that FinDrop Capital shall have the discretion to change prospectively the rate of interest and other charges applicable to the Facility.<br>
                                </p>

                            </td>

                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td class="fontstyle" colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="100%" class="fontstyle">
                                <p>
                                    • In case there are more than one Borrower(s), each Borrower(s) agrees and undertakes that each of the Borrower(s) shall be jointly and severally be liable to make payments under the Loan.<br>
                                    • The Borrower(s) represent that each Borrower, its directors/partners (if any) has not been declared insolvent nor have any insolvency/bankruptcy proceedings been initiated against them. Borrower(s) represent that information furnished in this application is true and correct. Borrower(s) represent that none of the applicants have defaulted on any loan repayments with any of its creditors.<br>
                                    • The Borrower(s) have no objection to FinDrop Capital and/or its group companies and/or its agents providing me/us information on various products, offers, and services provided by FinDrop Capital and/or its group companies through any mode (including telephone calls, SMSs/emails, letters, etc.) and authorize FinDrop Capital and/or its group companies and/or its agents for the above purpose. The Borrower(s) confirm that laws in relation to unsolicited communication referred to in the "National Do Not Call Registry" as laid down by 'TELECOM REGULATORY AUTHORITY OF INDIA' will not be applicable for such information/communication to the Borrower.<br>
                                    • Borrower(s) agrees and accept that FinDrop Capital may in its sole discretion, by itself or through authorized persons, advocate, agencies, bureau, etc. verify any information given, check credit references, employment details, and obtain credit reports to determine creditworthiness from time to time.<br>
                                    • Borrower(s) acknowledges the consent given by the Borrower and such third parties (as required) to FinDrop Capital to obtain Borrower’s KYC and credit-related information/documents from third parties including Unique Identification Authority of India, Credit Information Bureau of India Ltd, and other entities and also further consents that FinDrop Capital may, by itself or through authorized persons, verify any information given, check credit references, employment details, and obtain KYC-related documents or credit reports to determine the genuineness of the Borrower and/or creditworthiness from time to time. The Borrower further acknowledges the consent to Unique Identification Authority of India or such any other such third party consenting to the sharing of information with respect to the Borrower with FinDrop Capital.<br>
                                    • Borrower(s) have no objection to FinDrop Capital or any of its subsidiaries exchanging and sharing information with its affiliates, regulatory bodies, government, and credit agencies, and other such authority as may be required.
                                </p>

                            </td>

                        </tr>

                    </table>
                </td>
            </tr>

        </tbody>
    </table>

    {{-- here for UNDERTAKING --}}
    <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h5 style="text-align:left;">UNDERTAKING</h5>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="fontstyle" colspan="3">
                    <table width="100%" style="border:none !important;">
                        <tr>
                            <td width="100%" class="fontstyle">
                                <p>
                                    I/We have applied for loan facility with FinDrop Capital. The application will be appraised and processed as per the internal policy of FinDrop Capital. The application may be rejected in case I/we fail to comply with the internal policy of FinDrop Capital. FinDrop Capital has appraised me/us about the same in detail including eligibility criteria, documentation, etc.<br></p>
                                <p>    In submitting the above application, I/We the undersigned, solemnly affirm that the details of loan terms/conditions inclusive of all charges have been read by me/us in full/read out to me/us (in vernacular) is understood and do hereby accept by me/us by signing this application physically and/or electronically (through accessing the link and/or vide OTP confirmation, Electronic and Digital Signatures, Aadhaar authentication and such other and further means as it was available and known to me/us by using my/our registered E-mail ID and the mobile number).
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- Other Fields Column -->
                <td colspan="3">
                   <table width="100%" style="border:none !important; margin-bottom:30px !important;">
                       <tr>
                           <td colspan="3">
                               <table width="100%" style="border:none !important;">
                                   <tr>
                                       <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                       <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                       <td class="flex-item fontstyle"><input type="text" class="boxhight"></td>
                                   </tr>
                                   <tr>
                                       <td class="fontstyle"><span class="data-field">BORROWER (NAME & SIGN)</span></td>
                                       <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                       <td class="fontstyle"><span class="data-field" style="margin-left:5px;">CO-BORROWER</span></td>
                                   </tr>
                               </table>
                           </td>
                       </tr>
                   </table>
               </td>
           </tr>
           <tr>
                <td colspan="3" style="border:1px solid black !important;padding:10px;" class="fontstyle">
                    FOR OFFICE USE ONLY
                </td>
            </tr>
            {{-- <tr>
                <td colspan="3" style="text-align: center;" class="fontstyle">
                    FinDrop Capital Finance Limited (FinDrop Capital) (Formerly known as "FinDrop Capital Holdings Limited")<br>
                    CIN: L67100MH1995PLC093797 / RBI CoR No. N -13.02386<br>
                    Regd. Office: FinDrop Capital House, Sun Infotech Park, Road No. 16V, Plot No. B-23, Thane Industrial Area, Wagle Estate,<br>
                    Thane - 400 604 • Tel: (91-22) 4103 5000 • Fax: (91-22) 2580 6654<br>
                    Corporate Office: 802, 8 Floor, Hub Town Solaris, N.S. Phadke Marg, Vijay Nagar, Andheri East, Mumbai - 400 069 • Tel: (91-22) 6788 1000 • Fax: (91-22) 6788 1010
                </td>
            </tr> --}}

        </tbody>
    </table>
</body>
</html>
