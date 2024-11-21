@push('title')
<title>Add User</title>
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
              <li class="breadcrumb-item active">Add User</li>
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
                        <form action="{{url($url)}}" method="POST">
                            @csrf
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="">User Name</label>
                                <input type="text" name="uname" id="uname" class="form-control" placeholder="" aria-describedby="helpId"
                                value="{{ $user->name ?? old('uname') }}">
                                @error('bname')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                              </div>
                            </div>
                        <div class="row">
                              <div class="form-group col-4">
                                <label for="">User Email</label>
                                <input type="email" name="uemail" id="uemail" class="form-control" placeholder="" aria-describedby="helpId"
                                value="{{ $user->email ?? old('uemail') }}">
                                @error('uemail')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                              </div>
                        </div>
                        {{-- <div class="row">
                              <div class="form-group col-4">
                                <label for="">User Password</label>
                                <input type="password" name="upass" id="upass" class="form-control" placeholder="" aria-describedby="helpId"
                                value="{{ old('upass') }}">
                                @error('upass')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                              </div>
                        </div> --}}

                        @if ($btext != 'Update')
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="upass">User Password</label>
                                <div class="input-group">
                                    <input type="password" name="upass" id="upass" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $user->password ?? old('upass') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('upass')
                                <span class="text-red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <h4 class="fw-bold">Role Name</h4>
                        <div class="row mt-4">
                              <div class="form-group col-4">

                                @foreach ($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="rname" class="form-check-input"  style="height:18px; width:18px;"
                                        value="{{ $role->name }}"
                                        @if (isset($user) && $user->roles->contains('name', $role->name))
                                        checked
                                        @endif>
                                        <label class="form-check-label" style="font-size: 20px;font-weight: 600;">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach

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

@push('scripts')
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#upass');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye icon
        this.classList.toggle('fa-eye-slash');
    });
</script>
@endpush
