<!DOCTYPE html>

<head>

	<!-- Basic Page Needs
================================================== -->
	@yield('title')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
================================================== -->
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/colors/main.css')}}" id="colors">
	@yield('stylesheets')

</head>

<body>

	<!-- Wrapper -->
	<div id="wrapper">
	
	@include('vacancy.module.header')

	@yield('content')

	@include('vacancy.module.footer')
	@include('sweetalert::alert')

		<!-- Back To Top Button -->
		<div id="backtotop"><a href="#"></a></div>


	</div>
	<!-- Wrapper / End -->

	@yield('scripts')
	<script type="text/javascript" src={{asset("assets/scripts/jquery-2.2.0.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/mmenu.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/chosen.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/slick.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/rangeslider.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/magnific-popup.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/waypoints.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/counterup.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/jquery-ui.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/tooltips.min.js")}}></script>
    <script type="text/javascript" src={{asset("assets/scripts/custom.js")}}></script>

	<!-- Style Switcher
================================================== -->
	<script src={{asset("assets/scripts/switcher.js")}}></script>

	<div id="style-switcher">
		<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>

		<div>
			<ul class="colors" id="color1">
				<li><a href="#" class="main" title="Main"></a></li>
				<li><a href="#" class="blue" title="Blue"></a></li>
				<li><a href="#" class="green" title="Green"></a></li>
				<li><a href="#" class="orange" title="Orange"></a></li>
				<li><a href="#" class="navy" title="Navy"></a></li>
				<li><a href="#" class="yellow" title="Yellow"></a></li>
				<li><a href="#" class="peach" title="Peach"></a></li>
				<li><a href="#" class="beige" title="Beige"></a></li>
				<li><a href="#" class="purple" title="Purple"></a></li>
				<li><a href="#" class="celadon" title="Celadon"></a></li>
				<li><a href="#" class="red" title="Red"></a></li>
				<li><a href="#" class="brown" title="Brown"></a></li>
				<li><a href="#" class="cherry" title="Cherry"></a></li>
				<li><a href="#" class="cyan" title="Cyan"></a></li>
				<li><a href="#" class="gray" title="Gray"></a></li>
				<li><a href="#" class="olive" title="Olive"></a></li>
			</ul>
		</div>

	</div>
	<!-- Style Switcher / End -->


</body>

</html>