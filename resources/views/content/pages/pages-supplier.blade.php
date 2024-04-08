@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page 2')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
                <div class="card-header">
                    <h2>Suppliers</h2>
                  </div>
				<div class="card-body">
						<table class="display" id="myTable">
							<thead>
								<tr>
									<th>Status</th>
									<th>Department</th>
									<th>Name</th>
									<th>Timestamp</th>
									<th>Document_name</th>
									<th>Reason</th>
									<th>Message</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										addawdawdwada
									</td>
									<td>awdawd</td>
									<td>awdawd</td>
									<td>awdawd</td>
									<td>awdawd</td>
									<td>awdawd</td>
									<td>awdawd</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Status</th>
									<th>Department</th>
									<th>Name</th>
									<th>Timestamp</th>
									<th>Document_name</th>
									<th>Reason</th>
									<th>Message</th>
								</tr>
							</tfoot>
						</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
