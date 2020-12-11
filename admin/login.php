<?php
require_once "./dbcon.php";
 $msg = $_GET['msg'] ?? '0';
 session_start();
if (isset( $_SESSION['userLogin'])) {
  header("location: index.php");
}
 if (isset($_POST['admin_login'])) {
    $username = $_POST['username'];
     $password = $_POST['password'];

    $usernameChack = mysqli_query($connect, "SELECT * FROM `users` WHERE username ='$username'");
    if (mysqli_num_rows($usernameChack) > 0) {
        $row = mysqli_fetch_assoc($usernameChack);
        if ($row['password'] == md5($password)) {
         if ($row['status'] == 'active') {
            $_SESSION['userLogin'] = $username;
            header('location: index.php');
         }else{
            $statusMsg = "Your status is inactive";
         }
        }else{
            $errorMsgPassword = " Password is incorrect!!!.";
         }
    }else{
       $errorMsg = "Username  is incorrect!!!.";
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

    <title>Admin Log In</title>
  </head>
  <body>
    <div class="container bg-secondary mt-2 mb-2 pb-4 ">
        <h1 class="text-center py-4">Welcome to Student Management System </h1>
        <div class="row">
            <div class="col-6 offset-3 py-5">
                <div class="mt-5 bg-primary py-4 ">
                    <form action="login.php" method="POST">
                        <h3 class="text-center">Admin Login Form</h3>
                        <?php
                        
                         if('1' == $msg) : ?>
                        <div class="bg-success text-center">
                            <p class="py-2">Your account is created,now you can log in...</p>
                        </div>
                    <?php endif; ?> 
                     <?php
                         if(isset($errorMsg )) : ?>
                        <div class="bg-success text-center">
                            <p class="py-2"><?php echo $errorMsg ; ?></p>
                        </div>
                    <?php endif; ?><?php
                         if(isset($errorMsgPassword )) : ?>
                        <div class="bg-success text-center">
                            <p class="py-2"><?php echo $errorMsgPassword ; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php
                         if(isset($statusMsg )) : ?>
                        <div class="bg-success text-center">
                            <p class="py-2"><?php echo $statusMsg ; ?></p>
                        </div>
                    <?php endif; ?>
                        <div class="form-group px-2">
                            <input type="text" placeholder="Username" name="username" required="" value="<?php if(isset($username)) {echo $username;} ?>" class="form-control my-4">
                        </div>
                            
                            <div class="form-group px-2">
                               <input type="password" placeholder="Password" name="password" required="" value="<?php if(isset($password)) {echo $password;} ?>" class="form-control mt-4">
                            </div>
                            <div class="form-group text-right px-2 my-2">
                                <a class="btn btn-secondary " href="../index.php">Back</a>
                                <input type="submit" name="admin_login" value="Log In" class="btn btn-success  ">

                            </div>
                    </form>
                     <div>
                <p class="px-2">If you don't have an account? then go to <a style="text-decoration: none;" class="text-white" href="registration.php">Regitration</a></p>
            </div>

                </div>
               
            
            </div>

        </div>
        
    </div>
    
   

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>