@push('title')
    <title>Application</title>
@endpush

@push('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <style>
        .viewicon {
            display: inline-block;
            /* Makes it an inline block for width/height adjustments */
            width: 70px;
            /* Set the width */
            height: 35px;
            /* Set the height */
            line-height: 50px;
            /* Centers the icon vertically */
            text-align: center;
            /* Centers the icon horizontally */
            font-size: 25px;
            /* Adjusts the font size of the icon */
            margin-left: 30px !important;
            /* border: 1PX solid black; */
            padding: 5px;
            background-color: #f0f0f0
        }

        .download-wrapper {
            position: relative;
            display: inline-block;
        }

        .download-label {
            display: none;
            position: absolute;
            top: 5;
            left: 50%;
            background-color: red;
            padding: 5px;
            border-radius: 5px;
            font-size: 12px;
            white-space: nowrap;
        }

        .viewicon:hover .download-label {
            display: block;
        }

        .viewicon {
            margin-top: -10px !important;
        }
    </style>
@endpush

@extends('layout.main')

@section('main-section')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
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
                        @if (session('success'))
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

                        <?php
                            if(isset($back))
                            {  ?>
                        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm"
                            style="margin-left:25px !important;">{{ $back }}</a>
                        <?php  }
                            ?>
                        @can('Document access')
                            <div class="card-body ">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th>No</th>
                                            <th>customer</th>
                                            <th>Loan</th>
                                            <th>IdentityProof</th>
                                            <th>Bank statement</th>
                                            <th>Income Proof</th>
                                            <th>Business Proof</th>
                                            <th>Adresss Proof</th>
                                            <th>view</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-nowrap">
                                        @php $counter = 1; @endphp
                                        @foreach ($documents as $document)
                                            @if ($document->customer_id == $document->proprietor_id)
                                                <tr>
                                                    <td>{{ $counter++ }}</td>
                                                    <td>{{ $document->customer->cust_name }}</td>
                                                    <td>{{ $document->loan->Prospect_No }}</td>
                                                    <td>
                                                        @if ($document->identity_proof)
                                                            {{-- <a href="#" class="d-inline-block" data-bs-toggle="modal" data-bs-target="#identityProofModal">
                                                <img src="{{ asset('storage/documents/identity_proofs/' . $document->identity_proof) }}" alt="Identity Proof" width="100" height="100">
                                              </a> --}}
                                                            <a href="#" class="d-inline-block" data-bs-toggle="modal"
                                                                data-bs-target="#identityProofModal"
                                                                data-image="{{ asset('storage/documents/identity_proofs/' . $document->identity_proof) }}">
                                                                <img src="{{ asset('storage/documents/identity_proofs/' . $document->identity_proof) }}"
                                                                    alt="Identity Proof" width="100" height="100">
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>


                                                    <td>
                                                        @if ($document->bank_statement)
                                                            {{-- <a href="{{ route('download.bank_statement', ['id' => $document->id]) }}" download>
                                        <span class="download-wrapper">
                                            <i class="fas fa-download download-icon"></i>
                                            <span class="download-label">{{ $document->bank_statement }}</span>
                                        </span>
                                        </a> --}}
                                                            <a href="{{ route('view.bank_statement_main', ['id' => $document->id]) }}"
                                                                target="_blank" class="btn btn-primary btn-sm ml-2 viewicon"
                                                                style="margin-left:30px !important;">
                                                                View
                                                                <span class="download-wrapper download-icon">
                                                                    <i class="fas fa-eye"></i>
                                                                    <span
                                                                        class="download-label">{{ $document->bank_statement }}</span>
                                                                </span>
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($document->salary_slip)
                                                            {{-- <a href="{{ route('download.salary_slip', ['id' => $document->id]) }}" download>
                                        <i class="fas fa-file-pdf"></i>
                                        <span class="download-wrapper">
                                            <i class="fas fa-download download-icon"></i>
                                            <span class="download-label">{{ $document->salary_slip }}</span>
                                        </span>
                                        </a>
                                        <a href="{{ route('view.salary_main', ['id' => $document->id]) }}" target="_blank" class="btn btn-primary btn-sm ml-2 viewicon">
                                            View
                                        </a> --}}
                                                            {{-- shivang 16-12-2024 --}}
                                                            <a href="{{ route('view.salary_main', ['id' => $document->id]) }}"
                                                                target="_blank" class="btn btn-primary btn-sm ml-2 viewicon"
                                                                style="margin-left:20px !important;">
                                                                View
                                                                <span class="download-wrapper download-icon">
                                                                    <i class="fas fa-eye"></i>
                                                                    <span
                                                                        class="download-label">{{ $document->salary_slip }}</span>
                                                                </span>
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    {{-- for busness proof --}}
                                                    <td>
                                                        @if ($document->business_proof)
                                                            {{-- <a href="{{ route('download.business_proof', ['id' => $document->id]) }}" download>
                                            <i class="fas fa-file-excel"></i>
                                            <span class="download-wrapper">
                                                <i class="fas fa-download download-icon"></i>
                                                <span class="download-label">{{ $document->business_proof }}</span>
                                            </span>
                                                </a>
                                                <a href="{{ route('view.business_proof', ['id' => $document->id]) }}" target="_blank" class="btn btn-primary btn-sm ml-2 viewicon">
                                                    View
                                                </a> --}}
                                                            <a href="{{ route('view.business_proof', ['id' => $document->id]) }}"
                                                                target="_blank" class="btn btn-primary btn-sm ml-2 viewicon"
                                                                style="margin-left:20px !important;">
                                                                View
                                                                <span class="download-wrapper download-icon">
                                                                    <i class="fas fa-eye"></i>
                                                                    <span
                                                                        class="download-label">{{ $document->business_proof }}</span>
                                                                </span>
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    {{-- for address prrof --}}

                                                    <td>
                                                        @if ($document->adresss_proof)
                                                            {{-- <a href="{{ route('download.adresss_proof', ['id' => $document->id]) }}" download>
                                           <i class="fas fa-file-excel"></i>
                                           <span class="download-wrapper">
                                                <i class="fas fa-download download-icon"></i>
                                                <span class="download-label">{{ $document->adresss_proof }}</span>
                                            </span>
                                             </a>
                                             <a href="{{ route('view.adresss_proof', ['id' => $document->id]) }}" target="_blank" class="btn btn-primary btn-sm ml-2 viewicon">
                                                View
                                            </a> --}}
                                                            <a href="{{ route('view.adresss_proof', ['id' => $document->id]) }}"
                                                                target="_blank" class="btn btn-primary btn-sm ml-2 viewicon"
                                                                style="margin-left:20px !important;">
                                                                View
                                                                <span class="download-wrapper download-icon">
                                                                    <i class="fas fa-eye"></i>
                                                                    <span
                                                                        class="download-label">{{ $document->adresss_proof }}</span>
                                                                </span>
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('viewDocumentlist', ['customer_id' => $document->customer_id]) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                    </td>

                                                    <td>


                                                        {{-- <a href="{{ route('viewDocumentedit', ['customer_id' => $document->proprietor_id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> --}}
                                                        <a href="{{ route('viewDocumenteditlast', ['customer_id' => $document->id]) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>


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
    {{-- @foreach ($documents as $document)
    <div class="modal fade" id="identityProofModal" tabindex="-1" aria-labelledby="identityProofModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="identityProofModalLabel">Identity Proof</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="{{ asset('storage/documents/identity_proofs/' . $document->identity_proof) }}" alt="Identity Proof" class="img-fluid"> </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    @endforeach --}}

    {{-- SHIVANG 16-12-2024 --}}
    <div class="modal fade" id="identityProofModal" tabindex="-1" aria-labelledby="identityProofModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="identityProofModalLabel">Identity Proof</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- The image source will be updated dynamically -->
                    <img id="modalImage" src="" alt="Identity Proof" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <!-- Download button -->
                    <a id="downloadButton" href="#" download="" class="btn btn-primary">Download</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#example1').DataTable({
                "paging": true, // Enable pagination
                "lengthChange": false,
                "searching": true,
                "scrollY": '800px',
                "scrollCollapse": true,
                "scrollX": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "dom": 'Bfrtip',
                "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
            });
        });

        // Modal functionality for dynamically updating content
        const modalTriggers = document.querySelectorAll('[data-bs-toggle="modal"]');

        modalTriggers.forEach(function(trigger) {
            trigger.addEventListener('click', function() {
                const imageSrc = this.getAttribute('data-image'); // Get image URL from data attribute

                // Update modal image source
                const modalImage = document.getElementById('modalImage');
                modalImage.src = imageSrc;

                // Update download button href
                const downloadButton = document.getElementById('downloadButton');
                downloadButton.href = imageSrc;
                downloadButton.download = imageSrc.split('/').pop(); // Set the file name
            });
        });
    </script>
@endpush
