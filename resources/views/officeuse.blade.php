@push('title')
<title>Application form</title>
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
        <?php
        if(isset($back))
        {  ?>
            <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm">{{$back}}</a>
        <?php  }
        ?>
            <div class="row mt-2">
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

                        <div class="row mb-3 d-flex justify-content-between">
                            <div>
                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{$title}}</h6>
                            </div>
                            <div>
                                <div class="form-group d-flex align-items-center ">
                                    <label for="ckyc_no" class="text-nowrap">CKYC No:</label>
                                    <input type="text"  class="form-control ml-2" id="ckyc_no" name="ckyc_no" value="{{ isset($officedata->ckyc_no) ? $officedata->ckyc_no : old('ckyc_no') }}">
                                    @error('ckyc_no')
                                     <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="date_of_application" class="text-nowrap">Date of Application:</label>
                                    <input type="date" class="form-control"  id="date_of_application" name="date_of_application" value="{{ $officedata->date ?? old('date_of_application')}}">
                                    @error('date_of_application')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_id" class="text-nowrap">Customer ID:</label>
                                    <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ isset($officedata->customer_id)? $officedata->customer_id : $customerId}}">
                                    @error('customer_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="prospect_no" class="text-nowrap">Prospect No:</label>
                                    <input type="text" class="form-control" id="prospect_no" name="prospect_no" value="{{ isset($officedata->Prospect_No) ? $officedata->Prospect_No : $prospectNo}}">
                                    @error('prospect_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="prospect_no" class="text-nowrap">Prospect No:</label>
                                    @php
                                        // Get the current date in the format MMDDYYYY
                                        $date = date('dmY');

                                        // Initialize the counter
                                        if(!session()->has('prospect_counter')) {
                                            session(['prospect_counter' => 1]);
                                        }

                                        // Generate the prospect number
                                        $prospectNo = "FD" . str_pad(session('prospect_counter'), 2, "0", STR_PAD_LEFT) . $date;

                                        // Increment the counter for the next record
                                        session(['prospect_counter' => session('prospect_counter') + 1]);
                                    @endphp

                                    <input type="text" class="form-control" id="prospect_no" name="prospect_no" value="{{ $prospectNo }}">
                                    @error('prospect_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}

                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="tenure_months" class="text-nowrap">Tenure (Months):</label>
                                    <input type="text" class="form-control" id="tenure_months" name="tenure_months" value="{{ isset($officedata->Months) ? $officedata->Months : old('tenure_months')}}">
                                    @error('tenure_months')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="loan_amount" class="text-nowrap">Loan Amount (&#8377;):</label>
                                    <input type="text" class="form-control" id="loan_amount" name="loan_amount" value="{{ isset($officedata->Loan_Amount) ? $officedata->Loan_Amount : old('loan_amount')}}">
                                    @error('loan_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="purpose" class="text-nowrap">Purpose:</label>
                                    <input type="text" class="form-control" id="purpose" name="purpose" value="{{ isset($officedata->Purpose) ? $officedata->Purpose : old('purpose')}}">
                                    @error('purpose')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                           <div class="col-lg-4">
                            <div class="form-group d-flex align-items-center">
                                <label for="tenure_months" class="text-nowrap">Application Type :</label>
                                <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="new" name="application_type[]" value="new" {{ in_array('new', old('application_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="new">New</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="updated" name="application_type[]" value="updated" {{ in_array('updated', old('application_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="updated">Updated</label>
                                </div>

                            </div>
                                @error('application_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                           </div>
                        </div> --}}
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="form-group d-flex align-items-center">
                                    <label class="text-nowrap">Application Type:</label>
                                    <div class="form-check ml-2">
                                        <input type="radio" class="form-check-input" id="new" name="application_type" value="new" {{  isset($officedata) && ($officedata->Application_Type === 'new' || old('application_type') === 'new') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="new">New</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="radio" class="form-check-input" id="updated" name="application_type" value="updated" {{ isset($officedata) && ($officedata->Application_Type === 'updated' || old('application_type') === 'updated') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="updated">Updated</label>
                                    </div>
                                </div>
                                @error('application_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="form-group d-flex align-items-center">
                                    <label class="text-nowrap">Account Type:</label>
                                    <div class="form-check ml-2">
                                        <input type="radio" class="form-check-input" id="normal" name="account_type" value="normal" {{ isset($officedata) && ($officedata->Account_Type === 'normal' || old('account_type') === 'normal') ? 'checked' : ''  }}>
                                        <label class="form-check-label" for="normal">Normal</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="radio" class="form-check-input" id="minor" name="account_type" value="minor" {{ isset($officedata) && ($officedata->Account_Type === 'minor' || old('account_type') === 'minor') ? 'checked' : ''  }}>
                                        <label class="form-check-label" for="minor">Minor</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="radio" class="form-check-input" id="kyc" name="account_type" value="kyc" {{ isset($officedata) && ($officedata->Account_Type === 'kyc' || old('account_type') === 'kyc') ? 'checked' : ''  }}>
                                        <label class="form-check-label" for="kyc">Aadhar Based OTP E-KYC (in non-face to face Mode)</label>
                                    </div>
                                </div>
                                @error('account_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> 

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="form-group d-flex align-items-center">
                                    <label class="text-nowrap">Lon Type:</label>
                                    <div class="form-check ml-2">
                                        <input type="radio" class="form-check-input" id="personal" name="lon_type" value="personal" {{ isset($officedata) && ($officedata->lon_type === 'personal' || old('lon_type') === 'personal') ? 'checked' : ''  }}>
                                        <label class="form-check-label" for="normal">Personal</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="radio" class="form-check-input" id="business" name="lon_type" value="business" {{ isset($officedata) && ($officedata->lon_type === 'business' || old('lon_type') === 'business') ? 'checked' : ''  }}>
                                        <label class="form-check-label" for="minor">Business</label>
                                    </div>
                                 
                                </div>
                                @error('lon_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> 


                        

                        {{-- <div class="row mb-3">
                            <div class="col-lg-12">
                             <div class="form-group d-flex align-items-center">
                                 <label for="tenure_months" class="text-nowrap">Account Type :</label>
                                <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="normal" name="account_type[]" value="normal" {{ in_array('normal', old('account_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="normal">Normal</label>
                                </div>
                                <div class="form-check ml-2 mr-2">
                                    <input type="checkbox" class="form-check-input" id="minor" name="account_type[]" value="minor" {{ in_array('minor', old('account_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="minor">Minor</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="kyc" name="account_type[]" value="kyc" {{ in_array('kyc', old('account_type', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="kyc">Aadhar Based OTP E-KYC (in non-face to face Mode)</label>
                                </div>
                             </div>
                                @error('account_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row">
                           <div class="col-lg-12">
                                <div class="form-group">
                                    <p>(Please fill the form in Block Letters. Any CANCELLATION to be Counter SIGNED)</p>
                                </div>

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
