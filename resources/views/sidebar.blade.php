<div class="col-lg-3">
    <div class="card">
        <div class="card-body">
            <ul class="list-group" style="font-size: 11px;font-weight: 800;">
                {{-- <a href="{{route('officeuse')}}">
                    <li class="list-group-item {{ request()->routeIs('officeuse') ? 'active' : '' }}">For Office Use Only<span class="badge bg-success"><i class="fa fa-check" aria-hidden="flase"></i></span></li>
                </a> --}}
                @if(session()->has('application_id'))
                    {{-- <a href="{{route('officeuse')}}"> --}}
                        <li class="list-group-item {{ request()->routeIs('officeuse') ? 'active' : '' }}">For Office Use Only<span class="badge bg-success"><i class="fa fa-check" aria-hidden="flase"></i></span></li>
                    {{-- </a> --}}
                @else
                   <a href="{{ route('officeuse') }}">
                    <li class="list-group-item {{ request()->routeIs('officeuse') ? 'active' : '' }}">For Office Use Only<span class="badge bg-success"><i class="fa fa-check" aria-hidden="false"></i></span></li>
                    </a>
                @endif

                @if(session()->has('application_id'))
                <a href="{{route('customeruse', ['id' => session('application_id')])}}">
                    <li class="list-group-item {{ request()->routeIs('customeruse') ? 'active' : '' }}">BORROWER DETAILS<span class="badgetext badge bg-success"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                </a>
                <a href="{{route('proprietoruse',['id' => session('application_id')])}}">
                    <li class="list-group-item {{ request()->routeIs('proprietoruse') ? 'active' : '' }}">CO-BORROWER DETAILS<span class="badgetext badge bg-success"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                </a>
               {{-- <a href="{{route('cocustomeruse',['id' => session('application_id')])}}">
                    <li class="list-group-item {{ request()->routeIs('cocustomeruse') ? 'active' : '' }}">CO-BORROWER DETAILS<span class="badgetext badge bg-success"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                </a>--}}
                <a href="{{route('rpartnersuse',['id' => session('application_id')])}}">
                    <li class="list-group-item {{ request()->routeIs('rpartnersuse') ? 'active' : '' }}">REMAINING PARTNERS<span class="badgetext badge bg-success"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                </a>
                <a href="{{route('babkdetilssuse',['id' => session('application_id')])}}">
                    <li class="list-group-item {{ request()->routeIs('babkdetilssuse') ? 'active' : '' }}">Bank Details<span class="badgetext badge bg-success"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                </a>
                <a href="{{route('referencesuse',['id' => session('application_id')])}}">
                    <li class="list-group-item {{ request()->routeIs('referencesuse') ? 'active' : '' }}">REFERENCES<span class="badgetext badge bg-success"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                </a>
                @endif
            </ul>
        </div>
    </div>
</div>


