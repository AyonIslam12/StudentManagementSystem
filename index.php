<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Student Management System</title>
  </head>
  <body>
    <div class="container-fluid bg-secondary" style="height: 180vh;">
        <div class="text-right py-2"><a class="btn btn-primary " href="admin/login.php">Login</a></div>
        <h1 class="text-center py-0 text-white">Welcome to Student Management System </h1>
    <div class="row pt-4">
        <div class="col-6 offset-3">
         <div class="form-group ">
            <form action="" method="POST">
                <table class="table table-bordered bg-info">
                    <tr>
                        <td colspan="2" class="text-center text-bolder"><label>Student Information</label></td>
                    </tr>
                    <tr>
                        <td><label for="department">Select Department</label></td>
                        <td>
                            <select name="department" id="department" class="form-control" required="">
                                <option value="">Select</option>
                                <option value="BCSE">BCSE</option>
                                <option value="BEEE">BEEE</option>
                                <option value="BMEC">BMEC</option>
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="roll">Enter Your Roll</label></td>
                        <td><input type="text" name="roll" id="roll" pattern="[0-9]{8}"  class="form-control" required=""></td>
                    </tr>
                    <tr >
                        <td class="text-right" colspan="2"><input class="btn btn-dark " type="submit" name="showInfo" value="Click Here" ></td>
                    </tr>
                
            </table>
            </form>
        </div>
            
        </div>

        
    </div>
    <?php 
    require_once "./admin/dbcon.php";
    if (isset($_POST['showInfo'])) :
        $department = htmlspecialchars($_POST['department']);
        $roll = htmlspecialchars($_POST['roll']);
        $result = mysqli_query($connect,"SELECT * FROM studentinfo WHERE department='$department' and roll = '$roll'");
       if (mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);
          
          ?>
     <div class="row">

        <div class=" col-sm-8 offset-2 pt-2 ">
          <h3 class="text-center text-bolder py-1 text-warning">Your Informations</h3>
            <table class="table table-striped table-bordered bg-info">
                <tr>
                    <td rowspan="5 "   class="py-5">
                        <img src="admin/studentImages/<?php echo $row['photo']; ?>" class=" img-thumbnail" style="width: 150px;">
                    </td>
                    <td >Name</td>
                    <td ><?php echo ucwords($row['name']); ?></td>
                    
                </tr>
                <tr>
                    
                    <td>Roll</td>
                    <td><?php echo $row['roll']; ?></td>
                    
                </tr>
                <tr>
                    
                    <td>Department</td>
                    <td><?php echo $row['department']; ?></td>
                    
                </tr>
                <tr>
                    
                    <td>City</td>
                    <td><?php echo ucwords($row['city']); ?></td>
                    
                </tr>
                <tr>
                    
                    <td>Parents Contact</td>
                    <td><?php echo $row['pcontact']; ?></td>
                    
                </tr>
                
                
            </table>
        </div>
        
    </div>

          <?php
       }else{
          ?>
         <script type="text/javascript">
             alert('Data Not Found!!!');
         </script> 
    <?php
       }  
    endif; ?>
        
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>