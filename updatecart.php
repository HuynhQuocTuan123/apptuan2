<?php
session_start();
include_once("./connect.php");
if (isset($_GET["id"])&&isset($_GET["quantity"])) {
    $id=$_GET["id"];
    $num=$_GET["quantity"];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    if(array_key_exists($id,$cart)){
        $cart[$id]=array(
            'id'=>$cart[$id]['id'],
            'name'=>$cart[$id]['name'],
            'image'=>$cart[$id]['image'],
            'price'=>$cart[$id]['price'],
            'quantity'=>$num
        );
        $_SESSION["cart"]=$cart;
    }
}
echo '<meta http-equiv="refresh" content="0;url=./index.php?page=view_cart">';
?>

