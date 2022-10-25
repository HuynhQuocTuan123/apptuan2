<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php

include_once("./connect.php");

if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        mysqli_query($conn, "delete from account where Acc_Name='$id'");
    }
}


$sql1 = "SELECT * from account";
$re1 = mysqli_query($conn, $sql1);
?>
<div class="container mb-3">

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>User name</th>
                <th>Full name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($re1)) {
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?= $row['Acc_Name'] ?></td>
                    <td><?= $row['Fullname'] ?></td>
                    <td><?= $row['Gender'] ?></td>
                    <td><?= $row['Email'] ?></td>
                    <td><?= $row['Address'] ?></td>
                    <td><?php 
                            if($row['State']==0){
                                echo "User";
                            }else{
                                echo "Admin";
                            }
                        ?>
                    </td>

                    <td>
                        <a style="color: #272727" href="?page=update_acc&&id=<?php echo $row["Acc_Name"]; ?>">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a style="color: #272727; margin-left:30px;" href="?page=user_management&&function=del&&id=<?php echo $row["Acc_Name"]; ?>" onClick="return confirm ('Are you sure delete')">
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