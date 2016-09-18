<!DOCTYPE HTML>
<html>
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
 
 if(isset($_POST['signUp'])){   
  // include database connection
    include_once 'config/connection.php'; 
	
	//select query   - first verifying authenkey
    $query = "SELECT Authen_Key FROM qbnb WHERE dataIndex=?";
 
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
			//If the username/password matches a user in our database
			//Read the user details
			$myrow = $result->fetch_assoc();

			if($_POST['authKey'] == $myrow['Authen_Key']){   
			
				// update service mem once auth key is verified
				$query = "UPDATE service_member SET isAdmin=? WHERE id=?";
				$stmt = $con->prepare($query);	$stmt->bind_param('is', $temp, $_POST['memID']);
				
				//$email = "john@example.com";  -- hard code example
				
				$temp = "1";
					
				// Execute the query
				if($stmt->execute()){
					//success update
						
					//////// increment numAdmins in qbnb ----------------
							
					// first get the current number in database ........
					$query = "SELECT numAdmins FROM qbnb WHERE dataIndex=?";
										 
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
			
							$currentAdminNum = $myrow['numAdmins'];
							
							//now get new query to update -------------------- 

							$query = "UPDATE qbnb SET numAdmins=? WHERE dataIndex=?";
							$stmt = $con->prepare($query);	
							
							$stmt->bind_param('is', $adminNumIncrement, $dataIndexTemp);
									
							//$email = "john@example.com";  -- hard code example
									
							$adminNumIncrement = $currentAdminNum + 1;
							$dataIndexTemp = "1";
										
							// Execute the query
							if($stmt->execute()){
								echo "numAdmins was updated. <br/>";
							}else{
								echo 'Unable to update numAdmins. Please try again. <br/>';
							}
						}
							
												
						echo "Record was updated. <br/>";
						header("Location: index.html");
						die();
						
					}else{  
						echo 'Unable to update record. Please try again. <br/>';
					}
				
				} // ------------------------------------- ???
				
			}
			else{   
				echo "Failed to verify authentication key";
				header("Location: adminsign.php");
				die();
			} 
		} else {    
			echo "num < 0";
			header("Location: adminsign.php");
			die();
		}  
	} else {  
		echo "failed to prepare the SQL";
		header("Location: adminsign.php");
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
 <form name='adminsign' id='adminsign' action='adminsign.php' method='post'>
	<div class="container">
		<div class="panel panel-success">
		  <div class="panel-heading">
			<h3 class="panel-title">Admin Signup</h3>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
				<div class="container-fluid">
					<form>
						<div class="form-group">
							<label for="exampleInputEmail1">Member ID</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="member ID" name = "memID">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Authentication Key</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="key" name = "authKey">
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