<!DOCTYPE HTML>
<html>

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
if(isset($_POST['viewButton5'])){
	
   include_once 'config/connection.php'; 
	
	$query = "INSERT INTO bookings (consumerID, propertyID, status, startDate, endDate, period) VALUES (?, ?, ?, ?, ?, ?)";
 
	$stmt = $con->prepare($query);	$stmt->bind_param('iisssi', $_SESSION['id'], $_SESSION['accToView'], $status, $startDate, $endDate, $period);
	
	//set parameters
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$status = "Requested";
	$period = "7";

		if($stmt->execute()){

	
			//$_SESSION['accToView'] =  $_POST['accToView'];
		//$_SESSION['memToView'] = $row['id'];
		//echo $row['id'];
			header("Location: userprofile.php");
			die();
		}
 } 
  ?>
 
 <?php
if(isset($_SESSION['id'])){
   // include database connection
    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "SELECT propertyID, address, type, features, price, city_districts.city, city_districts.districtName
					FROM rental_properties INNER JOIN city_districts ON rental_properties.districtID = city_districts.districtID WHERE propertyID =?"; 
 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
		//echo $_SESSION['memToView'];
		
		// bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("i", $_SESSION['accToView']);
		
			
        // Execute the query
		$stmt->execute();
 
		// results 
		$result = $stmt->get_result();
		
		// Row data
		$myrow = $result->fetch_assoc();
		
		//-----------------------------------------------------------------
		
		
			// SELECT query
        $query = "SELECT propertyID, address, type, features, price, city_districts.city, city_districts.districtName
					FROM rental_properties INNER JOIN city_districts ON rental_properties.districtID = city_districts.districtID WHERE propertyID =?"; 
 
		$query = "SELECT endDate FROM bookings INNER JOIN rental_properties ON bookings.propertyID = rental_properties.propertyID
					WHERE endDate > '2016-03-31' AND rental_properties.propertyID = ?"; 
 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
		//echo $_SESSION['memToView'];
		
		// bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("i", $_SESSION['accToView']);
		
			
        // Execute the query
		if($stmt->execute()){
 
		// results 
		$result2 = $stmt->get_result();
		
		// Get the number of rows returned
				$num = $result2->num_rows;
										
				if($num>0){  
					$availability = "no";
					
					}
				else{
					$availability = "yes";
				}
		
		}
		
		
		//-------------------------------------
		
			// SELECT query
		
  		$query = "SELECT points_of_interest.name, points_of_interest.address, points_of_interest.details, city_districts.city, city_districts.districtName
					FROM rental_properties
					INNER JOIN city_districts ON rental_properties.districtID = city_districts.districtID
					INNER JOIN points_of_interest ON points_of_interest.districtID = city_districts.districtID
					WHERE propertyID = ?"; 

 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
		//echo $_SESSION['memToView'];
		
		// bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("i", $_SESSION['accToView']);
		
			
        // Execute the query
		$stmt->execute();
 
		// results 
		$result3 = $stmt->get_result();
		
		// Row data
		$row3 = $result->fetch_assoc();
		
		
		
		
		
		
} else {
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: login.php");
	die();
}
/*
SELECT points_of_interest.name, points_of_interest.address, city_districts.districtName, points_of_interest.details
FROM points_of_interest
INNER JOIN city_districts ON city_districts.districtID = points_of_interest.districtID
WHERE isPending = '1'
*/


?>


 <!-- dynamic content will be here -->


<body class="body_general">
<form name='viewspecificaccommodation_user' id='viewspecificaccommodation_user' action='viewspecificaccommodation_user.php' method='post'>
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
			<h3 class="panel-title"><h1 align="Middle">Accommodation Details - User view</h1></h3>
			<a href="searchaccommodation.php" class="btn btn-primary btn-sm">Back</a>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
				<div class="container-fluid?

							<div id="wrap_user">
								<div class="box_user">
								<!--------------------------Fetch the Info from database--------------->
									<a href="viewsupplierprofile.php" class="btn btn-primary btn-sm">View Supplier Profile</a>
									<br>
									<br>
									<br>
									<div><p>Address: <?php echo $myrow['address']; ?></p></div>
									<div><p>District: <?php echo $myrow['districtName']; ?></p></div>
									<div><p>Type: <?php echo $myrow['type']; ?></p></div>
									<div><p>Features: <?php echo $myrow['features']; ?></p></div>
									<div><p>Price: <?php echo $myrow['price']; ?></p></div>
									<div><p>City: <?php echo $myrow['city']; ?></p></div>
									<div><p>Property ID: <?php echo $myrow['propertyID']; ?></p></div>
									<div><p>Available Today?: <?php echo $availability; ?></p></div>
									<br>
		
									<div>
										<div class="form-group" >
											<input type="text" class="form-control" id="startDate" name = "startDate" placeholder="Start date yyyy-mm-dd">
											<input type="text" class="form-control" id="endDate" name = "endDate" placeholder="End Date yyyy-mm-dd">
										</div>
										<input type = 'submit' class="btn btn-primary btn-sm" id='viewButton5' name='viewButton5' value='Request Booking' /> 
										
									</div>
									</div>
								<div class="box_user">
										<div class="container-fluid">
			<div class="container-fluid">
			  <div class="row">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4>
						Points of Interest 
					  </h4>
					</div>
					<div style="width: absolute; height:300px;overflow:auto;">
					<table class="table table-hover">
					  <thead>
						<tr>
							<th class="col-xs-2">Name</th><th class="col-xs-2">Address</th><th class="col-xs-2">Details</th><th class="col-xs-2">City</th><th class="col-xs-2">District</th>
						</tr>
					  </thead>
					  <tbody>
								<?php 
						if (mysqli_num_rows($result3) > 0) {
							// output data of each row
							while($row3 = mysqli_fetch_assoc($result3)) {
								//echo "id: " . $row["id"]. " - Name: " . $row["fName"]. " " . $row["lName"]. "<br>";
								?>
								<tr>
								  <td class="col-xs-1"><?php echo $row3['name']; ?></td><td class="col-xs-2"><?php echo $row3['address']; ?></a></td><td class="col-xs-2"><?php echo $row3['details']; ?></a></td><td class="col-xs-2"><?php echo $row3['city']; ?></a></td><td class="col-xs-2"><?php echo $row3['districtName']; ?></td>
								</tr>
						<?php
							}
						} ?>
					  </tbody>
					</table>
					</div>
				  </div>
			  </div>
			</div>
			
		  								</div>
							</div><!--end wrap-->
							</div>
							
				
				</div>
				<br>
				<br>
							<br>
							<br>

				
			</div>
		  </div>
		</div>
	</div>
</div>

	</form>
</body>
</html>