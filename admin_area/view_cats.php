	<?php
	//user input
	 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; //tenary operator ? true : false
	 $perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 5;//default is 5 items perpage but it can go as far as far as 50 max 

	 // positioning
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	?>


<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Categories Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Category ID</th>
		<th>Category Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_cat = "SELECT  SQL_CALC_FOUND_ROWS * FROM categories LIMIT $start,$perPage";
	
	$run_cat = mysqli_query($con, $get_cat); 
	
	$i = 0;
	
	while ($row_cat=mysqli_fetch_array($run_cat)){
		
		$cat_id = $row_cat['cat_id'];
		$cat_title = $row_cat['cat_title'];
		$start++;
	
	?>
	<tr align="center">
		<td><?php echo $start;?></td>
		<td><?php echo $cat_title;?></td>
		<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
		<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>
</table>
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
      <a class='page-link' href='?view_cats&page=$j' tabindex='-1'>Previous</a>
    </li>
		";


		} ?>

	<?php
	

	 for($i=1; $i<=$pages; $i++) {
	 	if($page==$i ){
	echo"<li class='page-item ' >
      		<a class='selected page-link' style=\" font-weight: bold;
    background: #F2F2F2;\" href='?view_cats&page=$i&per-page=$perPage'>$i <span class='sr-only'>(current)</span></a>
    	</li>";} else {
    		echo"<li class='page-item' >
      		<a class='page-link' href='?view_cats&page=$i&per-page=$perPage'>$i <span class='sr-only'>(current)</span></a>
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
      <a class='page-link' href='?view_cats&page=$j'>Next</a>
    </li>";


}


?>
	
</ul>
</nav>