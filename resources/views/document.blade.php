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

                <div class="col-lg-12">
                    <form action="{{ route('add-document') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 d-flex justify-content-between">
                            <div>
                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{$title}}</h6>
                            </div>

                        </div>
                        <input type="hidden" class="form-control-file" id="customermainnid" name="customermainnid" >
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="lon_id" class="text-nowrap">Loan:</label>
                                    <select class="form-control loan_id" id="lon_id" name="lon_id">
                                        <option value="" disabled {{ !session('mainloan_id') ? 'selected' : '' }}>Select a loan</option>
                                        <option value="{{ session('mainloan_id') }}" selected>{{ session('mainprospect_No') }}</option>
                                        {{-- @foreach ($loans as $loan)
                                            <option value="{{ $loan->loan_id }}">{{ $loan->Prospect_No }}</option>
                                        @endforeach --}}
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
                                        <option value="" disabled selected>Select a customer</option>
                                        </select>
                                    @error('customer_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-lg-4">
                            <div class="form-group">
                                <label for="identity_proof" class="text-nowrap">Identity Proof:</label>
                                <input type="file" class="form-control-file" id="identity_proof" name="identity_proof" accept="image/*">
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
                                    <input type="file" class="form-control-file" id="bank_statement" name="bank_statement"> <span class="text-muted">(Bank stament previous 3 Months)</span>
                                    @error('bank_statement')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="salary_slip" class="text-nowrap">Income Proof:</label>
                                    <input type="file" class="form-control-file" id="salary_slip" name="salary_slip"> <span class="text-muted">(Supported Formats: PDF, DOCX, XLSX; Two Latest)</span>
                                    @error('salary_slip')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="salary_slip" class="text-nowrap">business Proof:</label>
                                    <input type="file" class="form-control-file" id="business_proof" name="business_proof"> <span class="text-muted">(Supported Formats: PDF, DOCX, XLSX; Two Latest)</span>
                                    @error('salary_slip')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="salary_slip" class="text-nowrap">Adresss Proof:</label>
                                    <input type="file" class="form-control-file" id="adresss_proof" name="adresss_proof"> <span class="text-muted">(Supported Formats: PDF, DOCX, XLSX; Two Latest)</span>
                                    @error('salary_slip')
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


      <!-- <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Uploaded Documents</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Loan ID</th>
                                <th>Customer ID</th>
                                <th>Identity Proof</th>
                                <th>Bank Statement</th>
                                <th>Salary Slip</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ $document->loan_id }}</td>
                                    <td>{{ $document->customer_id }}</td>
                                    <td><a href="{{ asset('storage/' . $document->identity_proof) }}" target="_blank">View</a></td>
                                    <td><a href="{{ asset('storage/' . $document->bank_statement) }}" target="_blank">View</a></td>
                                    <td><a href="{{ asset('storage/' . $document->salary_slip) }}" target="_blank">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
</div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>



// $(document).ready(function() {
//     $('#lon_id').change(function() {
//         var loanId = $(this).val();
//         if (loanId) {
//             $.ajax({
//                 url: '/get-customers/' + loanId,
//                 type: 'GET',
//                 dataType: 'json',
//                 success: function(data) {
//                     $('#customer_id').empty();
//                     $('#customer_id').append($('<option>', {
//                         value: '',
//                         text: 'Select a customer',
//                         disabled: true,
//                         selected: true
//                     }));

//                     var customerNames = {}; // Object to store unique customer names

//                     $.each(data, function(key, item) {
//                         // Append customer option if not already added
//                         if (!customerNames[item.customer_id]) {
//                             $('#customer_id').append($('<option>', {
//                                 value: item.customer_id,
//                                 text: item.customer_name + ' (BORROWER)'
//                             }));
//                             customerNames[item.customer_id] = true; // Mark customer as added
//                             $('#customermainnid').val(item.customer_id);
//                         }

