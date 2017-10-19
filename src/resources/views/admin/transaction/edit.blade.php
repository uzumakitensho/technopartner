@extends('layouts.backend', ['active' => 'transaction'])

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('admin.transaction._sidebar', ['active' => 'create'])

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h2 class="sub-header">Edit Transaction</h2>
			<div class="row">
				{!!
					Form::open(array(
						'class' => 'form-signin',
						'role' => 'form',
						'url' => route('admin.transaction.update', $transaction->id),
						'method' => 'post',
					))
				!!}

				@include('form.select', [
					'field' => 'transaction_type',
					'label' => 'Transaction Type',
					'options' => [
						'-' => '-- Select -- ',
						'receive' => 'Receive',
						'spend' => 'Spend'
					],
					'attributes' => [
						'id' => 'transaction_type'
					],
					'default' => $transaction->transaction_type
				])

				<div class="form-group">
					<label
						for="category" class="control-label"
					>
						Category
					</label>
					<div class="control-input {{ $errors->has('category') ? 'has-error' : '' }}">
						<select class="form-control" name="category" id="categoryOpt"></select>
						@if ($errors->has('category'))
						<span class="help-block text-danger">{{ $errors->first('category') }}</span>
						@endif
					</div>
				</div>

				@include('form.text', [
					'field' => 'amount',
					'label' => 'Amount',
					'placeholder' => 'Amount',
					'default' => $transaction->amount
				])

				@include('form.textarea', [
					'field' => 'description',
					'label' => 'Description',
					'placeholder' => 'Description',
					'default' => $transaction->description
				])

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>

				{!! Form::close() !!}

				<input type="hidden" id="getOptionDataUrl" value="{{ route('admin.category.data') }}">
				<input type="hidden" id="categoriesData" value="[]">
			</div>
		</div>
	</div>
</div>
@endsection

@section('content-js')
<script type="x-tmpl-mustache" id="categoriesTmplt">
	{% #categories %}
		<option value="{% id %}" {% selected %}>{% name %}</option>
	{%/categories%}
</script>

<script>
$(function(){
	$("#transaction_type").on('change', render);
	var category_id = {!! $transaction->category_id !!};

	render();

	function render() 
	{
		var transaction_type = $('#transaction_type');
		var opt_url = $("#getOptionDataUrl").val();
		$('#categoryOpt').html('');

		var request = $.ajax({
			url: opt_url,
			data: { 
				"transaction_type": transaction_type.val()
			},
			type: "GET",
			success: function(response) {
				var opt = '';
				for(x in response){
					opt += '<option value="' + response[x].id + '" ';
					if(response[x].id == category_id){
						opt += 'selected ';
					}
					opt += '>'
					opt += response[x].name;
					opt += '</option>';
				}
				console.log(opt);
				$('#categoryOpt').html(opt);
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}
});
</script>
@endsection