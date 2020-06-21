<?php
    require_once("./entities/product.class.php");
    require_once("./entities/category.class.php");
?>
<?php
    include_once("header.php");
    if(!isset($_GET["cateid"])){
        $prods = Product::list_product();
    }
    else{
        $cateid = $_GET["cateid"];
        $prods = Product::list_product_by_cateid($cateid);
    }
    $cates = Category::list_category();
?>
<div class="container text-center">
 <div class="col-sm-3 panel panel-danger">
    <h3 class="panel_heading">Danh mục</h3>
    <ul class = "list-group">
      <?php
        foreach($cates as $item){
            echo "<li class ='list-group-item'><a
            href=/LAB33/LAB3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a><li>";
            }?>
    </ul>
 </div>
 <div class="col-sm-9 panel panel-info">
 <h3 class="panel-heading">Chi tiết sản phẩm</h3>
 <div class="row">
 <div class="col-sm-6">
    <img src="<?php echo "/LAB33/LAB3" .$prods["Picture"];?>" class="img-responsive" style="width:100%" alt="Image">
 </div>
 <div class="col-sm-6">
 <div style="padding-left:10px">
  <h3 class="text-info">
      <?php echo $item["ProductName"]; ?>
 </h3>
 <p>
      Giá: <?php echo $item["Price"]; ?>
 </p>
 <p>
      Mô tả: <?php echo $item["Description"]; ?>
 </p>
 <p>
    <button type="button" class="btn btn-danger">Mua hàng</button>
 </p>
</div>
</div>
 <div class="col-sm-9">       
    <h3>Sản phẩm cửa hàng</h3><br>
    <div class="row">
    <?php
        foreach ($prods as $item){
            ?>
            <div class="col-sm-4">
                <img src="<?php echo $item["Picture"];?>" class="img-responsive" style="width:100%" alt="Image">
                <p class="text-danger"><?php echo $item["ProductName"]; ?></p>
                <p class="text-info"><?php echo $item["Price"]; ?></p>
                <p>
                    <button type="button" class="btn btn-primary">Mua hàng</button>
                </p>
            </div>
            <?php } ?>
        </div>
    </div>
 </div>
    <?php include_once("footer.php");