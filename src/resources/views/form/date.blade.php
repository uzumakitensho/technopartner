<div class="form-group">
	@if (isset($label))
		<label
			for="{{ $field }}" class="control-label"
		>
			{{ $label }}
		</label>
	@endif
	<div class="control-input {{ $errors->has($field) ? 'has-error' : '' }}">
		<div class="input-group">
			{!! 
				Form::text(
					$field,
					isset($default) ? $default : null,
					[
						'class' => 'form-control input-date',
						'placeholder' => isset($placeholder) ? $placeholder : ''
					] + (isset($attributes) ? $attributes : [])
				)
			!!}
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
		</div>
		@if (isset($help))
		<span class="help-block">{{ $help }}</span>
		@endif
		@if ($errors->has($field))
		<span class="help-block text-danger">{{ $errors->first($field) }}</span>
		@endif
	</div>
</div>