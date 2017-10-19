		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li class="{{ isset($active) && $active == 'list' ? 'active' : '' }}">
					<a href="{{ route('admin.transaction.list') }}">Transaction List</a>
				</li>
				@if(isset($transaction))
				<li class="{{ isset($active) && $active == 'edit' ? 'active' : '' }}">
					<a href="{{ route('admin.transaction.edit', $transaction->id) }}">Edit Transaction</a>
				</li>
				@else
				<li class="{{ isset($active) && $active == 'create' ? 'active' : '' }}">
					<a href="{{ route('admin.transaction.create') }}">Create Transaction</a>
				</li>
				@endif
			</ul>
		</div>