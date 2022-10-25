<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
include_once("./connect.php");

if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $result = pg_query($conn,"SELECT Shoe_Picture from shoe where Shoe_ID='$id'");
        $image = pg_fetch_array($result);
        $del = $image["Shoe_Picture"];
        unlink("images/$del");
        pg_query($conn, "delete from shoe where Shoe_ID='$id'");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Description</th>
                    <th  style="width:160px;"><a style="color: #272727;" href="?page=add_product" >
                        <i class="glyphicon glyphicon-plus"></i> Add new product</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $re1 = pg_query($conn, "Select * from shoe");
                while($row = pg_fetch_assoc($re1)){
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row["Shoe_ID"]; ?></td>
                        <td><?php echo $row["Shoe_Name"]; ?></td>
                        <td><?php echo $row["Cate_ID"]; ?></td>
                        <td><?php echo $row["Shoe_Price"]; ?></td>
                        <td><?php echo $row["Shoe_Quantity"]; ?></td>                       
                        <td>
                            <img src="./images/<?php echo $row["Shoe_Picture"]; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td><?php echo $row["Shoe_Discription"]; ?></td>
                        <td>
                                <a style="color: #272727" href="?page=update_product&&id=<?php echo $row["Shoe_ID"]; ?>">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <a style="color: #272727; margin-left:30px;" href="?page=product_management&&function=del&&id=<?php echo $row["Shoe_ID"]; ?>" onClick="return confirm ('Are you sure delete')" >
                                    <i class="glyphicon glyphicon-remove"></i>
                                </a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>