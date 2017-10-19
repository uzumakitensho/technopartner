<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">

		<title>Dashboard Template for Bootstrap</title>

		<link href="{{ elixir('css/app.css') }}" rel="stylesheet">
		<link href="{{ elixir('css/backend.css') }}" rel="stylesheet">

		<style type="text/css">
			.current {
				color: white !important;
				background-color: #080808;
			}

			.current > a {
				color: white !important;
			}

			.tinyinput {
				height: 25px;
				padding: 2px 6px;
				border-radius: 0;
			}

			.table-min>tbody>tr>td, .table-min>tbody>tr>th, .table-min>tfoot>tr>td, .table-min>tfoot>tr>th, .table-min>thead>tr>td, .table-min>thead>tr>th {
				padding: 5px;
			}

			.moneyin {
				text-align: right;
			}
		</style>

		@yield('content-css')
	</head>
	<body>
		<!-- Fixed navbar -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ route('admin.home') }}">{{ config('app.name') }}</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="{{ isset($active) && $active == 'home' ? 'current' : '' }}"><a href="{{ route('admin.home') }}">Home</a></li>
						<li class="{{ isset($active) && $active == 'category' ? 'current' : '' }}"><a href="{{ route('admin.category.list') }}">Category</a></li>
						<li class="{{ isset($active) && $active == 'transaction' ? 'current' : '' }}"><a href="{{ route('admin.transaction.list') }}">Transaction</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		@yield('content')

		@yield('content-modal')

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ elixir('js/app.js') }}"></script>
		@if (Session::has('NOTIFY'))
		<script>
		$(function(){
			var state = ['success','warning','danger', 'info'];
			var title = ['Success','Warning','Failed', 'Info'];
			var sess = '{{ Session::get("NOTIFY") }}';
			var inOf = state.indexOf(sess);

			$.notify({
					title: title[inOf],
					message: ''
				},{
					type: state[inOf]
			});
		});
		</script>
		@endif

		@yield('content-js')
	</body>
</html>
