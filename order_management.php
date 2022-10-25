<?php
if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        pg_query($conn, "delete from order_detail where Order_ID='$id'");
        pg_query($conn, "delete from orders where Order_ID='$id'");
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
                    <th scope="col">Order ID</th>
                    <th scope="col">Receiver name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Order date</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $re1 = pg_query($conn, "Select * from orders");
                while ($row = pg_fetch_assoc($re1)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['Order_ID']; ?></td>
                        <td><?php echo $row['Receiver_Name']; ?></td>
                        <td>
                            <?php echo $row['Phone']; ?></td>
                        </td>
                        <td><?php echo $row['Order_Date']; ?></td>
                        <td>
                            <?php echo $row['Delivery_Address']; ?>
                        </td>
                        <td><?php echo  $row['Total_Price']; ?> $</td>
                        <td>
                        <?php 
                            if($row['Status']==0){
                                echo "Processing";
                            }elseif($row['Status']==1){
                                echo "Confirmed";
                            }elseif($row['Status']==2){
                                echo "Complete";
                            }else{
                                echo "Cancel";
                            } 
                            ?>
                        </td>
                        <td>

                            <a style="color: #272727; margin-left:30px;" href="?page=order_detail&&id=<?php echo $row["Order_ID"]; ?>">
                                <i class="glyphicon glyphicon-info-sign"></i>
                            </a>
                            <a style="color: #272727; margin-left:30px;" href="?page=order_management&&function=del&&id=<?php echo $row["Order_ID"]; ?>" onClick="return confirm ('Are you sure delete')">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>

                        </td>
                    </tr>

                <?php $no++;
                }
                ?>

            </tbody>
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