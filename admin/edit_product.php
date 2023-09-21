<?php
include 'header.php';
?>

<div class="main" id="main">

    <h2 class="admin-heading">Update Product</h2>
    <form id="update_product" class="add post form row" method="post" enctype="multipart/form-data">
        <div class="col-md-9">
        <?php
        $db = new Database;
        $product_id = $_GET['product_id'];
        $db->select('products','*',null,"product_id={$product_id}",null,null);
        $product_result = $db->getResult();
        if(count($product_result) > 0):
            foreach($product_result as $product_row):
        ?>
        <div class="form-group mb-3">
                <label for="">Product Title</label>
                <!-- Hidden Product ID for Update  -->
                <input type="hidden" name="product_id" class="product_id" value="<?= $product_row['product_id'];?>">
                <input type="text" class="form-control product_title" name="product_title" value="<?= $product_row['product_title'];?>" placeholder="Product Title"
                    requried />
            </div>
            <div class="row mb-3">
            <div class="col-md-4">
        <select name="product_cat" id="category" class="form-select product_category">
           
            <option value="" selected disabled>
                Choose One Category
            </option>
            <?php
            $db = new Database;
            $db->select('categories','*',null,null,null,null);
            $cat_result = $db->getResult();
            if(count($cat_result) > 0):
                foreach($cat_result as $cat_row):
            ?>
            <option <?= $cat_row['cat_id'] == $product_row['product_cat'] ? 'selected' : '' ;?> value="<?= $cat_row['cat_id'];?>">
            <?= $cat_row['cat_title'];?>
        </option>
            <?php
            endforeach;
            endif;
            ?>
        </select>
            </div>

            <div class="col-md-4">
            <select name="product_sub_cat" id="product_sub_cat" class="form-select product_sub_category">
            <option value="" selected disabled>
            Choose One Sub-Categroy
           </option>
                <?php
                $db->select('sub_categories','*',null,null,null,null);
                $sub_cat_res = $db->getResult();
                if(count($sub_cat_res) > 0):
                    foreach ($sub_cat_res as $sub_cat_row):
                ?>
           <option <?= $sub_cat_row['sub_cat_id'] == $product_row['product_sub_cat']? 'selected':'';?> value="<?= $sub_cat_row['sub_cat_id'];?>"> <?= $sub_cat_row['sub_cat_title'];?> </option>
        <?php
        endforeach;
    endif;
        ?>
        </select>

            </div>

            <div class="col-md-4">
            <select name="product_brand" class="form-select product_brands" id="">
            <option value="" selected disabled>
            Choose One Brand
            </option>
            <?php
            $db->select('brands','*',null,null,null,null);
            $brand_result = $db->getResult();
            if(count($brand_result) > 0){
                foreach($brand_result as $brand_row):
            ?>
             <option <?= $brand_row['brand_id'] == $product_row['product_brand']? 'selected':'';?> value="<?= $brand_row['brand_id'];?>"> <?= $brand_row['brand_title'];?></option>
             <?php
             endforeach;
            }
            else {
             ?>

             <option value=""> No Brand is available</option>
              
              <?php
            }

              ?>    
    </select>

            </div>
           
            <div class="form-group">
                    <label >Product Description</label>
                    <textarea class="form-control product_description" name="product_desc"  rows="8" cols="80" requried><?= $product_row['product_desc'];?></textarea>
                </div>


            <div class="form-group">
            <label for="product_gallery_images">Gallery Image</label>
                <input type="file" multiple class="form-control product_gallery_images" id="product_gallery_images" name="product_gallery_images[]">

            <div class="row" id="preview_img"></div>

            <?php

        $db->select('products','gallery_image,image_path,product_name'," gallery_images ON products.product_id = gallery_images.product_id","products.product_id = {$product_id}");
        $gallery_images = $db->getResult();

            foreach ($gallery_images as $gallery_image):
            ?>
             <img src="./../admin/product_images/<?= $gallery_image['gallery_image'];?>" class="mb-2 prev_images" alt="<?= $gallery_image['product_name'];?>" style="width: 100px; height: 80px;">
            <?php
            endforeach;
            ?>
            </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Featured Image</label>
                <input type="file" class="form-control product_image" requried name="new_image" onchange="thunmbnail_Url(this)">

                <!-- Hidden Image For Change  -->
                <input type="hidden" name="old_image" value="<?= $product_row['featured_image'];?>">

                <img id="image" src="./../admin/product_images/<?= $product_row['featured_image'];?>" width="100px" class="mb-2" height="80px" alt="product old image">
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" value="<?= $product_row['product_price'];?>" class="form-control product_price" name="product_price" requried>
            </div>

            <div class="form-group align-middle my-3">
             
            <?php
// Assuming $productData is your array containing product data
$featuredProductValue = isset($product_row['featured_product']) ? 1 : 0;
?>
             <div class="form-check form-check-inline">
             <label class="form-check-label" for="inlineCheckbox1"> Featured Product</label>
             <input class="form-check-input" name="featured_product" value="<?= isset($product_row['featured_product']) && $product_row['featured_product'] ? 1 : 0; ;?>" 
             type="checkbox" id="inlineCheckbox1" <?= $product_row['featured_product'] == 1 ? 'checked':'';?>>
 
             </div>
 
             </div>

            <div class="form-group">
                <label for="">Available Quantity</label>
                <input type="number" class="form-control product_qty" name="product_qty" requried value="<?= $product_row['qty'];?>">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control  form-select product_status" name="product_status">
                    <option <?= $product_row['product_status'] == 1 ? 'selected':'';?> value="1">Publish</option>
                    <option <?= $product_row['product_status'] == 0 ? 'selected':'';?> value="0">Draft</option>
                </select>
            </div>

            <div>
                <input style="background-color: #e93700;font-size: 18px;" type="submit"
                    class="btn mt-2 text-white add-new" name="submit" value="Submit">
            </div>
        </div>
        <?php
        endforeach;
    endif;
        ?>
    </form>

<?php
include 'footer.php';
?>