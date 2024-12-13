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

                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm">{{$back}}</a>
            <div class="col-lg-12">
                <form action="{{ route('update-document') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Hidden input to store customer_id from session -->
                     <?php
                     $session_id = Session::get('customer_id');
                     ?>
                    <input type="hidden" class="form-control-file" id="customermainnid" name="customermainnid" value="{{ $session_id }}">

                    <div class="row mb-3 d-flex justify-content-between">
                        <div>
                            <h6 style="font-weight: 700" class="mt-2 ml-2">{{ $title }}</h6>
                            <input type="hidden" id="docid" name="docid" value="{{ $mainid }}" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="lon_id" class="text-nowrap">Loan:</label>
                                <select class="form-control loan_id" id="lon_id" name="lon_id">
                                    @foreach($officedata as $office)
                                        <option value="{{ $office->loan_id }}" {{ $office->loan_id == $officedata[0]->loan_id ? 'selected' : '' }}>{{ $office->Prospect_No }}</option>
                                    @endforeach
                                </select>
                                @error('lon_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="customer_id" class="text-nowrap">Customer ID:</label>
                                <select class="form-control" id="customer_id" name="customer_id">
                                    @if(isset($proprietor->proprietor_id))
                                        <option value="{{ $proprietor->proprietor_id }}" selected>{{ $proprietor->proprietor_name }}</option>
                                    @elseif(isset($customer->cust_id))
                                        <option value="{{ $customer->cust_id }}" selected>{{ $customer->cust_name }}</option>
                                    @endif
                                </select>
                                @error('customer_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="identity_proof" class="text-nowrap">Identity Proof:</label>
                                <input type="file" class="form-control-file" id="identity_proof" value="cnklcnlckn" name="identity_proof" accept="image/*" >
                                <span class="text-muted">(Supported: Aadhaar Card, Voter ID Card)</span>
                                @error('identity_proof')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="bank_statement" class="text-nowrap">Bank Statement:</label>
                                <input type="file" class="form-control-file" id="bank_statement" name="bank_statement">
                                <span class="text-muted">(Bank statement previous 3 Months)</span>
                                @error('bank_statement')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="salary_slip" class="text-nowrap">Income Proof:</label>
                                <input type="file" class="form-control-file" id="salary_slip" name="salary_slip">
                                <span class="text-muted">(Supported Formats: PDF, DOCX, XLSX; Two Latest)</span>
                                @error('salary_slip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="salary_slip" class="text-nowrap">business Proof:</label>
                                <input type="file" class="form-control-file" id="business_proof" name="business_proof">
                                <span class="text-muted">(Supported Formats: PDF, DOCX, XLSX; Two Latest)</span>
                                @error('business_proof')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="salary_slip" class="text-nowrap">Adresss Proof:</label>
                                <input type="file" class="form-control-file" id="adresss_proof" name="adresss_proof">
                                 <span class="text-muted">(Supported Formats: PDF, DOCX, XLSX; Two Latest)</span>
                                @error('adresss_proof')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    // Fetch the initial values needed for the AJAX request
    var customerId1 = $('#customer_id').val();
    var lonid1 = $('#lon_id').val();
    var docsid = $("#docid").val();
    // alert(docsid);


    // Make sure customerId1 is not empty or null
    if (customerId1) {
        // Perform AJAX request
        $.ajax({
            // url: '/get-documents/' + customerId1 + '/' + lonid1 ,
            url: '/get-documentsmain/' + docsid,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.length === 0) {
                    $('#identity_proof').siblings('.text-muted').html('(Supported: Aadhaar Card, Voter ID Card)');
                    $('#bank_statement').siblings('.text-muted').html('(Bank statement previous 3 Months)');
                    $('#salary_slip').siblings('.text-muted').html('(Supported Formats: PDF, DOCX, XLSX; Two Latest)');
                    $('#business_proof').siblings('.text-muted').html('(Supported Formats: PDF, DOCX, XLSX; Two Latest)');
                    $('#adresss_proof').siblings('.text-muted').html('(Supported Formats: PDF, DOCX, XLSX; Two Latest)');

                } else {
                    $('#identity_proof').siblings('.text-muted').html('File: ' + data[0].identity_proof);
                    $('#bank_statement').siblings('.text-muted').html('File: ' + data[0].bank_statement);
                    $('#salary_slip').siblings('.text-muted').html('File: ' + data[0].salary_slip);
                    $('#business_proof').siblings('.text-muted').html('File: ' + data[0].business_proof);
                    $('#adresss_proof').siblings('.text-muted').html('File: ' + data[0].business_proof);


                }
            },
            error: function(error) {
                console.error("Error fetching Document:", error);
            }
        });
    } else {
        // Handle case when customerId1 is empty or null
        console.log('Customer ID is missing.');
    }
});
</script>

