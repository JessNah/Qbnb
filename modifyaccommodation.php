<!DOCTYPE HTML>
<html>
<!---->
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
if(isset($_POST['deleteButtonAcc'])){
			//$_SESSION['memToView'] =  $_POST['memToView'];
		//$_SESSION['memToView'] = $row['id'];
		//echo $row['id'];
		
		    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "DELETE FROM rental_properties WHERE propertyID =?"; 
 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
		//echo $_SESSION['memToView'];
		
		// bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("i", $deleteAcc);
		
		$deleteAcc = $_POST['propToDel'];
			
        // Execute the query
		$stmt->execute();
		
			header("Location: myaccommodation.php");
			die();
 } 
  ?>
 
 <?php

 
//check if the login form has been submitted
if(isset($_POST['modifyButton2'])){
	
	if(isset($_SESSION['id'])){
	    
		include_once 'config/connection.php'; 
				
				$query = "UPDATE rental_properties SET features=?, type=?, price=? WHERE propertyID=?";
				$stmt = $con->prepare($query);	$stmt->bind_param('ssis', $features, $type, $price, $propertyID);
						
				$propertyID = $_POST['propertyID'];
				$features = $_POST['features'];
				$type = $_POST['type'];
				$price = $_POST['price'];
				
				$stmt->execute();
				
			header("Location: modifyaccommodation.php");
			die();
			
	}
	

 } 
  ?>

<body class="body_general">
<form name='modifyaccommodation' id='modifyaccommodation' action='modifyaccommodation.php' method='post'>
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
			<h3 class="panel-title"><h1 align="Middle">Modify Accommodation</h1></h3>
		  </div>
		 <div class="panel-body">
			<div class="container-fluid">
				<form class="form-inline">
					  <div class="form-group">
						<h3>Enter Property ID to Delete the Accommodation:</h3>
						<label for="exampleInputName2">Property ID</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Property ID" name="propToDel">
						<input type='submit' class="btn btn-primary btn-sm" id='deleteButtonAcc' name='deleteButtonAcc' value='Delete' />
					  </div>
					</form>
					<br>
					<br>
					<br>
					<form name='modifyaccommodation' id='modifyaccommodation' action='modifyaccommodation.php' method='post'>
					<h3>Enter Updated Values for Accommodation:</h3>
					  <div class="form-group">
						<label for="exampleInputName2">Property ID</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Property ID" name="propertyID">
					  </div>
					  <div class="form-group">
						<label for="exampleInputName2">Features</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Features" name="features">
					  </div>
					  <div class="form-group">
						<label for="exampleInputName2">Type</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Type" name="type">
					  </div>
					  <div class="form-group">
						<label for="exampleInputName2">Price</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Price" name="price">
					  </div>
					  <input type='submit' class="btn btn-primary btn-sm" id='modifyButton2' name='modifyButton2' value='Update accommodation' />
					</form>
				
			</div>
		</div>
		  </div>
		</div>
</div>

	</form>
</body>
<html>