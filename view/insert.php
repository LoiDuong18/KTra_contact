<?php 
include_once 'conn.php';
if(isset($_POST['done'])) {
	$name = $_POST['txtten'];
	$phone = $_POST['txtsdt'];
	$email = $_POST['txtemail'];
	
	$query = "INSERT INTO `qldanhba`(`name`, `phone`, `email`)
	VALUES ('$name','$phone','$email')";
	$result = mysqli_query($con,$query);

	header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm danh bạ</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
	<div class="container pt-4">
		<div class="col-lg-6">
			<h3 class="text-center text-monospace pb-2">Thêm</h3>
			<br>
			<form  method="POST" class="shadow p-3">
				<div class="form-group">
					<label class="control-label" >Họ Tên</label>
					<div class="">	
						<input type="text" class="form-control" name="txtten" placeholder="Ten">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label" >SĐT</label>
					<div class="">
						<input type="text" class="form-control" name="txtsdt" placeholder="Số điện thoại">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label" >Email</label>
					<div class="">
						<input type="text" class="form-control" name="txtemail" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<div class="">
						<button type="submit" class="btn btn-success" name="done"><i class="fas fa-plus-circle"></i> Create</button>
					</div>
				</div>
			</form>
		</div>
	</div>




	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>