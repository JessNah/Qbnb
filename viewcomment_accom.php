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
if(isset($_POST['viewButton16'])){
			//$_SESSION['accToView'] =  $_POST['accToView'];
		//$_SESSION['memToView'] = $row['id'];
		//echo $row['id'];
		    include_once 'config/connection.php'; 
			
/* 				$query = "SELECT bookingID FROM bookings WHERE propertyID=?";
				$stmt = $con->prepare($query);	$stmt->bind_param('s', $_SESSION['acomComment']);
				
				$stmt->execute();
				
		// results 
		$result6 = $stmt->get_result();
		
		// Row data
		$myrow6 = $result6->fetch_assoc();
		
				
				$property2 = $myrow6['propertyID'];
				
				//echo $property2;
				 */
				//------
			
				$query = "INSERT INTO reviews (consumerID, propertyID, commentText) VALUES (?, ?, ?)";
				
				if($stmt = $con->prepare($query)){	
				
				$stmt->bind_param('iis', $name, $_SESSION['acomComment'], $comment);
				//echo "prep";		

				$comment = $_POST['comment'];
				//echo $comment;
				$name = $_POST['name'];
								//echo $name;
				//$date = "2016-03-31";
								//echo $rating;
								//echo $property2;
								//echo $_SESSION['bookingToView'];

				if($stmt->execute()){
					echo "New Record Successfully created. <br/>";
								header("Location: viewcomment_accom.php");
						die();
				}
				
				}
				else{
					echo "didnt prepare";
				}
				

		

 } 
  ?>
 


 <?php
if(isset($_SESSION['id'])){
   // include database connection
    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "SELECT bookingID, startDate,endDate, features, price, type, rental_properties.address
				FROM bookings INNER JOIN rental_properties ON rental_properties.propertyID = bookings.propertyID
				WHERE bookings.bookingID = ?";


        // prepare query for execution
        $stmt = $con->prepare($query);
		
		// bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("s", $_SESSION['bookingToView']);	

						
		
        // Execute the query
		$stmt->execute();
 
		// results 
		$result = $stmt->get_result();
		
		// Row data
		$myrow = $result->fetch_assoc();
		
		//-------------------------------------------
		
			// SELECT query
        $query = "SELECT commentText, rating, fName
				FROM reviews INNER JOIN service_member ON reviews.consumerID = service_member.id
				WHERE propertyID = ?";


        // prepare query for execution
        $stmt = $con->prepare($query);
		
		// bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("s", $_SESSION['acomComment']);	

						
		
        // Execute the query
		$stmt->execute();
 
		// results 
		$result2 = $stmt->get_result();
		
		// Row data
		//$myrow2 = $result2->fetch_assoc();
		

		
} else {
	//User is not logged in. Redirect the browser to the login index.php page and kill this page.
	header("Location: login.php");
	die();
}


?>


<body class="body_general">
<form name='viewcomment_accom' id='viewcomment_accom' action='viewcomment_accom.php' method='post'>
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
			<h3 class="panel-title"><h1 align="Middle">PropertyID#: <?php echo $_SESSION['acomComment']; ?><span></span></h1></h3>
			<a href="userprofile.php" class="btn btn-primary btn-sm">Home</a>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
				<div class="container-fluid">
							<div class="container-fluid">

							

										<textarea rows="4" cols="50" id = "comment" name="comment" >Enter text here...</textarea>
									<input type = 'submit' class="btn btn-primary btn-sm" id='viewButton16' name='viewButton16' value='Submit' /> 
								<div class="form-group" style='float: left'>
									<input type="text" class="form-control" id="name" name = "name" placeholder="Enter  memberID">
								</div>
								
								
									
										<h4>Comments:</h4>
										<?php 
											if (mysqli_num_rows($result2) > 0) {
												// output data of each row
												while($row = mysqli_fetch_assoc($result2)) {
													//echo "id: " . $row["id"]. " - Name: " . $row["fName"]. " " . $row["lName"]. "<br>";
													?>
												<p><th><strong><?php echo $row['fName']; ?> </strong></th></p>
														<tr>
														  <td><?php echo $row['commentText']; ?> </td>
														</tr>
											<?php
												}
											 }  ?>
									
								
							
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