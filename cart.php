<?php
include_once("./connect.php");

if (isset($_GET["id"])) {
    $id=$_GET["id"];
}

$action=(isset($_GET['action']))?$_GET['action']:'add';
$quantity=(isset($_GET['quantity']))?$_GET['quantity']:1;



$query=pg_query($conn,"SELECT * FROM shoe WHERE Shoe_ID='$id'");
    if($query){
        $product=pg_fetch_assoc($query);
    }
$item=[
    'id'=>$product['Shoe_ID'],
    'name'=>$product['Shoe_Name'],
    'image'=>$product['Shoe_Picture'],
    'price'=>$product['Shoe_Price'],
    'quantity'=>$quantity

];

if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]['quantity']+=1;
}
else{
    $_SESSION['cart'][$id]=$item;
}
if($action=='update'){
    $_SESSION['cart'][$id]['quantity']=$quantity;
}
if($action=='delete'){
    unset($_SESSION['cart'][$id]);
}

?>
<script>
    window.location.href='?page=view_cart';
</script>
