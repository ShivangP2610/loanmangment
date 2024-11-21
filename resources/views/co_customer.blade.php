@push('title')
    <title>Co_Customer form</title>
@endpush
@extends('layout.main')

@section('main-section')
    <div class="content-wrapper">
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

                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <div class="form-group d-flex align-items-center">
                                            <label for="relation with applicant" class="text-nowrap">Relation with Applicant
                                                : </label>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Partner"
                                                    name="relation_type[]" value="Partner" onchange="doalert(this.id)"
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
                                                    name="relation_type[]" value="Proprietor" onchange="doalert(this.id)"
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
                                                    name="relation_type[]" value="Benificiary" onchange="doalert(this.id)"
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
                                </div>


                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <div class="form-group d-flex align-items-center">
                                            <label for="apply_as_customer" class="text-nowrap">Applying as Co-Borrower
                                                :</label>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="yes"
                                                    name="apply_as_customer[]" value="Yes"  onclick="doalertApplyAsCustomer(this.id)"
                                                    {{ old('apply_as_customer') == 'Yes' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yes">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="no"
                                                    name="apply_as_customer[]" value="No"  onclick="doalertApplyAsCustomer(this.id)"
                                                    {{ old('apply_as_customer') == 'No' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="no">No</label>
                                            </div>
                                        </div>
                                        @error('apply_as_customer')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                                                name="Shareholding[]" value="">
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

                                    <div class="form-group">
        <label for="Gender" class="text-nowrap">Gender</label>
        <select class="form-control" id="Gender" name="Gender[]">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        @error('Gender')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-lg-3">
    <div class="form-group">
        <label for="Marital_Status" class="text-nowrap">Marital Status</label>
        <select class="form-control" id="Marital_Status" name="Marital_Status[]">
            <option value="Single">Single</option>
            <option value="Married">Married</option>
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

                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <div class="form-group d-flex align-items-center">
                                            <label for="Residential" class="text-nowrap">Residential Status : </label>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Resident_Individual"
                                                    name="Residential_type[]" value="Resident Individual" onchange="doalertResidential(this.id)"
                                                    {{ in_array('Resident Individual', old('Residential_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Resident Individual">Resident Individual</label>
                                            </div>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Non_Resident_India"
                                                    name="Residential_type[]" value="Non Resident India" onchange="doalertResidential(this.id)"
                                                    {{ in_array('Non Resident India', old('Residential_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Non Resident India">Non Resident India</label>
                                            </div>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Foreign_National"
                                                    name="Residential_type[]" value="Foreign National" onchange="doalertResidential(this.id)"
                                                    {{ in_array('Foreign National', old('Residential_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Foreign National"> Foreign National </label>
                                            </div>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" 
                                                    id="Person_of_Indian_Origin" name="Residential_type[]"
                                                    value="Person of Indian Origin"  onchange="doalertResidential(this.id)"
                                                    {{ in_array('Person of Indian Origin', old('Residential_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Person of Indian Origin">Person of Indian Origin</label>
                                            </div>


                                        </div>
                                        @error('Residential_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <div class="form-group d-flex align-items-center">
                                            <label for="Residential" class="text-nowrap">Occupation type : </label>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Service"
                                                    name="Occupation_type[]" value="Service"  onchange="doalertOccupation(this.id)"
                                                    {{ in_array('Service', old('Occupation_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Service">Service: (Private Sector/ Public Sector / Govt.
                                                    Sector)</label>
                                            </div>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Business"
                                                    name="Occupation_type[]" value="Business"  onchange="doalertOccupation(this.id)"
                                                    {{ in_array('Business', old('Occupation_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Business">Business: (Any)</label>
                                            </div>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Not_categorized"
                                                    name="Occupation_type[]" value="Not categorized"  onchange="doalertOccupation(this.id)"
                                                    {{ in_array('Not categorized', old('Occupation_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Not categorized"> Not categorized
                                                </label>
                                            </div>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Others"
                                                    name="Occupation_type[]" value="Others"  onchange="doalertOccupation(this.id)"
                                                    {{ in_array('Others', old('Occupation_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;" for="Others">
                                                    Others: (Professional / Self Employed / Retired / Housewife/Student)
                                                </label>
                                            </div>

                                        </div>
                                        @error('Occupation_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                              

                                {{-- Current  address detials --}}
                                <div class="row mb-1">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="current_address" class="text-nowrap">Current Residence
                                                Address</label>
                                            <input type="text" class="form-control" id="current_address"
                                                name="current_address[]" value="">
                                            @error('current_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="current_landmark" class="text-nowrap">Landmark</label>
                                            <input type="text" class="form-control" id="current_landmark"
                                                name="current_landmark[]" value="">
                                            @error('current_landmark')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="pincode" class="text-nowrap">Pin/Post Code</label>
                                            <input type="text" class="form-control" id="pincode"
                                                onInput="checkPincodeLength(this)" name="pincode[]" value="">
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
                                            <input type="text" class="form-control district" id="District" name="District[]"
                                                value="">
                                            @error('District')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="State" class="text-nowrap">State</label>
                                            <input type="text" class="form-control state" id="State" name="State[]"
                                                value="">
                                            @error('State')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                   

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="state_code" class="text-nowrap">State/UT code</label>
                                            <input type="text" class="form-control state-code" id="state_code" name="state_code[]"
                                                value="">
                                            @error('state_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="country_code" class="text-nowrap">ISO Country Code</label>
                                            <input type="text" class="form-control country-code" id="country_code"
                                                name="country_code[]" value="">
                                            @error('country_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <div class="form-group d-flex align-items-center">
                                            <label for="Residential" class="text-nowrap">Residence Type : </label>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Rented"
                                                    name="Residence_type[]" value="Rented" onchange="doalertResidence(this.id)"
                                                    {{ in_array('Rented', old('Residence_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Rented">Rented</label>
                                            </div>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Owned"
                                                    name="Residence_type[]" value="Owned" onchange="doalertResidence(this.id)"
                                                    {{ in_array('Non Resident India', old('Residence_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Owned">Owned</label>
                                            </div>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Parental"
                                                    name="Residence_type[]" value="Parental" onchange="doalertResidence(this.id)"
                                                    {{ in_array('Parental', old('Residence_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Parental">Parental</label>
                                            </div>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="checkbox" class="form-check-input" id="Other"
                                                    name="Residence_type[]" value="Other" onchange="doalertResidence(this.id)"
                                                    {{ in_array('Other', old('Residence_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size:12px;"
                                                    for="Other">Other</label>
                                            </div>


                                        </div>
                                        @error('Residence_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 ">
                                        <div class="form-group d-flex align-items-center ">
                                            <label for="residance_year" class="text-nowrap ml-2">No. of years in current
                                                residence:</label>
                                            <input type="text" class="form-control ml-2" id="residance_year"
                                                name="residance_year[]" value="">
                                            @error('residance_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- address as per prrof --}}
                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <div class="form-group d-flex align-items-center">
                                            <label for="proof_address" class="text-nowrap">Address as per proof of
                                                address/ proof of identity? :</label>
                                            <div class="form-check ml-2 mr-2">
                                                <input type="radio" class="form-check-input" id="yes"
                                                    name="proof_address[]" value="Yes"  onClick="getperaddress(this)"
                                                    {{ old('proof_address') == 'Yes' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yes">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="no"
                                                    name="proof_address[]" value="No"  onClick="getperaddress(this)"
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
                                            <input type="text" class="form-control permanent_address" id="per_address"
                                                name="per_address[]" value="">
                                            @error('per_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="per_landmark" class="text-nowrap">Landmark</label>
                                            <input type="text" class="form-control landmark" id="per_landmark"
                                                name="per_landmark[]" value="">
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
                                                name="per_pincode[]" value="">
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
                                                name="per_District[]" value="">
                                            @error('per_District')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="per_State" class="text-nowrap">State</label>
                                            <input type="text" class="form-control per_state" id="per_State" name="per_State[]"
                                                value="">
                                            @error('per_State')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="per_state_code" class="text-nowrap">State/UT code</label>
                                            <input type="text" class="form-control per_state_code" id="per_state_code"
                                                name="per_state_code[]" value="">
                                            @error('per_state_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="per_country_code" class="text-nowrap">ISO Country Code</label>
                                            <input type="text" class="form-control per_country_code" id="per_country_code"
                                                name="per_country_code[]" value="">
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
                                            <input type="text" class="form-control" id="mobile" name="mobile[]"
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

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="Form 60" class="text-nowrap">Form 60</label>
                                            <input type="text" class="form-control" id="form60" name="form60[]"
                                                value="">
                                            @error('form60')
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
                        // alert('hellooo');
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
            const partnerRowTemplate = partnerRowContainer.querySelector('#partner-row').cloneNode(
                true);

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

<script>
    function doalert(id) {
        var checkboxes = document.querySelectorAll('input[name="relation_type[]"]'); 
        // alert('hello1234');
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
