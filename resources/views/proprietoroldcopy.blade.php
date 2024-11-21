@push('title')
    <title>Proprietor form</title>
@endpush
@extends('layout.main')

@section('main-section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            {{-- <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Add Permission</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid --> --}}
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


                    {{-- <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <a href="{{route('officeuse')}}">
                                    <li class="list-group-item {{ request()->routeIs('officeuse') ? 'active' : '' }}">For Office Use Only<span class="badge bg-success ml-3"><i class="fa fa-check" aria-hidden="flase"></i></span></li>
                                </a>
                                <a href="{{route('customeruse')}}">
                                    <li class="list-group-item {{ request()->routeIs('customeruse') ? 'active' : '' }}">BORROWER DETAILS<span class="badgetext badge bg-success"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                                </a>
                                <a href="#">
                                    <li class="list-group-item">PROPRIETOR DETAILS<span class="badgetext badge bg-success"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                                </a>
                                <a href="#">
                                    <li class="list-group-item">CO-BORROWER DETAILS<span class="badgetext badge bg-success"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div> --}}


                    @include('sidebar')


                    <div class="col-lg-9">
                        <form action="{{ url($url) }}" method="POST">
                            @csrf <!-- Include CSRF token for Laravel form submission -->

                            <div id='partner-row-container'>

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
                                                    <!-- {{ $Proprietordata->title ?? old('title') }} -->
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>  
                                       

                                        <div class="col-lg-6 mt-5">
                                            <div class="form-group">
                                                <label for="fullname" class="text-nowrap">Full Name</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname[]"
                                                    value="{{ isset($Proprietordata->proprietor_name) ? $Proprietordata->proprietor_name : old('proprietor_name') }}">
                                                @error('fullname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <!-- <div class="row mb-1">   
                                        <div class="col-lg-12">
                                            <div class="form-group d-flex align-items-center">
                                                <label for="relation with applicant" class="text-nowrap">Relation with
                                                    Applicant : </label>
                                                <div class="form-check ml-2 mr-2">
                                                    <input type="checkbox" class="form-check-input" id="Partner"
                                                        name="relation_type[]" onchange="doalert(this.id)" value="Partner"
                                                        {{ in_array('Partner', old('relation_type', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Partner">Partner</label>
                                                </div>
                                                <div class="form-check ml-2 mr-2">
                                                    <input type="checkbox" class="form-check-input" id="Director"
                                                        name="relation_type[]" value="Director" onchange="doalert(this.id)"
                                                        {{ in_array('Director', old('relation_type', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Director">Director</label>
                                                </div>
                                                <div class="form-check ml-2 mr-2">
                                                    <input type="checkbox" class="form-check-input" id="Proprietor"
                                                        name="relation_type[]" value="Proprietor"
                                                        onchange="doalert(this.id)"
                                                        {{ in_array('Proprietor', old('relation_type', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Proprietor">Proprietor</label>
                                                </div>
                                                <div class="form-check ml-2 mr-2">
                                                    <input type="checkbox" class="form-check-input" id="Promoter"
                                                        name="relation_type[]" value="Promoter" onchange="doalert(this.id)"
                                                        {{ in_array('Promoter', old('relation_type', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Promoter">Promoter</label>
                                                </div>
                                                <div class="form-check ml-2 mr-2">
                                                    <input type="checkbox" class="form-check-input" id="Karta"
                                                        name="relation_type[]" value="Karta" onchange="doalert(this.id)"
                                                        {{ in_array('Karta', old('relation_type', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Karta">Karta</label>
                                                </div>
                                                <div class="form-check ml-2 mr-2">
                                                    <input type="checkbox" class="form-check-input" id="Benificiary"
                                                        name="relation_type[]" value="Benificiary"
                                                        onchange="doalert(this.id)"
                                                        {{ in_array('Benificiary', old('relation_type', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Benificiary">Benificiary</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="Others"
                                                        name="relation_type[]" value="Others" onchange="doalert(this.id)"
                                                        {{ in_array('Others', old('relation_type', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Others">Others</label>
                                                </div>

                                            </div>
                                            @error('application_type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>   -->   

                                    <div class="row"> 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                              <label for="Gender" class="text-nowrap">Relation with Applican</label>
                               <select class="form-control" id="relation_type" name="relation_type[]">
                                 <option value="Partner" {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Partner' ? 'selected' : '' }}>Partner</option>
                              <option value="Director" {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Director' ? 'selected' : '' }}>Director</option> 
                              <option value="Proprietor" {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Proprietor' ? 'selected' : '' }}>Proprietor</option>
                              <option value="Promoter" {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Promoter' ? 'selected' : '' }}>Promoter</option> 
                              <option value="Karta" {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Karta' ? 'selected' : '' }}>Karta</option>
                              <option value="Benificiary" {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Benificiary' ? 'selected' : '' }}>Benificiary</option> 
                              <option value="Others" {{ isset($Proprietordata->relation_with_applicant) && $Proprietordata->relation_with_applicant == 'Others' ? 'selected' : '' }}>Others</option>
                                    </select>
                                     @error('relation_type')
                                   <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                          </div>

                                            </div>  


                                            <div class="col-lg-6">
                                        <div class="form-group">
                              <label for="Gender" class="text-nowrap">Applying as Co-Borrower</label>
                               <select class="form-control" id="relation_type" name="apply_as_customer[]">
                                 <option value="Yes" {{ isset($Proprietordata->applying_as_co_borrower) && $Proprietordata->applying_as_co_borrower == 'Yes' ? 'selected' : '' }}>Yes</option>
                              <option value="No" {{ isset($Proprietordata->applying_as_co_borrower) && $Proprietordata->applying_as_co_borrower == 'No' ? 'selected' : '' }}>No</option> 
                              
                                    </select>
                                     @error('relation_type')
                                   <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                          </div>

                                            </div>
                    </div>
                              


                                    <!-- <div class="row mb-1">
                                        <div class="col-lg-6">
                                            <div class="form-group d-flex align-items-center">
                                                <label for="apply_as_customer" class="text-nowrap">Applying as Co-Borrower
                                                    :</label>
                                                <div class="form-check ml-2 mr-2">
                                                    <input type="checkbox" class="form-check-input" id="yes"
                                                        name="apply_as_customer[]" value="Yes"
                                                        onclick="doalertApplyAsCustomer(this.id)"
                                                        {{ old('apply_as_customer') == 'Yes' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="no"
                                                        name="apply_as_customer[]" value="No"
                                                        onclick="doalertApplyAsCustomer(this.id)"
                                                        {{ old('apply_as_customer') == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="no">No</label>
                                                </div>
                                            </div>
                                            @error('apply_as_customer')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> -->


                                    <div class="row mb-1">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="f/s name" class="text-nowrap">Father Name/ Spouse Name</label>
                                                <input type="text" class="form-control" id="f_s_name"
                                                    name="f_s_name[]" value="{{ isset($Proprietordata->father_or_spouse_name) ? $Proprietordata->father_or_spouse_name : old('father_or_spouse_name') }}">
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
                                                    name="Shareholding[]" value="{{ isset($Proprietordata->shareholding_with_cust_entity) ? $Proprietordata->shareholding_with_cust_entity : old('shareholding_with_cust_entity') }}">
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
                                 <option value="male" {{ isset($Proprietordata->Gender) && $Proprietordata->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                              <option value="female" {{ isset($Proprietordata->Gender) && $Proprietordata->Gender == 'Female' ? 'selected' : '' }}>Female</option>
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
            <option value="Single"{{ isset($Proprietordata->Marital_Status) &&  $Proprietordata->Marital_Status == 'Single' ? 'selected' : ''}}>Single</option> 
            <option value="Married"{{ isset($Proprietordata->Marital_Status) &&  $Proprietordata->Marital_Status == 'Married' ? 'selected' : ''}}>Married</option>
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
            <option value="Indian"{{ isset($Proprietordata->Citizenship) &&  $Proprietordata->Citizenship == 'Indian' ? 'selected' : ''}}>Indian</option>
            <option value="NRI" {{ isset($Proprietordata->Citizenship) &&  $Proprietordata->Citizenship == 'NRI' ? 'selected' : ''}}>NRI</option>
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
        <label for="Residential_type" class="text-nowrap">Residential Status</label>
        <select class="form-control" id="Resident_Individual" name="Residential_type[]">
            <option value="Resident Individual"{{ isset($Proprietordata->Residential_Status) &&  $Proprietordata->Residential_Status == 'Resident Individual' ? 'selected' : ''}}>Resident Individual</option>
            <option value="Non Resident India" {{ isset($Proprietordata->Residential_Status) &&  $Proprietordata->Residential_Status == 'Non Resident India' ? 'selected' : ''}}>Non Resident India</option>
      
        <option value="Foreign National" {{ isset($Proprietordata->Residential_Status) &&  $Proprietordata->Residential_Status == 'Foreign National' ? 'selected' : ''}}>Foreign National</option>
        <option value="Person of Indian Origin" {{ isset($Proprietordata->Residential_Status) &&  $Proprietordata->Residential_Status == 'Person of Indian Origin' ? 'selected' : ''}}>Person of Indian Origin</option> 
        </select>
        @error('Residential_type')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

                                    

                                     

                                    <div class="col-lg-6">
    <div class="form-group">
        <label for="Residential_type" class="text-nowrap">Occupation type</label>
        <select class="form-control" id="Resident_Individual" name="Occupation_type[]">
            <option value="Service"{{ isset($Proprietordata->Occupation_type) &&  $Proprietordata->Occupation_type == 'Service' ? 'selected' : ''}}>Service</option>
            <option value="Business" {{ isset($Proprietordata->Occupation_type) &&  $Proprietordata->Occupation_type == 'Business' ? 'selected' : ''}}>Business</option>
      
        <option value="Not categorized" {{ isset($Proprietordata->Occupation_type) &&  $Proprietordata->Occupation_type == 'Not categorized' ? 'selected' : ''}}>Not categorized</option>
        <option value="Others" {{ isset($Proprietordata->Occupation_type) &&  $Proprietordata->Occupation_type == 'Others' ? 'selected' : ''}}>Others</option> 
        </select>
        @error('Occupation_type')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
                    </div>

    



                                    {{-- Current  address detials --}}
                                    <div class="row mb-1">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="current_address" class="text-nowrap">Current Residence
                                                    Address</label>
                                                <input type="text" class="form-control address" id="current_address"
                                                    name="current_address[]"  value="{{ isset($Proprietordata->Current_Residence_Address) ? $Proprietordata->Current_Residence_Address : old('Current_Residence_Address') }}">
                                                @error('current_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="current_landmark" class="text-nowrap">Landmark</label>
                                                <input type="text" class="form-control per-landmark"
                                                    id="current_landmark" name="current_landmark[]" value="{{ isset($Proprietordata->Current_Landmark) ? $Proprietordata->Current_Landmark : old('Current_Landmark') }}">
                                                @error('current_landmark')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="pincode" class="text-nowrap">Pin/Post Code</label>
                                                <input type="text" class="form-control pincode-input" id="pincode"
                                                    onInput="checkPincodeLength(this)" name="pincode[]" value="{{ isset($Proprietordata->Current_pincode) ? $Proprietordata->Current_pincode : old('Current_pincode') }}">
                                                @error('pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="city" class="text-nowrap">City/ Town</label>
                                                <select class="form-control city" id="city" name="city[]">
                                                </select>
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="District" class="text-nowrap">District</label>
                                                <input type="text" class="form-control district" id="District"
                                                    name="District[]" value="{{ isset($Proprietordata->Current_District) ? $Proprietordata->Current_District : old('Current_District') }}">
                                                @error('District')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="State" class="text-nowrap">State</label>
                                                <input type="text" class="form-control state" id="State"
                                                    name="State[]" value="{{ isset($Proprietordata->Current_State) ? $Proprietordata->Current_State : old('Current_State') }}">
                                                @error('State')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="state_code" class="text-nowrap">State/UT code</label>
                                                <input type="text" class="form-control state-code" id="state_code"
                                                    name="state_code[]" value="{{ isset($Proprietordata->Current_State_code) ? $Proprietordata->Current_State_code : old('Current_State_code') }}">
                                                @error('state_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="country_code" class="text-nowrap">ISO Country Code</label>
                                                <input type="text" class="form-control country-code" id="country_code"
                                                    name="country_code[]" value="{{ isset($Proprietordata->Current_Country_Code) ? $Proprietordata->Current_Country_Code : old('Current_Country_Code') }}">
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
            <option value="Rented"{{ isset($Proprietordata->Residence_Type) &&  $Proprietordata->Residence_Type == 'Rented' ? 'selected' : ''}}>Rented</option>
            <option value="Owned" {{ isset($Proprietordata->Residence_Type) &&  $Proprietordata->Residence_Type == 'Owned' ? 'selected' : ''}}>Owned</option>
      
        <option value="Parental" {{ isset($Proprietordata->Residence_Type) &&  $Proprietordata->Residence_Type == 'Parental' ? 'selected' : ''}}>Parental</option>
        <option value="Other" {{ isset($Proprietordata->Residence_Type) &&  $Proprietordata->Residence_Type == 'Other' ? 'selected' : ''}}>Other</option> 
        </select>
        @error('Residence_type')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>  
<div class="col-lg-6">
    <div class="form-group d-flex align-items-center">
        <label for="proof_address" class="text-nowrap">Address Same as AdharCard :</label>
    </div>
    <div class="form-group d-flex align-items-center">
        <div class="form-check ml-2 mr-2">
            <input type="radio" class="form-check-input" id="yes" onClick="getperaddress(this)" name="proof_address[]" value="Yes" {{ old('proof_address') == 'Yes' ? 'checked' : '' }}> 
            <label class="form-check-label" for="yes">Yes</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="no" onClick="getperaddress(this)" name="proof_address[]" value="No" {{ old('proof_address') == 'No' ? 'checked' : '' }}>
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
                                                <input type="text" class="form-control permanent_address"
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
                                                <input type="text" class="form-control landmark" id="per_landmark"
                                                    name="per_landmark[]" value="{{ isset($Proprietordata->Permanent_Landmark) ? $Proprietordata->Permanent_Landmark : old('Permanent_Landmark') }}">
                                                @error('per_landmark')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_pincode" class="text-nowrap">Pin/Post Code</label>
                                                <input type="text" class="form-control pincode-input1"
                                                    id="per_pincode" onInput="checkPincodeLength1(this)"
                                                    name="per_pincode[]" value="{{ isset($Proprietordata->Permanent_pincode) ? $Proprietordata->Permanent_pincode : old('Permanent_pincode') }}">
                                                @error('per_pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_city" class="text-nowrap">City/ Town</label>
                                                <select class="form-control per_city" id="per_city" name="per_city[]">
                                                </select>
                                                @error('per_city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_District" class="text-nowrap">District</label>
                                                <input type="text" class="form-control per_district" id="per_District"
                                                    name="per_District[]" value="{{ isset($Proprietordata->Permanent_District) ? $Proprietordata->Permanent_District : old('Permanent_District') }}">
                                                @error('per_District')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_State" class="text-nowrap">State</label>
                                                <input type="text" class="form-control per_state" id="per_State"
                                                    name="per_State[]" value="{{ isset($Proprietordata->Permanent_State) ? $Proprietordata->Permanent_State : old('Permanent_State') }}">
                                                @error('per_State')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_state_code" class="text-nowrap">State/UT code</label>
                                                <input type="text" class="form-control per_state_code"
                                                    id="per_state_code" name="per_state_code[]" value="{{ isset($Proprietordata->Permanent_State_code) ? $Proprietordata->Permanent_State_code : old('Permanent_State_code') }}">
                                                @error('per_state_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="per_country_code" class="text-nowrap">ISO Country Code</label>
                                                <input type="text" class="form-control per_country_code"
                                                    id="per_country_code" name="per_country_code[]" value="{{ isset($Proprietordata->Permanent_Country_Code) ? $Proprietordata->Permanent_Country_Code : old('Permanent_Country_Code') }}">
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
                                                    name="mobile[]" value="{{ isset($Proprietordata->proprietor_Mobile_no) ? $Proprietordata->proprietor_Mobile_no : old('proprietor_Mobile_no') }}">
                                                @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="email" class="text-nowrap">E-mail Address</label>
                                                <input type="text" class="form-control" id="email" name="email[]"
                                                    value="{{ isset($Proprietordata->proprietor_email) ? $Proprietordata->proprietor_email : old('proprietor_email') }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="pan" class="text-nowrap">PAN</label>
                                                <input type="text" class="form-control" id="pan" name="pan[]"
                                                    value="{{ isset($Proprietordata->proprietor_pannumber) ? $Proprietordata->proprietor_pannumber : old('proprietor_pannumber') }}">
                                                @error('pan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                     

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="adhar" class="text-nowrap">AADHAR No</label>
                                                <input type="text" class="form-control" id="adhar" name="adhar[]"
                                                    value="{{ isset($Proprietordata->proprietor_adharnumber) ? $Proprietordata->proprietor_adharnumber : old('proprietor_adharnumber') }}">
                                                @error('adhar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> 
                                     </div>

                                </div> {{-- partner-row end --}}
                            </div> {{-- partner-row-container end --}}
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
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection

<script>
    function checkPincodeLength(input, row) {


        var pincode = input.value;

        if (pincode.length === 6) {

            getdetailsmain(input, row);
        }
    }


    //3-5-24
    function getdetailsmain(pincodeInput) {
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
                    $(row).find('.city').empty();
                    cities.forEach(function(city) {
                        $(row).find('.city').append($('<option>', {
                            value: city.Name,
                            text: city.Name
                        }));
                    });
                    $(row).find('.district').val(district);
                    $(row).find('.state').val(state);

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
                            $(row).find('.state-code').val(stateCode);
                            $(row).find('.country-code').val(countryCode);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error); // Log any AJAX errors for debugging
                }
            });
        }
    }



    function checkPincodeLength1(input) {
        var pincode = input.value;

        // Check if pincode length is equal to 6
        if (pincode.length === 6) {
            // Call getdetails() function 

            getdetailsmain1(input);
        }
    }

    function getdetailsmain1(pincodeInput) {
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
                    $(row).find('.per_city').empty();
                    cities.forEach(function(city) {
                        $(row).find('.per_city').append($('<option>', {
                            value: city.Name,
                            text: city.Name
                        }));
                    });
                    $(row).find('.per_district').val(district);
                    $(row).find('.per_state').val(state);

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
                            $(row).find('.per_state_code').val(stateCode);
                            $(row).find('.per_country_code').val(countryCode);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error); // Log any AJAX errors for debugging
                }
            });
        }
    }


    function getperaddress(input) {

        var val = $(input).val();
        var row = $(input).closest('.row');
        //alert(val);

        if (val === 'Yes') {
            //  alert('no');
            console.log("row", row);
            // alert('kya bantai');
            // Disable all fields in the same row
            $(".permanent_address").prop('readonly', true);
            $(".landmark").prop('readonly', true);
            $(".pincode-input1").prop('readonly', true);
            $(".per_city").prop('readonly', true);
            $(".per_District").prop('readonly', true);
            $(".per_State").prop('readonly', true);
            $(".per_state_code").prop('readonly', true);
            $(".per_country_code").prop('readonly', true);


            var address = $("#current_address").val();
            var landmark = $("#current_landmark").val();
            var pincode = $("#pincode").val();
            var city = $("#city").val();
            var district = $("#District").val();
            var state = $('input[name="State[]"]').val();
            var state_code = $("#state_code").val();
            var country_code = $("#country_code").val();
            // console.log("staate", country_code);

            // Implement data into permanent office address fields
            $(".permanent_address").val(address);
            $(".landmark").val(landmark);
            $(".pincode-input1").val(pincode);
            $(".per_District").val(district);
            $(".per_State").val(state);
            $(".per_state_code").val(state_code);
            $(".per_country_code").val(country_code);

            if (city) {
                $('.per_city').empty();
                $('.per_city').append($('<option>', {
                    value: city,
                    text: city
                }));
            }
        } else {
            // Enable all fields and clear values in the same row
            $(".permanent_address").prop('readonly', false);
            $(".landmark").prop('readonly', false);
            $(".pincode-input1").prop('readonly', false);
            $(".per_city").prop('readonly', false);
            $(".per_District").prop('readonly', false);
            $(".per_State").prop('readonly', false);
            $(".per_state_code").prop('readonly', false);
            $(".per_country_code").prop('readonly', false);

            $(".permanent_address").val('');
            $(".pincode-input1").val('');
            $(".per_city").val('');
            $(".per_District").val('');
            $(".per_State").val('');
            $(".per_state_code").val('');
            $(".per_country_code").val('');
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
            daddress.addEventListener('input', function() {
                getperaddress(daddress);
                // getdetailsmain(pincodeInput);    // change 3-5-24
            });

        }

        // Add an event listener to the plus button
        addPartnerRowButton.addEventListener('click', function() {
            // Clone the header row
            const headerRow = partnerRowContainer.querySelector('.bg-red').cloneNode(true);

            // Clone the partner row template inside the click event
            const partnerRowTemplate = partnerRowContainer.querySelector('#partner-row').cloneNode( true);

            // Clear input fields in the new row
            const inputFields = partnerRowTemplate.querySelectorAll('input, select');

            inputFields.forEach(function(input, index) {
                // alert('hello');
                console.log("log", $(input).attr('id'));
                console.log("index", index);
                if (input.type === 'checkbox') {
                    input.checked = false;
                } else {
                    input.value = '';
                    input.id = `${$(input).attr('name')}-${parseInt(Math.random(index * 2))}`;
                    input.name = `${$(input).attr('name')}-${parseInt(Math.random(index * 2))}`;
                }
            });

            // Toggle the plus/minus icon
            const icon = headerRow.querySelector('i');
            if (icon.classList.contains('fa-plus')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            }

            // Append the new rows to the container
            partnerRowContainer.appendChild(headerRow);
            partnerRowContainer.appendChild(partnerRowTemplate);

            // Add event listener to the minus button
            const minusButton = headerRow.querySelector('.fa-minus');
            minusButton.addEventListener('click', function() {
                // Remove the header row and the corresponding partner row
                partnerRowContainer.removeChild(headerRow);
                partnerRowContainer.removeChild(partnerRowTemplate);
            });

            // Add event listener to pincode input in the new row
            addPincodeEventListener(partnerRowTemplate);
        });

        // Add event listener to the initial pincode input
        const initialPincodeInput = partnerRowContainer.querySelector('.pincode-input');
        addPincodeEventListener(initialPincodeInput);
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
