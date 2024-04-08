@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Vendor Management')

@section('content')
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
									<th>Created</th>
									<th>Bidding Number</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($vendors as $vendor)
                                    
								<tr>
									<td>{{$vendor->company}}</td>
									<td>{{$vendor->name}}</td>
									<td style="color: green;">{{$vendor->time}}</td>
									<td>None</td>
									<td>awdawd</td>
								</tr>

                                @endforeach

							</tbody>
							<tfoot>
								<tr>
									<th>Company</th>
									<th>Name</th>
									<th>Created</th>
									<th>Bidding Number</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
