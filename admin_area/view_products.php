

<?php 
if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

//user input
	 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; //tenary operator ? true : false
	 $perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 5;//default is 5 items perpage but it can go as far as far as 50 max 

	 // positioning
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

?>
<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Products In The Store Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S/N</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_pro = "SELECT  SQL_CALC_FOUND_ROWS * FROM products LIMIT $start,$perPage";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_image = $row_pro['product_image'];
		$pro_price = $row_pro['product_price'];
		$start++;//it gets the number of productsin the db
	

	?>
	<tr align="center">
		<td><?php echo $start;?></td>
		<td><?php echo $pro_title;?></td>
		<td><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
		<td><?php echo $pro_price;?></td>
		<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
		<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>
</table>

<?php } ?>

<?php
	//pageCount
$query ="SELECT FOUND_ROWS() as 'total'";
$result=mysqli_query($con,$query);
$rows=mysqli_fetch_array($result);
$totalPages =$rows['total'];
$pages =ceil($totalPages/$perPage);
?>
<nav aria-label="pagination">
	<ul class="pagination">
	<?php
		if($page <=1 ){

		echo "<li class='page-item disabled'>
	<a class='page-link' href='#' tabindex='-1'>Previous</a>
    </li>";

		}

		else

		{

		$j = $page - 1;

		echo "<li class='page-item '>
      <a class='page-link' href='?view_products&page=$j' tabindex='-1'>Previous</a>
    </li>
		";


		} ?>

	<?php
	

	 for($i=1; $i<=$pages; $i++) {
	 	if($page==$i ){
	echo"<li class='page-item ' >
      		<a class='selected page-link' style=\" font-weight: bold;
    background: #F2F2F2;\" href='?view_products&page=$i&per-page=$perPage'>$i <span class='sr-only'>(current)</span></a>
    	</li>";} else {
    		echo"<li class='page-item' >
      		<a class='page-link' href='?view_products&page=$i&per-page=$perPage'>$i <span class='sr-only'>(current)</span></a>
    	</li>";

    	}
	} 

if($page >=$pages )

{

echo "<li class='page-item page-item disabled'>
      <a class='page-link' href='#'>Next</a>
    </li>";

}

else

{

$j = $page + 1;

echo "<li class='page-item'>
      <a class='page-link' href='?view_products&page=$j'>Next</a>
    </li>";


}


?>
	
</ul>
</nav>


