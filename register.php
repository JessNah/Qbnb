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
 
 if(isset($_POST['signUp'])){
  // include database connection
    include_once 'config/connection.php'; 
	
	$query = "INSERT INTO service_member (fName, mName, lName, phoneNumber, email, faculty, degreeType, year, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 
	$stmt = $con->prepare($query);	$stmt->bind_param('sssisssiss', $fName, $mName, $lName, $phoneNumber, $email, $faculty, $degreeType, $year, $username, $password);
	
	//set parameters
	$fName = $_POST['fName'];
	$mName = $_POST['mName'];
	$lName = $_POST['lName'];
	$phoneNumber = $_POST['phoneNumber'];
	$email = $_POST['email'];
	$faculty = $_POST['faculty'];
	$degreeType = $_POST['degreeType'];
	$year = $_POST['year'];
	$username = $_POST['username'];

	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	

	//$email = "john@example.com";  -- hard code example
	
	// Execute the query
        if($stmt->execute()){
            echo "New Record Successfully created. <br/>";
			
			// ------------------------------------------
			// increment numMembers

			// first get the current number in database ........
			$query = "SELECT numMembers FROM qbnb WHERE dataIndex=?";
								 
			// prepare query for execution
			if($stmt = $con->prepare($query)){  
											
				// bind the parameters. This is the best way to prevent SQL injection hacks.
				$stmt->bind_Param("i", $dataIndexTemp);
				
				$dataIndexTemp = "1";
					
				// Execute the query
				$stmt->execute();
		 
				/* resultset */
				$result = $stmt->get_result();

				// Get the number of rows returned
				$num = $result->num_rows;
										
				if($num>0){  
					//Read the details
					$myrow = $result->fetch_assoc();
	
					$currentMemNum = $myrow['numMembers'];
					
					//now get new query to update -------------------- 

					$query = "UPDATE qbnb SET numMembers=? WHERE dataIndex=?";
					$stmt = $con->prepare($query);	
					
					$stmt->bind_param('is', $memNumIncrement, $dataIndexTemp);
							
					//$email = "john@example.com";  -- hard code example
							
					$memNumIncrement = $currentMemNum + 1;
					$dataIndexTemp = "1";
								
					// Execute the query
					if($stmt->execute()){
						echo "numMembers was updated. <br/>";
					}else{
						echo 'Unable to update numMembers. Please try again. <br/>';
					}
				}
			}
			//----------
			
			header("Location: index.html");
			die();
			
		}else{
			echo 'Unable to create record. Please try again. <br/>';
				header("Location: register.php");
				die();
        }
	
 }
 
 ?>

<!-- dynamic content will be here -->

<body class="body_general">
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
 <form name='register' id='register' action='register.php' method='post'>
	<div class="container">
		<div class="panel panel-success">
		  <div class="panel-heading">
			<h3 class="panel-title">User Signup</h3>
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
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name" name="lName">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Phone Number</label>
							<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Phone Number" name="phoneNumber">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email Address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Address" name="email">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Faculty</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Faculty" name="faculty">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Degreetype</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Degreetype" name="degreeType">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Year</label>
							<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Year" name="year">
						</div>
						<input type='submit' class="btn btn-primary btn-lg" id='signUp' name='signUp' value='SIGN UP' />
					</form>
				</div>
			</div>
		  </div>
		</div>
	</div>
</form>
</div>

</body>

</html>