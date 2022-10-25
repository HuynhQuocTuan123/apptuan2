<?php
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

    
    if (isset($_POST['order'])) {
        include_once('./connect.php');
    
        if (isset($_SESSION['us']) == false) 
        {
            echo "<script>alert('You need to login')</script>";
            echo '<meta http-equiv="refresh" content="0;URL=?page=signin"/>';
        }else{
        $rename   = $_POST['txtReceiveName'];
        $numberphone  = $_POST['txtNumberPhone'];
        $address   = $_POST['txtAddress'];
        $today = date("Y/m/d");
        $total  = $_POST['txtTotal'];
    
        $result = mysqli_query($conn, "INSERT INTO orders(Acc_Name ,Receiver_Name,Phone,Order_Date,Delivery_Address,Total_Price,Status) VALUES ('{$_SESSION['us']}','{$rename}','{$numberphone}','{$today}','{$address}',{$total},0)");
    
        $orderid = mysqli_insert_id($conn);
        foreach ($cart as $key => $value) {
            $proid = $value['id'];
            $quan = $value['quantity'];
            $price = $value['price'];
            $query = mysqli_query($conn, "INSERT INTO order_detail(Order_ID ,Shoe_ID,Quantity,Price) VALUES ({$orderid},'{$proid}',{$quan},{$price})");
        }
        unset($_SESSION['cart']);
        echo '<meta http-equiv="refresh" content="0;url=./index.php?page=history">';
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
</head>

<body>
    <div class="container">
        <h2>Cart</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
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
                $no=1;
                $cost = 0;
                foreach ($cart as $key => $value) :
                    $money = $value['price'] * $value['quantity'];
                    $cost = $cost + $money;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td>
                            <img src="./images/<?php echo $value['image']; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td><?php echo $value['price']; ?> $</td>
                        <td>
                            <form action="updatecart.php" method="GET">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                <input type="number" name="quantity" value="<?php echo $value['quantity'] ?>">

                                <button type="submit">Update</button></a>
                            </form>
                        </td>
                        <td><?php echo $money; ?> $</td>
                        <td>
                            <a style="color: #272727; margin-left:30px;" href="?page=cart&&action=delete&&id=<?php echo $value['id'] ?>" onClick="return confirm ('Are you sure delete')">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                    </tr>

                <?php
                $no++;
                endforeach
                
                ?>
                <tr>
                    <td>Total price</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $cost; ?> $</td>
                </tr>
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
                                <input type="text" name="txtReceiveName" id="username" placeholder="Receiver's name" require>
                            </div>
                            <div class="password form-control1">
                                <input type="text" name="txtNumberPhone" id="password" placeholder="Number phone" require>
                            </div>
                            <div class="fullname form-control1">
                                <input type="text" name="txtAddress" id="fullname" placeholder="Address" require>
                            </div>
                            <div class="fullname form-control1">
                                <input type="text" name="txtTotal" id="fullname" placeholder="Total price" value="<?php echo $cost;?>"readonly>
                            </div>
                            <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                            <div>
                                <button class="submit" type="submit" name="order">
                                    <p>Order</p>
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