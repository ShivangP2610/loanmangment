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
                    <form action="{{ route('add-cam') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 d-flex justify-content-between">
                            <div>
                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{$title}}</h6>
                            </div>
                          
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="lon_id" class="text-nowrap">Loan:</label>
                                    <select class="form-control loan_id" id="lon_id" name="lon_id">
                                        <option value="" disabled selected>Select a loan</option>
                                        @foreach ($loans as $loan)
                                            <option value="{{ $loan->loan_id }}">{{ $loan->Prospect_No }}</option>
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
                                        <option value="" disabled selected>Select a customer</option>
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
                                  @error('excel_uplod')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                              </div>
                        </div> 

                        <!-- <div class="col-lg-4">
                            <div class="form-group">
                                <label for="status" class="text-nowrap">Status:</label>
                                 
                                <select class="form-control" id="status" name="status">
                                    <option value="">Select a Status</option> 
                                    <option value="cam approved">Done</option> 
                                    <option value="document approved">Pending</option> 

                                    {{-- <option value="">cam approved</option> 
                                    <option value="">credit approved</option>  --}}
                                    
                                    </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> -->

                       

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
   
$(document).ready(function() {
    $('#lon_id').change(function() {  
        // console.log('haasdfgasdfgh');
        var loanId = $(this).val(); 
        // alert(loanId);
        if (loanId) {
            $.ajax({
                url: '/get-orignalcustomers/' + loanId,
                type: 'GET',
                dataType: 'json',
                success: function(data) { 
                    console.log(data);
                    $('#customer_id').empty();
                    $.each(data, function(key, customer) {
                        $('#customer_id').append($('<option>', {
                            value: customer[0].cust_id,
                            text: customer[0].cust_name
                        }));
                    });
                },
                error: function(error) {
                    console.error("Error fetching customers:", error);
                }
            });
        } else {
            $('#customer_id').empty();
        }
    });
});
    </script>
