<?php
require_once "./dbcon.php";
$msg = '';
$error ='';
 if (isset($_POST['registration'])) {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $photo = explode(".", $_FILES['photo']['name']);
     $endofPhoto = end($photo);
     $photo_name= $username.'.'.$endofPhoto;
     $input_error = array();
    if (empty($name)) {
        $input_error['name'] = "Sorry!, the Name feild is required.";
    }
    if (empty($email)) {
        $input_error['email'] = "Sorry!, the email feild is required.";
    }
    if (empty($username)) {
        $input_error['username'] = "Sorry!, the username feild is required.";
    }
    if (empty($password)) {
        $input_error['password'] = "Sorry!, the password feild is required.";
    }

    
    if(count($input_error) == 0) {
       $emailChack = mysqli_query($connect, "SELECT * FROM `users` WHERE `email`='$email';");
       if (mysqli_num_rows($emailChack) == 0) {
        
       }else{
        $errorEmail ='Sorry!!!,the email address already exits.';
       } 
    } 
    if(count($input_error) == 0) {
       $usernameChack = mysqli_query($connect, "SELECT * FROM `users` WHERE `username`='$username';");
       if (mysqli_num_rows($usernameChack) == 0) {
         
       }else{
        $errorUsername ='Sorry!!!,the username already exits.';
       } 
    } 

    if(count($input_error) == 0) {
       $passwordChack = mysqli_query($connect, "SELECT * FROM `users` WHERE `password`='$password';");
       if (mysqli_num_rows($passwordChack) == 0) {
        if (strlen($password) > 7) {
          $password = md5($password);
          
        }else{
          $errorPassword='Sorry!!!, password should be at least 8 characters.';
        }
         
       }
        
    }
    //insertUserData
  if ($name != '' && $email != '' && $username != '' && $password != '' && $photo != ''){
      $query ="INSERT INTO `users`( `name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
      $result = mysqli_query($connect,$query);
       /* if ($result){
          
      //$_SESSION["data_insert_success"] = "Data inserted successfully";
        move_uploaded_file($_FILES['photo']['tmp_name'], "images/".$photo_name);
        header('location: login.php');
      }else{
        //$_SESSION["data_insert_error"] = "Data inserted error";
       //echo $connect->error;
       }*/

       if ($result) {
        move_uploaded_file($_FILES['photo']['tmp_name'], "Adminimages/".$photo_name);
         header('location:login.php?msg=1');
       }else{
         $error = 1;
       }  
     }
 }
 ?>
 <!doctype html>
      
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>User Registration</title>
  </head>
  <body>
    <div class="container bg-secondary mt-2 mb-2 ">
        <h1 class=" text-white text-center pt-3 text">User Registration Form</h1>
        <hr>
        <?php if(isset($successMsg)) : ?>
                     
                       <div class="row my-2">
                        <div class="col-sm-6 offset-3 bg-success text-center rounded">
                          <p class="text-white py-2 "> <?php echo $successMsg; ?></p>
                          
                        </div>
                        
                      </div>
                   
                  <?php endif; ?>
                
        <div class="row">
            <div class="col-6 offset-3 bg-primary p-3 rounded mb-3">
             
                    <?php
                    $name='';
                    $email='';
                    $username='';
                    $password='';
                    if (isset($_POST['name']) && !empty($_POST['name'])) {
                    $name = htmlspecialchars($_POST['name']);
                    } 
                    if (isset($_POST['email']) && !empty($_POST['email'])) {
                    $email = htmlspecialchars($_POST['email']);
                    }
                    if (isset($_POST['username']) && !empty($_POST['username'])) {
                    $username = htmlspecialchars($_POST['username']);
                    }
                    if (isset($_POST['password']) && !empty($_POST['password'])) {
                    $password = htmlspecialchars($_POST['password']);
                    }
                    ?> 
                    <?php
                        
                         if('1' == $error) : ?>
                        <div class="bg-success text-center">
                            <p class="py-2">Roll number should not Duplicate</p>
                        </div>
                    <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group text-white">
                        <label  for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name"  class="form-control" value="<?php echo $name; ?>">
                        <label class="text-danger"><?php if(isset($input_error['name'])){echo $input_error['name'];} ?></label>
                    </div>
                    <div class="form-group text-white">
                        <label  for="email">Email</label>
                        <input type="email" name="email" id="email"  value="<?php echo $email; ?>" placeholder="Enter Your E-mail"  class="form-control">
                        <label class="text-danger"><?php if(isset($input_error['email'])){echo $input_error['email'];} ?></label>
                       <label class="text-danger"><?php if(isset($errorEmail)){echo $errorEmail;} ?></label>
                    </div>
                    <div class="form-group text-white">
                        <label  for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?php echo $username; ?>" placeholder="Enter Your Username"  class="form-control">
                        <label class="text-danger"><?php if(isset($input_error['username'])){echo $input_error['username'];} ?></label>
                        <label class="text-danger"><?php if(isset($errorUsername)){echo $errorUsername;} ?></label>
                    </div>
                    <div class="form-group text-white">
                        <label  for="password">Password</label>
                        <input type="password" name="password" id="password" value="<?php echo $password; ?>" placeholder="Enter Your Password"  class="form-control">
                        <label class="text-danger"><?php if(isset($input_error['password'])){echo $input_error['password'];} ?></label>
                       <label class="text-danger"><?php if(isset($errorPassword)){echo $errorPassword;} ?></label>
                    </div>
                    <div class="form-group text-white">
                        <label   for="photo">Photo</label>
                        <input style="height: 50px;" type="file" name="photo" id="photo"  class="form-control" required="">
                    </div>
                     <div class="form-group ">
                       <input class="btn btn-success" type="submit" name="registration" value="Registration">
                    </div>
                   
                    
                </form>
                <p class="text-dark">If you have an account? then please <a style="text-decoration: none;" class=" text-white" href="login.php">Login</a></p>

                
            </div>
            

            
        </div>
    </div>

    
   

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

   
  </body>
</html>