//                         // Append proprietor option if it exists
//                         if (item.proprietor_id && item.proprietor_name) {
//                             $('#customer_id').append($('<option>', {
//                                 value: item.proprietor_id,
//                                 text: item.proprietor_name + ' (Proprietor)'
//                             }));
//                         }
//                     });
//                 },
//                 error: function(error) {
//                     console.error("Error fetching customers:", error);
//                 }
//             });
//         } else {
//             $('#customer_id').empty();
//         }
//     });
// });
$(document).ready(function() {
    var selectedLoanId = $('#lon_id').val();
    if (selectedLoanId) {
        // $('#lon_id').trigger('change');
        $.ajax({
                url: '/get-customers/' + selectedLoanId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#customer_id').empty();
                    // $('#customer_id').append($('<option>', {
                    //     value: '',
                    //     text: 'Select a customer',
                    //     disabled: true,
                    //     selected: true
                    // }));

                    var selectedValues = {}; // Object to store selected values

                    // Gather selected values from existing options
                    $('#customer_id option:selected').each(function() {
                        selectedValues[$(this).val()] = true;
                    });

                    $.each(data, function(key, item) {



                        if (!selectedValues[item.customer_id]) {
                            $('#customer_id').append($('<option>', {
                                value: item.customer_id,
                                text: item.customer_name + ' (BORROWER)'
                            }));
                            selectedValues[item.customer_id] = true;
                            // customerNames[item.customer_id] = true; // Mark customer as added
                             $('#customermainnid').val(item.customer_id);
                        }


                        if (item.proprietor_id && item.proprietor_name && !selectedValues[item.proprietor_id]) {
                            $('#customer_id').append($('<option>', {
                                value: item.proprietor_id,
                                text: item.proprietor_name + ' (Proprietor)'
                            }));
                            selectedValues[item.proprietor_id] = true; // Mark proprietor as added
                        }
                    });

                    // $('#customer_id').click(function() {
                    //     var customerId = $(this).val();
                    //     alert(customerId);
                },
                error: function(error) {
                    console.error("Error fetching customers:", error);
                }
            });
    }
    // $('#lon_id').change(function() {
    //     var loanId = $(this).val();
    //     alert(loanId);
    //     if (loanId) {
    //         $.ajax({
    //             url: '/get-customers/' + loanId,
    //             type: 'GET',
    //             dataType: 'json',
    //             success: function(data) {
    //                 $('#customer_id').empty();
    //                 // $('#customer_id').append($('<option>', {
    //                 //     value: '',
    //                 //     text: 'Select a customer',
    //                 //     disabled: true,
    //                 //     selected: true
    //                 // }));

    //                 var selectedValues = {}; // Object to store selected values

    //                 // Gather selected values from existing options
    //                 $('#customer_id option:selected').each(function() {
    //                     selectedValues[$(this).val()] = true;
    //                 });

    //                 $.each(data, function(key, item) {



    //                     if (!selectedValues[item.customer_id]) {
    //                         $('#customer_id').append($('<option>', {
    //                             value: item.customer_id,
    //                             text: item.customer_name + ' (BORROWER)'
    //                         }));
    //                         selectedValues[item.customer_id] = true;
    //                         // customerNames[item.customer_id] = true; // Mark customer as added
    //                          $('#customermainnid').val(item.customer_id);
    //                     }


    //                     if (item.proprietor_id && item.proprietor_name && !selectedValues[item.proprietor_id]) {
    //                         $('#customer_id').append($('<option>', {
    //                             value: item.proprietor_id,
    //                             text: item.proprietor_name + ' (Proprietor)'
    //                         }));
    //                         selectedValues[item.proprietor_id] = true; // Mark proprietor as added
    //                     }
    //                 });

    //                 // $('#customer_id').click(function() {
    //                 //     var customerId = $(this).val();
    //                 //     alert(customerId);
    //             },
    //             error: function(error) {
    //                 console.error("Error fetching customers:", error);
    //             }
    //         });
    //     } else {
    //         $('#customer_id').empty();
    //     }
    // });
});
$(document).ready(function() {
    $('#customer_id').click(function() {
        var customerId1 = $(this).val();
        var lonid1 =  $('#lon_id').val();
        // alert(lonid1);


    if(customerId1) {

            $.ajax({
                url: '/get-documents/' + customerId1 + '/' + lonid1,
                type: 'GET',
                dataType: 'json',
                success: function(data) { 
                    // alert(data[0].salary_slip);
                    console.log(data);
                    if(data == '')
                    {
                        $('#identity_proof').siblings('.text-muted').html('(Supported: Aadhaar Card, Voter ID Card)');
                        $('#bank_statement').siblings('.text-muted').html('(Bank statement previous 3 Months)');
                        $('#salary_slip').siblings('.text-muted').html('(Supported Formats: PDF, DOCX, XLSX; Two Latest)');
                    }
                    else{
                        $('#identity_proof').siblings('.text-muted').html('File: ' + data[0].identity_proof);
                        $('#bank_statement').siblings('.text-muted').html('File: ' + data[0].bank_statement);
                        $('#salary_slip').siblings('.text-muted').html('File: ' + data[0].salary_slip);  
                        $('#business_proof').siblings('.text-muted').html('File: ' + data[0].business_proof);  
                        $('#adresss_proof').siblings('.text-muted').html('File: ' + data[0].adresss_proof); 

                        
                    }

                },
                error: function(error) {
                    console.error("Error fetching Document:", error);
                }
            });
        } else {

            // $('#identity_proof').siblings('.text-muted').html('(Supported: Aadhaar Card, Voter ID Card)');
            // $('#bank_statement').siblings('.text-muted').html('(Bank statement previous 3 Months)');
            // $('#salary_slip').siblings('.text-muted').html('(Supported Formats: PDF, DOCX, XLSX; Two Latest)');
        }
    });
});



</script>
