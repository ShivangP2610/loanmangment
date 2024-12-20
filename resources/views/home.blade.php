@push('title')
    <title>Home</title>
@endpush
@extends('layout.main')

@section('main-section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="text-align: start">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            {{-- <li class="breadcrumb-item active">Add Brand</li> --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">

                        {{-- <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional
                                            content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional
                                            content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-search-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-search" type="button" role="tab"
                                    aria-controls="pills-search" aria-selected="true">
                                    Search
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-new-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-new" type="button" role="tab" aria-controls="pills-new"
                                    aria-selected="false">
                                    New Add
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <!-- Search Tab -->
                            <div class="tab-pane fade show active" id="pills-search" role="tabpanel"
                                aria-labelledby="pills-search-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="searchvalue"
                                                placeholder="Search here..." aria-label="Search here"
                                                aria-describedby="button-search">
                                            <button class="btn btn-primary" type="button"
                                                id="button-search">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- New Add Tab -->
                            <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
                                <!-- Content loaded dynamically -->
                                <div id="new-add-content">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection

{{-- shivang add this 05-12-2024 --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#button-search").on('click', function() {
            var searchValue = $('#searchvalue').val();

            if (searchValue) {
                var url = '/viewappliation/' + searchValue;
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.href = '/viewappliation/' + searchValue;
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error('Error:', error);
                    }
                });
            }
        });

        $("#pills-new-tab").on('click', function() {
            // Redirect to the 'office/add' route
            window.location.href = '/office/add';
        });

    });
</script>
<script>
    // Automatically remove alerts after 5 seconds
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.classList.remove('show');
            alert.addEventListener('transitionend', () => alert.remove());
        });
    }, 3000);
</script>
