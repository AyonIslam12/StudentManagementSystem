<div class="col-sm-12">
	<div class="content" style="min-height: 520px;">
		<h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small class="text-muted">Statistics Overview</small></h1> 
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<a  style="text-decoration: none;" href="index.php"><li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> Dashboard</li></a>
			</ol>
<?php 
require_once "./dbcon.php";
$countStudent = mysqli_query($connect,"SELECT * FROM studentinfo");
$totalStudents = mysqli_num_rows($countStudent);
$countUsers = mysqli_query($connect,"SELECT * FROM users");
$totalUsers = mysqli_num_rows($countUsers);

?>
			<div class="row ">
				<div class="col-sm-4 offset-2">
					<div class="card" style="width: 18rem;">
						<div class="card-header bg-secondary ">
							<div class="row text-white">
								<div class="col-sm-3 ">
									<i class="fas fa-user-graduate fa-5x text-warning"></i>
								</div>
								<div class="col-sm-9">
									<div class="text-right text-warning" style="font-size: 45px;">
									<?php echo $totalStudents; ?>
									</div>
									<div class="text-right  ">
										All Students
									</div>

								</div>

							</div>
						</div>
						<a  href="index.php?page=allStudents">
							<div class="card-footer text-center " style="text-decoration: none;">
								<div>
									<span class="btn" >All Students</span>
									<span style="text-decoration: none;" class="btn"><i class="fa fa-arrow-circle-o-right"></i></i></span>
								</div>

							</div>
						</a>
					</div>

				</div>
				<div class="col-sm-4">
					<div class="card" style="width: 18rem;">
						<div class="card-header bg-info">
							<div class="row text-white">
								<div class="col-sm-3 ">
									<i class="fas fa-users fa-5x text-dark"></i>
								</div>
								<div class="col-sm-9">
									<div class="text-right" style="font-size: 45px;">
									<?php echo $totalUsers; ?>
									</div>
									<div class="text-right  ">
										All Users
									</div>

								</div>

							</div>
						</div>
						<a  href="index.php?page=allUsers">
							<div class="card-footer text-center " style="text-decoration: none;">
								<div>
									<span class="btn" >All Users</span>
									<span style="text-decoration: none;" class="btn"><i class="fa fa-arrow-circle-o-right"></i></span>
								</div>

							</div>
						</a>
					</div>

				</div>
				

			</div>
			<hr>
			<!--table start-->
			<div class="row">
				<div class="col-sm-12">
					<div class="s-table">
						<h2  class="text-left py-3 ">All Students</h2>
						<table id="example" class="table table-striped table-bordered mt-4" style="width:100%">
							<thead class="text-center">
								<tr>
									<th>Name</th>
									<th>Roll</th>
									<th>Department</th>
									<th>City</th>
									<th>Contact</th>
									<th>Photo</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								require_once "./dbcon.php";
								$query = "SELECT * FROM `studentinfo` ";
								$dbInfo = mysqli_query($connect,$query);
								while ($row = mysqli_fetch_assoc($dbInfo) ) : ?>



									<tr>
										
										<td><?php echo ucwords($row['name']); ?></td>
										<td><?php echo ucwords($row['roll']); ?></td>
										<td><?php echo ucwords($row['department']); ?></td>
										<td><?php echo ucwords($row['city']); ?></td>
										<td><?php echo ucwords($row['pcontact']); ?></td>
										<td class=" text-center" style="width: 15%; height:auto;"><img src="studentImages/<?php echo $row['photo']; ?>" style="width: 100%; height:auto;"></td>
										<td>
											<div class=""><a class="btn btn-xs btn-warning mb-1" style="text-decoration: none; " href="index.php?page=updateStudent&id=<?php echo base64_encode($row['id']); ?>"><i class="far fa-edit "> edit</i></a></div> 
											<div><a class="btn btn-xs btn-danger delete" style="text-decoration: none; " href="deleteStudent.php?id=<?php echo base64_encode($row['id']); ?>"><i class="far fa-trash-alt "> delete</i></a></div>
										</td>
									</tr>
								<?php endwhile; ?>


							</tbody>

						</table>


					</div>

				</div>

			</div>
		</nav>
	</div>
</div>