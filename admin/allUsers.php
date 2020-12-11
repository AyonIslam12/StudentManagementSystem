<div class="col-sm-12">
				<div class="content" style="min-height: 520px;">
					<h1 class="text-primary"><i class="fas fa-user text-info"></i> All <small class="text-muted">Users</small></h1> 
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="index.php?page=allStudents"><i class="fas fa-user text-info"></i> All Users</a></li>
						</ol>
						
					
             
                    
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead class="text-center">
		<tr>
			
			<th>Name</th>
			<th>Email</th>
			<th>Username</th>
			<th>Photo</th>
			

		</tr>
	</thead>
	<tbody>
		<?php 
		require_once "./dbcon.php";
		$query = "SELECT * FROM `users` ";
		$dbInfo = mysqli_query($connect,$query);
		while ($row = mysqli_fetch_assoc($dbInfo) ) : ?>
			<tr>
				
				<td><?php echo ucwords($row['name']); ?></td>
				<td><?php echo ucwords($row['email']); ?></td>
				<td><?php echo ucwords($row['username']); ?></td>
				<td class=" text-center" style="width: 15%; height:auto;"><img src="Adminimages/<?php echo $row['photo']; ?>" style="width: 100%; height:auto;"></td>
				
			</tr>
		<?php endwhile; ?>


	</tbody>

</table>