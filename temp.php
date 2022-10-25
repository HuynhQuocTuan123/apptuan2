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
</head>

<body>
    <div class="container">
        <h2>Cart</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total price</th>
                    <th style="width:160px;"><a style="color: #272727;" href="?page=add_product">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cart=(isset($_SESSION['cart']))?$_SESSION['cart']:[];
                foreach($cart as $key=>$value):
                ?>
                <tr>
                    <td><?php echo $value['name']; ?></td>
                    <td>
                        <img src="./images/<?php echo $value['image']; ?>" style="height: 100px; width: 100px;">
                    </td>
                    <td><?php echo $value['price']; ?> $</td>
                    <td>
                        <form action="" method="POST">
                        <input type="number" name="Update_Quantity" value="<?php echo $value['quantity']?>">
                        <button type="submit" name="UpdateQuantity">Update</button>
                        </form>
                    </td>
                    <td><?php echo $value['price'] * $value['quantity']; ?> $</td>
                    <td>
                        <a style="color: #272727; margin-left:30px;" href="?page=product_management&&function=del&&id=<?php echo $row["Shoe_ID"]; ?>" onClick="return confirm ('Are you sure delete')">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="content">
            <section class="signup">
                <div class="container">
                    <div class="signin-left">
                        <div class="sign-title">
                            <h1>Order form</h1>
                        </div>
                    </div>
                    <div class="signin-right ">
                        <form action="" method="POST">

                            <div class="username form-control1 ">
                                <input type="text" name="txtId" id="username" placeholder="Receiver's name">
                            </div>
                            <div class="password form-control1">
                                <input type="text" name="txtName" id="password" placeholder="Number phone">
                            </div>
                            <div class="fullname form-control1">
                                <input type="text" name="txtDescription" id="fullname" placeholder="Address">
                            </div>
                            <div class="fullname form-control1">
                                <input type="text" name="txtDescription" id="fullname" placeholder="Total price">
                            </div>
                            <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                            <div>
                                <button class="submit" type="submit" name="add">
                                    <p>Order</p>
                                </button>

                            </div>
                            <div class="backto">
                                <a href=""><i class="fa fa-long-arrow-alt-left"></i> Quay lại trang chủ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
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