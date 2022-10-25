<?php
//Xử lý đăng nhập
if (isset($_POST['btnsignin'])) {
    //Kết nối tới database
    include_once('./connect.php');

    //Lấy dữ liệu nhập vào
    $username = $_POST['txtUserName'];
    $password = $_POST['txtPassword'];

    //Kiểm tra tên đăng nhập có tồn tại không
    $result = pg_query($conn, "SELECT Acc_name, Password,State FROM Account WHERE Acc_name='{$username}'");
    if (pg_num_rows($result) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Lấy mật khẩu trong database ra
    $row =pg_fetch_array($result);

    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['Password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    if (pg_num_rows($result) == 1) {
        $_SESSION["us"] = $username;
        $_SESSION["admin"] = $row['State'];
        echo "thanh cong";
        echo '<meta http-equiv="refresh" content="0;URL=?page=index.php"/>';
    } else {
        echo "You loged in fail!";
        echo '<meta http-equiv="refresh" content="0;URL=?page=login"/>';
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

  <title>CH store</title>

</head>

<body>


 
  <div class="content">
    <section class="signin ">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Sign in</h1>
                </div>
            </div>
            <div class="signin-right " id="">
                <form action="" method="POST">
                    <div class="username form-control1 ">
                        <input type="text" name="txtUserName"  id="username" placeholder="User Name" require>
                    </div>
                    <div class="password form-control1">
                        <input type="password" name="txtPassword" id="password" placeholder="Password" require>
                    </div>
                 
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    <div class="submit">
                      <input class="btn" type="submit" name="btnsignin" id="dangnhap" value="Signin">
                    <div class="forgetpassword">
                            <p id="quenmk">OR<a href="?page=signup">Sign up</a></p>
                      </div>
                       
                    </div>
                    
                </form>
            </div>
            <div class="signin-right " id="b-sign">
                <form action="">
                    <div class="username form-control1 ">
                       <h2>Phục hồi mật khẩu</h2>
                    </div>
                    <div class="password form-control1">
                        <input type="password" id="password" placeholder="Password">
                    </div>
                 
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    <div class="submit">
                      <input class="btn" type="submit" value="Gửi">
                      <div class="forgetpassword">
                            <a href="" id="huy">Hủy</a>
                      </div>
                       
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