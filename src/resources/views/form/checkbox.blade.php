<div class="form-group">
	@if (isset($label))
	<label
		for="{{ $field }}" class="control-label"
	>
		{{ $label }}
	</label>
	@endif
	<div class="checkbox control-input {{ $errors->has($field) ? 'has-error' : ''}}">
			<label>
				{!! Form::checkbox (
						$field, 
						isset($default) ? $default : ''
					)  
				!!}
				{{ isset($placeholder) ? $placeholder : ''}}
			</label>
		@if (isset($help))
		<span class="help-block">{{ $help }}</span>
		@endif
		@if ($errors->has($field))
		<span class="help-block text-danger">{{ $errors->first($field) }}</span>
		@endif
	</div>
</div>