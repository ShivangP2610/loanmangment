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
        .paddingmain h5 , h4{
            padding: 5px;
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

        .borderdata td{
            border: 1px solid black;
        }
        .borderdone td{
            border: 1px solid black;
        }
        p {
            page-break-before: auto;
            page-break-after: auto;
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
     <p></p>

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

        </tbody>
    </table>

    {{--  here for agrrement --}}
    <table>
        <thead>
            <tr>
                <td colspan="3" class="paddingmain">
                    <h4 style="text-align:center;">LOAN AGREEMENT</h4>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="100%" class="fontstyle">
                    <p>
                        THIS LOAN AGREEMENT (“Agreement”) (this Agreement which expression shall unless excluded by or repugnant to the subject or context thereof, include the Schedule(s) hereto and all amendments made from time to time) executed at the place and on the day, month and year set out in Schedule-I hereto by
                        <br></p>
                    <p>   M/s. VEER ENTERPRISE, a DIRECTOR  Firm of VIRAG SHAH, having its place of Business at WORD NO 13/1, NAIK AVENUE PANCH HATDI, OPP SHREE RAM DAIRY ,NAVSARI, GUJARAT-396445,  herein after referred to as “the Borrower”, (which expression shall unless excluded by or repugnant to the subject or context, be deemed to include its successors-in-interest and assigns) of the ONE PART
                    </p>
                    <p>and by</p>
                    <p>
                        VIRAG SHAH, Aged 36 about , Indian resident, having PAN No. BASPS9737F and residing at 16,SARTHIVILLA RAW HOUSE,NEAR BAWAN JINALAY, TIGHRA,NAVSARI-396445; (hereinafter referred to as “Co-Borrowers”, which expression shall, unless repugnant to the context or meaning thereof, be deemed to mean and include their heirs, executors, administrators and permitted assigns) of the SECOND PART
                    </p>
                </td>
            </tr>
            <tr>

                <td width="100%" class="fontstyle">
                    <h4 style="text-align: center">In Favor Of:</h4>
                    <p>
                        M/s. FinDrop Capital, a Lending Act 2017 and a non-banking financial company within the meaning of the Lending Act 2017 Act, 2017 and having its registered office at 340, 3rd Floor, Central Bazar, Navsari-396445Gujarat, represented herein by its authorized representative, hereinafter referred to as the “Lender", (which expression shall unless excluded by or repugnant to the subject or context, be deemed to include its successors-in-interest and assigns) of the THIRD PART.
                        <br></p>
                    <p>  The Borrower AND the Lender shall be referred individually as “Party” and collectively as “Parties”.
                    </p>

                </td>
            </tr>
            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>WHEREAS:</strong></p>
                    <p>
                        A. The Borrower has required financial assistance for its business purpose (as defined in Schedule-I)
                        and approached the Lender and the Lender relying upon the representations and warranties made by the Borrower,
                        has agreed to advance an aggregate loan facility as mentioned in Schedule-I hereunder written (“Loan”),
                        on the terms and conditions mentioned in Sanction Letter and this Agreement.
                    </p>
                    <p>
                        B. Based on the aforesaid representations, Lender has agreed to provide the Loan to the Borrower
                        for the Purpose on the terms and conditions set out herein below.
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>NOW THEREFORE THE PARTIES HERETO AGREE AS FOLLOWS:</strong></p>
                    <p><strong>1. DEFINITIONS</strong></p>
                    <p>
                        In this Agreement, unless the context otherwise so requires, the following expressions shall have the meanings as set out against each of it:
                    </p>
                    <p><strong>1.1 “Agreement”</strong> shall mean this Loan Agreement including the Loan Documents and all the annexures and schedules attached with it.</p>
                    <p><strong>1.2 “Business Day”</strong> shall mean a day (excluding Saturdays and Sundays) on which banks generally are open in Ahmedabad for the transaction of normal banking business.</p>
                    <p>
                        <strong>1.3 “Loan Documents”</strong> shall mean and include this Agreement, Sanction Letter, Personal Guarantee, Demand Promissory Note
                        and all or any other agreements, instruments, undertakings, deeds, writings and other documents executed or entered into, or to be executed
                        or entered into by the Parties in pursuance thereof and as may be amended from time to time.
                    </p>
                    <p>
                        <strong>1.4 “Law”</strong> shall mean and include all applicable statutes, enactments, ordinances, rules, regulations, bye-laws, notifications,
                        guidelines, policies, directives and orders of any statutory authority, government, court, tribunal, board, or any other concerned authority as
                        may be applicable from time to time, in India including any re-enactment, thereof.
                    </p>
                    <p>
                        <strong>1.5 “Purpose”</strong> means the purpose(s) for which the Loan has been availed by/granted to the Borrower and Co-Borrower from/by the
                        Lender based on the representations of the Borrower, which is set out in Schedule I hereto.
                    </p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>2. INTERPRETATION</strong></p>
                    <p><strong>2.1</strong> Any reference to a statutory provision shall include such provision as may be from time to time modified or re-enacted and any regulations made in pursuance thereof whether before or after the date of this Agreement so far as such modification or re-enactment applies or is capable of applying to any transactions entered prior to completion and (so far as liability thereunder may exist or arise) shall include also any past statutory provision or regulations (as from time to time modified or re-enacted) which such provision or regulations have directly or indirectly replaced.</p>
                    <p><strong>2.2</strong> Unless the context requires otherwise, words denoting the singular shall include the plural and vice versa.</p>
                    <p><strong>2.3</strong> Reference to a gender shall include the female, male, and neutral genders.</p>
                    <p><strong>2.4</strong> References to “Recital”, “Clause” and “Sub-Clause”, are to be construed as references to recitals and clauses to this Agreement.</p>
                    <p><strong>2.5</strong> The Recitals and Schedules set out herein shall constitute an integral part of this Agreement.</p>
                    <p><strong>2.6</strong> The terms “include” and “including” shall mean include “without limitation”.</p>
                    <p><strong>2.7</strong> References to any agreement or document including this Agreement shall include such agreement or document as amended or replaced from time to time.</p>
                    <p><strong>2.8</strong> All approvals or permissions required from the Lender for any matter in respect of this Agreement shall mean and refer to the “prior written” approval or permission of the Lender.</p>
                    <p><strong>2.9</strong> The headings, titles to Clauses, and paragraphs in this Agreement are for convenience purposes only and shall be ignored in construing the same.</p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>3. LOAN AMOUNT</strong></p>
                    <p><strong>3.1</strong> The Lender hereby agrees to lend and advance to the Borrower and the Borrower hereby agrees to borrow from the Lender an amount mentioned in the Schedule-I hereunder written, subject to the terms and conditions mentioned in this Agreement and the other Loan Documents.</p>
                    <p><strong>3.2</strong> It is specifically agreed that the Loan provided by Lender to the Borrower shall be utilized by the Borrower only for the Purpose as set out herein and shall not be used for any other purpose of any nature whatsoever including payment of any outstanding loan, debts, penalties, claims due to any other person without the approval of Lender.</p>
                    <p><strong>3.3</strong> Any fee accrued on the Loan disbursed by the Lender in the bank account of the Borrower where the Loan was credited under this Agreement shall be accounted for and used solely for the Purpose mentioned in this Agreement.</p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>4. DISBURSEMENT OF LOAN</strong></p>
                    <p>
                        <strong>4.1</strong> Disbursements under the Loan shall be made by the Lender to the Borrower after execution of this Agreement
                        and other Loan Documents as the Parties may deem fit from time to time. The disbursements shall be credited by the Lender
                        into the bank account maintained by the Borrower for its business operations and also mentioned in Schedule-I hereunder written.
                    </p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>5. INTEREST/CHARGES/FEES</strong></p>
                    <p>
                        <strong>5.1</strong> The Borrower shall pay interest on the principal amount of the Loan as per the rate of interest mentioned in
                        Schedule-I hereunder written, by way of installments, as per the repayment schedule.
                    </p>
                    <p>
                        <strong>5.2</strong> Notwithstanding anything stated to the contrary herein, the Lender shall be entitled to increase/decrease the rate
                        of interest after giving prior written notice to the Borrower and Co-Borrower, subject to such increase/decrease not being contrary
                        to the directives, if any, issued by the Lending Act 2017 from time to time/prevailing applicable Law.
                    </p>
                    <p>
                        <strong>5.3</strong> The Borrower shall pay a processing fee in respect of the Loan amount mentioned in Schedule-1 hereunder written
                        along with a setup fee in respect of the Loan mentioned herein. The Lender shall deduct the said amount on request of the Borrower
                        from the loan amount at the time of disbursement. Also, the Borrower shall be liable for the payment of any applicable service tax
                        in relation to the Loan into the designated bank account of the Lender.
                    </p>
                    <p>
                        <strong>5.4</strong> Notwithstanding anything contained in this Agreement, in the event of the Borrower committing a default in the
                        payment of any sum due hereunder, or the Borrower and Co-Borrower committing any breach or default of any other condition of this
                        Agreement, the Borrower shall pay, by way of liquidated damages, charges at the rate mentioned in Schedule-I hereunder written, from
                        the date of default till the date of payment of such dues. The Borrower and/or Co-Borrower expressly agrees that the Rescheduling
                        Charges/Late Payment Charges is a fair estimate of the loss likely to be suffered by the Lender by reason of such delay/default on
                        the part of the Borrower. The payment of Rescheduling Charges is in addition to any other right of the Lender in respect of the default.
                    </p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>6. OTHER TERMS</strong></p>
                    <p>
                        <strong>6.1</strong> The Lender shall, at all times, have the complete right to share the credit information relating to the Borrower
                        and Co-Borrower, as it may deem appropriate, with Credit Information Bureau (India) Limited (“CIBIL”) or any other institution as
                        approved by Lending Act 2017 (“RBI”) from time to time.
                    </p>
                    <p>
                        <strong>6.2</strong> The Borrower and Co-Borrower shall provide the Lender access to its CIBIL Credit Information Report or any other
                        records with CIBIL on a regular basis or at such times as may be requested by the Lender.
                    </p>
                    <p>
                        <strong>6.3</strong> In an event of default/delay by the Borrower in repayment of the Loan including that of the fee, by or on due date,
                        the Lender shall have an unhindered right to disclose and/or publish the name of the Borrower and/or Co-Borrower and/or its directors/
                        partners/proprietors as defaulters on its website in such manner and through such other medium (including social media) as the Lender
                        or CIBIL in their absolute discretion, may think fit.
                    </p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>7. REPAYMENT</strong></p>
                    <p>
                        <strong>7.1</strong> The Borrower and Co-Borrower shall ensure to repay the Loan within the communicated time from the date of receipt
                        of the Loan (hereinafter referred to as the “Repayment Amount”) as per the Repayment details set forth in Schedule I.
                    </p>
                    <p>
                        <strong>7.2</strong> The mode of payment of the Repayment Amount shall be Electronic Clearance Service/Standing Instruction or any
                        other mode as prescribed by the Lender and mentioned in Schedule-I hereunder written.
                    </p>
                    <p>
                        <strong>7.3</strong> The Lender agrees that the Borrower and/or Co-Borrower shall have the option to pre-pay to the Lender the
                        outstanding Repayment Amount at its sole discretion at the time of such premature repayment.
                    </p>
                    <p>
                        <strong>7.4</strong> Without prejudice to the remedies under applicable Law, in the event of any delay in the payment of any
                        installments of the Repayment Amount, the Lender shall have the absolute authority to deduct the installments amount or a partial
                        withdrawal from the bank account of the Borrower using the NACH or any other facility, without seeking any consent of the Borrower.
                        The Borrower acknowledges and agrees that the covenant contained in this Clause is absolutely necessary for the Lender to secure
                        repayment of the Repayment Amount and that the Lender would not proceed with the grant of the Loan contemplated herein but for the
                        Borrower’s covenant hereunder to secure the repayment of the Repayment Amount.
                    </p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>8. LOAN DOCUMENTS</strong></p>
                    <p>
                        <strong>8.1</strong> The Borrower shall provide personal guarantees of VIRAG SHAH to the Lender for the Loan amount in relation to this
                        Agreement. The promoters shall be equally liable for the performance of the obligations and covenants of the Borrower, and in the event
                        of default of any obligation by the Borrower and Co-Borrower, the Personal Guarantors shall be jointly and severally liable for the
                        repayment of the Loan amount in accordance with the terms and conditions in this Agreement and the Loan agreements. The format of the
                        “Personal Guarantee” is set forth in Schedule II hereto.
                    </p>
                    <p>
                        <strong>8.2</strong> The Borrower and Co-Borrower shall provide an “Undertaking” to the Lender which is set forth in Schedule III – Part A
                        hereto.
                    </p>
                    <p>
                        <strong>8.3</strong> The Borrower shall provide a demand promissory note, the format of which is set forth as Schedule III – Part B (“Demand
                        Promissory Note”), undertaking unconditionally to pay on demand of the Lender the Loan amount together with interest thereon at the rate
                        of interest mentioned in Schedule-I.
                    </p>
                    <p>
                        <strong>8.4</strong> The Lender shall obtain Post Dated Cheque (“PDCs”) from the Borrower and/or Co-Borrower/Guarantors to enable the
                        repayment of the Loan and other dues, and the format of the “Receipt” of the PDCs is set forth in Schedule III – Part D.
                    </p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>9. DISBURSEMENT CONDITION</strong></p>
                    <p>
                        The obligation of the Lender to make the disbursement under the Loan shall be subject to the performance by the Borrower of all its
                        undertakings to be performed under this Agreement and to the Lender’s satisfaction thereof, prior to the making of such disbursement.
                    </p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>OBLIGATIONS OF THE BORROWER</strong></p>

                    <p><strong>9.1</strong> The Loan provided to the Borrower shall be used by the Borrower solely for the Purpose stated herein and shall not be used for payment of any outstanding loan, debts, penalties, and claims due to any other person.</p>

                    <p><strong>9.2</strong> During the term of this Agreement and until the obligations of the Borrower and Co- Borrower have been fulfilled to the satisfaction of the Lender, the Borrower undertakes to notify the Lender of any fact, matter or circumstance which would cause adverse effect on the Loan or result in breach of representations and warranties of the Borrower and Co- Borrower.</p>

                    <p><strong>9.3</strong> The Borrower and Co- Borrower shall forthwith notify the Lender, as soon as it becomes aware, of any notice, legal proceedings, notice for winding up or any such threatened action instituted against the Borrower which may have adverse effect on the Lender or the performance of this Agreement.</p>

                    <p><strong>9.4</strong> The Borrower and Co- Borrower agrees to furnish to the Lender all such information as the Lender may require from time to time and also to submit necessary financial data and/or statements on a timely basis or as required by the Lender.</p>

                    <p><strong>9.5</strong> The Borrower and Co- Borrower confirms to ensure that sufficient funds are available in the account to which the said PDCs relate to, enable the Lender to present the same and recover the Loan and other dues, if any.</p>

                    <p><strong>9.6</strong> The Borrower and Co- Borrower confirms that till the Loan or any part thereof (including principal and interest as the case may be) is outstanding, the Borrower/Personal Guarantor shall not start a new firm without taking prior permission of the Lender.</p>

                    <p><strong>9.7</strong> The Borrower and Co- Borrower shall provide a “List of Associate concerns” with respect to its business as set forth in Schedule III – Part C.</p>

                    <p><strong>9.8</strong> The Borrower and Co- Borrower shall provide contact details of two references, as set out in Schedule-I, whom the Lender may contact prior to disbursement of loan and/or in the event of a default by the Borrower or Co- Borrower and/or if the Borrower or Co- Borrower is not reachable.</p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>10. REPRESENTATIONS AND WARRANTIES OF THE PARTIES</strong></p>

                    <p><strong>10.1</strong> Each Party represents and warrants that:</p>

                    <p><strong>10.2</strong> It is duly organized, validly existing and has the requisite power and authority to carry on its business as now conducted.</p>

                    <p><strong>10.3</strong> It has the power to execute and perform this Agreement and has obtained all necessary consents and authorizations to enable it to do so.</p>

                    <p><strong>10.4</strong> This Agreement constitutes a valid and binding obligation enforceable against each Party in accordance with the terms stated herein.</p>

                    <p><strong>10.5</strong> This Agreement does not conflict with or result in a breach of any obligation or constitute or result in any default under any provision of its constitution or any material provision of any agreement, deed, writ, order, judgment, law, rule or regulation to which it is a party or is subject to or by which it is bound.</p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>11. EVENT OF DEFAULT</strong></p>

                    <p><strong>11.1</strong> On the occurrence of any of the events specified below, the Lender shall be entitled, without prejudice to any other right or remedy which the Lender may have under this Agreement or otherwise in Law and notwithstanding any subsequent acceptance of any repayment installments/interest, to take the steps specified herein below, without any notice, except as specified herein, at any time after the occurrence of such event:</p>

                    <ul>
                        <li><strong>(i)</strong> If the Borrower and/or Co- Borrower fails to pay any monies payable hereunder on the dates and in the manner stipulated in this Agreement, whether demanded or not;</li>
                        <li><strong>(ii)</strong> If the Borrower and/or Co- Borrower fails to perform or commits or allows to be committed a material breach of any of the terms and conditions of this Agreement (other than failure to pay any sum hereunder when due and payable) and/or other Loan Documents;</li>
                        <li><strong>(iii)</strong> Any information given by/on behalf of the Borrower and/or Co- Borrower relating to the Purpose of the Loan, being incorrect or misleading, or a representation or warranty made hereunder or in connection with any other Loan Documents by the Borrower and/or Co- Borrower being incorrect or misleading in any respect;</li>
                        <li><strong>(iv)</strong> If any action is taken against the Borrower and/or Co- Borrower by any person/authority for its liquidation/ insolvency/ bankruptcy, or if a receiver is appointed of the whole or part of the assets, properties or undertaking of the Borrower and/or Co- Borrower; or if the Borrower and/or Co- Borrower compounds with or enters into any composition with its creditors;</li>
                        <li><strong>(v)</strong> The Borrower and/or Co- Borrower is unable to or has admitted in writing its inability to pay any of its indebtedness as they mature or when due;</li>
                        <li><strong>(vi)</strong> Any person acting singularly or with any other person (either directly or indirectly) acquires control of the Borrower and/or Co- Borrower either directly or indirectly, without the approval of the Lender;</li>
                    </ul>

                    <p><strong>11.2</strong> On the happening of any of the Events of Default, the Lender shall give a written notice to Borrower and/or Co- Borrower to rectify the default within a period of 15 (fifteen) days. In case the Borrower and/or Co- Borrower fails to rectify the default within the aforesaid stipulated period then Lender shall have the right, by a notice in writing to the Borrower and/or Co-Borrower, without prejudice to the rights and claims under this Agreement to terminate this Agreement and/or declare the principal of and all interest on and all other amounts in respect of the Loan to become due and payable forthwith.</p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>12. TERM AND TERMINATION</strong></p>

                    <p>This Agreement shall be effective from the Effective Date and shall continue till the repayment of the Loan and the obligations of the Parties to this Agreement to the satisfaction of the Lender unless terminated by the Lender.</p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>13. INDEMNITY</strong></p>

                    <p><strong>13.1</strong> The Borrower and Co-Borrower and the Personal Guarantors agree to indemnify and hold harmless the Lender and its directors, officers, agents, employees, and counsel from and against any and all costs, expenses, direct or indirect claims, or liability incurred by the Borrower and/or Co-Borrower or such person hereunder and as a consequence of occurrence of an event of default, breach of this Agreement or acts of omission and commission on the part of the Borrower and/or Co-Borrower, or otherwise on account of the Loan.</p>

                    <p><strong>13.2</strong> The Borrower has also provided an Undertaking cum Indemnity in respect of facsimile and/or email as set forth in Schedule III – Part A.</p>
                </td>
            </tr>

            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>14. GOVERNING LAW AND JURISDICTION</strong></p>

                    <p>This Agreement shall be governed by and construed in accordance with the laws of the Republic of India and the courts in Ahmedabad, Gujarat, India shall have exclusive jurisdiction in relation to all matters arising out of this Agreement.</p>
                </td>
            </tr>

            {{-- <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>15. MISCELLANEOUS</strong></p>

                    <p><strong>15.1 Notices:</strong> Any notice pursuant to this Agreement shall be in writing and either delivered personally, sent by certified or registered mail, sent by a recognized courier, or sent by electronic mail, with acknowledgment due.</p>

                    <p><strong>15.2 Vernacular Language:</strong> The contents of this Agreement and the Loan Documents to be executed by the Borrower and Co-Borrower have been explained to the Borrower and Co-Borrower in the vernacular language or such other language as understood by the Borrower and Co-Borrower.</p>

                    <p><strong>15.3 Cost:</strong> The Borrower and Co-Borrower shall incur all the collection/remittance/other charges in relation to obtaining the Loan under this Agreement.</p>

                    <p><strong>15.4 Stamp duty and Registration charges:</strong> The Borrower shall pay to the Lender upon demand the stamp duty and registration charges if any, payable on this Agreement and all related Agreements, deeds, writings, and documents executed by and between the Parties hereto in respect of the Loan.</p>

                    <p><strong>15.5 Relationship:</strong> Nothing in this Agreement shall be deemed to constitute a partnership, joint venture, agency, or employment relationship between the Parties hereto. No Party shall have the authority to bind or make any representation or commitment on behalf of the other Party. It is specifically agreed between the Parties that their specific rights and obligations in respect of their business relationship and understanding inter-se shall be governed in accordance with the provisions of this Agreement.</p>

                    <p><strong>15.6 Force Majeure:</strong> Notwithstanding anything to the contrary in this Agreement, neither Party shall be liable by reason of failure or delay in the performance of its duties and obligations under this Agreement if such failure or delay is caused by acts of God, war, riot, fire, civil commotion, strikes, lockouts, embargoes, any orders of governmental, quasi-governmental, or local authorities, or any other similar cause beyond its control and without its fault or negligence. Provided that any Party faced with force majeure shall inform the other Party without delay by registered letter with advice of delivery or equivalent, stating the nature, probable duration, and foreseeable effects. Neither Party shall be held in breach of their obligations under the Agreement if they are prevented from fulfilling them by force majeure. Each of the Parties shall make every effort to mitigate any losses suffered due to force majeure. If the required Party fails to make necessary efforts by which the losses caused due to force majeure can be mitigated, then the other party shall have the right to terminate this Agreement.</p>

                    <p><strong>15.7 Entire Agreement:</strong> This Agreement constitutes the entire agreement between the Parties in relation to its subject matter and supersedes all prior agreements and understandings whether oral or written with respect to such subject matter and no variation of this Agreement shall be effective unless reduced into writing and signed by or on behalf of each Party.</p>

                    <p><strong>15.8 Severability:</strong> If any provision of this Agreement or part thereof is rendered void, illegal or unenforceable in any respect under any law, the validity, legality, and enforceability of the remaining provisions shall not in any way be affected or impaired thereby. In such case, the Parties shall forthwith enter into good faith negotiations to amend the provisions rendered void, illegal, or unenforceable in such a way that, as an amended provision, it is valid and legal and to the maximum extent possible carries out the original intent of the Parties as reflected herein with respect to the matter in question.</p>

                    <p><strong>15.9 Assignment:</strong> This Agreement, including without limitation, any of the rights, duties, and obligations hereunder, may not be assigned, in whole or in part, by the Borrower and/or Co-Borrower without the prior written consent of the Lender.</p>

                    <p><strong>15.10 Further Assurance:</strong> Each of the Parties hereto shall cooperate with the other and execute and deliver to the other such instruments and documents and take such other actions as may be reasonably requested from time to time in order to carry out evidence and confirm their rights and the intended purpose of this Agreement.</p>

                    <p><strong>15.11 Waiver:</strong> No delay in exercising or omission to exercise any right, power, or remedy accruing to either Party under this Agreement shall impair any such right, power, or remedy or be construed to be a waiver or acquiescence thereof, nor shall action or inaction of acquiescence by either Party in any such default, affect or impair any right, power, or remedy of either Party, in respect of any such default.</p>

                    <p><strong>15.12 Confidentiality:</strong> The Parties shall, at all times, keep confidential and maintain confidentiality of all data and client information of each Party shared with the other Party in respect of this Agreement and other Loan Documents. All such data and confidential client information shall not be disclosed or divulged to any third party without the consent of the concerned Party.</p>

                    <p><strong>15.13 Counterparts:</strong> This Agreement is being prepared in counterparts and each of the counterparts so executed shall be deemed to be original but constitute one agreement and be binding on the Parties as if they had executed the same document.</p>
                </td>
            </tr> --}}
            <tr>
                <td width="100%" class="fontstyle">
                    <p><strong>15. MISCELLANEOUS</strong></p>

                    <ol>
                        <li><strong>15.1 Notices:</strong> Any notice pursuant to this Agreement shall be in writing and either delivered personally, sent by certified or registered mail, sent by a recognized courier, or sent by electronic mail, with acknowledgment due.</li>

                        <li><strong>15.2 Vernacular Language:</strong> The contents of this Agreement and the Loan Documents to be executed by the Borrower and Co-Borrower have been explained to the Borrower and Co-Borrower in the vernacular language or such other language as understood by the Borrower and Co-Borrower.</li>

                        <li><strong>15.3 Cost:</strong> The Borrower and Co-Borrower shall incur all the collection/remittance/other charges in relation to obtaining the Loan under this Agreement.</li>

                        <li><strong>15.4 Stamp duty and Registration charges:</strong> The Borrower shall pay to the Lender upon demand the stamp duty and registration charges if any, payable on this Agreement and all related Agreements, deeds, writings, and documents executed by and between the Parties hereto in respect of the Loan.</li>

                        <li><strong>15.5 Relationship:</strong> Nothing in this Agreement shall be deemed to constitute a partnership, joint venture, agency, or employment relationship between the Parties hereto. No Party shall have the authority to bind or make any representation or commitment on behalf of the other Party. It is specifically agreed between the Parties that their specific rights and obligations in respect of their business relationship and understanding inter-se shall be governed in accordance with the provisions of this Agreement.</li>

                        <li><strong>15.6 Force Majeure:</strong> Notwithstanding anything to the contrary in this Agreement, neither Party shall be liable by reason of failure or delay in the performance of its duties and obligations under this Agreement if such failure or delay is caused by acts of God, war, riot, fire, civil commotion, strikes, lockouts, embargoes, any orders of governmental, quasi-governmental, or local authorities, or any other similar cause beyond its control and without its fault or negligence. Provided that any Party faced with force majeure shall inform the other Party without delay by registered letter with advice of delivery or equivalent, stating the nature, probable duration, and foreseeable effects. Neither Party shall be held in breach of their obligations under the Agreement if they are prevented from fulfilling them by force majeure. Each of the Parties shall make every effort to mitigate any losses suffered due to force majeure. If the required Party fails to make necessary efforts by which the losses caused due to force majeure can be mitigated, then the other party shall have the right to terminate this Agreement.</li>

                        <li><strong>15.7 Entire Agreement:</strong> This Agreement constitutes the entire agreement between the Parties in relation to its subject matter and supersedes all prior agreements and understandings whether oral or written with respect to such subject matter and no variation of this Agreement shall be effective unless reduced into writing and signed by or on behalf of each Party.</li>

                        <li><strong>15.8 Severability:</strong> If any provision of this Agreement or part thereof is rendered void, illegal or unenforceable in any respect under any law, the validity, legality, and enforceability of the remaining provisions shall not in any way be affected or impaired thereby. In such case, the Parties shall forthwith enter into good faith negotiations to amend the provisions rendered void, illegal, or unenforceable in such a way that, as an amended provision, it is valid and legal and to the maximum extent possible carries out the original intent of the Parties as reflected herein with respect to the matter in question.</li>

                        <li><strong>15.9 Assignment:</strong> This Agreement, including without limitation, any of the rights, duties, and obligations hereunder, may not be assigned, in whole or in part, by the Borrower and/or Co-Borrower without the prior written consent of the Lender.</li>

                        <li><strong>15.10 Further Assurance:</strong> Each of the Parties hereto shall cooperate with the other and execute and deliver to the other such instruments and documents and take such other actions as may be reasonably requested from time to time in order to carry out evidence and confirm their rights and the intended purpose of this Agreement.</li>

                        <li><strong>15.11 Waiver:</strong> No delay in exercising or omission to exercise any right, power, or remedy accruing to either Party under this Agreement shall impair any such right, power, or remedy or be construed to be a waiver or acquiescence thereof, nor shall action or inaction of acquiescence by either Party in any such default, affect or impair any right, power, or remedy of either Party, in respect of any such default.</li>

                        <li><strong>15.12 Confidentiality:</strong> The Parties shall, at all times, keep confidential and maintain confidentiality of all data and client information of each Party shared with the other Party in respect of this Agreement and other Loan Documents. All such data and confidential client information shall not be disclosed or divulged to any third party without the consent of the concerned Party.</li>

                        <li><strong>15.13 Counterparts:</strong> This Agreement is being prepared in counterparts and each of the counterparts so executed shall be deemed to be original but constitute one agreement and be binding on the Parties as if they had executed the same document.</li>
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>

    {{-- here e e  ee --}}

    <table width="100%" cellpadding="5" cellspacing="0" class="fontstyle borderdata">
        <tr>
            <td colspan="2" style="text-align: center;">
                <strong>Schedule I Above Referred To:</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="fontstyle">
                <strong>A. Details of Place and Date of Execution of this Agreement</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="fontstyle">
                <strong>On this 20th May 2017 at Navsari, Gujarat</strong>
            </td>
        </tr>
    </table>

    <p></p>
    <p></p>
    <!-- Table B: Borrower Details -->
    <table width="100%" cellpadding="5" cellspacing="0" class="fontstyle borderdata">
        <tr>
            <td colspan="2" class="fontstyle">
                <strong>B. DETAILS OF BORROWER</strong>
            </td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Name of Borrower</strong></td>
            <td width="50%" class="fontstyle">VEER ENTERPRISE</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Name of Proprietor</strong></td>
            <td width="50%" class="fontstyle">VIRAG SHAH</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Address of Borrower (where notice is to be sent to)</strong></td>
            <td width="50%" class="fontstyle">16,SARTHIVILLA RAW HOUSE,NEAR BAWAN JINALAY, TIGHRA, NAVSARI-396445 – 396445</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Contact No.</strong></td>
            <td width="50%" class="fontstyle">9879402134</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Email.id</strong></td>
            <td width="50%" class="fontstyle">viragshah_86@yahoo.com</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Nature of Business</strong></td>
            <td width="50%" class="fontstyle">Branded Garments</td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <!-- Table C: Loan Details -->
    <table width="100%" cellpadding="5" cellspacing="0" class="fontstyle borderdata">
        <tr>
            <td colspan="2" class="fontstyle">
                <strong>C. DETAILS OF NATURE OF LOAN/AMOUNT/INTEREST/REPAYMENT ETC.</strong>
            </td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Loan Application No.</strong></td>
            <td width="50%" class="fontstyle">FD202205031007</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Nature of Loan/Purpose</strong></td>
            <td width="50%" class="fontstyle">Working Capital Finance</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Amount</strong></td>
            <td width="50%" class="fontstyle">Rs.500000/- (Four Lakh rupees and zero paisa only) / Rs. Five Lakh Only</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Security</strong></td>
            <td width="50%" class="fontstyle">Unsecured Loan</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Rate of Interest</strong></td>
            <td width="50%" class="fontstyle">18% Reducing per month</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Processing Fee and Set up Fee</strong></td>
            <td width="50%" class="fontstyle">2%, Rs. 10000 (whichever is maximum) of the sanctioned amount net plus applicable service tax of the charges incurred by the borrower insurance. Rs.10000/- (Eight thousand Rupees and zero paisa only). This amount will be deducted from the first disbursement done to the borrower for a given sanctioned limit.</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Repayment details</strong></td>
            <td width="50%" class="fontstyle">Repayment by 18 equal MONTHLY installments of Rs. 33842.00</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Installment Date</strong></td>
            <td width="50%" class="fontstyle">05-05-2023</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Primary Repayment Mode</strong></td>
            <td width="50%" class="fontstyle">NACH / Post Dated Cheques / NEFT</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Secondary Repayment Mode</strong></td>
            <td width="50%" class="fontstyle">N/A</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Total Interest Payable</strong></td>
            <td width="50%" class="fontstyle">Total interest payable over the complete tenure of loan is Rs. 109156.00</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Delay Charges</strong></td>
            <td width="50%" class="fontstyle">Rs. 100 per day per installment</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Legal expenses/stamp duty</strong></td>
            <td width="50%" class="fontstyle">All stamp duties, legal expenses, and other costs involved, including the cost of documentation and due diligence cost to be borne by the Borrower. Waived for this cycle.</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Approvals required</strong></td>
            <td width="50%" class="fontstyle">Borrower needs to take lender’s prior written approval before incurring further debt/loan/financing/encumbrances from any other lender</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Broken Period Interest</strong></td>
            <td width="50%" class="fontstyle">1068.00 (4 days)</td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <!-- D. DETAILS OF GUARANTORS / REFERENCES -->
    <table width="100%" cellpadding="5" cellspacing="0" class="fontstyle borderdata">
        <tr>
            <td colspan="2" class="fontstyle">
                <strong>D. DETAILS OF GUARANTORS / REFERENCES</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="fontstyle">
                <strong>Details of References</strong>
            </td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Name of Reference – 1</strong></td>
            <td width="50%" class="fontstyle">Vipul Rathod</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Address of Reference – 1</strong></td>
            <td width="50%" class="fontstyle">Hudco Society, Bardoli</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Contact No.</strong></td>
            <td width="50%" class="fontstyle">9726018618</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Email.id</strong></td>
            <td width="50%" class="fontstyle">vipulrathod@gmail.com</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Name of Reference – 2</strong></td>
            <td width="50%" class="fontstyle">Twinkal Patel</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Address of Reference – 2</strong></td>
            <td width="50%" class="fontstyle">Chhapra Road, Navsari</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Contact No.</strong></td>
            <td width="50%" class="fontstyle">9601849239</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Email.id</strong></td>
            <td width="50%" class="fontstyle">twinkalpatel@gmail.com</td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <!-- E. BORROWER’S BANK ACCOUNT DETAILS -->
    <table width="100%" cellpadding="5" cellspacing="0" class="fontstyle borderdata">
        <tr>
            <td colspan="2" class="fontstyle">
                <strong>E. BORROWER’S BANK ACCOUNT DETAILS</strong>
            </td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Borrower Bank’s Account Name</strong></td>
            <td width="50%" class="fontstyle">VEER ENTERPRISE</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Account Number</strong></td>
            <td width="50%" class="fontstyle">50200001460662</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Bank Name</strong></td>
            <td width="50%" class="fontstyle">SBI BANK</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Branch</strong></td>
            <td width="50%" class="fontstyle">TIGHRA BRANCH</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>IFSC Code</strong></td>
            <td width="50%" class="fontstyle">SBIN0018548</td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <!-- F. DISBURSEMENT ACCOUNT DETAILS -->
    <table width="100%" cellpadding="5" cellspacing="0" class="fontstyle borderdata">
        <tr>
            <td colspan="2" class="fontstyle">
                <strong>F. DISBURSEMENT ACCOUNT DETAILS</strong>
            </td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Borrower Bank’s Account Name</strong></td>
            <td width="50%" class="fontstyle">VEER ENTERPRISE</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Account Number</strong></td>
            <td width="50%" class="fontstyle">50200001460662</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Bank Name</strong></td>
            <td width="50%" class="fontstyle">SBI BANK</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Branch</strong></td>
            <td width="50%" class="fontstyle">TIGHRA BRANCH</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>IFSC Code</strong></td>
            <td width="50%" class="fontstyle">SBIN0018548</td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <!-- IN WITNESS WHEREOF SECTION -->
    <table width="100%" cellpadding="5" cellspacing="0" class="fontstyle borderdata">
        <tr>
            <td colspan="2" class="fontstyle">
                <strong>IN WITNESS WHEREOF THE PARTIES HAVE EXECUTED THIS AGREEMENT ON THE DATE STATED HEREINABOVE.</strong>
            </td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle">
                <strong>SIGNED AND DELIVERED by and on behalf of FinDrop Capital represented by its authorized representative:</strong>
            </td>
            <td width="50%" class="fontstyle">
                <strong>SIGNED AND DELIVERED by and on behalf of VEER ENTERPRISE represented by its authorized representative, VIRAG SHAH:</strong>
            </td>
        </tr>

        <tr>
            <td width="50%" class="fontstyle" style="text-align: left; padding:20px;">
                <hr style="border: 1px solid black; width: 35%; margin-top: 5px;margin-left:0px !important">
                <strong>Authorized Signatory</strong><br>
            </td>
            <td width="50%" class="fontstyle" style="text-align: left; padding:20px;">
                <hr style="border: 1px solid black; width: 35%; margin-top: 5px; margin-left:0px !important">
                <strong>Authorized Signatory</strong><br>
            </td>
        </tr>


        <tr>
            <td width="50%" class="fontstyle">Place: Navsari, Gujarat</td>
            <td width="50%" class="fontstyle">ddddd</td>
        </tr>
        <tr>
            <td width="50%" class="fontstyle"><strong>Date: 25/03/2023</strong></td>
            <td width="50%" class="fontstyle">ffffff</td>
        </tr>


    </table>
    <p></p>
    <p></p>

    <table width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <td width="100%" class="fontstyle">
                <p style="text-align: center"><strong>SCHEDULE II</strong></p>
                <p style="text-align: center"><strong>Personal Guarantee</strong></p>
                <p>
                    This PERSONAL GUARANTEE (“Personal Guarantee”) executed at Navsari, Gujarat on 25/03/2023 by VIRAG SHAH, Son of Vipul Shah, PAN No. BASPS9737F, aged 36 years, residing at 16, SARTHIVILLA RAW HOUSE, NEAR BAWAN JINALAY, TIGHRA, NAVSARI-396445 (the “Guarantor”, which expression shall, unless it is repugnant to the subject or context thereof, include his/her legal heirs, executors, and administrators);
                </p>

                <p><strong>IN FAVOUR OF:</strong></p>
                <p>
                    FinDrop Capital, a Lending Act 2017 and a non-banking financial company within the meaning of the Lending Act 2017 Act, 2017 and having its registered office at NO. 340, 3rd Floor, Central Bazar, Navsari-396445 Gujarat, represented herein by its authorized representative, hereinafter referred to as the “Lender", (which expression shall unless excluded by or repugnant to the subject or context, be deemed to include its successors-in-interest and assigns)
                </p>

                <p><strong>WHEREAS:</strong> VEER ENTERPRISE (hereinafter referred to as ‘Borrower’ which expression shall, unless it be repugnant to the subject or context thereof, include its successors and permitted assigns) has requested the Lender to provide a working capital loan of Rs. 500000/- (Four lakh rupees and zero paisa only) at 18 fee per month (“hereinafter referred to as “Loan”)</p>

                <p><strong>(a)</strong> The Lender has agreed to provide the Loan for the Purpose and on the terms and conditions of the Loan Agreement dated 25/03/2023 ("Loan Agreement”) entered into between the Lender and the Borrower and the Co-Borrower.</p>
                <p><strong>(b)</strong> In this reference, the Guarantor has agreed to provide a Personal Guarantee guaranteeing the repayment of the entire Loan on such terms and conditions as set forth herein.</p>
                <p><strong>(c)</strong> The Guarantor shall provide Post Dated Cheques (PDCs) to the Lender, towards the security of the said loan amount (Details of which is mentioned in Schedule-III, Part-D to the Loan Agreement).</p>
                <p><strong>(d)</strong> That for the purpose hereof, the Guarantor unconditionally and irrevocably agrees and undertakes to provide the present Personal Guarantee to the Lender to make payment on behalf of the Borrower and Co-Borrower in the event of any default on the part of the Borrower and/or Co-Borrower in payment of any part of the Loan (hereinafter referred to as the “Guarantee”).</p>
                <p><strong>(e)</strong> That the Guarantor further undertakes that he/she is solvent and financially capable to discharge his Guarantee obligations.</p>

                <p><strong>TERMS AND CONDITIONS OF THE PRESENT PERSONAL GUARANTEE:</strong></p>
                <p><strong>(i)</strong> The Guarantor for the purpose hereof irrevocably undertakes to meet the Guarantee without any demur, reservation, caveat, protest or recourse and pay the amount not repaid by the Borrower within seven (7) days from the receipt of first written demand from the Lender.</p>
                <p><strong>(ii)</strong> The Guarantor agrees and undertakes to remain fully bound until the entire Loan along with any other dues is paid in full.</p>
                <p><strong>(iii)</strong> That the Guarantor further undertakes that to meet the Guarantee and pay the amount not repaid by the Borrower and/or Co-Borrower, the Lender shall have the right to initiate appropriate proceedings under applicable laws and statutes to recover the Guarantee.</p>
                <p><strong>(iv)</strong> The Guarantor agrees that his obligations under this Personal Guarantee shall not be reduced by reason of any partial performance of the terms and conditions of the Loan Agreement or other Loan Documents or on account of any other reason, whatsoever.</p>
                <p><strong>(v)</strong> The Guarantor agrees that in the Event of Default by the Borrower and/or Co-Borrower, the Lender at its option shall be entitled to enforce this Personal Guarantee against the Guarantor.</p>
                <p><strong>(vi)</strong> The Guarantor agrees and undertakes that during the term of the Loan Agreement or other Loan Documents, the Guarantor shall not resign as a member of the Board of Directors of the Borrower Company and/or shall not reduce his/her shareholding in the Borrower company, without the prior written consent of the Lender.</p>
                <p><strong>(vii)</strong> This Guarantee shall be construed, interpreted and governed in accordance with the laws of India and should any provision of this Guarantee be judged by an appropriate court of law as invalid, it shall not affect any of the remaining provisions whatsoever.</p>
                <p><strong>(viii)</strong> The capitalized terms used in the Personal Guarantee shall have the meaning ascribed to them under the Loan Agreement.</p>

                <p><strong>IN WITNESS WHEREOF THE PARTY HAS EXECUTED THIS DOCUMENT ON THE DATE STATED HEREINABOVE.</strong></p>
                <p><strong>SIGNED AND DELIVERED by</strong></p>
                <p>VIRAG SHAH</p>
                <p><strong>Witness 1:</strong></p>
                <p><strong>Witness 2:</strong></p>
            </td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <table width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <td width="100%" class="fontstyle">
                <p style="text-align: center"><strong>SCHEDULE III</strong></p>
                <p style="text-align: center"><strong>Part A – Undertaking</strong></p>
                <p>Date: 25-03-2023</p>

                <p>
                    I, VIRAG SHAH and authorized person and acting on behalf of VEER ENTERPRISE (“Borrower”), a Lending Act 2017 and having its registered office at WORD NO 13/1, NAIK AVENUE PANCH HATDI, OPP SHREE RAM DAIRY, NAVSARI, GUJARAT-396445, (“Borrower”), state and undertake as below.
                </p>

                <p>
                    That the Borrower will avail Loan of an amount of Rs. 500000/- (Four lakh rupees and zero paisa only) @ 18 % ROI fee per Annum (“Loan”) from FinDrop Capital, registered under the Lending Act 2017 and a non-banking financial company within the meaning of the Lending Act 2017 having its registered office at NO. 340, 3rd Floor, Central Bazar, Navsari-396445Gujarat. (hereinafter referred to as the "Lender”) on such terms and conditions as mentioned in the Loan Agreement dated 25/03/2023(“Loan Agreement”) executed between the Lender and the Borrower. That the said Loan will be availed by the Borrower for the execution of the Purpose as described in detail in the Loan Agreement.
                </p>

                <p>
                    That based on the obligations arising upon the Borrower, I, on behalf of the Borrower do hereby confirm, assure, declare and irrevocably undertake:
                </p>

                <ul>
                    <li>(i) That the Loan provided by the Lender shall be senior to all other debt exposures of the Borrower with respect to the Purpose and that the same shall not be utilized for settling any other present or future loan/repay any investment and/or making any investment in the capital of any other company, whether subsidiary or otherwise;</li>
                    <li>(ii) That nothing in any existing agreement/tie-up/contract of the Borrower and/or Co- Borrower with any third party effect and/or put any restriction on the rights and/or obligations of the Parties under the Loan Documents proposed to be executed with Lender;</li>
                    <li>(iii) That the Borrower and/or Co- Borrower has no outstanding dues for statutory liabilities.</li>
                </ul>

                <p>
                    The capitalized terms used in this Undertaking shall have the meaning ascribed to them under the Loan Agreement and that the undertakings, declarations, confirmations and statements contained hereunder the undertaking shall be binding on the Borrower at all times.
                </p>

                <p style="text-align: start">____________________________________</p>
                <p style="text-align: start"><strong>Authorized Signatory</strong></p>
            </td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <table width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <td width="100%" class="fontstyle">
                <p style="text-align: center"><strong>Undertaking cum Indemnity - In respect of Facsimile and/or Email Instruction</strong></p>
                <p>Date: 25-03-2023</p>

                <p><strong>FinDrop Capital</strong><br>
                    340, 3rd Floor,<br>
                    Central Bazar,<br>
                    Navsari-396445
                </p>

                <p>We, VEER ENTERPRISE, represented herein by its authorized representative VIRAG SHAH, execute this Undertaking cum Indemnity in favor of FinDrop Capital, registered under the Lending Act 2017 and a non-banking financial company within the meaning of the Lending Act 2017, having its registered office at NO. 340, 3rd Floor, Central Bazar, Navsari-396445 Gujarat. (hereinafter referred to as the "Lender”) on such terms and conditions as mentioned in the Loan Agreement dated 25/03/2023 (“Loan Agreement”) executed between the Lender and the Borrower.</p>

                <p>We have requested the Lender and agree and acknowledge that the Lender shall be entitled to treat any Fax and/or Email (whether or not the same has been electronically signed) submission as issued and the same is fully binding on us.</p>

                <p>At our request, the Lender has agreed to accept Fax submission and/or instruction through email signed by our Authorized Signatory sent to the fax number or email designated for the purpose by the Lender subject to the indemnity herein offered by me/us.</p>

                <p>The Lender shall not be liable for any losses or damage which we may suffer as a consequence of the Lender acting in accordance with or in reliance upon, any Fax submission and/or email instruction.</p>

                <p>We shall indemnify the Lender and keep the Lender indemnified, at all times from and against any and all claims, losses, damages, and other expenses incurred, suffered, or paid by the Lender and also against all actions and suit proceedings against the Lender in connection with or arising hereunder.</p>

                <p>IN WITNESS WHEREOF THE PARTIES HAVE EXECUTED THIS UNDERTAKING ON THE DATE STATED HEREINABOVE.</p>

                <table width="100%" class="borderdone">
                    <tr>
                        <td width="50%">
                            <p><strong>Signed and delivered</strong></p>
                            <p>Name - VIRAG SHAH</p>
                            <p>Signature -</p>
                            <p>Date - 25-03-2023</p>
                        </td>
                        <td width="50%">

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <table width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <td width="100%" class="fontstyle">
                <p style="text-align: center"><strong>Part B - Demand Promissory Note</strong></p>
                <p>Place: Navsari, Gujarat</p>
                <p>Date: 25-03-2023</p>

                <p>ON DEMAND I/We VEER ENTERPRISE, a Lending Act 2017 and having its registered office at WORD NO 13/1, NAIK AVENUE PANCH HATDI, OPP SHREE RAM DAIRY ,NAVSARI, GUJARAT-396445, jointly/severally promise to pay FinDrop Capital , a company incorporated under the Lending Act 2017 and a non-banking financial company within the meaning of the Lending Act 2017 of India and having its registered office at NO. 340, 3rd Floor,Central Bazar, Navsari-396445 Gujarat., the sum of Rs. 500000/- (Four lakh rupees and zero paisa only) for value received with interest at the rate of Interest 18 % per Annum with monthly rests till date of payment in full, subject to rate of interest is change as per Lender’s policy.</p>
                <p>SIGNED AND DELIVERED by and on behalf of<strong> VEER ENTERPRISE </strong> by its authorized representative, <strong> VIRAG SHAH.</strong></p>

            </td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <table width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <td width="100%" class="fontstyle">
                <p style="text-align: center"><strong>Part C - List of Associate Concerns</strong></p>
                <p>Date: 25/03/2023</p>

                <table border="1" width="100%" cellspacing="0" cellpadding="5">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Company Name</th>
                            <th>Place</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>11.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <p>SIGNED AND DELIVERED by and on behalf of <strong> VEER ENTERPRISE </strong> represented by its authorized representative, <strong>VIRAG SHAH.</strong></p>
            </td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <table width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <td width="100%" class="fontstyle">
                <p style="text-align: center"><strong>Part D - Receipt for Post-Dated Cheques</strong></p>
                <p>RECEIVED with thanks from the Borrower/Guarantors VIRAG SHAH, the following Post Dated Cheques, all drawn on FinDrop Capital, towards the repayment of Loan amount as stated herein and the Loan Agreement.</p>

                <table border="1" width="100%" cellspacing="0" cellpadding="5">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Cheque No.</th>
                            <th>Date</th>
                            <th>Particulars</th>
                            <th>Amount (in Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>11.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>12.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>13.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>14.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>15.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>16.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>17.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>18.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>19.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>20.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>21.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>22.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>23.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>24.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <p style="text-align: end;margin-right:100px !important"><strong>RECEIVED</strong></p>

                <p style="text-align: end;margin-right:60px !important">__________________</p>

                <p style="text-align: end;margin-right:100px !important"><strong>LENDER</strong></p>
            </td>
        </tr>
    </table>
    <p></p>
    <p></p>
    <table width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <td width="100%" class="fontstyle">
                <p style="text-align: center"><strong>Sanction Letter</strong></p>
                <p>Date: 25-03-2023</p>

                <p style="font-weight: bold">To,</p>
                <p style="font-weight: bold">VIRAG SHAH,<br>
                   VEER ENTERPRISE.<br>
                   16, SARTHIVILLA RAW HOUSE, NEAR BAWAN JINALAY, TIGHRA, NAVSARI-396445.</p>

                <p>Dear Sir,</p>
                <p><strong>Sub.: An offer for Loan for Working Capital</strong></p>
                <p>With reference to your application, we offer the Loan on the terms and conditions given below:</p>

                <table border="1" width="100%" cellspacing="0" cellpadding="5">
                    <tr>
                        <td><strong>Loan Application No</strong></td>
                        <td>FD202205031007</td>
                    </tr>
                    <tr>
                        <td><strong>Nature of Loan</strong></td>
                        <td>Working Capital Finance</td>
                    </tr>
                    <tr>
                        <td><strong>Amount</strong></td>
                        <td>Rs. 500000/- (Five Lakh rupees and zero paisa only)</td>
                    </tr>
                    <tr>
                        <td><strong>Security</strong></td>
                        <td>Unsecured Loan</td>
                    </tr>
                    <tr>
                        <td><strong>Purpose</strong></td>
                        <td>Working Capital</td>
                    </tr>
                    <tr>
                        <td><strong>Rate of Interest</strong></td>
                        <td>18% Reducing per Annum</td>
                    </tr>
                    <tr>
                        <td><strong>Processing Fee and Set up Charges</strong></td>
                        <td>2% (10000) of the sanctioned amount net plus applicable service tax of the charges incurred by the borrower (i.e., insurance). This amount will be deducted from the first disbursement done to the borrower for a given sanctioned limit.</td>
                    </tr>
                    <tr>
                        <td><strong>Repayment details</strong></td>
                        <td>Repayment by 18 equal MONTHLY installments of Rs. 33,842.</td>
                    </tr>
                    <tr>
                        <td><strong>Primary Repayment Mode</strong></td>
                        <td>NACH / Post Dated Cheques / NEFT</td>
                    </tr>
                    <tr>
                        <td><strong>Installment Date</strong></td>
                        <td>05-05-2023</td>
                    </tr>
                    <tr>
                        <td><strong>Secondary Repayment Mode</strong></td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td><strong>Total Interest Payable</strong></td>
                        <td>Rs. 109,156.00</td>
                    </tr>
                    <tr>
                        <td><strong>Delay Charges</strong></td>
                        <td>Rs. 100/- per day per installment</td>
                    </tr>
                    <tr>
                        <td><strong>Cheque Bounce Charges</strong></td>
                        <td>Rs. 1,000/- Per Incident</td>
                    </tr>
                    <tr>
                        <td><strong>Legal Expenses / Stamp Duty</strong></td>
                        <td>All stamp duties, legal expenses, and other costs involved, including the cost of documentation and due diligence cost to be borne by the Borrower. Waived for this cycle.</td>
                    </tr>
                    <tr>
                        <td><strong>Approvals Required</strong></td>
                        <td>Borrower needs to take lender’s prior written approval before incurring further debt/loan/financing/encumbrances from any other lender.</td>
                    </tr>
                    <tr>
                        <td><strong>Documents to be Provided by the Borrower</strong></td>
                        <td>
                            <ol>
                                <li>Personal Guarantee</li>
                                <li>Undertaking</li>
                                <li>Undertaking cum Indemnity in respect of facsimile and/or email</li>
                                <li>Demand Promissory Note</li>
                                <li>List of Associate Concerns</li>
                                <li>Post Dated Cheques</li>
                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Broken Period Interest</strong></td>
                        <td class="fontstylemain">Rs. 1,068.00 (4 days)</td>
                    </tr>
                </table>

                <p>The above Loan shall be made available to you on the above terms subject to compliance of all the conditions detailed in the Agreement.</p>
                <p>The above letter is valid for 7 (Seven) days from the date of issue. Kindly return the duplicate copy of this letter duly signed as a token of your acceptance of the terms and conditions stipulated for the above Loan.</p>
                <p>We look forward to a mutually beneficial relationship.</p>
                <p>Thanking you,</p>
                <p><strong>For, FinDrop Capital</strong></p>
                <br><br>

                <p>___________________</p>
                <p><strong>Authorized Signatory</strong></p>
            </td>
        </tr>
    </table>

</body>
</html>
