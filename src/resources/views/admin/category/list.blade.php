@extends('layouts.backend', ['active' => 'category'])

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('admin.category._sidebar', ['active' => 'list'])

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h2 class="sub-header">Category List</h2>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Type</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@if(count($categories) == 0)
						<tr>
							<td colspan="5">There is no data yet.</td>
						</tr>
					@else
						<?php $no = 1; ?>
						@foreach($categories as $key => $category)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $category->name }}</td>
							<td>{{ $category->type }}</td>
							<td>{{ $category->description }}</td>
							<td>
								<a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-xs btn-primary">Edit</a>
								<a href="{{ route('admin.category.destroy', $category->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
							</td>
						</tr>
						@endforeach
					@endif
					</tbody>
				</table>
			</div>
			<div class="pull-right">
				{!! $categories->appends(Request::except('page'))->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection