@extends('layouts.backend', ['active' => 'category'])

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('admin.category._sidebar', ['active' => 'edit'])

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h2 class="sub-header">Edit Category</h2>
			<div class="row">
				{!!
					Form::open(array(
						'class' => 'form-signin',
						'role' => 'form',
						'url' => route('admin.category.update', $category->id),
						'method' => 'post',
					))
				!!}

				@include('form.text', [
					'field' => 'name',
					'label' => 'Name',
					'placeholder' => 'Name',
					'default' => $category->name
				])

				@include('form.select', [
					'field' => 'type',
					'label' => 'Type',
					'options' => [
						'receive' => 'Receive',
						'spend' => 'Spend'
					],
					'default' => $category->type
				])

				@include('form.textarea', [
					'field' => 'description',
					'label' => 'Description',
					'placeholder' => 'Description',
					'default' => $category->description
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