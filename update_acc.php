<?php
$id = $_SESSION['us'];

$result = mysqli_query($conn, "SELECT* FROM account WHERE Acc_Name='{$id}'");
$row = mysqli_fetch_assoc($result);

if(isset($_GET['id'])){
  $id=$_GET['id'];
}
// Nếu là sự kiện update thì xử lý
if (isset($_POST['update'])) {

  //Nhúng file kết nối với database
  include_once('./connect.php');

  
  $fullname   = $_POST['txtFullname'];
  $email      = $_POST['txtEmail'];
  $address       = $_POST['txtAddress'];

  $result = mysqli_query($conn, "UPDATE account SET Fullname='{$fullname}',Email='{$email}',Address='{$address}' WHERE Acc_Name='{$id}'");

  if ($result) {
    echo "<script>alert('You have successfully updated the information. Return to the homepage')</script>";
    echo '<meta http-equiv="refresh" content="0;URL=?page=index"/>';
  } else
    echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='?page=index'>Again</a>";
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


  <!-- UIkit CSS -->
  <link rel="stylesheet" href="plugins/uikit/uikit.min.css" />
  <link rel="stylesheet" href="css/sign.css">

  <title>Runner</title>

</head>

<body>
  <!--Content-->
  <div class="content">
    <section class="signup">
      <div class="container">
        <div class="signin-left">
          <div class="sign-title">
            <h1>Update your account</h1>
          </div>
        </div>
        <div class="signin-right ">
          <form action="" method="POST">
            <div class="username form-control1 ">
              <input type="text" name="txtUsername" id="username" placeholder="User Name" value="<?php echo $id ?>" readonly>
            </div>
            
            <div class="fullname form-control1">
              <input type="text" name="txtFullname" id="fullname" placeholder="Full Name" value="<?php echo $row['Fullname'] ?>">
            </div>
          
            <div class="email form-control1">
              <input type="Email" name="txtEmail" id="email" placeholder="Email" value="<?php echo $row['Email'] ?>">
            </div>
            <div class="address form-control1">
              <input type="address" name="txtAddress" id="address" placeholder="Address" value="<?php echo $row['Address'] ?>">
            </div>
            <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
            <div>
              <button class="submit" type="submit" name="update">
                <p>Update</p>
              </button>
              <a href="?page=change_pass"> Change your password</a>
            </div>
            <div class="backto">
              <a href="?page=index"><i class="fa fa-long-arrow-alt-left"></i> Back to home page</a>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>

  <script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
  <script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="plugins/bootstrap/popper.min.js"></script>
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/owl.carousel/owl.carousel.min.js"></script>
  <script src="js/home.js"></script>
  <script src="js/script.js"></script>
  <script src="plugins/uikit/uikit.min.js"></script>
  <script src="plugins/uikit/uikit-icons.min.js"></script>
</body>

</html>