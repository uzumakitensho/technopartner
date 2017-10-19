@extends('layouts.backend', ['active' => 'transaction'])

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('admin.transaction._sidebar', ['active' => 'list'])

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h2>Transaction List</h2>
			<h5 class="sub-header">{{ $start_date->format('d M Y H:i:s') }} - {{ $end_date->format('d M Y H:i:s') }}</h5>

			<div class="row" style="margin-bottom: 25px;">
				<form action="{{ route('admin.transaction.list') }}" method="get">
				<div class="col-md-4">
					<input type="text" class="form-control input-date" name="start_date" id="start_date" placeholder="Start Date" readonly value="{{ $start_date->format('d/m/Y') }}">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control input-date" name="end_date" id="end_date" placeholder="End Date" readonly value="{{ $end_date->format('d/m/Y') }}">
				</div>
				<div class="col-md-4">
					<button class="btn btn-primary" type="submit">Filter</button>
					<a href="#" class="btn btn-warning" id="btnReset">Reset</a>
				</div>
				</form>
			</div>

			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>Type</th>
							<th>Category</th>
							<th>Amount</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@if(count($transactions) == 0)
						<tr>
							<td colspan="5">There is no data yet.</td>
						</tr>
					@else
						<?php $no = 1; ?>
						@foreach($transactions as $key => $transaction)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $transaction->created_at->format('d M Y H:i:s') }}</td>
							<td>{{ $transaction->transaction_type }}</td>
							<td>{{ $transaction->category->name }}</td>
							<td>{{ $transaction->amount }}</td>
							<td>{{ $transaction->description }}</td>
							<td>
								<a href="{{ route('admin.transaction.edit', $transaction->id) }}" class="btn btn-xs btn-primary">Edit</a>
								<a href="{{ route('admin.transaction.destroy', $transaction->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
							</td>
						</tr>
						@endforeach
					@endif
					</tbody>
				</table>
			</div>
			<div class="pull-right">
				{!! $transactions->appends(Request::except('page'))->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection

@section('content-js')
<script>
	$("#btnReset").on('click', function(){
		$("#start_date").val('');
		$("#end_date").val('');
	});
</script>
@endsection