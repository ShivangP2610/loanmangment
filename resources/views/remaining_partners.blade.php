@push('title')
<title>Application form</title>
@endpush
@extends("layout.main")

@section('main-section')
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

                @include('sidebar')

                <div class="col-lg-9">
                    <form action="{{url($url)}}" method="POST">
                        @csrf <!-- Include CSRF token for Laravel form submission -->

                        <div class="row mb-3 bg-red">
                            <div>
                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{$title}}</h6>
                            </div>
                        </div>

                        <div class="row mb-3 ">
                            {{-- full name --}}
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-between">
                                    <label class="text-nowrap">Full Name</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" id="full_name_first1" name="full_name_first[]" placeholder="Full Name" value="{{ isset($Remainingdata[0]->partners_name) ? $Remainingdata[0]->partners_name : old('partners_name') }}">
                                        <input type="text" class="form-control ml-2" id="full_name_first2" name="full_name_first[]" placeholder="Full Name" value="{{ isset($Remainingdata[1]->partners_name) ? $Remainingdata[1]->partners_name : old('partners_name') }}">
                                        <input type="text" class="form-control ml-2" id="full_name_first3" name="full_name_first[]" placeholder="Full Name" value="{{ isset($Remainingdata[2]->partners_name) ? $Remainingdata[2]->partners_name : old('partners_name') }}">
                                    </div>
                                </div>
                                @error('full_name_first')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Date of Birth --}}
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-between">
                                    <label class="text-nowrap">Date of Birth</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" id="dob_day1" name="dob_day[]" placeholder="DOB" value="{{ isset($Remainingdata[0]->Date_of_Birth) ? $Remainingdata[0]->Date_of_Birth : old('Date_of_Birth') }}">
                                        <input type="text" class="form-control ml-2" id="dob_day2" name="dob_day[]" placeholder="DOB" value="{{ isset($Remainingdata[1]->Date_of_Birth) ? $Remainingdata[1]->Date_of_Birth : old('Date_of_Birth') }}">
                                        <input type="text" class="form-control ml-2" id="dob_day3" name="dob_day[]" placeholder="DOB" value="{{ isset($Remainingdata[2]->Date_of_Birth) ? $Remainingdata[2]->Date_of_Birth : old('Date_of_Birth') }}">
                                    </div>
                                </div>
                                @error('dob_day')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- PAN No. --}}
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-between">
                                    <label class="text-nowrap">PAN No.</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" id="pan_no_1" name="pan_no_1[]" placeholder="PAN NUMBER" value="{{ isset($Remainingdata[0]->partners_pannumber) ? $Remainingdata[0]->partners_pannumber : old('partners_pannumber') }}">
                                        <input type="text" class="form-control ml-2" id="pan_no_2" name="pan_no_1[]" placeholder="PAN NUMBER" value="{{ isset($Remainingdata[1]->partners_pannumber) ? $Remainingdata[1]->partners_pannumber : old('partners_pannumber') }}">
                                        <input type="text" class="form-control ml-2" id="pan_no_3" name="pan_no_1[]" placeholder="PAN NUMBER" value="{{ isset($Remainingdata[2]->partners_pannumber) ? $Remainingdata[2]->partners_pannumber : old('partners_pannumber') }}">
                                    </div>
                                </div>
                                @error('pan_no_1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Residential Address --}}
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-between">
                                    <label class="text-nowrap">Residential Address</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" id="ADDRESS1" name="ADDRESS[]" placeholder="ADDRESS" value="{{ isset($Remainingdata[0]->partners_Residence_Address) ? $Remainingdata[0]->partners_Residence_Address : old('partners_Residence_Address') }}">
                                        <input type="text" class="form-control ml-2" id="ADDRESS2" name="ADDRESS[]" placeholder="ADDRESS" value="{{ isset($Remainingdata[1]->partners_Residence_Address) ? $Remainingdata[1]->partners_Residence_Address : old('partners_Residence_Address') }}">
                                        <input type="text" class="form-control ml-2" id="ADDRESS3" name="ADDRESS[]" placeholder="ADDRESS" value="{{ isset($Remainingdata[2]->partners_Residence_Address) ? $Remainingdata[2]->partners_Residence_Address : old('partners_Residence_Address') }}">
                                    </div>
                                </div>
                                @error('ADDRESS')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Tel/Mobile  --}}
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-between">
                                    <label class="text-nowrap">Tel/Mobile</label>
                                    {{-- <div class="d-flex">
                                        <input type="text" class="form-control" id="MOBILE1" name="MOBILE[]" placeholder="MOBILE NUMBER" value="{{ isset($Remainingdata[0]->partners_Mobile_no) ? $Remainingdata[0]->partners_Mobile_no : old('partners_Mobile_no') }}">
                                        <input type="text" class="form-control ml-2" id="MOBILE2" name="MOBILE[]" placeholder="MOBILE NUMBER" value="{{ isset($Remainingdata[1]->partners_Mobile_no) ? $Remainingdata[1]->partners_Mobile_no : old('partners_Mobile_no') }}">
                                        <input type="text" class="form-control ml-2" id="MOBILE3" name="MOBILE[]" placeholder="MOBILE NUMBER" value="{{ isset($Remainingdata[2]->partners_Mobile_no) ? $Remainingdata[2]->partners_Mobile_no : old('partners_Mobile_no') }}">
                                    </div>  --}}

                                    <div class="d-flex">
                                        <input type="number" class="form-control" id="MOBILE1" name="MOBILE[]" placeholder="MOBILE NUMBER" 
                                               value="{{ isset($Remainingdata[0]->partners_Mobile_no) ? $Remainingdata[0]->partners_Mobile_no : old('partners_Mobile_no') }}" 
                                               oninput="validateMobileLength(this)">
                                        <input type="number" class="form-control ml-2" id="MOBILE2" name="MOBILE[]" placeholder="MOBILE NUMBER" 
                                               value="{{ isset($Remainingdata[1]->partners_Mobile_no) ? $Remainingdata[1]->partners_Mobile_no : old('partners_Mobile_no') }}" 
                                               oninput="validateMobileLength(this)">
                                        <input type="number" class="form-control ml-2" id="MOBILE3" name="MOBILE[]" placeholder="MOBILE NUMBER" 
                                               value="{{ isset($Remainingdata[2]->partners_Mobile_no) ? $Remainingdata[2]->partners_Mobile_no : old('partners_Mobile_no') }}" 
                                               oninput="validateMobileLength(this)">
                                    </div>
                                </div>
                                @error('MOBILE')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Work Experience --}}
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-between">
                                    <label class="text-nowrap">Work Experience</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" id="WorkExperience1" name="WorkExperience[]" placeholder="Work Experience" value="{{ isset($Remainingdata[0]->partners_workexp) ? $Remainingdata[0]->partners_workexp : old('partners_workexp') }}">
                                        <input type="text" class="form-control ml-2" id="WorkExperience2" name="WorkExperience[]" placeholder="Work Experience" value="{{ isset($Remainingdata[1]->partners_workexp) ? $Remainingdata[1]->partners_workexp : old('partners_workexp') }}">
                                        <input type="text" class="form-control ml-2" id="WorkExperience3" name="WorkExperience[]" placeholder="Work Experience" value="{{ isset($Remainingdata[2]->partners_workexp) ? $Remainingdata[2]->partners_workexp : old('partners_workexp') }}">
                                    </div>
                                </div>
                                @error('WorkExperience')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Shareholding % in borrowing entity --}}
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-between">
                                    <label>Shareholding % </br>in borrowing entity</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" id="Shareholding1" name="Shareholding[]" placeholder="Shareholding" value="{{ isset($Remainingdata[0]->shareholding_with_cust_entity) ? $Remainingdata[0]->shareholding_with_cust_entity : old('shareholding_with_cust_entity') }}">
                                        <input type="text" class="form-control ml-2" id="Shareholding2" name="Shareholding[]" placeholder="Shareholding" value="{{ isset($Remainingdata[1]->shareholding_with_cust_entity) ? $Remainingdata[1]->shareholding_with_cust_entity : old('shareholding_with_cust_entity') }}">
                                        <input type="text" class="form-control ml-2" id="Shareholding3" name="Shareholding[]" placeholder="Shareholding" value="{{ isset($Remainingdata[2]->shareholding_with_cust_entity) ? $Remainingdata[2]->shareholding_with_cust_entity : old('shareholding_with_cust_entity') }}">
                                    </div>
                                </div>
                                @error('Shareholding')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                {{-- <button type="submit" class="btn btn-primary">{{$btext}}</button>  --}}

                                <button type="submit" class="btn btn-primary">Submit</button>
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

