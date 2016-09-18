<!DOCTYPE HTML>
<html>

<!---->

<!----userprofile>
<!--->
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
if(isset($_POST['viewButton2'])){
			$_SESSION['accToView'] =  $_POST['accToView'];
		//$_SESSION['memToView'] = $row['id'];
		//echo $row['id'];
			header("Location: viewspecificaccommodation.php");
			die();
 } 
  ?>
 
 <?php
if(isset($_SESSION['id'])){
   // include database connection
    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "SELECT propertyID, address , type, price,  city_districts.city, city_districts.districtName
				FROM rental_properties INNER JOIN city_districts ON rental_properties.districtID = city_districts.districtID";
					
 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
        // Execute the query
		$stmt->execute();
 
		// results 
		$result = $stmt->get_result();
		
		// Row data
		//$myrow = $result->fetch_assoc();
		
		
		
		
} else {
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: login.php");
	die();
}


?>


 <!-- dynamic content will be here -->

<body class="body_general">
<form name='viewallaccommodation' id='viewallaccommodation' action='viewallaccommodation.php' method='post'>
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
			<h3 class="panel-title"><h1 align="Middle"> All Accommodations</h1></h3>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
			  <div class="row">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4>
						All Accommodations
					  </h4>
					</div>
					<div style="height:400px;overflow:auto;">
					<table class="table table-hover">
					  <thead>
						<tr>
						  <th class="col-xs-2">Property ID</th><th class="col-xs-2">Address</th><th class="col-xs-2">Type</th><th class="col-xs-2">City</th><th class="col-xs-2">District</th><th class="col-xs-2">Price</th>
						</tr>
					  </thead>
					  <tbody>
					  	<tr>
						<?php 
						if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
								  <td class="col-xs-1"><?php echo $row['propertyID']; ?></td><td class="col-xs-2"><?php echo $row['address']; ?></a></td><td class="col-xs-2"><?php echo $row['type']; ?></a></td><td class="col-xs-2"><?php echo $row['city']; ?></a></td><td class="col-xs-2"><?php echo $row['districtName']; ?></a></td><td class="col-xs-2"><?php echo $row['price']; ?></td>
								</tr>
						<?php
							}
						} ?>

					  </tbody>
					</table>
					</div>
				  </div>
				  <div display="inline-block">
						<input type = 'submit' class="btn btn-primary btn-sm" id='viewButton2' name='viewButton2' value='View Accommodation' /> 
						<div class="form-group" style='float: left'>
							<input type="text" class="form-control" id="accToView" name = "accToView" placeholder="Enter PropertyID">
						</div>
				  </div>
			  </div>
			</div>
			
		  
		</div>
	</div>
</div>

</form>
</body>

</html>