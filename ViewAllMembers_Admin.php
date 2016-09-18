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
if(isset($_POST['viewButton'])){
			$_SESSION['memToView'] =  $_POST['memToView'];
		//$_SESSION['memToView'] = $row['id'];
		//echo $row['id'];
			header("Location: ViewMemberProfile.php");
			die();
 } 
  ?>
 
 
 <?php
if(isset($_SESSION['id'])){
   // include database connection
    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "SELECT id, fName, mName, lName, faculty, year, degreeType, membershipStatus
					FROM service_member"; 
 
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
/*
SELECT points_of_interest.name, points_of_interest.address, city_districts.districtName, points_of_interest.details
FROM points_of_interest
INNER JOIN city_districts ON city_districts.districtID = points_of_interest.districtID
WHERE isPending = '1'
*/


?>


 <!-- dynamic content will be here -->

<body class="body_general">
<form name='viewAllMembers_Admin' id='viewAllMembers_Admin' action='viewAllMembers_Admin.php' method='post'>
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
			<h3 class="panel-title"><h1 align="Middle"> All Members</h1></h3>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
			  <div class="row">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4>
						All Members 
					  </h4>
					</div>
					<div style="height:400px;overflow:auto;">
					<table class="table table-hover">
					  <thead>
						<tr>
						  <th class="col-xs-2">ID</th><th class="col-xs-2">Name</th><th class="col-xs-2">Faculty</th><th class="col-xs-2">Year</th><th class="col-xs-2">Degree Type</th><th class="col-xs-2">Membership Status</th>
						</tr>
					  </thead>
					  <tbody>
					  	<tr>
						<?php 
						if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								//echo "id: " . $row["id"]. " - Name: " . $row["fName"]. " " . $row["lName"]. "<br>";
								?>
								<tr>
								  <td class="col-xs-1"><?php echo $row['id']; ?></td><td class="col-xs-2"><?php echo $row['fName']." ".$row["mName"]." ".$row["lName"]; ?></a></td><td class="col-xs-2"><?php echo $row['faculty']; ?></a></td><td class="col-xs-2"><?php echo $row['year']; ?></a></td><td class="col-xs-2"><?php echo $row['degreeType']; ?></a></td><td class="col-xs-2"><?php if($row['membershipStatus'] == 1){echo "yes";} else {echo "no";} ?></td>
								</tr>
						<?php
							}
						} ?>

						<!--- <tr>
						<tr>
						  <td class="col-xs-2">1</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Mike Adams</a></td><td class="col-xs-2">23</td>
						</tr>
						  <td class="col-xs-2">2</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Holly Galivan</a></td><td class="col-xs-2">44</td>
						</tr>
						<tr>
						  <td class="col-xs-2">3</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Mary Shea</a></td><td class="col-xs-2">86</td>
						</tr>
						<tr>
						  <td class="col-xs-2">4</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Jim Adams</a></td><td>23</td>
						</tr>
						<tr>
						  <td class="col-xs-2">5</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Henry Galivan</a></td><td class="col-xs-2">44</td>
						</tr>
						<tr>
						  <td class="col-xs-2">6</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Bob Shea</a></td><td class="col-xs-2">26</td>
						</tr>
						<tr>
						  <td class="col-xs-2">7</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Andy Parks</a></td><td class="col-xs-2">56</td>
						</tr>
						<tr>
						  <td class="col-xs-2">8</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Bob Skelly</a></td><td class="col-xs-2">96</td>
						</tr>
						<tr>
						  <td class="col-xs-2">9</td><td class="col-xs-2"><a href="ViewMemberProfile.html">William Defoe</a></td><td class="col-xs-2">13</td>
						</tr>
						<tr>
						  <td class="col-xs-2">10</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Will Tripp</a></td><td class="col-xs-2">16</td>
						</tr>
						<tr>
						  <td class="col-xs-2">11</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Bill Champion</a></td><td class="col-xs-2">44</td>
						</tr>
						<tr>
						  <td class="col-xs-2">12</td><td class="col-xs-2"><a href="ViewMemberProfile.html">Lastly Jane</a></td><td class="col-xs-2">6</td>
						</tr> --->
					  </tbody>
					</table>
					
					</div>
				  </div>
				  <div display="inline-block">
						<input type = 'submit' class="btn btn-primary btn-sm" id='viewButton' name='viewButton' value='View Profile' /> 
						<div class="form-group" style='float: left'>
							<input type="text" class="form-control" id="memToView" name = "memToView" placeholder="Enter MemberID">
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