
<div class="col-sm-12">
	<div class="content" style="min-height: 520px;">
		<h1 class="text-primary"><i class="fas fa-user-md"></i> User Profile <small class="text-muted">My Profile</small></h1> 
		<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
							<li class="breadcrumb-item " aria-current="page"><a style="text-decoration: none;" href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
							<li class="breadcrumb-item " aria-current="page"><a style="text-decoration: none;" href="index.php?page=userprofile"><i class="fas fa-user-md text-info"></i> Profile</a></li>
						</ol>
<?php

$sesstionUser =  $_SESSION['userLogin'] ;
require_once "./dbcon.php";
$userInfo = mysqli_query($connect, "SELECT * FROM users WHERE username = '$sesstionUser'");
$userRow = mysqli_fetch_assoc($userInfo);

 ?>
<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered"> 
			<tr>
				<td>User ID</td>
				<td><?php echo $userRow['id']; ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo ucwords($userRow['name']); ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $userRow['username']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $userRow['email']; ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php echo ucwords($userRow['status']); ?></td>
			</tr>
			<tr>
				<td>Signup Date</td>
				<td><?php echo $userRow['datetime']; ?></td>
			</tr>
			
			
		</table>
		
		
	</div>
	<div class="col-sm-6 ">
		<div class="">
			<a  href="#">
				<img style=" width: 200px; height: 200px;" src="Adminimages/<?php echo $userRow['photo']; ?>" class="img-fluid img-thumbnail rounded-circle  float-center "> 
			</a>
		</div>
		<?php 
		if (isset($_POST['upload'])) {
			$photo = explode('.', $_FILES['photo']['name']);
			$photoEnd = end($photo);
			$photoName = $sesstionUser.'.'.$photoEnd;
			echo $photoName;
			$uploadImage = mysqli_query($connect,"UPDATE users SET photo = '$photoName' WHERE username='$sesstionUser'");
			if ($uploadImage) {
				move_uploaded_file($_FILES['photo']['tmp_name'], "Adminimages/".$photoName);
         	//header('location:login.php?msg=1');
			}
		}
		?>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group w-50">
				<label for="photo">Profile Pictures</label>
				<input type="file" name="photo" id="photo" required="" class="form-control" style="height: 50px;">
				
			</div>
			<div class="form-group w-50 text-right">
				<input class="btn btn-success"  type="submit" name="upload" value="Upload">
				
			</div>
		</form>
		
	</div>
	
</div>


