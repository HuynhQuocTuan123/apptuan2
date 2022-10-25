<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php

include_once("./connect.php");

if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        pg_query($conn, "delete from category where Cate_ID='$id'");
    }
}


$sql1 = "SELECT * from category";
$re1 = pg_query($conn, $sql1);
?>
<div class="container mb-3">

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th style="width:160px;"><a style="color: #272727;" href="?page=add_category">
                        <i class="glyphicon glyphicon-plus"></i> Add new category</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = pg_fetch_assoc($re1)) {
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?= $row['Cate_ID'] ?></td>
                    <td><?= $row['Cate_Name'] ?></td>
                    <td><?= $row['Cate_Description'] ?></td>
                    <td>
                        <a style="color: #272727" href="?page=update_category&&id=<?php echo $row["Cate_ID"]; ?>">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a style="color: #272727; margin-left:30px;" href="?page=category_management&&function=del&&id=<?php echo $row["Cate_ID"]; ?>" onClick="return confirm ('Are you sure delete')">
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