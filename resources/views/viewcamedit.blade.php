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
                    <form action="{{ isset($cam) ? route('update-cam', $cam->id) : route('add-cam') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row mb-3 d-flex justify-content-between">
                            <div>
                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{ $title }}</h6>
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="lon_id" class="text-nowrap">Loan:</label>
                                    <select class="form-control loan_id" id="lon_id" name="lon_id">
                                        <option value="" disabled {{ !isset($cam) ? 'selected' : '' }}>Select a loan</option>
                                        @foreach ($loans as $loan)
                                            <option value="{{ $loan->loan_id }}" {{ (isset($cam) && $cam->lon_id == $loan->loan_id) ? 'selected' : '' }}>
                                                {{ $loan->Prospect_No }}
                                            </option>
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
                                        <option value="" disabled {{ !isset($cam) ? 'selected' : '' }}>Select a customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ (isset($cam) && $cam->customer_id == $customer->id) ? 'selected' : '' }}>
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="excel_uplod" class="text-nowrap">Excel Uplod:</label>
                                    <input type="file" class="form-control-file" id="excel_uplod" name="excel_uplod" accept=".xlsx,.xls">
                                    <span class="text-muted">(Supported: Excel Files (.xlsx, .xls))</span>
                                    @if (isset($cam) && $cam->excel_uplod)
                                        <p class="mt-2">Current File: <a href="{{ asset('storage/documents/cam/' . $cam->excel_uplod) }}" target="_blank">{{ $cam->excel_uplod }}</a></p>
                                    @endif
                                    @error('excel_uplod')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">{{ $btext }}</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

$(document).ready(function() {
    // $('#lon_id').change(function() {
    //     // console.log('haasdfgasdfgh');
    //     var loanId = $(this).val();
    //     // alert(loanId);
    //     if (loanId) {
    //         $.ajax({
    //             url: '/get-orignalcustomers/' + loanId,
    //             type: 'GET',
    //             dataType: 'json',
    //             success: function(data) {
    //                 console.log(data);
    //                 $('#customer_id').empty();
    //                 $.each(data, function(key, customer) {
    //                     $('#customer_id').append($('<option>', {
    //                         value: customer[0].cust_id,
    //                         text: customer[0].cust_name
    //                     }));
    //                 });
    //             },
    //             error: function(error) {
    //                 console.error("Error fetching customers:", error);
    //             }
    //         });
    //     } else {
    //         $('#customer_id').empty();
    //     }
    // });
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
});
    </script>
