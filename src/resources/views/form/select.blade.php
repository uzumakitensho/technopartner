<div class="form-group">
	@if (isset($label))
		<label
			for="{{ $field }}" class="control-label"
		>
			{{ $label }}
		</label>
	@endif
	<div class="control-input {{ $errors->has($field) ? 'has-error' : '' }}">
		{!! 
			Form::select(
				$field,
				$options,
				isset($default) ? $default : '',
				[
					'class' => 'form-control'
				] + (isset($attributes) ? $attributes : [])
			) 
		!!}
		@if (isset($help))
		<span class="help-block">{!! $help !!}</span>
		@endif
		@if ($errors->has($field))
		<span class="help-block text-danger">{{ $errors->first($field) }}</span>
		@endif
	</div>
</div>