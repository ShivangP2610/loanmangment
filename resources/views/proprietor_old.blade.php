@push('title')
<title>Proprietor form</title>
@endpush
@extends("layout.main")

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
                    <form action="{{url($url)}}" method="POST">
                        @csrf <!-- Include CSRF token for Laravel form submission -->


                        <div class="row mb-3 bg-red">
                            <div>
                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{$title}}</h6>
                            </div>
                        </div>

                        {{-- <div class="row mb-1">
                            <div class="col-log-4">
                                <img src="{{url('admin/dist/img/AdminLTELogo.png')}}" alt="Image" class="img-fluid" height="150" width="150">
                            </div>
                        </div> --}}

                        <div class="row mb-2">

                            <div class="col-log-4">
                                <img src="{{url('admin/dist/img/AdminLTELogo.png')}}" alt="Image" class="img-fluid" height="150" width="150">
                            </div>

                            <div class="col-lg-2 mt-5 ml-5">
                                <div class="form-group">
                                    <label for="title" class="text-nowrap">Title</label>
                                    <input type="text" class="form-control"  id="title" name="title" value="{{old('title')}}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 mt-5">
                                <div class="form-group">
                                    <label for="fullname" class="text-nowrap">Full Name</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" value="{{old('fullname')}}">
                                    @error('fullname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row mb-1">
                            <div class="col-lg-12">
                             <div class="form-group d-flex align-items-center">
                                 <label for="relation with applicant" class="text-nowrap">Relation with Applicant : </label>
                                 <div class="form-check ml-2 mr-2">
                                     <input type="checkbox" class="form-check-input" id="Partner" name="relation_type[]" value="Partner" {{ in_array('Partner', old('relation_type', [])) ? 'checked' : '' }}>
                                     <label class="form-check-label" for="Partner">Partner</label>
                                 </div>
                                 <div class="form-check ml-2 mr-2">
                                     <input type="checkbox" class="form-check-input" id="Director" name="relation_type[]" value="Director" {{ in_array('Director', old('relation_type', [])) ? 'checked' : '' }}>
                                     <label class="form-check-label" for="Director">Director</label>
                                 </div>
                                 <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Proprietor" name="relation_type[]" value="Proprietor" {{ in_array('Proprietor', old('relation_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Proprietor">Proprietor</label>
                                </div>
                                <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Promoter" name="relation_type[]" value="Promoter" {{ in_array('Promoter', old('relation_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Promoter">Promoter</label>
                                </div>
                                <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Karta" name="relation_type[]" value="Karta" {{ in_array('Karta', old('relation_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Karta">Karta</label>
                                </div>
                                <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Benificiary" name="relation_type[]" value="Benificiary" {{ in_array('Benificiary', old('relation_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Benificiary">Benificiary</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="Others" name="relation_type[]" value="Others" {{ in_array('Others', old('relation_type', [])) ? 'checked' : '' }}>
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
                                    <label for="apply_as_customer" class="text-nowrap">Applying as Co-Borrower :</label>
                                    <div class="form-check ml-2 mr-2">
                                        <input type="radio" class="form-check-input" id="yes" name="apply_as_customer" value="Yes" {{ old('apply_as_customer') == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="no" name="apply_as_customer" value="No" {{ old('apply_as_customer') == 'No' ? 'checked' : '' }}>
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
                                    <input type="text" class="form-control"  id="f_s_name" name="f_s_name" value="{{old('f_s_name')}}">
                                    @error('f_s_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Shareholding" class="text-nowrap">Shareholding % in Borrowing Entity</label>
                                    <input type="text" class="form-control" id="Shareholding" name="Shareholding" value="{{old('Shareholding')}}">
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
                                    <input type="date" class="form-control" id="dob" name="dob" value="{{old('dob')}}">
                                    @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="Gender" class="text-nowrap">Gender</label>
                                    <input type="text" class="form-control" id="Gender" name="Gender" value="{{old('Gender')}}">
                                    @error('Gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="Marital Status" class="text-nowrap">Marital Status</label>
                                    <input type="text" class="form-control" id="Marital_Status" name="Marital_Status" value="{{old('Marital_Status')}}">
                                    @error('Marital_Status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="Citizenship" class="text-nowrap">Citizenship</label>
                                    <input type="text" class="form-control" id="Citizenship" name="Citizenship" value="{{old('Citizenship')}}">
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
                                     <input type="checkbox" class="form-check-input" id="Resident_Individual" name="Residential_type[]" value="Resident Individual" {{ in_array('Resident Individual', old('Residential_type', [])) ? 'checked' : '' }}>
                                     <label class="form-check-label" style="font-size:12px;" for="Resident Individual">Resident Individual</label>
                                 </div>
                                 <div class="form-check ml-2 mr-2">
                                     <input type="checkbox" class="form-check-input" id="Non_Resident_India" name="Residential_type[]" value="Non Resident India" {{ in_array('Non Resident India', old('Residential_type', [])) ? 'checked' : '' }}>
                                     <label class="form-check-label" style="font-size:12px;"  for="Non Resident India">Non Resident India</label>
                                 </div>
                                 <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Foreign_National" name="Residential_type[]" value="Foreign National" {{ in_array('Foreign National', old('Residential_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" style="font-size:12px;" for="Foreign National"> Foreign National </label>
                                </div>
                                <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Person_of_Indian_Origin" name="Residential_type[]" value="Person of Indian Origin" {{ in_array('Person of Indian Origin', old('Residential_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" style="font-size:12px;"  for="Person of Indian Origin">Person of Indian Origin</label>
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
                                     <input type="checkbox" class="form-check-input" id="Service" name="Occupation_type[]" value="Service" {{ in_array('Service', old('Occupation_type', [])) ? 'checked' : '' }}>
                                     <label class="form-check-label" style="font-size:12px;" for="Service">Service: (Private Sector/ Public Sector / Govt. Sector)</label>
                                 </div>
                                 <div class="form-check ml-2 mr-2">
                                     <input type="checkbox" class="form-check-input" id="Business" name="Occupation_type[]" value="Business" {{ in_array('Business', old('Occupation_type', [])) ? 'checked' : '' }}>
                                     <label class="form-check-label" style="font-size:12px;" for="Business">Business: (Any)</label>
                                 </div>
                                 <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Not_categorized" name="Occupation_type[]" value="Not categorized" {{ in_array('Not categorized', old('Occupation_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" style="font-size:12px;" for="Not categorized"> Not categorized
                                    </label>
                                </div>
                                <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Others" name="Occupation_type[]" value="Others" {{ in_array('Others', old('Occupation_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" style="font-size:12px;" for="Others">  Others: (Professional / Self Employed / Retired / Housewife/Student)
                                    </label>
                                </div>

                             </div>
                                 @error('Occupation_type')
                                     <div class="text-danger">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <div class="form-group d-flex align-items-center">
                                    <label for="different_address" class="text-nowrap">Different from Permanent address? :</label>
                                    <div class="form-check ml-2 mr-2">
                                        <input type="radio" class="form-check-input" id="yes" name="different_address" value="Yes" {{ old('different_address') == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="no" name="different_address" value="No" {{ old('different_address') == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="no">No</label>
                                    </div>
                                </div>
                                @error('different_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Current  address detials --}}
                        <div class="row mb-1">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="current_address" class="text-nowrap">Current Residence Address</label>
                                    <input type="text" class="form-control" id="current_address" name="current_address" value="{{old('current_address')}}">
                                    @error('current_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="current_landmark" class="text-nowrap">Landmark</label>
                                    <input type="text" class="form-control" id="current_landmark" name="current_landmark" value="{{old('current_landmark')}}">
                                    @error('current_landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="city" class="text-nowrap">City/ Town</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="District" class="text-nowrap">District</label>
                                    <input type="text" class="form-control" id="District" name="District" value="{{old('District')}}">
                                    @error('District')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="State" class="text-nowrap">State</label>
                                    <input type="text" class="form-control" id="State" name="State" value="{{old('State')}}">
                                    @error('State')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="pincode" class="text-nowrap">Pin/Post Code</label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="{{old('pincode')}}">
                                    @error('pincode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="state_code" class="text-nowrap">State/UT code</label>
                                    <input type="text" class="form-control" id="state_code" name="state_code" value="{{old('state_code')}}">
                                    @error('state_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="country_code" class="text-nowrap">ISO Country Code</label>
                                    <input type="text" class="form-control" id="country_code" name="country_code" value="{{old('country_code')}}">
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
                                     <input type="checkbox" class="form-check-input" id="Rented" name="Residence_type[]" value="Rented" {{ in_array('Rented', old('Residence_type', [])) ? 'checked' : '' }}>
                                     <label class="form-check-label" style="font-size:12px;" for="Rented">Rented</label>
                                 </div>
                                 <div class="form-check ml-2 mr-2">
                                     <input type="checkbox" class="form-check-input" id="Owned" name="Residence_type[]" value="Owned" {{ in_array('Non Resident India', old('Residence_type', [])) ? 'checked' : '' }}>
                                     <label class="form-check-label" style="font-size:12px;"  for="Owned">Owned</label>
                                 </div>
                                 <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Parental" name="Residence_type[]" value="Parental" {{ in_array('Parental', old('Residence_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" style="font-size:12px;" for="Parental">Parental</label>
                                </div>
                                <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="Other" name="Residence_type[]" value="Other" {{ in_array('Other', old('Residence_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" style="font-size:12px;"  for="Other">Other</label>
                                </div>


                             </div>
                                 @error('Residence_type')
                                     <div class="text-danger">{{ $message }}</div>
                                 @enderror
                            </div>

                            <div class="col-lg-6 ">
                                <div class="form-group d-flex align-items-center ">
                                    <label for="residance_year" class="text-nowrap ml-2">No. of years in current residence:</label>
                                    <input type="text"  class="form-control ml-2" id="residance_year" name="residance_year" value="{{old('residance_year')}}">
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
                                    <label for="proof_address" class="text-nowrap">Address as per proof of address/ proof of identity? :</label>
                                    <div class="form-check ml-2 mr-2">
                                        <input type="radio" class="form-check-input" id="yes" name="proof_address" value="Yes" {{ old('proof_address') == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="no" name="proof_address" value="No" {{ old('proof_address') == 'No' ? 'checked' : '' }}>
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
                                    <label for="per_address" class="text-nowrap">Permanent Residence Address</label>
                                    <input type="text" class="form-control" id="per_address" name="per_address" value="{{old('per_address')}}">
                                    @error('per_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="per_landmark" class="text-nowrap">Landmark</label>
                                    <input type="text" class="form-control" id="per_landmark" name="per_landmark" value="{{old('per_landmark')}}">
                                    @error('per_landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_city" class="text-nowrap">City/ Town</label>
                                    <input type="text" class="form-control" id="per_city" name="per_city" value="{{old('per_city')}}">
                                    @error('per_city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_District" class="text-nowrap">District</label>
                                    <input type="text" class="form-control" id="per_District" name="per_District" value="{{old('per_District')}}">
                                    @error('per_District')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_State" class="text-nowrap">State</label>
                                    <input type="text" class="form-control" id="per_State" name="per_State" value="{{old('per_State')}}">
                                    @error('per_State')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_pincode" class="text-nowrap">Pin/Post Code</label>
                                    <input type="text" class="form-control" id="per_pincode" name="per_pincode" value="{{old('per_pincode')}}">
                                    @error('per_pincode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_state_code" class="text-nowrap">State/UT code</label>
                                    <input type="text" class="form-control" id="per_state_code" name="per_state_code" value="{{old('per_state_code')}}">
                                    @error('per_state_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_country_code" class="text-nowrap">ISO Country Code</label>
                                    <input type="text" class="form-control" id="per_country_code" name="per_country_code" value="{{old('per_country_code')}}">
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
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}">
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="email" class="text-nowrap">E-mail Address</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="pan" class="text-nowrap">PAN</label>
                                    <input type="text" class="form-control" id="pan" name="pan" value="{{old('pan')}}">
                                    @error('pan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="Form 60" class="text-nowrap">Form 60</label>
                                    <input type="text" class="form-control" id="form60" name="form60" value="{{old('form60')}}">
                                    @error('form60')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="adhar" class="text-nowrap">AADHAR No</label>
                                    <input type="text" class="form-control" id="adhar" name="adhar" value="{{old('adhar')}}">
                                    @error('adhar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                           <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">{{$btext}}</button>
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
