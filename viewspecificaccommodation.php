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
							  <meta name="viewport" content="width=device-width, initial-scale=1">
							  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
							  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
							  <style>
							  .carousel-inner > .item > img,
							  .carousel-inner > .item > a > img {
								  width: 100%;
								  margin: auto;
								  height: 400px;
							  }
							  </style>

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
			<h3 class="panel-title"><h1 align="Middle"> Accommodation Detail</h1></h3>
		  </div>
		  <div class="panel-body">
			<div class="container-fluid">
				<div class="container-fluid">
							<div class="container-fluid">
							  <br>
							  <div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
								  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								  <li data-target="#myCarousel" data-slide-to="1"></li>
								  <li data-target="#myCarousel" data-slide-to="2"></li>
								  <li data-target="#myCarousel" data-slide-to="3"></li>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
								  <div class="item active">
									<img src="https://renthomein.files.wordpress.com/2010/06/65161428_1-pictures-of-ludhiana-real-estate-agents-realtors-property-dealers-nri-houses-india-buy-sell-rent-home.jpg" alt="Chania" width="460" height="345">
								  </div>

								  <div class="item">
									<img src="http://www.cgmentor.com/wp-content/uploads/2013/09/washroom_01.jpg" alt="Chania" width="460" height="345">
								  </div>
								
								  <div class="item">
									<img src="http://photos3.zillowstatic.com/i_g/ISlutt5z36zuwk1000000000.jpg" alt="Flower" width="460" height="345">
								  </div>

								  <div class="item">
									<img src="http://cdn.homes.com/cgi-bin/readimage/4396774118/the-apartments-at-eastern-woods-findlay-oh-45840-4.jpg" alt="Flower" width="460" height="345">
								  </div>
								</div>

								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								  <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								  <span class="sr-only">Next</span>
								</a>
							  </div>
							</div>

							</div>
							<div id="wrap_user">
								<div class="box_admin">
								<!--------------------------Fetch the Info from database--------------->
								<br>
								<br>
									<div><p>Address: <?php echo $myrow['address']; ?></p></div>
									<div><p>District: <?php echo $myrow['districtName']; ?></p></div>
									<div><p>Type: <?php echo $myrow['type']; ?></p></div>
									<div><p>Features: <?php echo $myrow['features']; ?></p></div>
									<div><p>Price: <?php echo $myrow['price']; ?></p></div>
									<div><p>City: <?php echo $myrow['city']; ?></p></div>
									<div><p>Property ID: <?php echo $myrow['propertyID']; ?></p></div>
								</div>
							</div><!--end wrap-->
				
				</div>
			</div>
		  </div>
		</div>
	</div>
</div>

</html>