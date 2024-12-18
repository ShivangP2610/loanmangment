@push('title')
    <title>REFERENCES Form</title>
@endpush
@extends('layout.main')

@section('main-section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        </div>

        <div class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- shivang hide this 17-12-2024 --}}
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <div class="row">

                    @include('sidebar')

                    <div class="col-lg-9">
                        <form action="{{ url($url) }}" method="POST">
                            @csrf <!-- Include CSRF token for Laravel form submission -->


                            <div id="partner-row-container">
                                        <div class="row mb-3 bg-red d-flex justify-content-between">
                                            <div>
                                                <h6 style="font-weight: 700" class="mt-2 ml-2">{{ $title }}</h6>
                                            </div>
                                            <div>

                                                    <a href="#" id="add-partner-row">
                                                        <i class="fas fa-plus mt-2 mr-2" style="color:white"></i>
                                                    </a>

                                            </div>
                                        </div>



                                        <div class="row mb-1 partner-row">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="name" class="text-nowrap">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name[]"
                                                        value="{{ isset($Refernce->Name) ? $Refernce->Name : old('name.0') }}">
                                                    @error('name.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address" class="text-nowrap">Address</label>
                                                    <textarea class="form-control" id="address" name="address[]" rows="1">{{ isset($Refernce->Address) ? $Refernce->Address : old('address.0') }}</textarea>
                                                    @error('address.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="city" class="text-nowrap">City</label>
                                                    <input type="text" class="form-control" id="city" name="city[]"
                                                        value="{{ isset($Refernce->City) ? $Refernce->City : old('city.0') }}">
                                                    @error('city.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="pincode" class="text-nowrap">Pincode</label>
                                                    <input type="text" class="form-control" id="pincode"
                                                        name="pincode[]"
                                                        value="{{ isset($Refernce->pincode) ? $Refernce->pincode : old('pincode.0') }}">
                                                    @error('pincode.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="state" class="text-nowrap">State</label>
                                                    <input type="text" class="form-control" id="state" name="state[]"
                                                        value="{{ isset($Refernce->State) ? $Refernce->State : old('state.0') }}">
                                                    @error('state.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="country" class="text-nowrap">Country</label>
                                                    <input type="text" class="form-control" id="country"
                                                        name="country[]"
                                                        value="{{ isset($Refernce->Country) ? $Refernce->State : old('country.0') }}">
                                                    @error('country.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="phone" class="text-nowrap">Phone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone[]"
                                                        value="{{ isset($Refernce->Phone) ? $Refernce->Phone : old('phone.0') }}">
                                                    @error('phone.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="mobile" class="text-nowrap">Mobile</label>
                                                    <input type="text" class="form-control" id="mobile"
                                                        name="mobile[]"
                                                        value="{{ isset($Refernce->Mobile) ? $Refernce->Mobile : old('mobile.0') }}">
                                                    @error('mobile.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="email" class="text-nowrap">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email[]"
                                                        value="{{ isset($Refernce->Email) ? $Refernce->Email : old('email.0') }}">
                                                    @error('email.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="applicntrelation" class="text-nowrap">Relation With
                                                        Applicant</label>
                                                    <input type="text" class="form-control" id="applicntrelation"
                                                        name="applicntrelation[]"
                                                        value="{{ isset($Refernce->Relation_with_applicant) ? $Refernce->Relation_with_applicant : old('applicntrelation.0') }}">
                                                    @error('applicntrelation.0')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>


                                    </div>


                            <div class="row mb-1">
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
@endsection


{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the container for partner rows
        const partnerRowContainer = document.getElementById('partner-row-container');

        // Get the plus button
        const addPartnerRowButton = document.getElementById('add-partner-row');

        // Add an event listener to the plus button
        addPartnerRowButton.addEventListener('click', function() {
            // Clone the header row
            const headerRow = partnerRowContainer.querySelector('.bg-red').cloneNode(true);

            // Clone the partner row
            const partnerRowTemplate = partnerRowContainer.querySelector('.partner-row').cloneNode(true);

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
        });
    });
</script> --}}

{{-- here 5-6-2024 stable code --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the container for partner rows
        const partnerRowContainer = document.getElementById('partner-row-container');

        // Get the plus button
        const addPartnerRowButton = document.getElementById('add-partner-row');

        // Add an event listener to the plus button
        addPartnerRowButton.addEventListener('click', function() {

            // echo "hello";
            // exit();
            // Clone the header row
            const headerRow = partnerRowContainer.querySelector('.bg-red').cloneNode(true);

            // Clone the partner row template inside the click event
            const partnerRowTemplate = partnerRowContainer.querySelector('.partner-row').cloneNode(
                true);

            // Clear input fields in the new row
            const inputFields = partnerRowTemplate.querySelectorAll('input, textarea');
            inputFields.forEach(function(input) {
                input.value = '';
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
        });
    });
</script>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const partnerRowContainer = document.getElementById('partner-row-container');

        const minusButtons = document.querySelectorAll('.remove-minus');
        minusButtons.forEach(function(minusButton) {
            minusButton.addEventListener('click', function() {
                const headerRow = minusButton.closest('.bg-red'); // Find the closest parent with class 'bg-red'
                if (!headerRow) {
                    console.error("Header row not found.");
                    return;
                }

                const partnerRow = headerRow.nextElementSibling;
                if (!partnerRow) {
                    console.error("Partner row not found.");
                    return;
                }

                console.log("Header Row:", headerRow);
                console.log("Partner Row:", partnerRow);

                // Check if parent-child relationship is valid
                console.log("Parent of Header Row:", headerRow.parentNode);
                console.log("Parent of Partner Row:", partnerRow.parentNode);

                // Remove both the header and partner rows
                console.log("Before Removal - Partner Row Container Children:", partnerRowContainer.childNodes);
                partnerRowContainer.removeChild(headerRow);
                partnerRowContainer.removeChild(partnerRow);
                console.log("After Removal - Partner Row Container Children:", partnerRowContainer.childNodes);
            });
        });
    });
</script> --}}
