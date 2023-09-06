<?php
include_once './header.php';
?>

<div class="main" id="main">
    <h2 class="admin-heading">Add New Product</h2>
    <form id="createProduct" class="add-post-form row" method="post" enctype="multipart/form-data">
        <div class="col-md-9">
            <div class="form-group mb-3">
                <label for="">Product Title</label>
                <input type="text" class="form-control product_title" name="product_title" placeholder="Product Title"
                    requried />
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Product Category</label>

                    <select id="inputState" class="form-select product_category" name="product_cat">
                        <?php
        $db = new Database();
       $test = $db->select('categories',"*",null,null,'categories.cat_id DESC',null);
        $category = $db->getResult();
        ?>

                        <option value="" selected disabled>Choose One category</option>
                        <?php
      foreach($category as $value):
      ?>
                        <option value="<?= $value['cat_id'] ;?>">
                            <?= $value['cat_title'] ;?>
                        </option>
                        <?php
      endforeach;
      ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Product Sub-Category</label>
                    <select id="product-sub-cat" class="form-select product_sub_category" name="product_sub_cat">
                        <option value="" selected disabled>Select Sub Category</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="inputState" class="form-label">Product Brand</label>
                    <select id="inputState" class="form-select product_brands" name="product_brand">
                        
                        <option value="" selected disabled>Select Product Brand</option>

                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="">Product Description</label>
                <textarea class="form-control product_description" name="product_desc" rows="12" cols="80"
                    requried></textarea>
            </div>
            <div class="show-error"></div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Featured Image</label>
                <input type="file" class="form-control product_image" id="featured_img" name="featured_img" onchange="thunmbnail_Url(this)">
                <img id="image" src="" />
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" class="form-control product_price" name="product_price" requried value="">
            </div>

            <div class="form-group align-middle my-3">
             
             
            <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineCheckbox1"> Featured Product</label>
            <input class="form-check-input" name="featured_product" value="<?="checked" ? '1':'0';?>" type="checkbox" id="inlineCheckbox1">

            </div>

            </div>

            <div class="form-group">
                <label for="">Available Quantity</label>
                <input type="number" class="form-control product_qty" name="product_qty" requried value="">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control form-select product_status" name="product_status">
                    <option selected value="1">Publish</option>
                    <option value="0">Draft</option>
                </select>
            </div>

            <div>
                <input style="background-color: #e93700;font-size: 18px;" type="submit"
                    class="btn mt-2 text-white add-new" name="submit" value="Submit">
            </div>
        </div>
    </form>

</div 
<?php include 'footer.php'
?>

