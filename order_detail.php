<?php
$id = $_GET['id'];
if (isset($_POST['stt'])) {
    $id = $_POST["id"];
    $status = $_POST['stt'];
    $result = pg_query($conn, "UPDATE orders
    SET Status='{$status}'
    WHERE Order_ID='$id'");
    echo '<meta http-equiv="refresh" content="0;url=./index.php?page=order_management">';
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
        <h2>Order detail</h2>
        <a href="?page=history">Back to order history</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $re1 = pg_query($conn, "SELECT * 
                 FROM orders,order_detail,shoe
                 WHERE orders.Order_ID = '$id' and order_detail.Order_ID='$id' 
                 and shoe.Shoe_ID=order_detail.Shoe_ID");
                while ($row = pg_fetch_assoc($re1)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['Shoe_Name']; ?></td>
                        <td>
                            <img src="./images/<?php echo $row['Shoe_Picture']; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td>
                            <?php echo $row['Quantity']; ?></td>
                        <td>
                            <?php echo $row['Price']; ?> $
                        </td>
                        <td>
                            <?php echo $row['Price'] * $row['Quantity']; ?> $
                        </td>
                    </tr>

                <?php $no++;
                }
                ?>
            </tbody>
            <?php
            if(isset($_SESSION["admin"]) && $_SESSION["admin"] != 0){
            ?>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Status</th>
                <th scope="col">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <select name='stt'>
                            <option <?php if (isset($status) && $status == '0') echo 'Processing' ?> value='0'>Processing</option>
                            <option <?php if (isset($status) && $status == '1') echo 'Confirmed'  ?> value='1'>Confirmed</option>
                            <option <?php if (isset($status) && $status == '2') echo 'Complete' ?> value='2'>Complete</option>
                            <option <?php if (isset($status) && $status == '3') echo 'Cancel'  ?> value='3'>Cancel</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </th>
            </tr>
            <?php
            }
            ?>
        </table>
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