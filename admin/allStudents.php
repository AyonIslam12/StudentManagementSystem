<div class="col-sm-12">
				<div class="content" style="min-height: 520px;">
					<h1 class="text-primary"><i class="fas fa-user text-info"></i> All <small class="text-muted">Students</small></h1> 
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="index.php?page=allStudents"><i class="fas fa-user text-info"></i> All Student</a></li>
						</ol>
						
                    <?php
                        
                         if('1' == $deleteMsg) : ?>
                       <div class="row">
                       	<div class="col-sm-6 offset-3">
                       		 <div class="bg-warning text-center rounded">
                            <p class="py-2">Your data is successfully deleted!!</p>
                        </div>
                       		
                       	</div>
                       	
                       </div>
                    <?php endif; ?> 
                    
<table id="example" class="table table-striped table-bordered" style="width:100%">
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