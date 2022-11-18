<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>{{$config['site-name']??'My Website'}} - {{$config['site-slogan']??''}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{url('templates/'.env('TEMPLATE').'/assets/css/main.css')}}" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<header id="header">
					<h1 style="margin-top: 10px;"><a href="{{url('/')}}"><?php echo $config['site-logo-svg']??''; ?></a></h1>
					<nav class="links">
						<ul>
							@foreach($menus AS $menu)
							<li><a href="{{$menu->url}}" target="{{$menu->target}}">{{$menu->label}}</a></li>
							@endforeach
						</ul>
					</nav>
					<nav class="main">
						<ul>
							<li class="menu">
								<a class="fa-bars" href="#menu">Menu</a>
							</li>
						</ul>
					</nav>
				</header>

				<!-- Menu -->
				<section id="menu">

					<!-- Links -->
					<section>
						<ul class="links">
							@foreach($menus AS $menu)
								<li><a href="{{$menu->url}}" target="{{$menu->target}}">{{$menu->label}}</a></li>
							@endforeach
						</ul>
					</section>

				</section>

				<!-- Main -->
				<div id="main">
					@yield('content')

					<!-- Footer -->
					<section id="footer">
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
							<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<p class="copyright">&copy; {{$config['site-name']}}. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
					</section>
				</div>
			</div>

		<!-- Scripts -->
		<script src="{{url('templates/'.env('TEMPLATE').'/assets/js/jquery.min.js')}}"></script>
		<script src="{{url('templates/'.env('TEMPLATE').'/assets/js/browser.min.js')}}"></script>
		<script src="{{url('templates/'.env('TEMPLATE').'/assets/js/breakpoints.min.js')}}"></script>
		<script src="{{url('templates/'.env('TEMPLATE').'/assets/js/util.js')}}"></script>
		<script src="{{url('templates/'.env('TEMPLATE').'/assets/js/main.js')}}"></script>

	</body>
</html>