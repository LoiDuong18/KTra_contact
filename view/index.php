
<?php
session_start();
include_once("../model/entity/user.php");
include_once("header.php");
include_once("nav.php");
?>

<?php 
	include_once 'conn.php';
	$result = mysqli_query($con, 'SELECT count(ma) as total FROM qldanhba');
	$row = mysqli_fetch_assoc($result);
	$total_records = $row['total'];

	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 5;

	$total_page = ceil($total_records / $limit);

	if ($current_page > $total_page){
		$current_page = $total_page;
	}
	else if ($current_page < 1){
		$current_page = 1;
	}

	$start = ($current_page - 1) * $limit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin sinh viên</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<style type="text/css">
		body {
			font-size: 15px;
			font-family: sans-serif;
		}
		.pagination > a:hover {
			text-decoration: none;
		}
		.pagination > a {
			margin: 0 15px;
			color: #4254f5;

			
		}
		span {
			color : #f54242;
		}
		i.fas {
			font-size: 13px;
		}
		th , tr {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container pt-3">
		<h3 class="text-center text-monospace pb-2">Danh bạ</h3>
		<a class="btn btn-primary btn-right" href="insert.php"><i class="fas fa-plus-circle "></i> Thêm mới</a>
		<div class="shadow">
			<table class="table table-bordered mt-4">
				<thead class="thead-dark">
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Ho Ten</th>
						<th scope="col">SoDT</th>
						<th scope="col">Email</th>
						<th scope="col">Thao Tác</th>
					</tr>
				</thead>
				<tbody>
				<?php 
						include_once 'conn.php';
						$q = " SELECT * FROM qldanhba ORDER BY name LIMIT $start, $limit";
						$query = mysqli_query($con,$q);
						while ($row = mysqli_fetch_assoc($query)) {  
					?>
					<tr>
						<td><?php echo $row['name'][0]; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td>
							<div class="d-flex justify-content-center">
								<a class="btn btn-outline-success mr-3" href="update.php?ma=<?php echo $row['ma']; ?>"><i class="fas fa-edit"></i> Sửa</a>
								<a onclick="return confirm('Bạn có thực sự muốn xóa nó')"; class="btn btn-outline-danger" href="delete.php?ma=<?php echo $row['ma']; ?>"><i class="fas fa-trash-alt"></i> Xóa</a>
							</div>
						</td>
					</tr>
				<?php 
					}
				 ?>
				</tbody>
			</table>
		</div>
		<div class=" pagination d-flex justify-content-center align-items-center pt-2">
			<?php
			if ($current_page > 1 && $total_page > 1){
				echo '<a href="index.php?page='.($current_page-1).'"><i class="fas fa-angle-double-left"></i> Previous</a>  ';
			}

			for ($i = 1; $i <= $total_page; $i++){
				if ($i == $current_page){
					echo '<span>'.$i.'</span>  ';
				}
				else{
					echo '<a href="index.php?page='.$i.'">'.$i.'</a>  ';
				}
			}

			if ($current_page < $total_page && $total_page > 1){
				echo '<a href="index.php?page='.($current_page+1).'">Next <i class="fas fa-angle-double-right"></i></a>  ';
			}
			?>
			
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<?php
include_once("footer.php"); ?>
</html>
