@push('title')
<title>Customer form</title>
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

                    <div id='partner-row-container'>


                        <div class="row mb-3 bg-red d-flex justify-content-between">
                            <div>
                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{$title}}</h6>
                            </div>
                            <div>
                                <a href="#" id="add-partner-row" >
                                    <i class="fas fa-plus mt-2 mr-2" style="color:white"></i>
                                </a>
                            </div>
                        </div>

                      <div id="partner-row">

                        <div class="row mb-1">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="name_of_borrower" class="text-nowrap">Name of Borrower</label>
                                    <input type="text" class="form-control"  id="name_of_borrower" name="name_of_borrower[]" value="{{old('name_of_borrower')}}">
                                    @error('name_of_borrower')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- 15-04-2024 chnages as per client requirement --}}
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="entity_type" class="text-nowrap">Borrower Entity Type</label>
                                    <select class="form-control" id="entity_type" name="entity_type[]">
                                        <option value="" selected disabled>Select Entity Type</option>
                                        <option value="PROPRIETORSHIP" {{ old('entity_type') == 'PROPRIETORSHIP' ? 'selected' : '' }}>PROPRIETORSHIP</option>
                                        <option value="Partnership" {{ old('entity_type') == 'Partnership' ? 'selected' : '' }}>Partnership</option>
                                        <option value="Pvt_Ltd" {{ old('entity_type') == 'Pvt_Ltd' ? 'selected' : '' }}>Pvt Ltd</option>
                                        <option value="Others" {{ old('Others') == 'Others' ? 'selected' : '' }}>Others</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    @error('entity_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="date_of_incorporation" class="text-nowrap">Date of Incorporation</label>
                                    <input type="date" class="form-control" id="date_of_incorporation" name="date_of_incorporation[]" value="{{old('date_of_incorporation')}}">
                                    @error('date_of_incorporation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Principal office address --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="principal_address" class="text-nowrap">Principal office address / Place of Business</label>
                                    <input type="text" class="form-control principal-address" id="principal_address" name="principal_address[]" value="{{old('principal_address')}}">
                                    @error('principal_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="pincode" class="text-nowrap">Pin/Post Code</label>
                                    <input type="text" class="form-control pincode-input" id="pincode" onInput="checkPincodeLength(this)" name="pincode[]" value="{{old('pincode')}}">
                                    @error('pincode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="city" class="text-nowrap">City/ Town</label>
                                    <select class="form-control city" id="city" name="city[]">
                                        <!-- Options will be dynamically generated here -->
                                    </select>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="District" class="text-nowrap">District</label>
                                    <input type="text" class="form-control district" id="District" name="District[]" value="{{old('District')}}">
                                    @error('District')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="State" class="text-nowrap">State</label>
                                    <input type="text" class="form-control state" id="State"  name="State[]" value="{{old('State')}}">
                                    @error('State')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="state_code" class="text-nowrap">State/UT code</label>
                                    <input type="text" class="form-control state-code" id="state_code" name="state_code[]" value="{{old('state_code')}}">
                                    @error('state_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="country_code" class="text-nowrap">ISO Country Code</label>
                                    <input type="text" class="form-control country-code" id="country_code" name="country_code[]" value="{{old('country_code')}}">
                                    @error('country_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group d-flex align-items-center">
                                    <label for="different_address" class="text-nowrap">Different from Permanent address? :</label>
                                    <div class="form-check ml-2 mr-2">
                                        <input type="radio" class="form-check-input daddress" id="yes" onClick="getperaddress(this)" name="different_address[]" value="Yes" {{ old('different_address') == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input daddress" id="no" onClick="getperaddress(this)" name="different_address[]" value="No" {{ old('different_address') == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="no">No</label>
                                    </div>
                                </div>
                                @error('different_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group d-flex align-items-center">
                                    <label for="different_address" class="text-nowrap">Different from Permanent address? :</label>
                                    <div class="form-check ml-2 mr-2">
                                        <input type="radio" class="form-check-input daddress" id="yes0_{{ $index }}" onClick="getperaddress(this)" name="different_address_0[{{ $index }}][]" value="Yes" {{ old('different_address_0') == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="yes0">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input daddress" id="no0_{{ $index }}" onClick="getperaddress(this)" name="different_address_0[{{ $index }}][]" value="No" {{ old('different_address_0') == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="no0">No</label>
                                    </div>
                                </div>
                                @error('different_address_0')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}



                             {{-- Permanent office Address --}}

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="permanent_address" class="text-nowrap">Permanent office Address</label>
                                    <input type="text" class="form-control permanent_address" id="permanent_address" name="permanent_address[]" value="{{old('permanent_address')}}">
                                    @error('permanent_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_pincode" class="text-nowrap">Pin/Post Code</label>
                                    <input type="text" class="form-control pincode-input1" id="per_pincode" onInput="checkPincodeLength1(this)" name="per_pincode[]" value="{{old('per_pincode')}}">
                                    @error('per_pincode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_city" class="text-nowrap">City/ Town</label>
                                    <input type="text" class="form-control" id="per_city" name="per_city" value="{{old('per_city')}}">
                                    @error('per_city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_city" class="text-nowrap">City/ Town</label>
                                    <select class="form-control per_city" id="per_city" name="per_city[]">
                                        <!-- Options will be dynamically generated here -->
                                    </select>
                                    @error('per_city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_District" class="text-nowrap">District</label>
                                    <input type="text" class="form-control per_District" id="per_District" name="per_District[]" value="{{old('per_District')}}">
                                    @error('per_District')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_State" class="text-nowrap">State</label>
                                    <input type="text" class="form-control per_State" id="per_State" name="per_State[]" value="{{old('per_State')}}">
                                    @error('per_State')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_state_code" class="text-nowrap">State/UT code</label>
                                    <input type="text" class="form-control per_state_code" id="per_state_code" name="per_state_code[]" value="{{old('per_state_code')}}">
                                    @error('per_state_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="per_country_code" class="text-nowrap">ISO Country Code</label>
                                    <input type="text" class="form-control per_country_code" id="per_country_code" name="per_country_code[]" value="{{old('per_country_code')}}">
                                    @error('per_country_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- last customer detils --}}

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="corporation_place" class="text-nowrap">Place of incorporation</label>
                                    <input type="text" class="form-control" id="corporation_place" name="corporation_place[]" value="{{old('corporation_place')}}">
                                    @error('corporation_place')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="telephone" class="text-nowrap">Telephone (office)</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone[]" value="{{old('telephone')}}">
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="E-mail" class="text-nowrap">E-mail Address</label>
                                    <input type="email" class="form-control" id="email" name="email[]" value="{{old('email')}}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="industry_type" class="text-nowrap">Type of Industry/ Profession</label>
                                    <input type="text" class="form-control" id="industry_type" name="industry_type[]" value="{{old('industry_type')}}">
                                    @error('industry_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="Segment" class="text-nowrap">Segment</label>
                                    <input type="text" class="form-control" id="Segment" name="Segment" value="{{old('Segment')}}">
                                    @error('Segment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="Segment" class="text-nowrap">Segment</label>
                                    <select class="form-control" id="Segment" name="Segment[]">
                                        <option value="" selected disabled>Select Segment</option>
                                        <option value="Trading" {{ old('Segment') == 'Trading' ? 'selected' : '' }}>Trading</option>
                                        <option value="Manufacturing" {{ old('Segment') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                        <option value="Service_Provider" {{ old('Segment') == 'Service_Provider' ? 'selected' : '' }}>Service Provider</option>
                                        <option value="Others" {{ old('Segment') == 'Others' ? 'selected' : '' }}>Others</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    @error('Segment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="gst" class="text-nowrap">GST Number</label>
                                    <input type="text" class="form-control" id="gst" name="gst[]" value="{{old('gst')}}">
                                    @error('gst')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="pan" class="text-nowrap">PAN Number</label>
                                    <input type="text" class="form-control" id="pan" name="pan[]" value="{{old('pan')}}">
                                    @error('pan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="Form 60" class="text-nowrap">Form 60</label>
                                    <input type="text" class="form-control" id="form60" name="form60[]" value="{{old('form60')}}">
                                    @error('form60')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="bussiness_vintage" class="text-nowrap">Overall Business Vintage</label>
                                    <input type="text" class="form-control" id="bussiness_vintage" name="bussiness_vintage[]" value="{{old('bussiness_vintage')}}">
                                    @error('bussiness_vintage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                      </div>     {{--partner-row end--}}
                    </div>    {{--partner-row-container end--}}
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

<script>

function checkPincodeLength(input, row) {


    var pincode = input.value;

    if (pincode.length === 6) {

        getdetailsmain(input , row);
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

//3-5-24    
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
 
//main script 
function getperaddress(input) {
    var val = $(input).val();
    var row = $(input).closest('.row');


    if (val === 'No') {
        // Disable all fields in the same row
        row.find(".permanent_address").prop('readonly', true);
        row.find(".pincode-input1").prop('readonly', true);
        row.find(".per_city").attr("style", "pointer-events: none;");
        row.find(".per_District").prop('readonly', true);
        row.find(".per_State").prop('readonly', true);
        row.find(".per_state_code").prop('readonly', true);
        row.find(".per_country_code").prop('readonly', true);

        // Get values from principal address fields
        var address = row.find(".principal-address").val();
        var pincode = row.find(".pincode-input").val();
        var city = row.find(".city").val();
        var district = row.find(".district").val();
        var state = row.find(".state").val();
        var state_code = row.find(".state-code").val();
        var country_code = row.find(".country-code").val();

        // Implement data into permanent office address fields
        row.find(".permanent_address").val(address);
        row.find(".pincode-input1").val(pincode);
        row.find(".per_District").val(district);
        row.find(".per_State").val(state);
        row.find(".per_state_code").val(state_code);
        row.find(".per_country_code").val(country_code);

        if (city) {
            row.find('.per_city').empty();
            row.find('.per_city').append($('<option>', {
                value: city,
                text: city
            }));
        }
    } else {
        // Enable all fields and clear values in the same row
        row.find(".permanent_address").prop('readonly', false);
        row.find(".pincode-input1").prop('readonly', false);
        row.find(".per_city").prop('disabled', false);
        row.find(".per_District").prop('readonly', false);
        row.find(".per_State").prop('readonly', false);
        row.find(".per_state_code").prop('readonly', false);
        row.find(".per_country_code").prop('readonly', false);

        row.find(".permanent_address").val('');
        row.find(".pincode-input1").val('');
        row.find(".per_city").val('');
        row.find(".per_District").val('');
        row.find(".per_State").val('');
        row.find(".per_state_code").val('');
        row.find(".per_country_code").val('');
    }
}


</script>


{{-- 2-5-2024 --}}

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
            const partnerRowTemplate = partnerRowContainer.querySelector('#partner-row').cloneNode(true);

            // Clear input fields in the new row
            const inputFields = partnerRowTemplate.querySelectorAll('input, select'); 
            console.log("inputFields");
            inputFields.forEach(function(input,index) {
                console.log("log",$(input).attr('id'));
                console.log("index",index);
                input.value = '';
                input.id = `${$(input).attr('name')}-${parseInt(Math.random(index*2))}`;
                input.name = `${$(input).attr('name')}-${parseInt(Math.random(index*2))}`;
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










