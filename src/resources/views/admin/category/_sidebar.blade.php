		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li class="{{ isset($active) && $active == 'list' ? 'active' : '' }}">
					<a href="{{ route('admin.category.list') }}">Category List</a>
				</li>
				@if(isset($category))
				<li class="{{ isset($active) && $active == 'edit' ? 'active' : '' }}">
					<a href="{{ route('admin.category.edit', $category->id) }}">Edit Category</a>
				</li>
				@else
				<li class="{{ isset($active) && $active == 'create' ? 'active' : '' }}">
					<a href="{{ route('admin.category.create') }}">Create Category</a>
				</li>
				@endif
			</ul>
		</div>