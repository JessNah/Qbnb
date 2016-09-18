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
if(isset($_POST['userCancelMem'])){
	    include_once 'config/connection.php'; 
				$query = "UPDATE service_member SET membershipStatus=? WHERE id=?";
				$stmt = $con->prepare($query);	$stmt->bind_param('is', $temp, $_SESSION['id']);
						
				$temp = "0";
				
				$stmt->execute();
				
			header("Location: userprofile.php");
			die();
 } 
  ?>
 
 <?php
if(isset($_SESSION['id'])){
   // include database connection
    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "SELECT fName, email, faculty, degreetype, year, membershipstatus FROM service_member WHERE id=?"; 
 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
        // bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("s", $_SESSION['id']);

        // Execute the query
		$stmt->execute();
 
		// results 
		$result = $stmt->get_result();
		
		// Row data
		$myrow = $result->fetch_assoc();
		
		//echo $_SESSION['AdminSESSION'];
		
	//-----------------
	
	/* // SELECT query
        $query = "SELECT numMembers, numAccomodations, numBookingsMade, numCities FROM qbnb WHERE dataIndex=?"; 
 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
        // bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("i", $dataIndexTemp);
		
		$dataIndexTemp = "1";

        // Execute the query
		$stmt->execute();
 
		// results 
		$result2 = $stmt->get_result();
		
		// Row data
		$myrow2 = $result2->fetch_assoc();
		 */
	//------------------
	
	/* // SELECT query
        $query = "SELECT COUNT(poiID)
					FROM points_of_interest
					WHERE isPending = ?"; 
 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
        // bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("i", $isPendingTemp);
		
		$isPendingTemp = "1";

        // Execute the query
		$stmt->execute();
 
		// results 
		$result3 = $stmt->get_result();
		
		// Row data
		$myrow3 = $result3->fetch_assoc();
		 */
		
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

<body class="body_general">
<form name='userprofile' id='userprofile' action='userprofile.php' method='post'>
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
			<h3 class="panel-title"><h1 align="Middle">Profile</h1></h3>  <a href="login.php?logout=1" class="btn btn-primary btn-sm" align="Right">Log Out</a></h3>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
				<div class="container-fluid">
						  <div class="container-fluid">
								<p ><h3 align="Middle">Welcome <?php echo $myrow['fName']; ?> !</h3></p>
								<div class="row">
									<div class="profile-header-container">   
										<div class="profile-header-img">
											<img class="img-circle" src="images/logo.png" />
						
										</div>
									</div> 
								</div>
							</div>
							<!-----Membership status from database---->
							
													
							<div> 
								<p>Membership Status: <?php if($myrow['membershipstatus'] == 1){echo "yes";} else {echo "no";} ?></p>  
								<input type='submit' class="btn btn-primary btn-sm" id='userCancelMem' name='userCancelMem' value='Cancel Membership' />
							</div>
							<div id="wrap_user">
								<div class="box_user">
									<br>
									<br>
								<!--------------------------Fetch the Info from database--------------->
									<div><p>Member ID: <?php echo $_SESSION['id']; ?></p></div>
									<div><p>Email: <?php echo $myrow['email']; ?></p></div>
									<div><p>Faculty: <?php echo $myrow['faculty']; ?></p></div>
									<div><p>Degree Type: <?php echo $myrow['degreetype']; ?></p></div>
									<div><p>Year: <?php echo $myrow['year']; ?></p></div>
									<a href="updateinfo.php" class="btn btn-primary btn-sm">Update Info</a>
								</div>
								<div class="box_user">
									<div class="user_button">
										<p><a href="myaccommodation.php" class="btn btn-primary btn-sm">My Accommodations</a></p>
										<p></p>
										<p><a href="viewmybookings.php" class="btn btn-primary btn-sm">View Bookings</a></p>
										<p><a href="searchaccommodation.php" class="btn btn-primary btn-sm">Search Accommodation</a></p>
									</div>
								</div>
							</div><!--end wrap-->

				</div>
			</div>
		  </div>
		</div>
	</div>
	</form>
</body>
<html>
