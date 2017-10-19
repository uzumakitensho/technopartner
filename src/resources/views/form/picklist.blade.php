@if (isset($label))
<label class="control-label">{{ $label }}</label>
@endif

<div class="input-group {{ $errors->has($field) ? 'has-error' : '' }}">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button" data-toggle="modal" 
			data-target="#{{ $name }}Modal" id="{{ $name }}Button"
		>
			<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
		</button>
	</span>
	{!! Form::text($field, isset($default) ? $default : null, [
			'id' => $name . 'Name',
			'class' => 'form-control',
			'readonly' => 'readonly',
			'placeholder' => $placeholder ? $placeholder : '',
			'data-toggle' => 'modal',
			'data-target' => '#' . $name . 'Modal'
		]) 
	!!}

	@if (isset($delete) && $delete)
	<div class="input-group-btn">
		<button class="btn btn-default" type="button" id="{{ $name }}ButtonDel" title="Hapus">
			<span class="text-danger">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</button>
	</div>
	@endif
</div>

<div class="has-error">
	@if ($errors->has($field))
	<span class="help-block text-danger">{{ $errors->first($field) }}</span>
	@endif
</div>

{!! Form::hidden($field . '_id', isset($hidden_value) ? $hidden_value : null, ['id' => $name . 'Id']) !!}