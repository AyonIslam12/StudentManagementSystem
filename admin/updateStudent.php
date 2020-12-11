<div class="col-sm-12">
				<div class="content" style="min-height: 520px;">
					<h1 class="text-primary"><i class="far fa-edit text-primary"></i> Update Student <small class="text-muted">Update Student</small></h1> 
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="index.php?page=allStudents"><i class="far fa-edit text-primary fa-1x p-0 m-0" ></i> All Student</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="index.php?page=updateStudent"><i class="far fa-edit text-primary fa-1x p-0 m-0" ></i> Update Student</a></li>
						</ol>

            <?php 
            require_once "./dbcon.php";
               $id =base64_decode($_GET['id']);
             $dbInfo = mysqli_query($connect,"SELECT * FROM studentinfo WHERE id ='$id'");
             $row = mysqli_fetch_assoc($dbInfo);

             if (isset($_POST['updateStudent'])) {
               $name = htmlspecialchars($_POST['name']);
               $roll = htmlspecialchars($_POST['roll']);
               $department = htmlspecialchars($_POST['department']);
               $city = htmlspecialchars($_POST['city']);
               $pcontact = htmlspecialchars($_POST['pcontact']);


               if ($name != '' && $roll != '' && $department != '' && $city != '' && $pcontact != '') {
                $qry = "UPDATE studentinfo SET name ='$name',roll='$roll',department='$department',city='$city',pcontact='$pcontact' WHERE id = '$id' ";

                $result = mysqli_query($connect,$qry);
                if ($result) {
                   $successMsg = "Data is successfully updated!!!!";
                }else{
                   $errorMsg = "Roll number should not be duplicate!";
                }

            }
        }


            ?>

     <?php if(isset($successMsg)) : ?>
 <div>
     <div class="row">
        <div class="col-sm-6 offset-3 bg-success text-center rounded">
            <p class="text-white py-3 "> <?php echo $successMsg; ?></p>
            
        </div>
         
     </div>
 </div>
<?php endif; ?><?php if(isset($errorMsg)) : ?>
 <div>
     <div class="row">
        <div class="col-sm-6 offset-3 bg-warning text-center rounded">
            <p class="text-danger py-2 "> <?php echo $errorMsg; ?></p>
            
        </div>
         
     </div>
 </div>
<?php endif; ?>
 
<div class="row bg-secondary m-4 rounded">
	<div class="col-sm-6 offset-3 py-4 text-warning">
		<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
            	<label for="name">Student Name</label>
            	<input type="text" name="name" id="name" class="form-control" placeholder="Student Name" value="<?php echo $row['name']; ?>">
            	<p class="text-danger text-bold">
            </div> 
            <div class="form-group">
            	<label for="roll">Student Roll</label>
            	<input type="number" name="roll" id="roll" class="form-control" pattern="[0-9]{8}" placeholder="Roll" value="<?php echo $row['roll']; ?>">
            	<p class="text-danger text-bold">
            </div>  
            <div class="form-group">
            	<label for="department">Department</label>
            	<select class="form-control" name="department" id="department" >
            		
            		<option <?php echo $row['department']== 'BCSE' ? 'selected = ""':''; ?>  value="BCSE ">BCSE</option>
            		<option <?php echo $row['department']== 'BEEE' ? 'selected = ""':''; ?>  value="BEEE">BEEE</option>
                    <option <?php echo $row['department']== 'BMEC' ? 'selected = ""':''; ?>  value="BMEC">BMEC</option>
                  
            	</select>
            	<p class="text-danger text-bold"></p>
            </div>   
            <div class="form-group">
            	<label for="city">City Name</label>
            	<input type="text" name="city" id="city" class="form-control" placeholder="Student Address" value="<?php echo $row['city']; ?>">
            	<p class="text-danger text-bold"></p>
            </div>   
            <div class="form-group">
            	<label for="pcontact">Parents Contact</label>
            	<input type="text" name="pcontact" id="pcontact" class="form-control" pattern="01[1|5|6|7|8|9][0-9]{8}" placeholder="01*********" value="<?php echo $row['pcontact']; ?>">
            	<p class="text-danger text-bold"></p>
            </div>  
            
            <div class="form-group text-right ">
            	<input class="btn btn-success" type="submit" name="updateStudent" value="Update Student">
            </div> 

                   
                    
         </form>

		
	</div>
	
</div>