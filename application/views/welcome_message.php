<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<script src="myapp/angular-1.7.8/angular.min.js"></script>
    <script src="myapp/angular-1.7.8/angular-route.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="myapp/app.js"></script>
	<script src="myapp/controllers/logincontroller.js"></script>
	<script src="myapp/services/loginsevices.js"></script>

	<script src="myapp/controllers/registercontroller.js"></script>
	<script src="myapp/services/registersevices.js"></script>
	<script src="myapp/controllers/signoutcontroller.js"></script>
</head>
<body>
<div ng-app ="myApp">
	<ng-view></ng-view>
</div>

</body>
</html>
