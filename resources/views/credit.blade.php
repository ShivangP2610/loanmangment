@push('title')
<title>Credit form</title>
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
                    <form action="{{ route('add-credit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 d-flex justify-content-between">
                            <div>
                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{$title}}</h6>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="lon_id" class="text-nowrap">Loan:</label>
                                    {{-- <select class="form-control loan_id" id="lon_id" name="lon_id">
                                        <option value="" disabled selected>Select a loan</option>
                                        @foreach ($loans as $loan)
                                            <option value="{{ $loan->loan_id }}">{{ $loan->Prospect_No }}</option>
                                        @endforeach
                                    </select> --}}
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
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="customer_id" class="text-nowrap">Customer:</label>
                                    <select class="form-control" id="customer_id" name="customer_id">
                                        <option value="" disabled selected>Select a customer</option>
                                        </select>
                                    @error('customer_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="cam_uplod" class="text-nowrap">Cam Uplod:</label>
                                  <input type="file" class="form-control-file" id="cam_uplod" name="cam_uplod" accept=".xlsx,.xls">
                                  <span class="text-muted">(Supported: Excel Files (.xlsx, .xls))</span>
                                  @error('cam_uplod')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="final_uplod" class="text-nowrap">Final Uplod:</label>
                                  <input type="file" class="form-control-file" id="final_uplod" name="final_uplod" accept=".xlsx,.xls">
                                  <span class="text-muted">(Supported: Excel Files (.xlsx, .xls))</span>
                                  @error('final_uplod')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">{{$btext}}</button>
                                <button type="Reset" class="btn btn-primary">Reset</button>

                           </div>
                        </div>

                        <!-- <div class="col-lg-4">
                            <div class="form-group">
                                <label for="status" class="text-nowrap">Status:</label>

                                <select class="form-control" id="status" name="status">
                                    <option value="">Select a Status</option>
                                    <option value="credit approved">Done</option>
                                    <option value="document approved">Pending</option>
                                    </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> -->

                        {{-- <div class="row">
                           <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">{{$btext}}</button>
                                <button type="Reset" class="btn btn-primary">Reset</button>

                           </div>
                        </div> --}}
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <h6 style="font-weight: 700">Example Table</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Application view</th>
                            <th>Document view</th>
                            <th>CAM view</th>
                            <th>Decision</th>
                            <!-- Add more headers as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><button type="button" class="btn btn-link" onclick="fetchLoanData('viewapplication')"><i class="fas fa-eye"></i></button> View Application</td>
                        <td><button type="button" class="btn btn-link" onclick="fetchLoanData('viewdocument1')"><i class="fas fa-eye"></i></button> View Document</td>
                        <td><button type="button" class="btn btn-link" onclick="fetchLoanData('viewcam')"><i class="fas fa-eye"></i></button> View CAM</td>
                        <td><button type="button" class="btn btn-link" id="adddesicion"><i class="fa fa-plus mr-2"></i>Add</button></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
    <!-- <div class="col-lg-12">
        <button type="button" class="btn btn-primary" onclick="fetchLoanData('viewapplication')">View Application</button>
        <button type="button" class="btn btn-primary" onclick="fetchLoanData('viewdocument')">View Document</button>
        <button type="button" class="btn btn-primary" onclick="fetchLoanData('viewcam')">View CAM</button>
    </div> -->
</div>

        </div>
        <!-- /.container-fluid -->
      </div>
</div>
<div class="modal fade " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Decision</h5>
                <button type="button" class="close close1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('add-creditstage') }}" method="POST">
                                @csrf

                                <input type="text" id="cust_id_main" name="cust_id_main" val="" hidden>
                                <input type="text" id="loan_id_main" name="loan_id_main" val="" hidden>
                                <input type="text" id="credit_id" name="credit_id" val="" hidden>
                                <!-- Row 2 -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Requested Amount</label>
                                            <input type="text" class="form-control" name="requested_amount" id="requested_amount" placeholder="Requested Amount" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput4">Requested Tenure(Months)</label>
                                            <input type="text" class="form-control" name="requested_tenure" id="requested_tenure" placeholder="Requested Tenure(Months)" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput4">Sanctioned Amount</label>
                                            <input type="text" class="form-control" name="sanctioned_amount" id="sanctioned_amount" placeholder="Sanctioned Amount">
                                        </div>
                                    </div>
                                </div>
                                <!-- Row 3 -->
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Maximum Sanctioned Amount</label>
                                            <input type="text" class="form-control" name="maximum_sanctioned_amount" id="maximum_sanctioned_amount" placeholder="Maximum Sanctioned Amount">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput4">Sanctioned Tenure(Months)</label>
                                            <input type="text" class="form-control" name="sanctioned_tenure" id="sanctioned_tenure" placeholder="Sanctioned Tenure(Months)">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput4">Maximum Sanctioned Tenure(Months)</label>
                                            <input type="text" class="form-control" name="maximum_sanctioned_tenure" id="maximum_sanctioned_tenure" placeholder="Maximum Sanctioned Tenure(Months)">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Sanctioned Interest</label>
                                            <div class="form-check">
                                                <div class="form-check form-check-inline" style="margin-left:-20px;">
                                                    <input class="form-check-input" type="radio" name="sanctionedInterest" id="sanctionedInterest1" value="8">
                                                    <label class="form-check-label" for="sanctionedInterest1">
                                                        8 % as per Scheme
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sanctionedInterest" id="sanctionedInterest2" value="0">
                                                    <label class="form-check-label" for="sanctionedInterest2">
                                                        Others
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row 4 -->
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Sanctioned Interest</label>
                                            <div class="form-check">
                                                <div class="form-check form-check-inline" style="margin-left:-20px;">
                                                    <input class="form-check-input" type="radio" name="sanctionedInterest" id="sanctionedInterest1" value="8">
                                                    <label class="form-check-label" for="sanctionedInterest1">
                                                        8 % as per Scheme
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sanctionedInterest" id="sanctionedInterest2" value="0">
                                                    <label class="form-check-label" for="sanctionedInterest2">
                                                        Others
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput4">Policy Rate</label>
                                            <input type="text" class="form-control" name="policyrate" id="policyrate" placeholder="Policy Rate" readonly>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput4">Product Discount</label>
                                            <input type="text" class="form-control" name="product_discount" id="product_discount" placeholder="Product Discount">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput4">Applicable Rate</label>
                                            <input type="text" class="form-control" name="applicable_rate" id="applicable_rate" placeholder="Applicable Rate" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Package Discount</label>
                                            <input type="text" class="form-control" name="package_discount" id="package_discount" placeholder="Package Discount">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput4">Total Discount</label>
                                            <input type="text" class="form-control" name="total_discount" id="total_discount" placeholder="Total Discount" readonly>
                                        </div>
                                    </div> --}}

                                </div>
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Capital Funded</label>
                                            <input type="text" class="form-control" name="capital_funded" id="capital_funded" placeholder="Capital Funded" readonly>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Application status</label>
                                            <div class="form-check">
                                                <div class="form-check form-check-inline" style="margin-left:-20px;">
                                                    <input class="form-check-input" type="radio" name="application" id="Approve" value="Approve">
                                                    <label class="form-check-label" for="Approve">
                                                        Approve
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="application" id="Reject" value="Reject">
                                                    <label class="form-check-label" for="Reject">
                                                        Reject
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="application" id="Hold" value="Hold">
                                                    <label class="form-check-label" for="Hold">
                                                        Hold
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Application Status</label>
                                            <div class="form-check">
                                                {{-- <div class="form-check form-check-inline" style="margin-left:-20px;">
                                                    <input class="form-check-input" type="radio" name="application" id="Approve" value="Approve" onclick="toggleReasonTextarea(this)">
                                                    <label class="form-check-label" for="Approve">Approve</label>
                                                </div> --}}
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="application" id="ApproveConditions" value="Approve" onclick="toggleReasonTextarea(this)">
                                                    <label class="form-check-label" for="ApproveConditions">Approve</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="application" id="Reject" value="Reject" onclick="toggleReasonTextarea(this)">
                                                    <label class="form-check-label" for="Reject">Reject</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="application" id="Hold" value="Hold" onclick="toggleReasonTextarea(this)">
                                                    <label class="form-check-label" for="Hold">Hold</label>
                                                </div>
                                            </div>
                                            <!-- Textarea for reason -->


                                            <div id="reason-textarea-container" style="display: none; margin-top: 10px;">
                                                <label for="reason-textarea" id="reason-label"></label>
                                                <textarea class="form-control" id="reason-textarea" name="reason" rows="3" placeholder="Enter detailed reason"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="reset" class="btn btn-secondary ml-2" data-dismiss="modal">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('lon_id').addEventListener('change', function () {
            var loanId = this.value;

            // alert(loanId);
            fetchLoanData(loanId);
        });

    });

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


     ///  
     
  
     

   
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
    //                 $('#customer_id').empty();
    //                 $.each(data.customers, function(key, customer) {
    //                     $('#customer_id').append($('<option>', {
    //                         value: customer.cust_id,
    //                         text: customer.cust_name
    //                     }));
    //                     $("#cust_id_main").val(customer.cust_id)

    //                 });
    //                 if (data.officedata) {
    //                     $("#requested_amount").val(data.officedata.Loan_Amount);
    //                     $("#requested_tenure").val(data.officedata.Months);
    //                     $("#loan_id_main").val(data.officedata.loan_id)
    //                 } else {
    //                     $("#requested_amount").val('');
    //                     $("#requested_tenure").val('');
    //                 }

    //             },
    //             error: function(error) {
    //                 console.error("Error fetching customers:", error);
    //             }
    //         });
    //     } else {
    //         $('#customer_id').empty();
    //     }
    // }); 



    $("#adddesicion").on('click',function()
    { 
        // alert('shhshsgh')
        var loanId = document.getElementById('lon_id').value; 
        // alert(loanId);
        if(loanId)
        {
            $('.modal').modal('show');
            $.ajax({
                url: '/get-creditdata/' + loanId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {

                    console.log(data);
                    if (data && Object.keys(data).length > 0) { // Check if data is not empty
                        $("#requested_amount").val(data.requested_amount);
                        $("#requested_tenure").val(data.requested_tenure);
                        $("#sanctioned_amount").val(data.sanctioned_amount);
                        $("#maximum_sanctioned_amount").val(data.maximum_sanctioned_amount);
                        $("#sanctioned_tenure").val(data.sanctioned_tenure);
                        $("#maximum_sanctioned_tenure").val(data.maximum_sanctioned_tenure);
                        $("#policyrate").val(data.policyrate);
                        $("#applicable_rate").val(data.applicable_rate);
                        $("#reason-label").val(data.reason);


                        // Set the radio buttons for sanctionedInterest
                        if (data.sanctionedInterest === "8") {
                            $("#sanctionedInterest1").prop("checked", true);
                        } else {
                            $("#sanctionedInterest2").prop("checked", true).val(data.sanctionedInterest);
                        }

                        // Set the radio buttons for application status
                        if (data.application === "Approve") {
                            $("#Approve").prop("checked", true);
                        } else if (data.application === "Reject") {
                            $("#Reject").prop("checked", true);
                        } else if (data.application === "Hold") {
                            $("#Hold").prop("checked", true);
                        }

                        $("#credit_id").val(data.credit_id);


                         // Handle the reason field
                        if (data.reason) {
                        $("#reason-textarea-container").show(); // Show the textarea container
                        $("#reason-textarea").val(data.reason); // Set the value in the textarea
                    } else {
                        $("#reason-textarea-container").hide(); // Hide the textarea if no reason is available
                        $("#reason-textarea").val(''); // Clear any previous value
                    }

                    }
                    else{

                        $("#sanctioned_amount").val('');
                        $("#maximum_sanctioned_amount").val('');
                        $("#sanctioned_tenure").val('');
                        $("#maximum_sanctioned_tenure").val('');
                        $("#policyrate").val('');
                        $("#applicable_rate").val('');
                         // Set the radio buttons for sanctionedInterest
                        if (data.sanctionedInterest === "8") {
                            $("#sanctionedInterest1").prop("checked", true);
                        } else {
                            $("#sanctionedInterest2").prop("checked", false).val(data.sanctionedInterest);
                        }

                        // Set the radio buttons for application status
                        if (data.application === "Approve") {
                            $("#Approve").prop("checked", false);
                        } else if (data.application === "Reject") {
                            $("#Reject").prop("checked", false);
                        } else if (data.application === "Hold") {
                            $("#Hold").prop("checked", false);
                        }



                    }
                },
                error: function(error) {
                    console.error("Error fetching customers:", error);
                }
            });
        }
        else
        {
            alert("please select at least one loan application");
        }

    });

    $("input[name='sanctionedInterest']").on('click', function() {
        var val = $(this).val();
        if(val != 0)
        {
            $('#policyrate').val(val).prop('readonly', true);
            $('#applicable_rate').val(val);
        }
        else{
            $('#policyrate').val(val).prop('readonly', false);
            $('#applicable_rate').val('');
        }

    });

    $("#policyrate").on('input',function(){
        var val = $(this).val();
        $('#applicable_rate').val(val);

    });

    $("#package_discount").on('input', function() {
        var pr_discount = parseFloat($("#product_discount").val()) || 0;
        var pckg_discount = parseFloat($(this).val()) || 0;

        var total_amount = pr_discount + pckg_discount;
        $("#total_discount").val(total_amount);

        var maximum_sanctioned_amount = parseFloat($("#maximum_sanctioned_amount").val()) || 0;
        var apval = maximum_sanctioned_amount - total_amount;

        $("#capital_funded").val(apval);
    });

    $('.close1').on('click',function()
    {
        $('.modal').modal('hide');
    });

    $("#sanctioned_tenure").on('input', function() {

        let sanctionedTenure = parseInt($(this).val());
        let requestedTenure = parseInt($("#requested_tenure").val());

        if (!isNaN(sanctionedTenure) && !isNaN(requestedTenure)) {

            if (sanctionedTenure > requestedTenure) {

                alert("Sanctioned tenure cannot be higher than the requested tenure!");

                $(this).val('');
            }
        }
    });


});



