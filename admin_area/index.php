

<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>

<!DOCTYPE> 

<html>
	<head>
		<title>Admin Panel</title> 

		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		
	</style>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 

	<style>

	#left a {
	text-decoration:none;
	color:black;
	text-align:left;
	font-size:18px;
	font-family:Palatino; 
	padding:6px;
	margin:6px;
	display:block;
	}
		#left a:hover {text-decoration:underline; font-weight:bolder; color:orange;}
	</style>
	</head>


<body> 

	<div class="main_wrapper">
	
	
		<div id="header"></div>
		
		<div id="right">
		<h2 style="text-align:center; margin-top: 2px">Manage Content</h2>
			
			<a href="index.php?insert_product">Insert New Products To The Store</a>
			<a href="index.php?view_products">View All Products In The Store</a>
			<a href="index.php?insert_cat">Insert New Category Of Products</a>
			<a href="index.php?view_cats">View All Categories Of Products In The Store </a>
			<a href="index.php?insert_brand">Insert New Brand Of Products</a>
			<a href="index.php?view_brands">View All Brands Of products</a>
			<a href="index.php?view_customers">View Customers</a>
			<a href="index.php?view_orders">View Orders</a>
			<a href="index.php?view_payments">View Payments</a>
			<a href="logout.php">Admin Logout</a>
		
		</div>
		
		<div id="left">
			<a href="index.php">Admin Home</a>
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		
		<?php 
		if(isset($_GET['insert_product'])){
		
		include("insert_product.php"); //pages
		
		}
		if(isset($_GET['view_products'])){
		
		include("view_products.php"); //pages
		
		}
		if(isset($_GET['edit_pro'])){
		
		include("edit_pro.php"); //pages
		
		}
		if(isset($_GET['insert_cat'])){
		
		include("insert_cat.php"); //pages
		
		}
		
		if(isset($_GET['view_cats'])){
		
		include("view_cats.php"); //pages
		
		}
		
		if(isset($_GET['edit_cat'])){
		
		include("edit_cat.php"); //pages
		
		}
		
		if(isset($_GET['insert_brand'])){
		
		include("insert_brand.php"); //pages
		
		}
		
		if(isset($_GET['view_brands'])){
		
		include("view_brands.php"); //pages
		
		}
		if(isset($_GET['edit_brand'])){
		
		include("edit_brand.php"); //pages
		
		}
		if(isset($_GET['view_customers'])){
		
		include("view_customers.php"); //pages
		
		}
		
		?>
		</div>
	<?php } ?>


		</div>

	</div>


</body>
</html>

