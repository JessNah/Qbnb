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
<br>
<br>
<br>
<body>

 <?php
  //Create a user session or resume an existing one
 session_start();
 ?>
 
 <?php
 //check if the user clicked the logout link and set the logout GET parameter
if(isset($_GET['logout'])){
	//Destroy the user's session.
	$_SESSION['id']=null;
	$_SESSION['AdminSESSION'] = null;
	session_destroy();
}
 ?>
 
 
 <?php
 //check if the user is already logged in and has an active session
if(isset($_SESSION['id'])){
	$temp0 = 0;
	$temp1 = 1;
	if($_SESSION['AdminSESSION'] == $temp0){
		//Redirect the browser to the profile editing page and kill this page.
		header("Location: userprofile.php");
		die();
	}
	else if($_SESSION['AdminSESSION'] == $temp1){
		//Redirect the browser to the profile editing page and kill this page.
		header("Location: adminprofile.php");
		die();
	}
}
 ?>
 
 <?php

 
//check if the login form has been submitted
if(isset($_POST['loginBtn'])){
 
    // include database connection
    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "SELECT id, username, password, email FROM service_member WHERE username=?";
 
        // prepare query for execution
        if($stmt = $con->prepare($query)){
		
        // bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("s", $_POST['username']);


         
        // Execute the query
		$stmt->execute();
 
		/* resultset */
		$result = $stmt->get_result();

		// Get the number of rows returned
		$num = $result->num_rows;;
		
		
		if($num>0){
			//If the username/password matches a user in our database
			//Read the user details
			$myrow = $result->fetch_assoc();

			if(password_verify($_POST['password'], $myrow['password'])){
			
			//Create a session variable that holds the user's id
			$_SESSION['id'] = $myrow['id'];
			$_SESSION['AdminSESSION'] = 0;
			//if(boolean password_verify($_POST['password'], $myrow['password'])){
			//Redirect the browser to the profile editing page and kill this page.
			header("Location: userprofile.php");
			die();
			}
		} else {
			//If the username/password doesn't matche a user in our database
			// Display an error message and the login form
			echo "Failed to login";
		}
		} else {
		echo "failed to prepare the SQL";
		}
 }
  ?>
 
 <?php 
 //------- admin 
 
 //check if the login form has been submitted
if(isset($_POST['loginBtnAdmin'])){
 
 
    // include database connection
    include_once 'config/connection.php'; 
	
	// SELECT query
        $query = "SELECT id, username, password, email FROM service_member WHERE username=?";
 
        // prepare query for execution
        if($stmt = $con->prepare($query)){
		
        // bind the parameters. This is the best way to prevent SQL injection hacks.
        $stmt->bind_Param("s", $_POST['usernameAdmin']);


         
        // Execute the query
		$stmt->execute();
 
		/* resultset */
		$result = $stmt->get_result();

		// Get the number of rows returned
		$num = $result->num_rows;;
		
		
		if($num>0){
			//If the username/password matches a user in our database
			//Read the user details
			$myrow = $result->fetch_assoc();

			if(password_verify($_POST['passwordAdmin'], $myrow['password'])){
			
			//Create a session variable that holds the user's id
			$_SESSION['id'] = $myrow['id'];
			$_SESSION['AdminSESSION'] = 1;
			//if(boolean password_verify($_POST['password'], $myrow['password'])){
			//Redirect the browser to the profile editing page and kill this page.
			header("Location: adminprofile.php");
			die();
			}
		} else {
			//If the username/password doesn't matche a user in our database
			// Display an error message and the login form
			echo "Failed to login";
		}
		} else {
		echo "failed to prepare the SQL";
		}
		
 }
 
?>

<!-- dynamic content will be here -->

<body class="body_general">
 <form name='login' id='login' action='login.php' method='post'>
	<div class="container">
		<div class="panel panel-success">
		  <div class="panel-heading">
			<h3 class="panel-title">User Login Panel</h3>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
            <!----- there was a form beg/end here ---->
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="text" class="form-control" name='username' id='username' placeholder="username">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name='password' id='password' placeholder="Password">
					</div>
					
					
					<input type='submit' class="btn btn-primary btn-lg" id='loginBtn' name='loginBtn' value='Log In' /> 
            <!----- there was a form beg/end here ---->
			</div>
		  </div>
		</div>
		<div class="panel panel-success">
		  <div class="panel-heading">
			<h3 class="panel-title">Admin Login Panel</h3>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
            <!----- there was a form beg/end here ---->
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="text" class="form-control" name='usernameAdmin' id='usernameAdmin' placeholder="username">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name='passwordAdmin' id='passwordAdmin' placeholder="Password">
					</div>
					
					<input type='submit' class="btn btn-primary btn-lg" id='loginBtnAdmin' name='loginBtnAdmin' value='Log In' /> 
            <!----- there was a form beg/end here ---->
			</div>
		  </div>
		</div>
	</div>
</form>
</div>

</body>

</html>