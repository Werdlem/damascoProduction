<!DOCTYPE HTML>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="Css/tool_style.css"  type="text/css"/>
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/dateInput.css" />


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-cookies.js"></script>
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="js/ng-file-upload-shim.js"></script>
  <script src="js/ng-file-upload.js"></script>
  <script src="js/upload.js"></script>
  


<title>Tartarus</title>
<base href="/">
<?php require_once './DAL/DBConn.php'; ?>

</head>

<body ng-app="myApp">



<h1>Tartarus</h1>

<p>
	<nav class="navbar navbar-default">
	<div class="container-fluid">
	<div class="navbar-header">	</div>
	<ul class="nav navbar-nav">
	<li><a href="/">Home <span class="badge badge-light"></span></a>
  </li>
	<li><a href="/production">Production Schedule</a></li>
  <li><a href="/capacity">Capacity</a></li>
	
</ul>

</div>
</nav>
<div ng-view>
	
</div>
<script type="text/javascript">(function ($) {
    $(document).ready(function () {
        $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
    });
})(jQuery);</script>
<script src="/restricted/myApp.js"></script>

<?php
include ('/templates/footer.php')
?>