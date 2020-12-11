<div class="col-sm-12">
				<div class="content" style="min-height: 520px;">
					<h1 class="text-primary"><i class="fas fa-user-plus text-primary"></i> Add Student <small class="text-muted">Add New Student</small></h1> 
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="index.php?page=addStudent"><i class="fas fa-user-plus text-primary fa-1x p-0 m-0" ></i> Add Student</a></li>
						</ol>
<?php
require_once "./dbcon.php";
if (isset($_POST['addStudent'])) {
	$name = htmlspecialchars($_POST['name']);
	$roll = htmlspecialchars($_POST['roll']);
	$department = htmlspecialchars($_POST['department']);
	$city = htmlspecialchars($_POST['city']);
	$pcontact = htmlspecialchars($_POST['pcontact']);
	$photo = explode('.', $_FILES['photo']['name']);
	$photoEnd = end($photo);
	$photoName = $roll.'.'.$photoEnd;
	$input_error = array();
	if (empty($name)) {
        $input_error['name'] = "Sorry!, the Name feild is required.";
    }
    if (empty($roll)) {
        $input_error['roll'] = "Sorry!, the roll feild is required.";
    }
    if (empty($department)) {
        $input_error['department'] = "Sorry!, the department feild is required.";
    }
    if (empty($city)) {
        $input_error['city'] = "Sorry!, the city feild is required.";
    }
    if (empty($pcontact)) {
        $input_error['pcontact'] = "Sorry!, the pcontact feild is required.";
    }
   
 	/*$qry =" INSERT INTO `studentinfo`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$photoName')";
 	$result = mysqli_query($connect, $qry);
 	if ($result) {
 		
 		 move_uploaded_file($_FILES['photo']['tmp_name'], "studentImages/".$photoName);
 		

 	}else{
 		echo "No";
 	}
	 */
   
    if ($name != '' && $roll != '' && $department != '' && $city != '' && $pcontact != '' && $photo != '') {
        $qry = "INSERT INTO studentinfo (name,roll,department,city,pcontact,photo) VALUES ('".$name."','".$roll."','".$department."','".$city."','".$pcontact."','".$photoName."')";

   $result = $connect->query($qry);

   if ($result === true) {
       $successMsg = "Data successfully added!";
       move_uploaded_file($_FILES['photo']['tmp_name'], "studentImages/".$photoName);

   } else {

       $errorMsg = "Roll number should not be duplicate!";
   }

    }
}

 ?>
 <?php if(isset($successMsg)) : ?>
 <div>
     <div class="row">
        <div class="col-sm-6 offset-3 bg-success text-center rounded">
            <p class="text-white py-2 "> <?php echo $successMsg; ?></p>
            
        </div>
         
     </div>
 </div>
<?php endif; ?>
<?php if(isset($errorMsg)) : ?>
 <div>
     <div class="row">
        <div class="col-sm-6 offset-3 bg-warning text-center rounded">
            <p class="text-danger py-2 "> <?php echo $errorMsg; ?></p>
            
        </div>
         
     </div>
 </div>
<?php endif; ?>

<?php
                    $name='';
                    $roll='';
                  
                    $city='';
                    $pcontact='';
              
                   
                    
                    if (isset($_POST['name']) && !empty($_POST['name'])) {
                    $name = htmlspecialchars($_POST['name']);
                    } 
                    if (isset($_POST['roll']) && !empty($_POST['roll'])) {
                    $roll = htmlspecialchars($_POST['roll']);
                    }
                    
                    if (isset($_POST['city']) && !empty($_POST['city'])) {
                    $city = htmlspecialchars($_POST['city']);
                    }
                     if (isset($_POST['pcontact']) && !empty($_POST['pcontact'])) {
                    $pcontact = htmlspecialchars($_POST['pcontact']);
                    }
                     
                    ?> 
 
<div class="row bg-secondary m-4 rounded">
	<div class="col-sm-6 offset-3 py-4 text-warning">
		<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
            	<label for="name">Student Name</label>
            	<input type="text" name="name" id="name" class="form-control" placeholder="Student Name" value="<?php echo $name; ?>">
            	<p class="text-danger text-bold"><?php if(isset($input_error['name'])){echo $input_error['name'];} ?></p>
            </div> 
            <div class="form-group">
            	<label for="roll">Student Roll</label>
            	<input type="number" name="roll" id="roll" class="form-control" pattern="[0-9]{8}" placeholder="Roll" value="<?php echo $roll; ?>">
            	<p class="text-danger text-bold"><?php if(isset($input_error['roll'])){echo $input_error['roll'];} ?></p>
            </div>  
            <div class="form-group">
            	<label for="department">Department</label>
            	<select class="form-control" name="department" id="department" >
            		<option value="">Select</option>
            		<option value="BCSE ">BCSE</option>
            		<option value="BEEE">BEEE</option>
                    <option value="BMEC">BMEC</option>
            	</select>
            	<p class="text-danger text-bold"><?php if(isset($input_error['department'])){echo $input_error['department'];} ?></p>
            </div>   
            <div class="form-group">
            	<label for="city">City Name</label>
            	<input type="text" name="city" id="city" class="form-control" placeholder="Student Address" value="<?php echo $city; ?>">
            	<p class="text-danger text-bold"><?php if(isset($input_error['city'])){echo $input_error['city'];} ?></p>
            </div>   
            <div class="form-group">
            	<label for="pcontact">Parents Contact</label>
            	<input type="text" name="pcontact" id="pcontact" class="form-control" pattern="01[1|5|6|7|8|9][0-9]{8}" placeholder="01*********" value="<?php echo $pcontact; ?>">
            	<p class="text-danger text-bold"><?php if(isset($input_error['pcontact'])){echo $input_error['pcontact'];} ?></p>
            </div>  
            <div class="form-group ">
            	<label   for="photo">Photo</label>
            	<input style="height: 50px;" type="file" name="photo" id="photo"  class="form-control" required="">
            	
            </div>
            <div class="form-group text-right ">
            	<input class="btn btn-success" type="submit" name="addStudent" value="Add Student">
            </div> 

                   
                    
         </form>
		
	</div>
	
</div>