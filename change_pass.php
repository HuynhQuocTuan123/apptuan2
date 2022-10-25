<?php
$id = $_SESSION['us'];


if (isset($_POST['change'])) {

    include_once('./connect.php');

    $old_pass  = $_POST['OldPass'];
    $_SESSION['newpass']  = $_POST['NewPass'];
    $_SESSION['confirm']  = $_POST['Confirm'];

    $result = pg_query($conn, "SELECT * FROM account WHERE Acc_Name='$id' and Password='$old_pass'");
    $row = pg_fetch_assoc($result);
    if($row>0){
        if($_SESSION['newpass']==$_SESSION['confirm']){
            $result = pg_query($conn, "UPDATE account SET Password = '{$_SESSION['confirm']}' WHERE account.Acc_Name = '{$id}'");
            echo "Change your password success. <a href='?page=index'>Back</a>";
        }else{
            echo "Confirm password not match with new password. <a href='?page=change_pass'>Back</a>";
        }
        
    }else{
        echo "Your old pass word incoret.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="plugins/animate/animate.min.css">
  <link rel="stylesheet" href="plugins/fontawesome/all.css">
  <link rel="stylesheet" href="plugins/webfonts/font.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <link rel="icon" type="image/x-icon" href="./images/logo.png">


  <link rel="stylesheet" href="plugins/uikit/uikit.min.css" />
  <link rel="stylesheet" href="css/sign.css">

  <title>Runner</title>

</head>

<body>



  <div class="content">
    <section class="signup">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Add category</h1>
                </div>
            </div>
            <div class="signin-right ">
                <form action="" method="POST">
                    <div class="username form-control1 ">
                        <input type="password" name="OldPass"  id="username" placeholder="Old password">
                    </div>
                    <div class="password form-control1">
                        <input type="password" name="NewPass" id="password" placeholder="New password">
                    </div>
                    <div class="fullname form-control1">
                      <input type="password" name="Confirm" id="fullname" placeholder="Confirm new password">
                    </div>
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    <div >
                      <button class="submit" type="submit" name="change"><p>Change</p></button>  
                    </div>
                    <div class="backto">
                      <a href="?page=update_acc"><i class="fa fa-long-arrow-alt-left"></i> Back to home page</a>
                    </div>
                </form>
            </div>
        </div>
    </section>    
  </div>
 
  <script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
  <script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <script src="plugins/bootstrap/popper.min.js"></script>
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/owl.carousel/owl.carousel.min.js"></script>
  <script src="js/home.js"></script>
  <script src="js/script.js"></script>
  <script src="plugins/uikit/uikit.min.js"></script>
  <script src="plugins/uikit/uikit-icons.min.js"></script>
</body>

</html>