function fetchLoanData(viewType) {
        var loanId = document.getElementById('lon_id').value;

        if (!loanId) {
            alert('Please select a loan.');
            return;
        }
        // alert(loanId);

        // Determine the route based on viewType
        var route;
        if (viewType === 'viewapplication') {
            // alert('faggagsfgh');
            route = '/viewapplication/' + loanId;
        } else if (viewType === 'viewdocument1') {
            route = '/viewdocument1/' + loanId;
            alert
        } else if (viewType === 'viewcam') {
            route = '/viewcam1/' + loanId ;
        }

        if (route) {
            // alert(route);
            window.location.href = route;
        } else {
            console.error('Invalid route:', viewType);
        }
}

    </script>


{{-- <script>
    function toggleReasonInput(radio) {
        const reasonContainer = document.getElementById('reason-input-container');
        const reasonLabel = document.getElementById('reason-label');

        if (radio.value === 'Reject' || radio.value === 'Hold') {
            reasonContainer.style.display = 'block';
            reasonLabel.innerText = `Reason for ${radio.value}:`;
        } else {
            reasonContainer.style.display = 'none';
            reasonLabel.innerText = '';
        }
    }
</script>  --}}

{{-- <script>
    function toggleReasonInput(radio) {
        const reasonContainer = document.getElementById('reason-input-container'); // Div containing input
        const reasonLabel = document.getElementById('reason-label'); // Label for the input

        // Check the selected radio button value
        if (radio.value === 'Reject' || radio.value === 'Hold' || radio.value === 'Approve with Conditions') {
            reasonContainer.style.display = 'block'; // Show the input area
            reasonLabel.innerText = `Reason for ${radio.value}:`; // Update the label dynamically
        } else {
            reasonContainer.style.display = 'none'; // Hide the input area
            reasonLabel.innerText = ''; // Clear the label
        }
    }
</script>   --}}

