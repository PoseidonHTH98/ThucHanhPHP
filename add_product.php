<?php

    require_once("Entities/product.class.php");
    require_once("Entities/category.class.php");

    if(isset($_POST["btnsubmit"])){
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtCateID"]; 
        $price = $_POST["txtPrice"]; 
        $quantity = $_POST["txtQuantity"]; 
        $description = $_POST["txtDesc"]; 
        $picture = $_FILES["txtPic"]; 

        $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture); 
        
        $result = $newProduct->save(); 
       
    }
?>

<?php include_once("header.php"); ?>
<?php 
    if(isset($_GET["inserted"]))
    { 
        echo "<h2>Thêm sản phẩm thành công</h2>"; 
    }
?>

<form method="post" enctype="multipart/form-data"> 
    <div class="row"> 
        <div class="lbltitle">
             <label>Tên sản phẩm </label>
        </div> 
        <div class="lblinput"> 
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ; ?>" require /> 
        </div> 
    </div> 
    <div class="row"> 
        <div class="lbltitle"> 
            <label>Mô tả sản phẩm</label> 
        </div> 
        <div class="lblinput"> 
            <textarea name="txtDesc" cols="21" rows="10" value="<?php echo isset($_POST["txtDesc"]) ? $_POST["txtDesc"] : "" ?>"require></textarea> 
        </div> 
    </div> 
    <div class="row">
        <div class="lbltitle">
            <label>Số lượng sản phẩm</label>
        </div>
        <div class="lblinput"> 
            <input type="number" min=0 name="txtQuantity" value="<?php echo isset($_POST["txtQuantity"]) ? $_POST["txtQuantity"] : "" ; ?>"require /> 
        </div> 
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>Giá sản phẩm</label>
        </div>
        <div class="lblinput"> 
             <input type="number" min=0 name="txtPrice" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtPrice"] : "" ; ?>" require/>  
        </div> 
    </div>
 
    <div class="row">
        <div class="lbltitle">
            <label>Loại sản phẩm</label>
        </div>
        <div class="lblinput"> 
            <select name="txtCateID">
                <?php
                $cates = Category::list_category();
                foreach ($cates as $item)
                {
                    echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";
                }
                ?>
            </select>
        </div> 
    </div>
    

    <div class="row">
        <div class="lbltitle">
            <label>Hình ảnh</label>
        </div>
        <div class="lblinput"> 
             <input type="file" id="txtPic" name="txtPic" accept=".PNG,.GIF,.JPG" />  
        </div> 
    </div>
        
    <div class="row">
        <div class="submit">
            <input type="submit"  name="btnsubmit" value="Thêm sản phẩm" />
        </div>
    </div>
</form>
<?php include_once("footer.php"); ?>