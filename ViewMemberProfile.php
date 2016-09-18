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
if(isset($_POST['deleteButtonMem'])){
			//$_SESSION['memToView'] =  $_POST['memToView'];
		//$_SESSION['memToView'] = $row['id'];
		//echo $row['id'];
		
		    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "DELETE FROM service_member WHERE id =?"; 
 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
		//echo $_SESSION['memToView'];
		
		// bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("i", $_SESSION['memToView']);
		
			
        // Execute the query
		$stmt->execute();
		
			header("Location: ViewAllMembers_Admin.php");
			die();
 } 
  ?>
 
 <?php
if(isset($_SESSION['id'])){
   // include database connection
    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "SELECT id, fName, mName, lName, phoneNumber, email, degreeType, year, username, isAdmin, membershipStatus
					FROM service_member WHERE id =?"; 
 
        // prepare query for execution
        $stmt = $con->prepare($query);
		
		//echo $_SESSION['memToView'];
		
		// bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("i", $_SESSION['memToView']);
		
			
        // Execute the query
		$stmt->execute();
 
		// results 
		$result = $stmt->get_result();
		
		// Row data
		$myrow = $result->fetch_assoc();
		
		
		
		
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
<form name='ViewMemberProfile' id='ViewMemberProfile' action='ViewMemberProfile.php' method='post'>
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
			<h3 class="panel-title"><h1 align="Middle"> Member Profile</h1></h3>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
				<div class="container-fluid">
						  <div class="container-fluid">
								<p><h3 align="Middle"><?php echo $myrow['fName']." ".$myrow["mName"]." ".$myrow["lName"]; ?></h3></p>
								<div class="admin_button">
									<input type = 'submit' class="btn btn-primary btn-sm" id='deleteButtonMem' name='deleteButtonMem' value='Delete Profile' /> 
								</div>
								<div class="row">
									<div class="profile-header-container">   
										<div class="profile-header-img">
											<img class="img-circle" src="images/logo.png" />
											<!-- badge -->
											<div class="rank-label-container">
												<span class="label label-default rank-label"> 2 </span>
											</div>
										</div>
									</div> 
								</div>
							</div>
							<div id="wrap_user">
								<div class="box_admin">
								<!--------------------------Fetch the Info from database--------------->
									<div><p>Phone Number: <?php echo $myrow['phoneNumber']; ?> </p> </div>
									<div><p>Email Address: <?php echo $myrow['email']; ?> </p></div>
									<div><p>Member ID: <?php echo $myrow['id']; ?> </p></div>
									<div><p>Membership Status: <?php echo $myrow['membershipStatus']; ?> </p></div>
									<div><p>Degree Type: <?php echo $myrow['degreeType']; ?> </p></div>
									<div><p>Year: <?php echo $myrow['year']; ?> </p></div>
									<div><p>Username: <?php echo $myrow['username']; ?> </p></div>
									<div><p>Admin Status: <?php if($myrow['isAdmin'] == 1){echo "yes";} else {echo "no";} ?> </p></div>
								</div>
							</div><!--end wrap-->
							<div class="admin_button">
								<div >
										<a href="bookingsummary.php" class="btn btn-primary btn-sm">Booking Summary</a>
										<a href="accommodationsummary.php" class="btn btn-primary btn-sm">Owned Accommodation Summary</a>
								</div>
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