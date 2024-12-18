@push('title')
    <title>Proprietor form</title>
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

                {{-- shivang hide this 17-12-2024 --}}
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="row">
                    @include('sidebar')
                    <div class="col-lg-9">
                        <form action="{{ url($url) }}" method="POST">
                            @csrf <!-- Include CSRF token for Laravel form submission -->
                            <div id='partner-row-container'>
                                @forelse ($Proprietordatas as $index => $Proprietordata)
                                    {{-- @php dd($Proprietordatas[2]); @endphp --}}
                                    <div class="row mb-3 bg-red d-flex justify-content-between">
                                        <div>
                                            <h6 style="font-weight: 700" class="mt-2 ml-2">{{ $title }}</h6>
                                        </div>
                                        <div>
                                            <a href="#" id="add-partner-row">
                                                <i class="fas fa-plus mt-2 mr-2" style="color:white"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="partner-row">
                                        <div class="row mb-2">
                                            <div class="col-log-4">
                                                <img src="{{ url('admin/dist/img/AdminLTELogo.png') }}" alt="Image"
                                                    class="img-fluid" height="150" width="150">
                                            </div>
                                            <div class="col-lg-2 mt-5 ml-5">
                                                <div class="form-group">
                                                    <label for="title" class="text-nowrap">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title[]"
                                                        value="{{ isset($Proprietordata->title) ? $Proprietordata->title : old('title') }}">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-5">
                                                <div class="form-group">
                                                    <label for="fullname" class="text-nowrap">Full Name</label>
                                                    <input type="text" class="form-control" id="fullname"
                                                        name="fullname[]"
                                                        value="{{ isset($Proprietordata->proprietor_name) ? $Proprietordata->proprietor_name : old('proprietor_name') }}">
                                                    @error('fullname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Gender" class="text-nowrap">Relation with Applican</label>
                                                    <select class="form-control relation_type" id="relation_type" name="relation_type[]">
                                                        <option value="Partner"
                                                            {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Partner' ? 'selected' : '' }}>
                                                            Partner</option>
                                                        <option value="Director"
                                                            {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Director' ? 'selected' : '' }}>
                                                            Director</option>
                                                        <option value="Proprietor"
                                                            {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Proprietor' ? 'selected' : '' }}>
                                                            Proprietor</option>
                                                        <option value="Promoter"
                                                            {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Promoter' ? 'selected' : '' }}>
                                                            Promoter</option>
                                                        <option value="Karta"
                                                            {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Karta' ? 'selected' : '' }}>
                                                            Karta</option>
                                                        <option value="Benificiary"
                                                            {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Benificiary' ? 'selected' : '' }}>
                                                            Benificiary</option>
                                                        <option value="Others"
                                                            {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Others' ? 'selected' : '' }}>
                                                            Others</option>
                                                    </select>
                                                    @error('relation_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2 hidden1" style="display: none;">
                                                <div class="form-group">
                                                    <label for="f/s name" class="text-nowrap">Others</label>
                                                    <input type="text" class="form-control" id="othersname"
                                                        name="othersname[]"
                                                        
                                                        value="{{ isset($Proprietordata->othersname) ? $Proprietordata->othersname : old('othersname') }}"> 
                                                    @error('othersname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="Gender" class="text-nowrap">Applying as
                                                        Co-Borrower</label>
                                                    <select class="form-control" id="relation_type"
                                                        name="apply_as_customer[]">
                                                        <option value="Partner"
                                                            {{ isset($Proprietordata->applying_as_co_borrower) && $Proprietordata->applying_as_co_borrower == 'Partner' ? 'selected' : '' }}>
                                                            Partner</option>
                                                        <option value="No"
                                                            {{ isset($Proprietordata->applying_as_co_borrower) && $Proprietordata->applying_as_co_borrower == 'No' ? 'selected' : '' }}>
                                                            No</option>
                                                    </select>
                                                    @error('relation_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="f/s name" class="text-nowrap">Father Name/ Spouse
                                                        Name</label>
                                                    <input type="text" class="form-control" id="f_s_name"
                                                        name="f_s_name[]"
                                                        value="{{ isset($Proprietordata->father_or_spouse_name) ? $Proprietordata->father_or_spouse_name : old('father_or_spouse_name') }}">
                                                    @error('f_s_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Shareholding" class="text-nowrap">Shareholding % in
                                                        Borrowing
                                                        Entity</label>
                                                    <input type="text" class="form-control" id="Shareholding"
                                                        name="Shareholding[]"
                                                        value="{{ isset($Proprietordata->shareholding_with_cust_entity) ? $Proprietordata->shareholding_with_cust_entity : old('shareholding_with_cust_entity') }}">
                                                    @error('Shareholding')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="dob" class="text-nowrap">Date of Birth</label>
                                                    <input type="date" class="form-control" id="dob"
                                                        name="dob[]"
                                                        value="{{ isset($Proprietordata->Date_of_Birth) ? $Proprietordata->Date_of_Birth : old('Date_of_Birth') }}">
                                                    @error('dob')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="Gender" class="text-nowrap">Gender</label>
                                                    <select class="form-control" id="Gender" name="Gender[]">
                                                        <option value="male"
                                                            {{ isset($Proprietordata->Gender) && $Proprietordata->Gender == 'Male' ? 'selected' : '' }}>
                                                            Male</option>
                                                        <option value="female"
                                                            {{ isset($Proprietordata->Gender) && $Proprietordata->Gender == 'Female' ? 'selected' : '' }}>
                                                            Female</option>
                                                    </select>
                                                    @error('Gender')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="Marital_Status" class="text-nowrap">Marital Status</label>
                                                    <select class="form-control" id="Marital_Status"
                                                        name="Marital_Status[]">
                                                        <option
                                                            value="Single"{{ isset($Proprietordata->Marital_Status) && $Proprietordata->Marital_Status == 'Single' ? 'selected' : '' }}>
                                                            Single</option>
                                                        <option
                                                            value="Married"{{ isset($Proprietordata->Marital_Status) && $Proprietordata->Marital_Status == 'Married' ? 'selected' : '' }}>
                                                            Married</option>
                                                    </select>
                                                    @error('Marital_Status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="Citizenship" class="text-nowrap">Citizenship</label>
                                                    <select class="form-control" id="Citizenship" name="Citizenship[]">
                                                        <option
                                                            value="Indian"{{ isset($Proprietordata->Citizenship) && $Proprietordata->Citizenship == 'Indian' ? 'selected' : '' }}>
                                                            Indian</option>
                                                        <option value="NRI"
                                                            {{ isset($Proprietordata->Citizenship) && $Proprietordata->Citizenship == 'NRI' ? 'selected' : '' }}>
                                                            NRI</option>
                                                    </select>
                                                    @error('Citizenship')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Residential_type" class="text-nowrap">Residential
                                                        Status</label>
                                                    <select class="form-control" id="Resident_Individual"
                                                        name="Residential_type[]">
                                                        <option
                                                            value="Resident Individual"{{ isset($Proprietordata->Residential_Status) && $Proprietordata->Residential_Status == 'Resident Individual' ? 'selected' : '' }}>
                                                            Resident Individual</option>
                                                        <option value="Non Resident India"
                                                            {{ isset($Proprietordata->Residential_Status) && $Proprietordata->Residential_Status == 'Non Resident India' ? 'selected' : '' }}>
                                                            Non Resident India</option>
                                                        <option value="Foreign National"
                                                            {{ isset($Proprietordata->Residential_Status) && $Proprietordata->Residential_Status == 'Foreign National' ? 'selected' : '' }}>
                                                            Foreign National</option>
                                                        <option value="Person of Indian Origin"
                                                            {{ isset($Proprietordata->Residential_Status) && $Proprietordata->Residential_Status == 'Person of Indian Origin' ? 'selected' : '' }}>
                                                            Person of Indian Origin</option>
                                                    </select>
                                                    @error('Residential_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Residential_type" class="text-nowrap">Occupation
                                                        type</label>
                                                    <select class="form-control" id="Resident_Individual"
                                                        name="Occupation_type[]">
                                                        <option
                                                            value="Service"{{ isset($Proprietordata->Occupation_type) && $Proprietordata->Occupation_type == 'Service' ? 'selected' : '' }}>
                                                            Service</option>
                                                        <option value="Business"
                                                            {{ isset($Proprietordata->Occupation_type) && $Proprietordata->Occupation_type == 'Business' ? 'selected' : '' }}>
                                                            Business</option>
                                                        <option value="Not categorized"
                                                            {{ isset($Proprietordata->Occupation_type) && $Proprietordata->Occupation_type == 'Not categorized' ? 'selected' : '' }}>
                                                            Not categorized</option>
                                                        <option value="Others"
                                                            {{ isset($Proprietordata->Occupation_type) && $Proprietordata->Occupation_type == 'Others' ? 'selected' : '' }}>
                                                            Others</option>
                                                    </select>
                                                    @error('Occupation_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="current_address" class="text-nowrap">Current Residence
                                                        Address</label>
                                                    <input type="text"
                                                        class="form-control address-{{ $index }}" id=""
                                                        name="current_address[]"
                                                        value="{{ old('Current_Residence_Address', $Proprietordata->Current_Residence_Address) }}">
                                                    @error('current_address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="current_landmark" class="text-nowrap">Landmark</label>
                                                    <input type="text"
                                                        class="form-control per-landmark-{{ $index }}"
                                                        id="" name="current_landmark[]"
                                                        value="{{ old('Current_Landmark', $Proprietordata->Current_Landmark) }}">
                                                    @error('current_landmark')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="pincode" class="text-nowrap">Pin/Post Code</label>
                                                    <input type="text"
                                                        class="form-control pincode-input-{{ $index }}"
                                                        id="" onInput="checkPincodeLength(this)"
                                                        data-index="{{ $index }}" name="pincode[]"
                                                        value="{{ old('Current_pincode', $Proprietordata->Current_pincode) }}">
                                                    @error('pincode')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="city" class="text-nowrap">City/ Town</label>
                                                    <select class="form-control city-{{ $index }}" id="city"
                                                        name="city[]">
                                                        <option value="{{ $Proprietordata->Current_City }}">
                                                            {{ $Proprietordata->Current_City }}</option>
                                                    </select>
                                                    @error('city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="District" class="text-nowrap">District</label>
                                                    <input type="text"
                                                        class="form-control district-{{ $index }}" id=""
                                                        name="District[]"
                                                        value="{{ isset($Proprietordata->Current_District) ? $Proprietordata->Current_District : old('Current_District') }}">
                                                    @error('District')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="State" class="text-nowrap">State</label>
                                                    <input type="text" class="form-control state-{{ $index }}"
                                                        id="" name="State[]"
                                                        value="{{ isset($Proprietordata->Current_State) ? $Proprietordata->Current_State : old('Current_State') }}">
                                                    @error('State')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="state_code" class="text-nowrap">State/UT code</label>
                                                    <input type="text"
                                                        class="form-control state-code-{{ $index }}"
                                                        id="" name="state_code[]"
                                                        value="{{ isset($Proprietordata->Current_State_code) ? $Proprietordata->Current_State_code : old('Current_State_code') }}">
                                                    @error('state_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="country_code" class="text-nowrap">ISO Country Code</label>
                                                    <input type="text"
                                                        class="form-control country-code-{{ $index }}"
                                                        id="" name="country_code[]"
                                                        value="{{ isset($Proprietordata->Current_Country_Code) ? $Proprietordata->Current_Country_Code : old('Current_Country_Code') }}">
                                                    @error('country_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Residential" class="text-nowrap">Residence Type</label>
                                                    <select class="form-control" id="Residential"
                                                        name="Residence_type[]">
                                                        <option
                                                            value="Rented"{{ isset($Proprietordata->Residence_Type) && $Proprietordata->Residence_Type == 'Rented' ? 'selected' : '' }}>
                                                            Rented</option>
                                                        <option value="Owned"
                                                            {{ isset($Proprietordata->Residence_Type) && $Proprietordata->Residence_Type == 'Owned' ? 'selected' : '' }}>
                                                            Owned</option>
                                                        <option value="Parental"
                                                            {{ isset($Proprietordata->Residence_Type) && $Proprietordata->Residence_Type == 'Parental' ? 'selected' : '' }}>
                                                            Parental</option>
                                                        <option value="Other"
                                                            {{ isset($Proprietordata->Residence_Type) && $Proprietordata->Residence_Type == 'Other' ? 'selected' : '' }}>
                                                            Other</option>
                                                    </select>
                                                    @error('Residence_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group d-flex align-items-center">
                                                    <label for="proof_address" class="text-nowrap">Address Same as
                                                        AdharCard
                                                        :</label>
                                                </div>
                                                <div class="form-group d-flex align-items-center">
                                                    <div class="form-check ml-2 mr-2">
                                                        <input type="radio" class="form-check-input"
                                                            onClick="getperaddress(this)"
                                                            data-index="{{ $index }}"
                                                            name="proof_address[{{ $index }}]" value="Yes"> Yes
                                                        <label class="form-check-label" for="peryes"></label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input"
                                                            onClick="getperaddress(this)"
                                                            name="proof_address[{{ $index }}]"
                                                            data-index="{{ $index }}" value="No">No
                                                        <label class="form-check-label" for="perno"></label>
                                                    </div>
                                                </div>
                                                @error('proof_address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="per_address" class="text-nowrap">Permanent Residence
                                                        Address</label>
                                                    <input type="text"
                                                        class="form-control  address-{{ $index }}-new"
                                                        id="per_address" name="per_address[]"
                                                        value="{{ isset($Proprietordata->Permanent_Residence_Address) ? $Proprietordata->Permanent_Residence_Address : old('Permanent_Residence_Address') }}">
                                                    @error('per_address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="per_landmark" class="text-nowrap">Landmark</label>
                                                    <input type="text"
                                                        class="form-control  per-landmark-{{ $index }}-new"
                                                        id="per_landmark" name="per_landmark[]"
                                                        value="{{ isset($Proprietordata->Permanent_Landmark) ? $Proprietordata->Permanent_Landmark : old('Permanent_Landmark') }}">
                                                    @error('per_landmark')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_pincode" class="text-nowrap">Pin/Post Code</label>
                                                    <input type="text"
                                                        class="form-control  pincode-input-{{ $index }}-new"
                                                        id="per_pincode" onInput="checkPincodeLength1(this)"
                                                        data-index="{{ $index }}" name="per_pincode[]"
                                                        value="{{ isset($Proprietordata->Permanent_pincode) ? $Proprietordata->Permanent_pincode : old('Permanent_pincode') }}">
                                                    @error('per_pincode')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_city" class="text-nowrap">City/ Town</label>
                                                    <select class="form-control   city-{{ $index }}-new"
                                                        id="per_city" name="per_city[]">
                                                        <option value="">{{ $Proprietordata->Permanent_City }}
                                                        </option>
                                                    </select>
                                                    @error('per_city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_District" class="text-nowrap">District</label>
                                                    <input type="text"
                                                        class="form-control  district-{{ $index }}-new"
                                                        id="per_District" name="per_District[]"
                                                        value="{{ isset($Proprietordata->Permanent_District) ? $Proprietordata->Permanent_District : old('Permanent_District') }}">
                                                    @error('per_District')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_State" class="text-nowrap">State</label>
                                                    <input type="text"
                                                        class="form-control  state-{{ $index }}-new"
                                                        id="per_State" name="per_State[]"
                                                        value="{{ isset($Proprietordata->Permanent_State) ? $Proprietordata->Permanent_State : old('Permanent_State') }}">
                                                    @error('per_State')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_state_code" class="text-nowrap">State/UT code</label>
                                                    <input type="text"
                                                        class="form-control  state-code-{{ $index }}-new"
                                                        id="per_state_code" name="per_state_code[]"
                                                        value="{{ isset($Proprietordata->Permanent_State_code) ? $Proprietordata->Permanent_State_code : old('Permanent_State_code') }}">
                                                    @error('per_state_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_country_code" class="text-nowrap">ISO Country
                                                        Code</label>
                                                    <input type="text"
                                                        class="form-control  country-code-{{ $index }}-new"
                                                        id="per_country_code" name="per_country_code[]"
                                                        value="{{ isset($Proprietordata->Permanent_Country_Code) ? $Proprietordata->Permanent_Country_Code : old('Permanent_Country_Code') }}">
                                                    @error('per_country_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="mobile" class="text-nowrap">Mobile No</label>
                                                    <input type="text" class="form-control" id="mobile"
                                                        name="mobile[]"
                                                        value="{{ isset($Proprietordata->proprietor_Mobile_no) ? $Proprietordata->proprietor_Mobile_no : old('proprietor_Mobile_no') }}">
                                                    @error('mobile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="email" class="text-nowrap">E-mail Address</label>
                                                    <input type="text" class="form-control" id="email"
                                                        name="email[]"
                                                        value="{{ isset($Proprietordata->proprietor_email) ? $Proprietordata->proprietor_email : old('proprietor_email') }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="pan" class="text-nowrap">PAN</label>
                                                    <input type="text" class="form-control" id="pan"
                                                        name="pan[]"
                                                        value="{{ isset($Proprietordata->proprietor_pannumber) ? $Proprietordata->proprietor_pannumber : old('proprietor_pannumber') }}">
                                                    @error('pan')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="adhar" class="text-nowrap">AADHAR No</label>
                                                    <input type="text" class="form-control" id="adhar"
                                                        name="adhar[]"
                                                        value="{{ isset($Proprietordata->proprietor_adharnumber) ? $Proprietordata->proprietor_adharnumber : old('proprietor_adharnumber') }}">
                                                    @error('adhar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty


                                    <div class="row mb-3 bg-red d-flex justify-content-between">
                                        <div>
                                            <h6 style="font-weight: 700" class="mt-2 ml-2">{{ $title }}</h6>
                                        </div>

                                        <div>
                                            <a href="#" id="add-partner-row">
                                                <i class="fas fa-plus mt-2 mr-2" style="color:white"></i>
                                                {{-- <button type="button" id="add-address-button" class="btn btn-primary">Add New Address</button> --}}
                                            </a>
                                        </div>
                                    </div>


                                    <div id="partner-row" class="partner-row">

                                        <div class="row mb-2">

                                            <div class="col-log-4">
                                                <img src="{{ url('admin/dist/img/AdminLTELogo.png') }}" alt="Image"
                                                    class="img-fluid" height="150" width="150">
                                            </div>

                                            {{-- <div class="col-lg-2 mt-5 ml-5">
                                                <div class="form-group">
                                                    <label for="title" class="text-nowrap">Title</label>
                                                    <input type="text" class="form-control" id="title"
                                                        name="title[]" value="{{ old('title') }}">

                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>  --}}

                                            <div class="col-lg-2 mt-5 ml-5">
                                                <div class="form-group">
                                                    <label for="title" class="text-nowrap">Title</label>
                                                    <input type="text" class="form-control" id="title"
                                                        name="title[]" value="{{ old('title.0') }}">
                                                    @error('title.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-lg-6 mt-5">
                                                <div class="form-group">
                                                    <label for="fullname" class="text-nowrap">Full Name</label>
                                                    <input type="text" class="form-control" id="fullname"
                                                        name="fullname[]" value="{{ old('fullname.0') }}">
                                                    @error('fullname.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Gender" class="text-nowrap">Relation with
                                                        Applican</label>
                                                    <select class="form-control" id="relation_type"
                                                        name="relation_type[]">
                                                        <option value="Partner">Partner</option>
                                                        <option value="Director">Director</option>
                                                        <option value="Proprietor">
                                                            Proprietor</option>
                                                        <option value="Promoter">
                                                            Promoter</option>
                                                        <option value="Karta">
                                                            Karta</option>
                                                        <option value="Benificiary">
                                                            Benificiary</option>
                                                        <option value="Others">
                                                            Others</option>
                                                    </select>
                                                    @error('relation_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Gender" class="text-nowrap">Applying as
                                                        Co-Borrower</label>
                                                    <select class="form-control" id="relation_type"
                                                        name="apply_as_customer[]">
                                                        <option value="Partner">
                                                            Partner</option>
                                                        <option value="No">
                                                            No</option>

                                                    </select>
                                                    @error('relation_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="f/s name" class="text-nowrap">Father Name/ Spouse
                                                        Name</label>
                                                    <input type="text" class="form-control" id="f_s_name"
                                                        name="f_s_name[]" value="{{ old('f_s_name.0') }}">
                                                    @error('f_s_name.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Shareholding" class="text-nowrap">Shareholding % in
                                                        Borrowing
                                                        Entity</label>
                                                    <input type="text" class="form-control" id="Shareholding"
                                                        name="Shareholding[]"
                                                        value="{{ old('Shareholding.0') }}">
                                                    @error('Shareholding.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-1">

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="dob" class="text-nowrap">Date of Birth</label>
                                                    <input type="date" class="form-control" id="dob"
                                                        name="dob[]" value="{{ old('dob.0') }}">
                                                    @error('dob.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="Gender" class="text-nowrap">Gender</label>
                                                    <select class="form-control" id="Gender" name="Gender[]">
                                                        <option value="male">
                                                            Male</option>
                                                        <option value="female">
                                                            Female</option>
                                                    </select>
                                                    @error('Gender')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>


                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="Marital_Status" class="text-nowrap">Marital Status</label>
                                                    <select class="form-control" id="Marital_Status"
                                                        name="Marital_Status[]">
                                                        <option value="Single">Single</option>
                                                        <option value="Married"> Married</option>
                                                    </select>
                                                    @error('Marital_Status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="Citizenship" class="text-nowrap">Citizenship</label>
                                                    <select class="form-control" id="Citizenship" name="Citizenship[]">
                                                        <option value="Indian">Indian</option>
                                                        <option value="NRI">NRI</option>
                                                    </select>
                                                    @error('Citizenship')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Residential_type" class="text-nowrap">Residential
                                                        Status</label>
                                                    <select class="form-control" id="Resident_Individual"
                                                        name="Residential_type[]">
                                                        <option>
                                                            Resident Individual</option>
                                                        <option value="Non Resident India">
                                                            Non Resident India</option>

                                                        <option value="Foreign National">
                                                            Foreign National</option>
                                                        <option value="Person of Indian Origin">
                                                            Person of Indian Origin</option>
                                                    </select>
                                                    @error('Residential_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>





                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Residential_type" class="text-nowrap">Occupation
                                                        type</label>
                                                    <select class="form-control" id="Resident_Individual"
                                                        name="Occupation_type[]">
                                                        <option value="Service">
                                                            Service</option>
                                                        <option value="Business">
                                                            Business</option>

                                                        <option value="Not categorized">
                                                            Not categorized</option>
                                                        <option value="Others">
                                                            Others</option>
                                                    </select>
                                                    @error('Occupation_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="current_address" class="text-nowrap">Current Residence
                                                        Address</label>
                                                    <input type="text" class="form-control address-0"
                                                        id="current_address" name="current_address[]"
                                                        value="{{ old('current_address.0') }}">
                                                    @error('current_address.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="current_landmark" class="text-nowrap">Landmark</label>
                                                    <input type="text" class="form-control per-landmark-0"
                                                        id="current_landmark" name="current_landmark[]"
                                                        value="{{ old('current_landmark.0') }}">
                                                    @error('current_landmark.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="pincode" class="text-nowrap">Pin/Post Code</label>
                                                    <input type="text" class="form-control pincode-input-0"
                                                        id="pincode" onInput="checkPincodeLength(this)" data-index="0"
                                                        name="pincode[]" value="{{ old('pincode.0') }}">
                                                    @error('pincode.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="city" class="text-nowrap">City/ Town</label>
                                                    <select class="form-control city-0" id="city" name="city[]" value="{{ old('city.0') }}">
                                                    </select>
                                                    @error('city.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="District" class="text-nowrap">District</label>
                                                    <input type="text" class="form-control district-0" id="District"
                                                        name="District[]" value="{{ old('District.0') }}">
                                                    @error('District.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="State" class="text-nowrap">State</label>
                                                    <input type="text" class="form-control state-0" id="State"
                                                        name="State[]" value="{{ old('State.0') }}">
                                                    @error('State.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="state_code" class="text-nowrap">State/UT code</label>
                                                    <input type="text" class="form-control state-code-0"
                                                        id="state_code" name="state_code[]"
                                                        value="{{ old('state_code.0') }}">
                                                    @error('state_code.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="country_code" class="text-nowrap">ISO Country Code</label>
                                                    <input type="text" class="form-control country-code-0"
                                                        id="country_code" name="country_code[]"
                                                        value="{{ old('country_code.0') }}">
                                                    @error('country_code.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Residential" class="text-nowrap">Residence Type</label>
                                                    <select class="form-control" id="Residential"
                                                        name="Residence_type[]">
                                                        <option value="Rented">
                                                            Rented</option>
                                                        <option value="Owned">
                                                            Owned</option>

                                                        <option value="Parental">
                                                            Parental</option>
                                                        <option value="Other">
                                                            Other</option>
                                                    </select>
                                                    @error('Residence_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group d-flex align-items-center">
                                                    <label for="proof_address" class="text-nowrap">Address Same as
                                                        AdharCard
                                                        :</label>
                                                </div>
                                                <div class="form-group d-flex align-items-center">
                                                    <div class="form-check ml-2 mr-2">
                                                        <input type="radio" class="form-check-input" id="yes"
                                                            onClick="getperaddress(this)" name="proof_address[]"
                                                            data-index="0" value="Yes"
                                                            {{ old('proof_address') == 'Yes' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="no"
                                                            onClick="getperaddress(this)" name="proof_address[]"
                                                            data-index="0" value="No"
                                                            {{ old('proof_address') == 'No' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="no">No</label>
                                                    </div>
                                                </div>
                                                @error('proof_address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="row mb-1">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="per_address" class="text-nowrap">Permanent Residence
                                                        Address</label>
                                                    <input type="text" class="form-control address-0-new"
                                                        id="per_address" name="per_address[]"
                                                        value="{{ old('per_address.0') }}">
                                                    @error('per_address.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="per_landmark" class="text-nowrap">Landmark</label>
                                                    <input type="text" class="form-control per-landmark-0-new"
                                                        id="per_landmark" name="per_landmark[]"
                                                        value="{{ old('per_landmark.0') }}">
                                                    @error('per_landmark.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_pincode" class="text-nowrap">Pin/Post Code</label>
                                                    <input type="text" class="form-control pincode-input-0-new"
                                                        id="per_pincode" onInput="checkPincodeLength1(this)"
                                                        data-index="0" name="per_pincode[]"
                                                        value="{{ old('per_pincode.0') }}">
                                                    @error('per_pincode.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_city" class="text-nowrap">City/ Town</label>
                                                    <select class="form-control city-0-new" id="per_city"
                                                        name="per_city[]">
                                                    </select>
                                                    @error('per_city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_District" class="text-nowrap">District</label>
                                                    <input type="text" class="form-control district-0-new"
                                                        id="per_District" name="per_District[]"
                                                        value="{{ old('per_District.0') }}">
                                                    @error('per_District.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_State" class="text-nowrap">State</label>
                                                    <input type="text" class="form-control state-0-new" id="per_State"
                                                        name="per_State[]" value="{{ old('per_State.0') }}">
                                                    @error('per_State.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_state_code" class="text-nowrap">State/UT code</label>
                                                    <input type="text" class="form-control state-code-0-new"
                                                        id="per_state_code" name="per_state_code[]"
                                                        value="{{ old('per_state_code.0') }}">
                                                    @error('per_state_code.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="per_country_code" class="text-nowrap">ISO Country
                                                        Code</label>
                                                    <input type="text" class="form-control country-code-0-new"
                                                        id="per_country_code" name="per_country_code[]"
                                                        value="{{ old('per_country_code.0') }}">
                                                    @error('per_country_code.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-1">

                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="mobile" class="text-nowrap">Mobile No</label>
                                                    <input type="text" class="form-control" id="mobile"
                                                        name="mobile[]" value="{{ old('mobile.0') }}">
                                                    @error('mobile.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="email" class="text-nowrap">E-mail Address</label>
                                                    <input type="text" class="form-control" id="email"
                                                        name="email[]" value="{{ old('email.0') }}">
                                                    @error('email.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="pan" class="text-nowrap">PAN</label>
                                                    <input type="text" class="form-control" id="pan"
                                                        name="pan[]" value="{{ old('pan.0') }}">
                                                    @error('pan.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="adhar" class="text-nowrap">AADHAR No</label>
                                                    <input type="text" class="form-control" id="adhar"
                                                        name="adhar[]" value="{{ old('adhar.0') }}">
                                                    @error('adhar.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">{{ $btext }}</button>
                                    <button type="Reset" class="btn btn-primary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection
<script>
    function checkPincodeLength(input, row) {
        const pincodeIndex = $(input).data('index');
        //  alert(pincodeIndex);
        var pincode = input.value;
        if (pincode.length === 6) {
            getdetailsmain(input, row, pincodeIndex);
        }
    }
    //3-5-24
    function getdetailsmain(pincodeInput, row, index) {
        //    alert(index);
        var pincode = pincodeInput.value;
        var token = "{{ csrf_token() }}";
        // console.log("Pincode:", pincode); // Use console.log for debugging instead of alert
        // die(); // Remove this line as it is not needed in JavaScript
        if (pincode.length === 6) {
            var index = index;
            var row = pincodeInput.closest('.row');
            //   alert(index);
            // Your AJAX request
            $.ajax({
                url: "{{ url('getpincodedetails') }}",
                type: 'post',
                data: {
                    pincode: pincode,
                    _token: token
                },
                success: function(data) {
                    console.log("AJAX Success:", data); // Log the AJAX response for debugging
                    // Assuming data is an array of city objects
                    var cities = data[0].PostOffice;
                    var district = data[0].PostOffice[0].District;
                    var state = data[0].PostOffice[0].State;
                    // Populate city dropdown and set district and state values

                    //   console.log(`city-${index}`);
                    $(`.city-${index}`).empty();
                    cities.forEach(function(city) {
                        console.log({
                            city
                        });
                        $(`.city-${index}`).append($('<option>', {
                            value: city.Name,
                            text: city.Name
                        }));
                        // alert(city.Name);
                        // die();
                    });
                    $(row).find(`.district-${index}`).val(district);
                    $(row).find(`.state-${index}`).val(state);
                    // Additional AJAX request for state code and country code
                    $.ajax({
                        url: "{{ route('getstatecodedetails') }}",
                        type: 'post',
                        data: {
                            state: state,
                            _token: token
                        },
                        success: function(response) {
                            var stateCode = response.state_code;
                            var countryCode = response.country_code;
                            // Set state code and country code values
                            $(row).find(`.state-code-${index}`).val(stateCode);
                            $(row).find(`.country-code-${index}`).val(countryCode);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error); // Log any AJAX errors for debugging
                }
            });
        }
    }

    function checkPincodeLength1(input, row) {

        const pincodeIndex = $(input).data('index');
        var pincode = input.value;


        // Check if pincode length is equal to 6
        if (pincode.length === 6) {
            // Call getdetails() function
            getdetailsmain1(input, row, pincodeIndex);
        }
    }

    function getdetailsmain1(pincodeInput, row, pincodeIndex) {
        var pincode = pincodeInput.value;
        var token = "{{ csrf_token() }}";
        console.log("Pincode:", pincode); // Use console.log for debugging instead of alert
        // die(); // Remove this line as it is not needed in JavaScript
        if (pincode.length === 6) {
            var row = pincodeInput.closest('.row');
            // Your AJAX request
            $.ajax({
                url: "{{ url('getpincodedetails') }}",
                type: 'post',
                data: {
                    pincode: pincode,
                    _token: token
                },
                success: function(data) {
                    console.log("AJAX Success:", data); // Log the AJAX response for debugging
                    // Assuming data is an array of city objects
                    var cities = data[0].PostOffice;
                    var district = data[0].PostOffice[0].District;
                    var state = data[0].PostOffice[0].State;
                    // Populate city dropdown and set district and state values

                    $(row).find(`.city-${pincodeIndex}-new`).empty();
                    // $(`.city-3-new`).empty();
                    cities.forEach(function(city) {
                        console.log({
                            city
                        });


                        $(`.city-${pincodeIndex}-new`).append($('<option>', {
                            value: city.Name,
                            text: city.Name
                        }));
                    });
                    $(row).find(`.district-${pincodeIndex}-new`).val(district);
                    $(row).find(`.state-${pincodeIndex}-new`).val(state);
                    // Additional AJAX request for state code and country code
                    $.ajax({
                        url: "{{ route('getstatecodedetails') }}",
                        type: 'post',
                        data: {
                            state: state,
                            _token: token
                        },
                        success: function(response) {
                            var stateCode = response.state_code;
                            var countryCode = response.country_code;
                            // Set state code and country code values
                            $(row).find(`.state-code-${pincodeIndex}-new`).val(stateCode);
                            $(row).find(`.country-code-${pincodeIndex}-new`).val(countryCode);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error); // Log any AJAX errors for debugging
                }
            });
        }
    }

    // function getcloneaddress(input, index) {
    //     var val = $(input).val();
    //     var row = $(input).closest('.row');

    //     // if (val === 'perYes') {
    //     //     //alert('hello motaa');
    //     //     $(".clone_permanent_address").prop('readonly', true);
    //     //     $(".clone_landmark").prop('readonly', true);
    //     //     $(".clone_pincode-input1").prop('readonly', true);
    //     //     $(".clone_per_city").prop('readonly', true);
    //     //     $(".clone_per_District").prop('readonly', true);
    //     //     $(".clone_per_State").prop('readonly', true);
    //     //     $(".clone_per_state_code").prop('readonly', true);
    //     //     $(".clone_per_country_code").prop('readonly', true);


    //     //     var cloneaddress = $("#clone_current_address").val();
    //     //     var clonelandmark = $("#clone_current_landmark").val();
    //     //     var clonepincode = $("#clone_pincode").val();
    //     //     var clonecity = $("#clone_city").val();
    //     //     var clonedistrict = $("#clone_District").val();
    //     //     var clonestate = $("#clone_State").val();
    //     //     var clonestate_code = $("#clone_state_code").val();
    //     //     var clonecountry_code = $("#clone_country_code").val();
    //     //     // console.log(cloneaddress);
    //     //     $(".clone_permanent_address").val(cloneaddress);
    //     //     $(".clone_landmark").val(clonelandmark);
    //     //     $(".clone_pincode-input1").val(clonepincode);
    //     //     $(".clone_per_District").val(clonedistrict);
    //     //     $(".clone_per_State").val(clonestate);
    //     //     $(".clone_per_state_code").val(clonestate_code);
    //     //     $(".clone_per_country_code").val(clonecountry_code);
    //     //     // $(".clone_per_city").val(clonecity);

    //     //     if (clonecity) {
    //     //         $('.clone_per_city').empty();
    //     //         $('.clone_per_city').append($('<option>', {
    //     //             value: clonecity,
    //     //             text: clonecity
    //     //         }));
    //     //     }

    // }

    function getperaddress(input) {
        var val = $(input).val();
        var row = $(input).closest('.row');
        var index = $(input).data('index');



        // alert('called');
        if (val === "Yes") {
            // alert(val);
            console.log("Index:", index);
            const orgAdd = $(`.address-${index}`).val();
            const orgLandmark = $(`.per-landmark-${index}`).val();
            const orgPincode = $(`.pincode-input-${index}`).val();
            const orgCity = $(`.city-${index}`).val();

            const orgdistrict = $(`.district-${index}`).val();

            //     alert(orgdistrict);
            // die();
            const orgstate = $(`.state-${index}`).val();
            const orgstatecode = $(`.state-code-${index}`).val();
            const orgcountrycode = $(`.country-code-${index}`).val();
            //  console.log(orgAdd);
            console.log(orgPincode);
            console.log(orgCity); //////
            console.log(orgdistrict);
            //    console.log(orgstate);
            // console.log("Selected city value:", orgCity);

            $(`.address-${index}-new`).prop('readonly', true);
            $(`.per-landmark-${index}-new`).prop('readonly', true);
            $(`.pincode-input-${index}-new`).prop('readonly', true);
            $(`.city-${index}-new`).prop('readonly', true);
            $(`.district-${index}-new`).prop('readonly', true);
            $(`.state-${index}-new`).prop('readonly', true);
            $(`.state-code-${index}-new`).prop('readonly', true);
            $(`.country-code-${index}-new`).prop('readonly', true);


            $(`.address-${index}-new`).val(orgAdd);
            $(`.per-landmark-${index}-new`).val(orgLandmark);
            $(`.pincode-input-${index}-new`).val(orgPincode);
            $(`.city-${index}-new`).val(orgCity);
            $(`.district-${index}-new`).val(orgdistrict);
            $(`.state-${index}-new`).val(orgstate);
            $(`.state-code-${index}-new`).val(orgstatecode);
            $(`.country-code-${index}-new`).val(orgcountrycode);
            //
            // alert($datata);

            if (orgCity) {
                $(`.city-${index}-new`).empty();
                $(`.city-${index}-new`).append($('<option>', {
                    value: orgCity,
                    text: orgCity
                }));
            }

        } else {

            console.log("Index:", index);
            // alert('data here');
            $(`.address-${index}-new`).prop('readonly', false);
            $(`.per-landmark-${index}-new`).prop('readonly', false);
            $(`.pincode-input-${index}-new`).prop('readonly', false);
            $(`.city-${index}-new`).prop('readonly', false);
            $(`.district-${index}-new`).prop('readonly', false);
            $(`.state-${index}-new`).prop('readonly', false);
            $(`.state-code-${index}-new`).prop('readonly', false);
            $(`.country-code-${index}-new`).prop('readonly', false);


            $(`.address-${index}-new`).val('');
            $(`.per-landmark-${index}-new`).val('');
            $(`.pincode-input-${index}-new`).val('');
            $(`.city-${index}-new`).val('');
            $(`.district-${index}-new`).val('');
            $(`.state-${index}-new`).val('');
            $(`.state-code-${index}-new`).val('');
            $(`.country-code-${index}-new`).val('');
        }



    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the container for partner rows
        const partnerRowContainer = document.getElementById('partner-row-container');
        // Get the plus button
        const addPartnerRowButton = document.getElementById('add-partner-row');
        // Function to add event listener to pincode input
        function addPincodeEventListener(row) {
            const pincodeInput = row.querySelector('.pincode-input');
            const pincodeInput1 = row.querySelector('.pincode-input1');
            const daddress = row.querySelector('.daddress');
            pincodeInput.addEventListener('input', function() {
                checkPincodeLength(pincodeInput);
                // getdetailsmain(pincodeInput);    // change 3-5-24
            });
            pincodeInput1.addEventListener('input', function() {
                checkPincodeLength1(pincodeInput);
                // getdetailsmain(pincodeInput);    // change 3-5-24
            });
            // daddress.addEventListener('input', function() {
            //     getperaddress(daddress);
            //     // getdetailsmain(pincodeInput);    // change 3-5-24
            // });
        }
        // Add an event listener to the plus button
        let index = {{ count($Proprietordatas) }} + 1;


        addPartnerRowButton.addEventListener('click', function() {

            $("#partner-row").append(
                `
                                <div class="removerawdata">
                                    <div class="row mb-3 bg-red d-flex justify-content-between">
                                        <div>
                                            <h6 style="font-weight: 700" class="mt-2 ml-2">{{ $title }}</h6>
                                        </div>
                                        <div>
                                            <a href="#" class="remove-partner-row">
                                                <i class="fas fa-minus mt-2 mr-2" style="color:white"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-log-4">
                                                <img src="{{ url('admin/dist/img/AdminLTELogo.png') }}" alt="Image"
                                                    class="img-fluid" height="150" width="150">
                                        </div>
                                        <div class="col-lg-2 mt-5 ml-5">
                                            <div class="form-group">
                                                <label for="title" class="text-nowrap">Title</label>
                                                <input type="text" class="form-control" id="title" name="title[]"
                                                    value="">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-5">
                                            <div class="form-group">
                                                <label for="fullname" class="text-nowrap">Full Name</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname[]"
                                                    value="">
                                                @error('fullname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Gender" class="text-nowrap">Relation with Applican</label>
                                                <select class="form-control relation_type" id="relation_type" name="relation_type[]">
                                                    <option value="Partner">Partner</option>
                                                    <option value="Director">Director</option>
                                                    <option value="Proprietor">Proprietor</option>
                                                    <option value="Promoter">Promoter</option>
                                                    <option value="Karta"> Karta</option>
                                                    <option value="Benificiary">Benificiary</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                @error('relation_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 hidden1" style="display: none;">
                                                <div class="form-group">
                                                    <label for="f/s name" class="text-nowrap">Others</label>
                                                    <input type="text" class="form-control" id="othersname"
                                                        name="othersname[]"
                                                        value="{{ isset($Proprietordata->othersname) ? $Proprietordata->othersname : old('othersname') }}"> 
                                                    @error('othersname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="Gender" class="text-nowrap">Applying as Co-Borrower</label>
                                                <select class="form-control" id="relation_type" name="apply_as_customer[]">
                                                    <option value="Partner">
                                                        Partner</option>
                                                    <option value="No">
                                                        No</option>
                                                </select>
                                                @error('relation_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="f/s name" class="text-nowrap">Father Name/ Spouse Name</label>
                                                <input type="text" class="form-control" id="f_s_name" name="f_s_name[]"
                                                    value="">
                                                @error('f_s_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Shareholding" class="text-nowrap">Shareholding % in Borrowing
                                                    Entity</label>
                                                <input type="text" class="form-control" id="Shareholding"
                                                    name="Shareholding[]"
                                                    value="">
                                                @error('Shareholding')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="dob" class="text-nowrap">Date of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob[]"
                                                    value="">
                                                @error('dob')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="Gender" class="text-nowrap">Gender</label>
                                                <select class="form-control" id="Gender" name="Gender[]">
                                                    <option value="male">
                                                        Male</option>
                                                    <option value="female">
                                                        Female</option>
                                                </select>
                                                @error('Gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="Marital_Status" class="text-nowrap">Marital Status</label>
                                                <select class="form-control" id="Marital_Status" name="Marital_Status[]">
                                                    <option
                                                        value="Single">
                                                        Single</option>
                                                    <option
                                                        value="Married">
                                                        Married</option>
                                                </select>
                                                @error('Marital_Status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="Citizenship" class="text-nowrap">Citizenship</label>
                                                <select class="form-control" id="Citizenship" name="Citizenship[]">
                                                    <option
                                                        value="Indian">
                                                        Indian</option>
                                                    <option value="NRI">
                                                        NRI</option>
                                                </select>
                                                @error('Citizenship')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Residential_type" class="text-nowrap">Residential
                                                    Status</label>
                                                <select class="form-control" id="Resident_Individual"
                                                    name="Residential_type[]">
                                                    <option
                                                        value="Resident Individual">
                                                        Resident Individual</option>
                                                    <option value="Non Resident India">
                                                        Non Resident India</option>
                                                    <option value="Foreign National">
                                                        Foreign National</option>
                                                    <option value="Person of Indian Origin">
                                                        Person of Indian Origin</option>
                                                </select>
                                                @error('Residential_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Residential_type" class="text-nowrap">Occupation type</label>
                                                <select class="form-control" id="Resident_Individual"
                                                    name="Occupation_type[]">
                                                    <option
                                                        value="Service">
                                                        Service</option>
                                                    <option value="Business">
                                                        Business</option>
                                                    <option value="Not categorized"
                                                        >
                                                        Not categorized</option>
                                                    <option value="Others"
                                                        >
                                                        Others</option>
                                                </select>
                                                @error('Occupation_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="current_address" class="text-nowrap">Current Residence
                                                    Address</label>
                                                <input type="text" class="form-control address-${index}" id="clone_current_address"
                                                    name="current_address[]"
                                                    value="">
                                                @error('current_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="current_landmark" class="text-nowrap">Landmark</label>
                                                <input type="text" class="form-control per-landmark-${index}"
                                                    id="clone_current_landmark" name="current_landmark[]"
                                                    value="">
                                                @error('current_landmark')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="pincode" class="text-nowrap">Pin/Post Code</label>
                                                <input type="text" class="form-control pincode-input-${index}" id="clone_pincode"
                                                    onInput="checkPincodeLength(this)" name="pincode[]"
                                                    data-index="${index}"
                                                    value="">
                                                @error('pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="city" class="text-nowrap">City/ Town</label>
                                                <select class="form-control city-${index}" id="clone_city" name="city[]">
                                                </select>
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="District" class="text-nowrap">District</label>
                                                <input type="text" class="form-control district-${index}" id="clone_District"
                                                    name="District[]"
                                                    value="">
                                                @error('District')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="State" class="text-nowrap">State</label>
                                                <input type="text" class="form-control state-${index}" id="clone_State"
                                                    name="State[]"
                                                    value="">
                                                @error('State')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="state_code" class="text-nowrap">State/UT code</label>
                                                <input type="text" class="form-control state-code-${index}" id="clone_state_code"
                                                    name="state_code[]"
                                                    value="">
                                                @error('state_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="country_code" class="text-nowrap">ISO Country Code</label>
                                                <input type="text" class="form-control country-code-${index}" id="clone_country_code"
                                                    name="country_code[]"
                                                    value="">
                                                @error('country_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Residential" class="text-nowrap">Residence Type</label>
                                                <select class="form-control" id="Residential" name="Residence_type[]">
                                                    <option
                                                        value="Rented">
                                                        Rented</option>
                                                    <option value="Owned"
                                                        >
                                                        Owned</option>
                                                    <option value="Parental"
                                                     >
                                                        Parental</option>
                                                    <option value="Other"
                                                      >
                                                        Other</option>
                                                </select>
                                                @error('Residence_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group d-flex align-items-center">
                                                <label for="proof_address" class="text-nowrap">Address Same as AdharCard
                                                    :</label>
                                            </div>
                                            <div class="form-group d-flex align-items-center">
                                                <div class="form-check ml-2 mr-2">
                                                    <input type="radio" class="form-check-input" id="peryes"
                                                        onClick="getperaddress(this)" name="proof_address[]"
                                                         data-index="${index}"
                                                        value="Yes">
                                                    <label class="form-check-label" for="yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="perno"
                                                        onClick="getperaddress(this)" name="proof_address[]"
                                                         data-index="${index}"
                                                        value="No">
                                                    <label class="form-check-label" for="no">No</label>
                                                </div>
                                            </div>
                                            @error('proof_address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="per_address" class="text-nowrap">Permanent Residence
                                                    Address</label>
                                                <input type="text" class="form-control address-${index}-new"
                                                    id="per_address" name="per_address[]"
                                                    value="">
                                                @error('per_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="per_landmark" class="text-nowrap">Landmark</label>
                                                <input type="text" class="form-control per-landmark-${index}-new" id="per_landmark"
                                                    name="per_landmark[]"
                                                    value="">
                                                @error('per_landmark')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_pincode" class="text-nowrap">Pin/Post Code</label>
                                                <input type="text" class="form-control pincode-input-${index}-new"
                                                    id="per_pincode" onInput="checkPincodeLength1(this)"
                                                    data-index="${index}"
                                                    name="per_pincode[]"
                                                    value="">
                                                @error('per_pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_city" class="text-nowrap">City/ Town</label>
                                                <select class="form-control city-${index}-new" id="per_city" name="per_city[]">
                                                </select>
                                                @error('per_city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_District" class="text-nowrap">District</label>
                                                <input type="text" class="form-control district-${index}-new " id="per_District"
                                                    name="per_District[]"
                                                    value="">
                                                @error('per_District')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_State" class="text-nowrap">State</label>
                                                <input type="text" class="form-control state-${index}-new" id="per_State"
                                                    name="per_State[]"
                                                    value="">
                                                @error('per_State')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_state_code" class="text-nowrap">State/UT code</label>
                                                <input type="text" class="form-control state-code-${index}-new"
                                                    id="per_state_code" name="per_state_code[]"
                                                    value="">
                                                @error('per_state_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_country_code" class="text-nowrap">ISO Country Code</label>
                                                <input type="text" class="form-control country-code-${index}-new"
                                                    id="per_country_code" name="per_country_code[]"
                                                    value="">
                                                @error('per_country_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="mobile" class="text-nowrap">Mobile No</label>
                                                <input type="text" class="form-control" id="mobile"
                                                    name="mobile[]"
                                                    value="">
                                                @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="email" class="text-nowrap">E-mail Address</label>
                                                <input type="text" class="form-control" id="email" name="email[]"
                                                    value="">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="pan" class="text-nowrap">PAN</label>
                                                <input type="text" class="form-control" id="pan" name="pan[]"
                                                    value="">
                                                @error('pan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="adhar" class="text-nowrap">AADHAR No</label>
                                                <input type="text" class="form-control" id="adhar" name="adhar[]"
                                                    value="">
                                                @error('adhar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    `);
            index++;
            // Clone the header row
            //const headerRow = partnerRowContainer.querySelector('.bg-red').cloneNode(true);
            // Clone the partner row template inside the click event
            // const partnerRowTemplate = partnerRowContainer.querySelector('#partner-row').cloneNode(
            //     true);
            // Clear input fields in the new row
            // const inputFields = partnerRowTemplate.querySelectorAll('input, select');
            // inputFields.forEach(function(input, index) {
            //     // alert('hello');
            //     console.log("log", $(input).attr('id'));
            //     console.log("index", index);
            //     if (input.type === 'checkbox') {
            //         // console.log(type)
            //         input.checked = false;
            //     } else {
            //         input.value = '';
            //         input.id = `${$(input).attr('name')}-${parseInt(Math.random(index * 2))}`;
            //         input.name = `${$(input).attr('name')}-${parseInt(Math.random(index * 2))}`;
            //     }
            // });
            // Toggle the plus/minus icon
            // const icon = headerRow.querySelector('i');
            // if (icon.classList.contains('fa-plus')) {
            //     icon.classList.remove('fa-plus');
            //     icon.classList.add('fa-minus');
            // }
            // // Append the new rows to the container
            // partnerRowContainer.appendChild(headerRow);
            // partnerRowContainer.appendChild(partnerRowTemplate);
            // // Add event listener to the minus button
            // const minusButton = headerRow.querySelector('.fa-minus');
            // minusButton.addEventListener('click', function() {
            //     // Remove the header row and the corresponding partner row
            //     partnerRowContainer.removeChild(headerRow);
            //     partnerRowContainer.removeChild(partnerRowTemplate);
            // });
            // // Add event listener to pincode input in the new row
            // addPincodeEventListener(partnerRowTemplate);
            $(document).on('click', '.remove-partner-row', function(e) {
                e.preventDefault();
                $(this).closest('.removerawdata').remove();
            });

            $(document).on('change','.relation_type', function()
            {
                $val = $(this).val();
                if($val == "Others")
                {
                    $(this).closest('.row').find('.hidden1').show();
                }
                else{
                    $(this).closest('.row').find('.hidden1').hide();
                }
            });

        });

        // Add event listener to the initial pincode input
        // const initialPincodeInput = partnerRowContainer.querySelector('.pincode-input');
        // addPincodeEventListener(initialPincodeInput);
    });


</script>

{{-- checkbox sinflr value store  --}}
<script>
    function doalert(id) {
        var checkboxes = document.querySelectorAll('input[name="relation_type[]"]');
        checkboxes.forEach(function(checkbox, index) {
            if (checkbox.id !== id) {
                checkbox.checked = false;
            } else {
                input.value = '';
                checkbox.id = `relation_type-${Math.floor(Math.random() * 1000)}-${index}`;
                checkbox.name = 'relation_type[]'; // Restore the original name
            }
        });
    }

    function doalertResidential(id) {
        var checkboxes = document.querySelectorAll('input[name="Residential_type[]"]');
        checkboxes.forEach(function(checkbox, index) {
            if (checkbox.id !== id) {
                checkbox.checked = false;
            } else {
                input.value = '';
                checkbox.id = `Residential_type-${Math.floor(Math.random() * 1000)}-${index}`;
                checkbox.name = 'Residential_type[]'; // Restore the original name
            }
        });
    }

    function doalertOccupation(id) {
        var checkboxes = document.querySelectorAll('input[name="Occupation_type[]"]');
        checkboxes.forEach(function(checkbox, index) {
            if (checkbox.id !== id) {
                checkbox.checked = false;
            } else {
                input.value = '';
                checkbox.id = `Occupation_type-${Math.floor(Math.random() * 1000)}-${index}`;
                checkbox.name = 'Occupation_type[]';
            }
        });
    }

    function doalertResidence(id) {
        var checkboxes = document.querySelectorAll('input[name="Residence_type[]"]');
        checkboxes.forEach(function(checkbox, index) {
            if (checkbox.id !== id) {
                checkbox.checked = false;
            } else {
                input.value = '';
                checkbox.id = `Residence_type-${Math.floor(Math.random() * 1000)}-${index}`;
                checkbox.name = 'Residence_type[]'; // Restore the original name
            }
        });
    }

    function doalertApplyAsCustomer(id) {
        // alert('hello');
        var checkboxes = document.querySelectorAll('input[name="apply_as_customer[]"]');
        checkboxes.forEach(function(checkbox) {
            if (checkbox.id !== id) {
                checkbox.checked = false;
            } else {
                input.value = '';
                checkbox.id = `apply_as_customer-${Math.floor(Math.random() * 1000)}-${index}`;
                checkbox.name = 'apply_as_customer[]';
            }
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        $(".relation_type").each(function() {
            let $val = $(this).val();
            if ($val == 'Others') {
                $(this).closest('.row').find('.hidden1').show();
            } else {
                $(this).closest('.row').find('.hidden1').hide();
            }
        });

        $(".relation_type").on("change", function() {
            $val = $(this).val();
            if ($val == 'Others') {
                $(this).closest('.row').find('.hidden1').show();
                // $(".hidden1").show();
            } else {
                $(this).closest('.row').find('.hidden1').hide();
                // $(".hidden1").hide();
            }
        });

    });

</script>
