<?php
    require_once("./Entities/product.class.php");
    require_once("./Entities/category.class.php");
?>
<?php
    include_once("header.php");
    if(!isset($_GET["id"])){
        header('Location: not_found.php');
    }
    else{
        $id = $_GET["id"];
        $prod = reset(Product::get_product($id));
        $prods_relate = Product::list_product_relate($prod["CateID"], $id);
    }
    $cates = Category::list_category();
?>