<?php
   @include 'config.php';
   session_start();
   if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = md5($_POST['password']);
      $cpass = md5($_POST['cpassword']);
      $user_type = $_POST['user_type'];

      $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

      $result = mysqli_query($conn, $select);

      if(mysqli_num_rows($result) > 0){

         $row = mysqli_fetch_array($result);
         header('location:admin_page.php');
      }
      else{
         $error[] = 'incorrect email or password!';
      }
   };
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>login form</title>
      <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <div class="form-container">
         <div class="col1" style="display:flex;">
            <div>
               <form action="" method="post">
               <div style="display:flex;"><img src="img/Bellefit.PNG" height="60px" alt="" srcset=""><h3>Bellefit</h3></div>
                  <h3>login now</h3><br>
                  <?php
                  if(isset($error)){
                     foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                     };
                  };
                  ?>
                  <input type="email" name="email" required placeholder="enter your email">
                  <input type="password" name="password" required placeholder="enter your password"><br><br>
                  <input type="submit" name="submit" value="login now" class="form-btn" style="background: #268906; color: white;"><br><br>
                  <p>don't have an account? <a href="register_form.php">register now</a></p><br><br>
               </form>
            </div>
            <div class="overlay-container">
               <div class="overlay-panel overlay-right"><img src="img/loginbannerimg.png" class=""></div>
            </div>
         </div>
      </div>
   </body>
</html>