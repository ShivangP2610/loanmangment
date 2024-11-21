@push('title')
    <title>Application</title>
@endpush

@push('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
@endpush

@extends("layout.main")

@section('main-section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <?php
                        if(isset($back))
                        {  ?>
                            <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm">{{$back}}</a>
                        <?php  }
                        ?>
                        <h1 class="m-0" style="text-align: start;">Document</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Application View</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
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

                        @can('User access')


                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="text-nowrap">
                                <tr>
                                    <th>No</th>
                                    <th>customer</th>
                                    <th>Lon</th>
                                    <th>IdentityProof</th>
                                    <th>Bank statement</th>
                                    <th>Salary Slip</th>
                                    <th>Business Proof</th>
                                    <th>Adresss Proof</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="text-nowrap">
                                  @php $counter = 1; @endphp
                                @foreach($documentlist as $document)
                                @if($document->customer_id != $document->proprietor_id)
                                <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $document->proprietorDetails->proprietor_name }}</td>
                                        <td>{{ $document->loan->Prospect_No }}</td>
                                        <td>
                                            @if ($document->identity_proof)
                                              <a href="#" class="d-inline-block" data-bs-toggle="modal" data-bs-target="#identityProofModal">
                                                <img src="{{ asset('storage/documents/identity_proofs/' . $document->identity_proof) }}" alt="Identity Proof" width="100" height="100">
                                              </a>
                                            @else
                                              N/A
                                            @endif
                                          </td>


                                        <td>
                                       @if ($document->bank_statement)
                                            <a href="{{ route('download.bank_statement', ['id' => $document->id]) }}" download>
                                            <i class="fas fa-file-excel"></i> </a>
                                          @else
                                              N/A
                                          @endif
                                         </td>

                                               <td>
                                            @if ($document->salary_slip)
                                            <a href="{{ route('download.salary_slip', ['id' => $document->id]) }}" download>
                                            <i class="fas fa-file-pdf"></i> </a>
                                            @else
                                                N/A
                                            @endif
                                            </td>

                                            {{-- shivang add 19-11-2024 --}}
                                            <td>
                                                @if ($document->business_proof)
                                                <a href="{{ route('download.business_proof', ['id' => $document->id]) }}" download>
                                                <i class="fas fa-file-pdf"></i> </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                    @if ($document->adresss_proof)
                                                    <a href="{{ route('download.adresss_proof', ['id' => $document->id]) }}" download>
                                                    <i class="fas fa-file-pdf"></i> </a>
                                                    @else
                                                        N/A
                                                    @endif
                                            </td>

                                        <td>

                                            <a href="{{ route('viewDocumentedit', ['customer_id' => $document->proprietor_id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                        </td>

                                    </tr>
                                   @endif
                                @endforeach

                                </tbody>

                            </table>
                        </div>

                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <!-- PDFMake library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
    {{-- bootstrap js start --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- bootstrap js end --}}

    <script>
        $(document).ready(function () {
            // Initialize DataTable
            var table = $('#example1').DataTable({
                "paging": true, // Enable pagination
                "lengthChange": false,
                "searching": true,
                "scrollY": '300px',
                 "scrollCollapse": true,
                 "scrollX": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "dom": 'Bfrtip',
                "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
            });
        });
    </script>
@endpush
