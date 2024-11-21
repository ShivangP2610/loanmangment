@push('title')
<title>role</title>
@endpush
@extends("layout.main")

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
              <li class="breadcrumb-item active">Add Permission</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">

                <div class="card card-danger">
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

                            <div class="form-group col-4">
                                <label for="">Role Name</label>
                                <input type="text" name="rname" id="rname" class="form-control" placeholder="" aria-describedby="helpId"
                                value="{{ $roll->name ?? old('rname') }}">
                                @error('rname')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <h4>Permission Name</h4>
                        <div class="row">
                            {{-- <h3>Permission Name</h3><br> --}}
                            <div class="form-group col-6">

                                    @foreach ($permissions as $permission)

                                    <label for="">
                                        <input type="checkbox" name="pname[]"  class="form-checkbox ml-2 h-5 w-5 text-300" placeholder="" aria-describedby="helpId"
                                        value="{{ $permission->id ?? old('pname') }}"
                                        @if (isset($roll) && count($roll->permissions->where('id', $permission->id)))
                                                checked
                                        @endif
                                        ><span class="ml-1" style="font-size: 18px">{{$permission->name}}</span>
                                    </label>

                                    @endforeach

                                {{-- @error('pname')
                                <span class="text-red">{{$message}}</span>
                                @enderror --}}
                            </div>

                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-primary">{{$btext}}</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>

                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
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
