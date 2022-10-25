<?php
if (isset($_POST['signup'])) {

    include_once('./connect.php');

    $username   = $_POST['txtUsername'];
    $password   = $_POST['txtPassword'];
    $fullname   = $_POST['txtFullname'];
    $gender     = $_POST['Gender'];
    $email      = $_POST['txtEmail'];
    $address       = $_POST['txtAddress'];
    $err="";
    $username   = $_POST['txtUsername'];
    
    $query = mysqli_query($conn,"SELECT Acc_Name FROM account WHERE Acc_Name='{$username}'");
    if (mysqli_num_rows($query) == 1){
      echo "<script>alert('Username already exists!')</script>";
      echo '<meta http-equiv="refresh" content="0;URL=?page=signup"/>';
    }

    if($username==""||$password==""||$fullname==""||$email==""||$address==""){
        $err.="<li>Please fill out all the data fields</li>";
    }
    if($err!=""){
        echo $err;
    }else{
        $result = mysqli_query($conn, "INSERT INTO account(Acc_name,Password,Fullname,Gender,Email,Address,State) VALUES ('{$username}','{$password}','{$fullname}','{$gender}','{$email}','{$address}',0)");

        if ($result) {
            echo "Quá trình đăng ký thành công.";
            echo '<meta http-equiv="refresh" content="0;URL=index.php?page=signin"/>';
        } else
            echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='signup.php'>Thử lại</a>";
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

  <title>CH Store</title>

</head>

<body>



  <div class="content">
    <section class="signup">
      <div class="container">
        <div class="signin-left">
          <div class="sign-title">
            <h1>Create Account</h1>
          </div>
        </div>
        <div class="signin-right ">
          <form action="" method="POST">
            <div class="username form-control1 ">
              <input type="text" name="txtUsername" id="username" placeholder="User Name" require>
            </div>
            <div class="password form-control1">
              <input type="password" name="txtPassword" id="password" placeholder="Password" require>
            </div>
            <div class="fullname form-control1">
              <input type="text" name="txtFullname" id="fullname" placeholder="Full Name" require>
            </div>
            <div class="sex form-control1">
              <div class="female">
                <input type="radio" id="female" checked name="Gender" value="Female">
                <label for="female">Female</label>
              </div>
              <div class="male">
                <input type="radio" id="male" name="Gender" value="Male">
                <label for="male">Male</label>
              </div>
            </div>
            <div class="email form-control1">
              <input type="Email" name="txtEmail" id="email" placeholder="Email" require>
            </div>
            <div class="address form-control1">
              <input type="address" name="txtAddress" id="address" placeholder="Address" require>
            </div>
            <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
            <div>
              <button class="submit" type="submit" name="signup">
                <p>Sign up</p>
              </button>

            </div>
            <div class="backto">
              <a href=""><i class="fa fa-long-arrow-alt-left"></i> Go back to the main page</a>
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