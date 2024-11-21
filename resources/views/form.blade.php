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
          <div class="row">
            <div class="col-lg-12">

                {{-- for office use only --}}
                <table>
                    <thead>
                        <tr>
                            <td colspan="6" class="bg-danger">
                                <h1>APPLICATION FORM</h1>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <div class="main">
                                    <p>For office Use Only</p>
                                    <p>CKYC No: <input type="text"></p>
                                </div>
                            </td>
                        <tr>

                            <td>Date of Application: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>Custmer ID:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>Prospect No: </td>
                            <td>
                                <input type="text" >
                            </td>
                        </tr>
                        <tr>
                            <td>Tenure(Monts): </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>Loan Amount(&#8377;): </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>Purpose:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">Application Type:

                                <input type="checkbox" name="new" id="New">
                                <label for="New">New</label>

                                <input type="checkbox" name="new" id="Updated">
                                <label for="Updated">Updated</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">Account Type:

                                <input type="checkbox" name="normal" id="normal">
                                <label for="normal">Normal</label>

                                <input type="checkbox" name="normal" id="minor">
                                <label for="minor">Minor</label>

                                <input type="checkbox" name="normal" id="kyc">
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

                {{-- for customer detials --}}
                <table id="table-1">

                    <thead>
                        <tr>
                            <td colspan="8" class="bg-danger">
                                <h3>BORROW DETAILS</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="8"> Name Of Borrower: <input type="text" class="borrower"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Borrower Entity Type:</td>
                            <td colspan="2">
                                <input type="text">
                            </td>
                            <td colspan="2">Date of Incorporation:</td>
                            <td colspan="2">
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Principle Office Address/Place of bussiness:</td>
                            <td colspan="6">
                                <input type="text" class="borrower">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">City/Village/Town:</td>
                            <td colspan="2">
                                <input type="text">
                            </td>
                            <td>Distric:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>State: </td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Pin/Post Code:</td>
                            <td colspan="2">
                                <input type="text">
                            </td>
                            <td>State/UT Code: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>ISQ 3166 Country Code:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Place of Incorporation:</td>
                            <td colspan="6">
                                <input type="text" class="borrower">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Telephone(Office): </td>
                            <td colspan="2">
                                <input type="number">
                            </td>
                            <td colspan="2">E-Mail Address:</td>
                            <td colspan="2">
                                <input type="email">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Type of Industry/Profession:</td>
                            <td colspan="2">
                                <input type="text">
                            </td>
                            <td>Segment:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>GST:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td> PAN:</td>
                            <td><input type="text"></td>
                            <td> Form 60:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>Overall Buisness Vintage:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- details of manging directors --}}
                <table>
                    <thead>
                        <tr>
                            <td colspan="6" class="bg-danger">
                                <h3>DETAIL OF PROPRIETOR / MANAGING DIRECTOR</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="7"><img src="./images1.jpeg"></td>
                        </tr>
                        <tr>
                            <td>Title:</td>
                            <td colspan="4"> <input type="text" class="title"></td>
                        </tr>
                        <tr>
                            <td>Full Name: </td>
                            <td colspan="4">
                                <input type="text" class="title">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">Relation with Applicant
                                <input type="checkbox" name="name" id="partner">
                                <label for="partner">Partner</label>


                                <input type="checkbox" name="name" id="director">
                                <label for="director">Director</label>

                                <input type="checkbox" name="name" id="proprietor">
                                <label for="proprietor">Proprietor</label>

                                <input type="checkbox" name="name" id="promoter">
                                <label for="promoter">Promoter</label>


                                <input type="checkbox" name="name" id="karta">
                                <label for="karta">Karta</label>

                                <input type="checkbox" name="name" id="benificialy">
                                <label for="benificialy">Benificialy</label>

                                <input type="checkbox" name="name" id="other">
                                <label for="other">Other</label>


                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Applying As Co-Borrower:
                                <input type="checkbox" id="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" id="no">
                                <label for="no">No</label>
                            </td>
                            <td>Father Name/Spouse Name: </td>
                            <td colspan="2">
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Shareholding % in Borrowing Entity</td>
                            <td colspan="4">
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Marital Status:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>Citizenship:</td>
                            <td colspan="2">
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td> Residential Status:</td>
                            <td colspan="6">
                                <input type="checkbox"><label>Resident Individual</label>
                                <input type="checkbox"><label>Non Resident India</label>
                                <input type="checkbox"><label>Foreign National</label>
                                <input type="checkbox"><label>Person of Indian Origin</label>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2">Occupation type:</td>
                            <td colspan="6">
                                <input type="checkbox"><label>Service:(Private Selector/Public Selector/Govt.Selector)</label>
                                <input type="checkbox"><label>Business</label>
                                <input type="checkbox"><label>Not Categirized</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <input type="checkbox"><label>Others:(Profrssional/Self Employed/Retired/Housewife/Student)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Different From Permenant Address?</td>
                            <td colspan="8">
                                <input type="checkbox">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Current Residence Addresss: </td>
                            <td colspan="8">
                                <input type="text" class="title">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Landmark: </td>
                            <td colspan="8"> <input type="text" class="title"></td>
                        </tr>
                        <tr>
                            <td>City/Town/Village:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>District: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>State:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Pin/Post code:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>State/UT Code: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>ISO 3166 Country Code:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Resident Type</td>
                            <td>
                                <input type="checkbox"><label>Rented</label>
                                <input type="checkbox"><label>Owned</label>
                                <input type="checkbox"><label>Parental</label>
                                <input type="checkbox"><label>Other</label>

                            </td>
                            <td>No. of years in Current Residence:</td>
                            <td>
                                <input type="number">
                            </td>
                        </tr>
                        <tr>
                            <td>Address as per proof of address/proof of identity</td>
                            <td colspan="6"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>Permanent Residence Address:</td>
                            <td colspan="6"><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Landmark:</td>
                            <td colspan="6"><input type="text"></td>
                        </tr>
                        <tr>
                            <td>City/Town/Village:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>District: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>State:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Pin/Post code:</td>
                            <td> <input type="text"></td>
                            <td>State/UT Code: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>ISO 3166 Country Code:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Mobile No.</td>
                            <td colspan="2">
                                <input type="number">
                            </td>
                            <td>E-Mail Address: </td>
                            <td colspan="2">
                                <input type="email">
                            </td>
                        </tr>
                        <tr>
                            <td>PAN: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>From 60: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>AADHAR No: </td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" class="text">
                                <p>BORROWER(NAME&SIGN)</p>
                            </td>
                            <td colspan="2"><input type="text" class="text">
                                <p>CO-BORROWER</p>
                            </td>
                            <td colspan="2"><input type="text" class="text">
                                <p>CO-BORROWER</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- detils of co_customer --}}
                <table>
                    <thead>
                        <tr>
                            <td colspan="6" class="bg-danger">
                                <h3>DETAIL OF PROPRIETOR / MANAGING DIRECTOR</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="7"><img src="./images1.jpeg"></td>
                        </tr>
                        <tr>
                            <td>Title:</td>
                            <td colspan="4"> <input type="text" class="title"></td>
                        </tr>
                        <tr>
                            <td>Full Name: </td>
                            <td colspan="4">
                                <input type="text" class="title">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">Relation with Applicant
                                <input type="checkbox" name="name" id="partner">
                                <label for="partner">Partner</label>


                                <input type="checkbox" name="name" id="director">
                                <label for="director">Director</label>

                                <input type="checkbox" name="name" id="proprietor">
                                <label for="proprietor">Proprietor</label>

                                <input type="checkbox" name="name" id="promoter">
                                <label for="promoter">Promoter</label>


                                <input type="checkbox" name="name" id="karta">
                                <label for="karta">Karta</label>

                                <input type="checkbox" name="name" id="benificialy">
                                <label for="benificialy">Benificialy</label>

                                <input type="checkbox" name="name" id="other">
                                <label for="other">Other</label>


                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Applying As Co-Borrower:
                                <input type="checkbox" id="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" id="no">
                                <label for="no">No</label>
                            </td>
                            <td>Father Name/Spouse Name: </td>
                            <td colspan="2">
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Shareholding % in Borrowing Entity</td>
                            <td colspan="4">
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Marital Status:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>Citizenship:</td>
                            <td colspan="2">
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td> Residential Status:</td>
                            <td colspan="6">
                                <input type="checkbox"><label>Resident Individual</label>
                                <input type="checkbox"><label>Non Resident India</label>
                                <input type="checkbox"><label>Foreign National</label>
                                <input type="checkbox"><label>Person of Indian Origin</label>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2">Occupation type:</td>
                            <td colspan="6">
                                <input type="checkbox"><label>Service:(Private Selector/Public Selector/Govt.Selector)</label>
                                <input type="checkbox"><label>Business</label>
                                <input type="checkbox"><label>Not Categirized</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <input type="checkbox"><label>Others:(Profrssional/Self Employed/Retired/Housewife/Student)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Different From Permenant Address?</td>
                            <td colspan="8">
                                <input type="checkbox">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Current Residence Addresss: </td>
                            <td colspan="8">
                                <input type="text" class="title">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Landmark: </td>
                            <td colspan="8"> <input type="text" class="title"></td>
                        </tr>
                        <tr>
                            <td>City/Town/Village:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>District: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>State:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Pin/Post code:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>State/UT Code: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>ISO 3166 Country Code:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Resident Type</td>
                            <td>
                                <input type="checkbox"><label>Rented</label>
                                <input type="checkbox"><label>Owned</label>
                                <input type="checkbox"><label>Parental</label>
                                <input type="checkbox"><label>Other</label>

                            </td>
                            <td>No. of years in Current Residence:</td>
                            <td>
                                <input type="number">
                            </td>
                        </tr>
                        <tr>
                            <td>Address as per proof of address/proof of identity</td>
                            <td colspan="6"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>Permanent Residence Address:</td>
                            <td colspan="6"><input type="text"></td>
                        </tr>
                        <tr>
                            <td>Landmark:</td>
                            <td colspan="6"><input type="text"></td>
                        </tr>
                        <tr>
                            <td>City/Town/Village:</td>
                            <td>
                                <input type="text">
                            </td>
                            <td>District: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>State:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Pin/Post code:</td>
                            <td> <input type="text"></td>
                            <td>State/UT Code: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>ISO 3166 Country Code:</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Mobile No.</td>
                            <td colspan="2">
                                <input type="number">
                            </td>
                            <td>E-Mail Address: </td>
                            <td colspan="2">
                                <input type="email">
                            </td>
                        </tr>
                        <tr>
                            <td>PAN: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>From 60: </td>
                            <td>
                                <input type="text">
                            </td>
                            <td>AADHAR No: </td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" class="text">
                                <p>BORROWER(NAME&SIGN)</p>
                            </td>
                            <td colspan="2"><input type="text" class="text">
                                <p>CO-BORROWER</p>
                            </td>
                            <td colspan="2"><input type="text" class="text">
                                <p>CO-BORROWER</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- detils of REMAINING PARTNERS --}}
                <table>
                    <thead>
                        <tr>
                            <td colspan="3" class="bg-danger">
                                <h3>DETAILS OF REMAINING PARTNERS/DIRECTORS</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Full Name</td>
                            <td><input type="text" class="tbdata"></td>
                            <td><input type="text" class="tbdata"></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><input type="text" class="tbdata"></td>
                            <td><input type="text" class="tbdata"></td>
                        </tr>
                        <tr>
                            <td>PAN No.</td>
                            <td><input type="text" class="tbdata"></td>
                            <td><input type="text" class="tbdata"></td>
                        </tr>
                        <tr>
                            <td>Residental Address</td>
                            <td><input type="text" class="tbdata"></td>
                            <td><input type="text" class="tbdata"></td>
                        </tr>
                        <tr>
                            <td>Tel/Mobile</td>
                            <td><input type="text" class="tbdata"></td>
                            <td><input type="text" class="tbdata"></td>
                        </tr>
                        <tr>
                            <td>Work Experience</td>
                            <td><input type="text" class="tbdata"></td>
                            <td><input type="text" class="tbdata"></td>
                        </tr>
                        <tr>
                            <td>Shareholding % in borrowing entity</td>
                            <td><input type="text" class="tbdata"></td>
                            <td><input type="text" class="tbdata"></td>
                        </tr>
                    </tbody>
                </table>

                {{-- details of ACCOUNT FOR DISBURSEMENT --}}
                <table id="table-4">
                    <thead>
                        <tr>
                            <td colspan="4" class="bg-danger">
                                <h3>DETAILS OF ACCOUNT FOR DISBURSEMENT</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Name Of Bank</td>
                            <td colspan="3"> <input type="text" class="tab-data"></td>
                        </tr>
                        <tr>
                            <td>Branch Address</td>
                            <td colspan="3"><input type="text" class="tab-data"></td>
                        </tr>
                        <tr>
                            <td>Account Holder Name</td>
                            <td><input type="text" class="tab-data"></td>
                            <td>Account Number</td>
                            <td> <input type="text" class="tab-data"></td>
                        </tr>
                        <tr>
                            <td>Type of Account</td>
                            <td> <input type="text" class="tab-data"></td>
                            <td>Account Operational Since</td>
                            <td><input type="text" class="tab-data"></td>
                        </tr>
                        <tr>
                            <td>IFSC Code</td>
                            <td><input type="text" class="tab-data"></td>
                            <td>MICR Code:</td>
                            <td><input type="text" class="tab-data"></td>
                        </tr>
                    </thead>
                </table>
                {{-- <div class="card card-danger">
                    <div class="card-header text-center">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <div class="card-body">
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
                        <form action="{{url($url)}}" method="POST">
                            @csrf

                            <div class="row">
                                 <div class="div">
                                    <h4>For Office Use Only</h4>

                                 </div>
                            </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="">Role Name</label>
                                <input type="text" name="rname" id="rname" class="form-control" placeholder="" aria-describedby="helpId"
                                value="{{ $roll->name ?? old('rname') }}">
                                @error('rname')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    </form>
                    </div>
                    <!-- /.card-body -->
                </div> --}}

            </div>
            <!-- /.col-md-6 -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
</div>
@endsection