{{-- btn clickable or unclcikble --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fullNameInputs = document.querySelectorAll('input[name^="full_name_first"]');
        const dobInputs = document.querySelectorAll('input[name^="dob_day"]');
        const pannoInputs = document.querySelectorAll('input[name^="pan_no_1"]');
        const addressInputs = document.querySelectorAll('input[name^="ADDRESS"]');
        const mobileInputs = document.querySelectorAll('input[name^="MOBILE"]');
        const workexpInputs = document.querySelectorAll('input[name^="WorkExperience"]');
        const shareholdInputs = document.querySelectorAll('input[name^="Shareholding"]');

        const submitButton = document.querySelector('button[type="submit"]');

        // Function to check if any input field has a value
        function checkInputs() {
            let hasFullNameValue = false;
            let hasDobValue = false;
            let hasPannoValue = false;
            let hasAddressValue = false;
            let hasMobileValue = false;
            let hasWorkexpValue = false;
            let hasShareholdValue = false;

            fullNameInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasFullNameValue = true;
                }
            });

            dobInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasDobValue = true;
                }
            });

            pannoInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasPannoValue = true;
                }
            });

            addressInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasAddressValue = true;
                }
            });

            mobileInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasMobileValue = true;
                }
            });

            workexpInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasWorkexpValue = true;
                }
            });

            shareholdInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasShareholdValue = true;
                }
            });

            // Enable or disable submit button based on the presence of value in input fields
            {{--submitButton.disabled = !(hasFullNameValue && hasDobValue && hasPannoValue && hasAddressValue && hasMobileValue && hasWorkexpValue && hasShareholdValue); --}}
        }

        // Event listeners for input change
        fullNameInputs.forEach(input => {
            input.addEventListener('input', checkInputs);
        });

        // Initial check when the page loads
        checkInputs();
    });
</script>  
<script>
function validateMobileLength(input) {
    // Convert the value to a string to enforce length restrictions
    let value = input.value;
    
    // Ensure only 10 digits max
    if (value.length > 10) {
        input.value = value.slice(0, 10);
    }
}
</script>


