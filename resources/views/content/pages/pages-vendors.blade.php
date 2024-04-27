@php
$configData = Helper::appClasses();

	function time2str($ts){
        if(!ctype_digit($ts))
            $ts = strtotime($ts);

        $diff = time() - $ts;
        if($diff == 0)
            return 'now';
        elseif($diff > 0)
        {
            $day_diff = floor($diff / 86400);
            if($day_diff == 0)
            {
                if($diff < 60) return 'just now';
                if($diff < 120) return '1 minute ago';
                if($diff < 3600) return floor($diff / 60) . ' minutes ago';
                if($diff < 7200) return '1 hour ago';
                if($diff < 86400) return floor($diff / 3600) . ' hours ago';
            }
            if($day_diff == 1) return 'Yesterday';
            if($day_diff < 7) return $day_diff . ' days ago';
            if($day_diff < 31) return ceil($day_diff / 7) . ' weeks ago';
            if($day_diff < 60) return 'last month';
            return date('F Y', $ts);
        }
        else
        {
            $diff = abs($diff);
            $day_diff = floor($diff / 86400);
            if($day_diff == 0)
            {
                if($diff < 120) return 'in a minute';
                if($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
                if($diff < 7200) return 'in an hour';
                if($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
            }
            if($day_diff == 1) return 'Tomorrow';
            if($day_diff < 4) return date('l', $ts);
            if($day_diff < 7 + (7 - date('w'))) return 'next week';
            if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
            if(date('n', $ts) == date('n') + 1) return 'next month';
            return date('F Y', $ts);
        }
    }
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Vendor Management')

@section('content')
	{{-- alerts --}}
			@if (session()->has('success'))
				<div id="alertDiv" class="alert alert-success d-flex align-items-center" role="alert">
				<span class="alert-icon text-success me-2">
					<i class="ti ti-user ti-xs"></i>
				</span>
				{{session('success')}}
				</div>
			@endif

			@if (session()->has('error'))
				<div id="alertDiv" class="alert alert-danger d-flex align-items-center" role="alert">
				<span class="alert-icon text-danger me-2">
					<i class="ti ti-user ti-xs"></i>
				</span>
				{{session('error')}}
				</div>
			@endif
	{{--  end of alerts --}}
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
                <div class="card-header">
                    <h2>Vendors</h2>
                  </div>
				<div class="card-body">
						<table class="display" id="myTable">
							<thead>
								<tr>
									<th>Company</th>
									<th>Name</th>
									<th>Product</th>
									<th>Created</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($vendors as $vendor)
                                    
								<tr>
									<td>{{$vendor->company}}</td>
									<td>{{$vendor->name}}</td>
									<td>{{$vendor->product}}</td>
									<td class="text-success">{{time2str($vendor->time)}}</td>
									<td @if($vendor->status == 'Activated') class="text-success" @else class="text-danger" @endif>{{$vendor->status}}</td>
									<td><!-- Icon Dropdown -->
										<div class="btn-group">
										  <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
											<i class="ti ti-dots-vertical"></i>
										  </button>
										  <ul class="dropdown-menu">
											<form @if($vendor->status == 'Activated') action="/deactivate" @else action="/activate" @endif  method="POST">
												@csrf
												<input type="text" name="id" value={{$vendor->id}} hidden/>
												<li>
													@if($vendor->status == 'Activated')
														<button type="submit" class="dropdown-item text-danger">Deactivate</button>
													@else
														<button type="submit" class="dropdown-item text-success">Activate</button>
													@endif
												</li>
											</form>
										  </ul>
										</div></td>
								</tr>

                                @endforeach

							</tbody>
							<tfoot>
								<tr>
									<th>Company</th>
									<th>Name</th>
									<th>Product</th>
									<th>Created</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	setTimeout(function () {
    document.getElementById('alertDiv').remove();
}, 3000);
</script>
@endsection
