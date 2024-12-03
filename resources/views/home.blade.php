@push('title')
    <title>Loan Management Dashboard</title>
@endpush

@extends('layout.main')

@section('main-section')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Loan Management Dashboard</h2>

    {{-- Display Success or Error Messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Loan and Customer Selection --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Loan and Customer Details</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                {{-- Loan Dropdown --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lon_id" class="form-label">Loan:</label>
                        <select class="form-control" id="lon_id" name="lon_id">
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

                {{-- Customer Dropdown --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="customer_id" class="form-label">Customer:</label>
                        <select class="form-control" id="customer_id" name="customer_id">
                            <option value="" disabled selected>Select a customer</option>
                        </select>
                        @error('customer_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- New Loan Application Button --}}
    <div class="d-flex justify-content-end mb-4">
        <button id="newLoan" class="btn btn-success btn-lg">New Loan Application</button>
    </div>

    {{-- Loan Application Form --}}
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Loan Application Form</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('loan.save') }}" method="POST">
                @csrf
                <div class="row g-3">
                    {{-- Loan Application Number --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="application_number" class="form-label">Loan Application Number:</label>
                            <input type="text" class="form-control" id="application_number" name="application_number" 
                                value="{{ session('loan_application_number') ?? '' }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary btn-lg">Save Loan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Handle loan dropdown change
        $('#lon_id').on('change', function() { 
            alert('djdjdjdh');
            const loanId = $(this).val();

            if (loanId) {
                $.ajax({
                    url: `/get-orignalcustomers/${loanId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate customer dropdown
                        const customerDropdown = $('#customer_id');
                        customerDropdown.empty().append('<option value="" disabled selected>Select a customer</option>');

                        if (data.customers && data.customers.length > 0) {
                            $.each(data.customers, function(index, customer) {
                                customerDropdown.append(
                                    `<option value="${customer.cust_id}">${customer.cust_name}</option>`
                                );
                            });

                            // Set hidden fields if office data exists
                            if (data.officedata) {
                                $('#requested_amount').val(data.officedata.Loan_Amount);
                                $('#requested_tenure').val(data.officedata.Months);
                                $('#loan_id_main').val(data.officedata.loan_id);
                            } else {
                                $('#requested_amount, #requested_tenure').val('');
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching customers:', error);
                        alert('Error fetching customer data. Please try again.');
                    },
                });
            } else {
                $('#customer_id').empty().append('<option value="" disabled selected>Select a customer</option>');
            }
        });
    });
</script>
@endsection
