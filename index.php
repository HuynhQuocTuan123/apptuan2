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

    <title>CH </title>
</head>

<body>
    <?php
    include_once("connect.php");
    session_start();
    
    include_once("./header.php")
    ?>

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == "product") {
            include_once("product.php");
        } elseif ($page == "signin") {
            include_once("signin.php");
        } elseif ($page == "signup") {
            include_once("signup.php");
        } elseif ($page == "introduce") {
            include_once("introduce.php");
        } elseif ($page == "contact") {
            include_once("contact.php");
        } elseif ($page == "detailblog") {
            include_once("detailblog.php");
        } elseif ($page == "detailproduct") {
            include_once("detailproduct.php");
        } elseif ($page == "blog") {
            include_once("blog.php");
        } elseif ($page == "logout") {
            include_once("logout.php");
        } elseif ($page == "product_management") {
            include_once("product_management.php");
        } elseif ($page == "category_management") {
            include_once("category_management.php");
        } elseif ($page == "add_category") {
            include_once("add_category.php");
        } elseif ($page == "add_product") {
            include_once("add_product.php");
        } elseif ($page == "update_category") {
            include_once("update_category.php");
        } elseif ($page == "view_cart") {
            include_once("view_cart.php");
        } elseif ($page == "cart") {
            include_once("cart.php");
        } elseif ($page == "update_cart") {
            include_once("updatecart.php");
        }elseif ($page == "history") {
            include_once("history.php");
        }elseif ($page == "order_detail") {
            include_once("order_detail.php");
        }elseif ($page == "order_management") {
            include_once("order_management.php");
        }elseif ($page == "update_product") {
            include_once("update_product.php");
        }elseif ($page == "change_pass") {
            include_once("change_pass.php");
        }elseif ($page == "update_acc") {
            include_once("update_acc.php");
        }elseif ($page == "search") {
            include_once("search.php");
        }elseif ($page == "user_management") {
            include_once("user_management.php");
        }
        else {
        include_once("home.php");
        }
    }
    include_once("footer.php");
    ?>


</body>

</html>