<?php 
session_start();
$task = $_GET['task'] ?? '';
$msg = $_GET['msg'] ?? '0';
$deleteMsg = $_GET['deleteMsg'] ?? '0';
if (!isset( $_SESSION['userLogin'])) {
	header("location: login.php");
}

?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin Panel</title>
	<!--google font-->
	<link href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
	<!--fontwase-->
	<script src="https://kit.fontawesome.com/c4f7856497.js" crossorigin="anonymous"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">	
</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-success">
		<a class="navbar-brand bg-secondary rounded py-1" href="index.php"><span class="p-2 text-light">Students Management System</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item  px-0 px-lg-2 py-1 py-lg-0">
					<a class="nav-link bg-primary rounded text-warning" href="logout.php"><i class="fas fa-user text-white"></i> Welcome: <span class="text-white"></span></a>
				</li>
				<li class="nav-item px-0 px-lg-2 py-1 py-lg-0">
					<a class="nav-link bg-primary rounded text-warning" href="registration.php"><i class="fas fa-user-plus text-white"></i> Add User</a>
				</li>
				<li class="nav-item px-0 px-lg-2 py-1 py-lg-0">
					<a class="nav-link bg-primary rounded text-warning" href="index.php?page=userProfile"><i class="fas fa-user text-white"></i> Profile</a>
				</li>
				<li class="nav-item px-0 px-lg-2 py-1 py-lg-0">
					<a class="nav-link bg-primary rounded text-warning" href="logout.php"><i class="fas fa-power-off text-danger"></i> Logout</a>
				</li>


			</ul>

		</div>
	</nav>
	<div class="container-fluid">
		<div class="row mt-2 border ">
			<div class="col-sm-2 border text-left bg-dark">
				<ul class="list-group">
					<a  style="text-decoration: none;" href="index.php?page=dashboard"><li class="list-group-item active"><i class="fa fa-dashboard"></i> Dashboard</li></a>
					<a  style="text-decoration: none;" href="index.php?page=addStudent"><li class="list-group-item"><i class="fas fa-user-plus text-primary"></i> Add Student</li></a>
					<a  style="text-decoration: none;" href="index.php?page=allStudents"><li class="list-group-item"><i class="fas fa-user text-info"></i> All Students</li></a>
					<a  style="text-decoration: none;" href="index.php?page=allUsers"><li class="list-group-item"><i class="fas fa-user text-info"></i> All Users</li></a>
				</ul>
			</div>
			
				<div class="col-sm-10  mt-4 ">
					<?php 
			 
			 if (isset($_GET['page'])) {
			 	$page = $_GET['page'].'.php';
			 }else{
			 	$page = "dashboard.php";
			 }

			 if (file_exists($page)) {
			 	require_once $page;
			 }else{
			 	require_once "404.php";
			 }
			 
			 ?>
					
				</div>
				
			</div>

		</div>

	</div>
	

	
	<footer class="bg-primary py-3 mt-5 position-bottom">
		<p class="text-center">CopyRights &copy; 2020;<a class="text-white" href="#">All Rights Reserved by Ayon.</a></p>
	</footer>
	<script type="text/javascript" src="js/warning.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!--Bootstrap DataTable-->
	<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>






</body>
</html>