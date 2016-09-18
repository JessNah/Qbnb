<!DOCTYPE HTML>
<html>
<!---->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

     <title>Qbnb - Come to a journey of a life time</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
</head>
<br>
<br>
<br>

<body>
<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
 
 <?php

 
//check if the login form has been submitted
if(isset($_POST['updateMemInfo'])){
	
	if(isset($_SESSION['id'])){
	    
		include_once 'config/connection.php'; 
				
				$query = "UPDATE service_member SET fName=?, mName=?, lName=?, email=?, degreeType=?, year=? WHERE id=?";
				$stmt = $con->prepare($query);	$stmt->bind_param('sssssis', $fName, $mName, $lName, $email, $degreeType, $year, $_SESSION['id']);
						
				$fName = $_POST['fName'];
				$mName = $_POST['mName'];
				$lName = $_POST['lName'];
				$email = $_POST['email'];
				$degreeType = $_POST['degreeType'];
				$year = $_POST['year'];
				
				$stmt->execute();
				
			header("Location: userprofile.php");
			die();
			
	}

 } 
  ?>
 
<body class="body_general">
<form name='updateinfo' id='updateinfo' action='updateinfo.php' method='post'>
	<!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                	<span class="glyphicon glyphicon-tower"></span> 
                	Qbnb - They hate us coz they ain't us
                </a>
            </div>
			
        </div><!-- /.container -->
    </nav>
	<div class="container">
		<div class="panel panel-success">
		  <div class="panel-heading">
			<h3 class="panel-title">Update Info</h3>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
				<div class="container-fluid">
					<form>
						<div class="form-group">
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name" name="fName">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Middle Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Middle Name" name="mName">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Last Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name" "lName">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email Address</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email Address" name="email">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Degree Type</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Degree Type" name="degreeType">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Year</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Year" name="year">
						</div>
						<input type='submit' class="btn btn-primary btn-sm" id='updateMemInfo' name='updateMemInfo' value='UPDATE' />
					</form>
				</div>
			</div>
		  </div>
		</div>
	</div>
</div>


	</form>
</body>
<html>