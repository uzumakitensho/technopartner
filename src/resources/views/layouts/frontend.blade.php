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

		<title>Frontend Template for Bootstrap</title>

		<link href="{{ elixir('css/app.css') }}" rel="stylesheet">
		<link href="{{ elixir('css/frontend.css') }}" rel="stylesheet">

		@yield('content-css')
	</head>
	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Project name</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					@if (Auth::guard('customer')->guest())
					<form class="navbar-form navbar-right">
						<div class="form-group">
							<input type="text" placeholder="Email" class="form-control">
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" class="form-control">
						</div>
						<button type="submit" class="btn btn-success">Sign in</button>
					</form>
					@else
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::guard('customer')->user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="#"
										onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										Logout
									</a>

									<form id="logout-form" action="{{ action('CustomerAuth\LoginController@logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					</ul>
					@endif
				</div><!--/.navbar-collapse -->
			</div>
		</nav>

		@yield('content')

		@yield('content-modal')

		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="{{ elixir('js/app.js') }}"></script>

		@yield('content-js')
	</body>
</html>
