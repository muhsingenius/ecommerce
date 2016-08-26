<!DOCTYPE HTML>
<htmll>
	<head>
		<title>Techsupport</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css"> 

	</head>
	<body class="container-fluid bg-info">

		<div class="row">

			<div class="col-sm-7">
				<div class="row">
					<div class="col-xs-3">
						<img class="logo" src="git.png" alt="Techsupport">
					</div>
					<div class="col-xs-9">
						<h1><b>TECHSUPPORT</b></h1>
						<H4><i><b>Learn Work Share</b></i></H4>
					</div>
				</div>

			</div>
			<div class="col-sm-5">
				<div class="row">
					<div class="col-xs-4">
						<ul class="nav navbar-nav navbar-right">
			        		<li><a href="#">Login</a></li>
							<li><a href="#">Register</a></li>
			    		</ul>
					</div>
					
					
					<div class="col-xs-8">
						<form class="navbar-form navbar-right" method="post" action="results.php" enctype="multipart/form-data">
								
							    <div class="form-group">
							    	<button class="btn btn-info" for="exampleInputName2"><span class="glyphicon glyphicon-search"></span></button>
							      	<input type="text" class="form-control" id="exampleInputName2" name= "user_search" placeholder="Type here...">						  
							    </div>
							</form>
					</div>
				
				</div>

			</div>
		</div><!--header ends here-->

		<!--nav starts here-->
		<nav class="navbar navbar-default">
			<div class="navbar-header">
	     		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ourNav" aria-expanded="false">
				    <span class="sr-only">Toggle navigation</span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				</button>
      			
   			</div>

   			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="ourNav">
				
					<ul class="nav navbar-nav"><!--nav bar elements-->
						<li><a href="index.php">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Events</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Up coming</a></li>
								<li><a href="#">On Going</a></li>
								<li><a href="#">Completed</a></li>
							</ul>
						</li>
						<li><a href="#">Portfolio</a></li>
						<li><a href="#">Media</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">FAQ</a></li>

					</ul>
			
			</div>
		</nav><!--Navbar ends here-->

	<div class="row">
		<!--  Corousel   -->
		<div class="col-sm-7">
			<div id="ourCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#ourCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#ourCarousel" data-slide-to="1"></li>
					<li data-target="#ourCarousel" data-slide-to="2"></li>
				</ol>

				 <!-- Wrapper for slides -->
	  			<div class="carousel-inner" role="listbox">
	  				<div class="item active">
		      			<img src="tech/img1.jpg">
		      			<div class="carousel-caption">
					        <h2>Image 1</h2>
					    </div>
	    			</div>
	    			<div class="item">
		      			<img src="tech/img2.jpg">
		      			<div class="carousel-caption">
					        <h2>Image 2</h2>
					    </div>
	    			</div>
	    			<div class="item">
		      			<img src="tech/img3.jpg">
		      			<div class="carousel-caption">
					        <h2>Image 3</h2>
					    </div>
	    			</div>
	  			</div>


	  			<!-- Controls -->
				  <a class="left carousel-control" href="#ourCarousel" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#ourCarousel" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>

			</div><!--  Corousel  Ends -->
		</div><!--col 7-->

		<div class="col-sm-5">	
			<div class="well">
				<h2 class="tracks">Track And Events</h2>
				<div class="media">
					<h3><b>Making website with HTML, PHP, MySQL</b></h3>
					<hr>
					<div class="media-left">
						<img class="media-object" src="tech/img1.jpg">
					</div>
					
					<div class="media-body">
						<p>Duration: <b>6weeks</b></p>
						<p>Start Date: <b>22nd Feb, 2016</b></p>
						<p>End Date: <b>31st March, 2016</b></p>
						<p>Meeting Days: <b>Mondays, Tuesdays and Thursdays</b></p>
						<p>Facilitator: <b> Muhsin Ismail</b></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<h2 class="mid-banner-heading">LEARN</h2>
			<div class="mid-banner">
				<a href="learn.php"><img class="img-responsive" src="tech/img1.jpg"></a>
			</div>

			<div class="mid-banner-text">
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
			 Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar
			  ultricies, purus lectus malesuada libero, sit amet commodo
			   magna eros
			 quis urna. Nunc viverra imperdiet enim. Fusce est.
			</div>
		</div>
		<div class="col-sm-4">
			<h2 class="mid-banner-heading">LEARN</h2>
			<div class="mid-banner">
				<a href="learn.php"><img class="img-responsive" src="tech/img1.jpg"></a>
			</div>
			<div class="mid-banner-text">
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
			 	Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar
			    ultricies, purus lectus malesuada libero, sit amet commodo
			   magna eros
			 	quis urna. Nunc viverra imperdiet enim. Fusce est.
			</div>
		</div>
		<div class="col-sm-4">
			<h2 class="mid-banner-heading">LEARN</h2>
			<div class="mid-banner">
				<a href="learn.php"><img class="img-responsive" src="tech/img1.jpg"></a>
			</div>			
			<div class="mid-banner-text">
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
			 Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar
			  ultricies, purus lectus malesuada libero, sit amet commodo
			   magna eros
			 quis urna. Nunc viverra imperdiet enim. Fusce est.
			</div>
		</div>
	</div>




		<footer><!--footer ends here-->
			<div class="row">
				<div class="col-xs-5">
					<div class="row">
						<div class="col-xs-2">
							<img class="img-circle img-responsive" src="tech/tsgh.jpg">
							<h6>Tech support Ghana</h6>
						</div>
						<div class="col-xs-2">
							<img class="img-circle img-responsive" src="tech/tsgh.jpg">
							<h6>Tech support Ghana</h6>
						</div>
						<div class="col-xs-2">
							<img class="img-circle img-responsive" src="tech/tsgh.jpg">
							<h6>Tech support Ghana</h6>
						</div>
						
					</div>
				</div>
				<div class="col-xs-5">
				</div>
				<div class="col-xs-2">
				</div>
			</div>
		</footer><!--footer ends here-->

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>

</html>