<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>mBridge - Homepage</title>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/londinium-theme.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/icons.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins/charts/sparkline.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/switch.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uploader/plupload.queue.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/wysihtml5/toolbar.js"></script>

<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>






</head>

<body>

	<!-- Navbar -->
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<!-- <a class="navbar-brand" href="#"><img src="images/mBridge-logo.png" alt="mBridge"></a> -->
			<!-- <a class="sidebar-toggle"><i class="icon-plus-circle"></i></a> -->
			<a class="sidebar-toggle" data-container="body" data-html="true" data-trigger="click" data-toggle="popover" data-placement="bottom" data-content="<div><ul><li><a href='addsale.php'>New Sale</a></li>
			    <li><a href='addproduct.php'>New Product</a></li>
			    <li><a href='addcustomer.php'>New Customer</a></li></ul></div>" title="" ><i class="icon-plus-circle"></i></a>
			
			<div class="dropdown">
			  
			</div>
			<button type="button" class="navbar-toggle offcanvas">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
		</div>

		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-notification"></i>
					<span class="label label-default">2</span>
				</a>
				<div class="popup dropdown-menu dropdown-menu-right">
					<div class="popup-header">
						<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
						<span>Notifications</span>
						<a href="#" class="pull-right"><i class="icon-paragraph-justify"></i></a>
					</div>
	                <ul class="activity">
		                <li>
		                	<i class="icon-cart-checkout text-success"></i>
		                	<div>
			                	<a href="#">Eugene</a> ordered 2 copies of <a href="#">OEM license</a>
			                	<span>14 minutes ago</span>
		                	</div>
		                </li>
		                <li>
		                	<i class="icon-heart text-danger"></i>
		                	<div>
			                	Your <a href="#">latest post</a> was liked by <a href="#">Audrey Mall</a>
			                	<span>35 minutes ago</span>
		                	</div>
		                </li>
		                <li>
		                	<i class="icon-checkmark3 text-success"></i>
		                	<div>
			                	Mail server was updated. See <a href="#">changelog</a>
			                	<span>About 2 hours ago</span>
		                	</div>
		                </li>
		                <li>
		                	<i class="icon-paragraph-justify2 text-warning"></i>
		                	<div>
			                	There are <a href="#">6 new tasks</a> waiting for you. Don't forget!
			                	<span>About 3 hours ago</span>
		                	</div>
		                </li>
	                </ul>
                </div>
			</li>

			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<span>Rahila Sule</span>
					
				</a>
			</li>
			<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
				<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown">
					<span>Log Out</span>
				</a>
			</li>
			</ul>

		</ul>
	</div>
	<!-- /navbar -->


	<!-- Page container -->
 	<div class="page-container">


		<!-- Sidebar -->
		<div class="sidebar">
			<div class="sidebar-content">


				<!-- Main navigation -->
				<ul class="navigation">
					<li><a href="newsfeed.php"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
					<li>
						<a href="viewsales.php"><span>Sales</span> <i class="icon-stats2"></i></a>
					</li>
					<li>
						<a href="viewproducts.php"><span>Products</span> <i class="icon-basket2"></i></a>
						<ul>
							<li><a href="viewproducts.php">All stock</a></li>
							<li><a href="viewproducts_instock.php">In stock</a></li>
							<li><a href="viewproducts_lowstock.php">Low stock</a></li>
							<li><a href="viewproducts_soldout.php">Sold out</a></li>
						</ul>
					</li>
					<li>
						<a href="viewcustomers.php"><span>Customers</span> <i class="icon-users"></i></a>
					</li>
					<li>
						<a href="viewreceivables.php"><span>Receivables</span> <i class="icon-coin"></i></a>
					</li>
				</ul>
				<!-- /main navigation -->

			</div>
		</div>
		<!-- /sidebar -->


		<!-- Page content -->
	 	<div class="page-content">


			<!-- Page header -->
			<div class="page-header" style="margin:30px">
				<h3 style='font-size:300%; font-family:Lucida Grande'>News Feed</h3>
			</div>
			<!-- /page header -->


	    	<!-- news feed -->
            <div class="block">
			                <div class="table">
				                <table class="table table-hover">
				              
				                    <tbody>
				                    	<?php
											include("../../application/models/notification.php");

											$obj = new notification();
											$obj->view_all_notifications();
											while($row=$obj->fetch()){
												echo "<tr style='display:block; font-family:Lucida Grande;'><td><h2 style='display:block; color:DarkBlue;'>{$row['message']}</h2> <p style='display:block'><b>{$row['date']}</b>  at {$row['time']}</p></td></tr>";
											
											}
										?>
				                        
				                    </tbody>
				                </table>
			                </div>
				        </div>
	        <!-- /news feed -->


		</div>
		<!-- /page content -->

	</div>

	<!-- /content -->


</body>
</html>