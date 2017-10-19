@extends('layouts.backend', ['active' => 'category'])

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('admin.category._sidebar', ['active' => 'create'])

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h2 class="sub-header">Create New Category</h2>
			<div class="row">
				{!!
					Form::open(array(
						'class' => 'form-signin',
						'role' => 'form',
						'url' => route('admin.category.store'),
						'method' => 'post',
					))
				!!}

				@include('form.text', [
					'field' => 'name',
					'label' => 'Name',
					'placeholder' => 'Name',
					'default' => old('name') != null ? old('name') : ''
				])

				@include('form.select', [
					'field' => 'type',
					'label' => 'Type',
					'options' => [
						'receive' => 'Receive',
						'spend' => 'Spend'
					],
					'default' => old('type') != null ? old('type') : ''
				])

				@include('form.textarea', [
					'field' => 'description',
					'label' => 'Description',
					'placeholder' => 'Description',
					'default' => old('description') != null ? old('description') : ''
				])

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection