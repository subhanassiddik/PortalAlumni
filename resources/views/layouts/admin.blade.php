<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Listeo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/colors/main.css')}}" id="colors">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

@include('admin.module.header')

<!-- Dashboard -->
<div id="dashboard">

@include('admin.module.sidebar')

@yield('content')

</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
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



</body>
</html>