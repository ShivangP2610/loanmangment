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
                        <h1 class="m-0">Dashboard</h1>
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
                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-sm-6">
                                {{-- <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional
                                            content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-sm-6">
                                {{-- <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional
                                            content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        {{-- <div class="card card-danger">
                    <div class="card-header text-center">
                        <h3 class="card-title">home</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="">Brand Name</label>
                                <input type="text" name="bname" id="bname" class="form-control" placeholder="" aria-describedby="helpId"
                                value="{{$reg->brand_name ?? old('bname') }}">
                                @error('bname')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                              </div>



                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
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