<script>
    function toggleReasonTextarea(radio) {
        const reasonContainer = document.getElementById('reason-textarea-container'); // Div containing textarea
        const reasonLabel = document.getElementById('reason-label'); // Label for the textarea

        // Check the selected radio button value
        if (radio.value === 'Reject' || radio.value === 'Hold' || radio.value === 'Approve') {
            reasonContainer.style.display = 'block'; // Show the textarea
            reasonLabel.innerText = `Reason for ${radio.value}:`; // Update the label dynamically
        } else {
            reasonContainer.style.display = 'none'; // Hide the textarea
            reasonLabel.innerText = ''; // Clear the label
        }
    }
</script>  

<script>
    $(document).ready(function() {
    var getLoanId = $('#lon_id').val(); 

    if (getLoanId) {
        // alert('Loan ID detected: ' + getLoanId); 

        // Make an AJAX call
        $.ajax({
            url: '/get-orignalcustomers/' + getLoanId, 
            type: 'GET', 
            dataType: 'json', 
            success: function(data) {
                console.log('AJAX response:', data); 
                
                
            
               

                // Populate office data if available
                if (data.officedata) { 
                    // alert(data.officedata);
                    $("#requested_amount").val(data.officedata.Loan_Amount);
                    $("#requested_tenure").val(data.officedata.Months);
                    $("#loan_id_main").val(data.officedata.loan_id);  
                    $("#cust_id_main").val(data.officedata.customer_id); 
                } else {
                    $("#requested_amount").val('');
                    $("#requested_tenure").val('');
                }
            },
            error: function(error) {
                console.error('Error during AJAX request:', error);
                alert('Failed to fetch data. Please check the console for more details.');
            }
        });
    } else {
        alert('No Loan ID found!');
    }
});

</script>

{{-- <script>
    function toggleReasonTextarea(radio) {
        const reasonContainer = document.getElementById('reason-textarea-container'); // Div containing textarea
        const reasonLabel = document.getElementById('reason-label'); // Label for the textarea

        // Check the selected radio button value
        if (radio.value === 'Reject' || radio.value === 'Hold' || radio.value === 'Approve with Conditions') {
            reasonContainer.style.display = 'block'; // Show the textarea
            reasonLabel.innerText = `Reason for ${radio.value}:`; // Update the label dynamically
        } else {
            reasonContainer.style.display = 'none'; // Hide the textarea
            reasonLabel.innerText = ''; // Clear the label
        }
    }
</script> --}}
