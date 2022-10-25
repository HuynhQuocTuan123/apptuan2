<?php
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT* FROM category WHERE Cate_ID='{$id}'");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    include_once('./connect.php');

    $cateid   = $_POST['txtId'];
    $catename = $_POST['txtName'];
    $des      = $_POST['txtDescription'];

    $result = mysqli_query($conn, "UPDATE category SET Cate_ID='{$cateid}',Cate_Name='{$catename}',Cate_Description='{$des}'
    WHERE cate_id='{$cateid}'");

    if ($result) {
        echo '<meta http-equiv="refresh" content="0;URL=?page=category_management"/>';
    } else
        echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='?page=add_category'>Again</a>";
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
                        <input type="text" name="txtId"  id="username" placeholder="ID" value="<?php echo $row['Cate_ID']?>" readonly="">
                    </div>
                    <div class="password form-control1">
                        <input type="text" name="txtName" id="password" placeholder="Name" value="<?php echo $row['Cate_Name']?>">
                    </div>
                    <div class="fullname form-control1">
                      <input type="text" name="txtDescription" id="fullname" placeholder="Description" value="<?php echo $row['Cate_Description']?>">
                    </div>
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    <div >
                      <button class="submit" type="submit" name="update"><p>Update</p></button>
                       
                    </div>
                    <div class="backto">
                      <a href=""><i class="fa fa-long-arrow-alt-left"></i> Quay lại trang chủ</a>
                    </div>
                </form>
            </div>
        </div>
    </section>    
    <section class="section section-gallery">
      <div class="">
        <div class="hot_sp" style="padding-top: 70px;padding-bottom: 50px;">
          <h2 style="text-align:center;padding-top: 10px">
            <a style="font-size: 28px;color: black;text-decoration: none" href="">Khách hàng và Runner Inn</a>
          </h2>
        </div>
        <div class="list-gallery clearfix">
          <ul class="shoes-gp">
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_1.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_2.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_3.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_4.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_5.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_6.jpg" alt="">
              </div>
            </li>
          </ul>
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