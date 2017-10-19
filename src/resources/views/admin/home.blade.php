@extends('layouts.backend', ['active' => 'home'])

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12 main">
			<h1 class="page-header">Report</h1>

			<div class="row">
				@if(count($transactions) == 0)
				<span class="label label-warning">Transaction data is empty.</span>
				@else
				{{ $first_transaction->created_at->format('d M Y H:i:s') }} - {{ $last_transaction->created_at->format('d M Y H:i:s') }}
				@endif
				<h4>Total Receive: <span class="label label-success">{{ $total_receive }}</span></h4>
				<h4>Total Spend: <span class="label label-danger">{{ $total_spend }}</span></h4>
				<h4>Total Saldo: <span class="label label-primary">{{ $total_saldo }}</span></h4>
			</div>
			
		</div>
	</div>
</div>
@endsection