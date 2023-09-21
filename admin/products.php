<?php
include_once './header.php';
?>
<main id="main" class="main">
    <div class="admin-content-container">
        <div class="d-flex justify-content-around mb-5">
            <h2 class="admin-heading">All Products</h2>
            <a class="add-new btn btn-danger" href="add_product.php">Add New</a>
        </div>

        <?php
    $limit = 30;
      $db->select('products','products.product_id,products.product_code,products.product_price,products.product_status,products.qty,products.featured_image,products.featured_product,products.product_cat,products.product_sub_cat,products.product_brand,products.product_title,sub_categories.sub_cat_title,brands.brand_id,brands.brand_title','sub_categories ON products.product_sub_cat = sub_categories.sub_cat_id LEFT JOIN brands ON products.product_brand=brands.brand_id',null,'products.product_id DESC',$limit);
 //  LEFT JOIN gallery_images ON products.product_id = gallery_images.product_id
 // gallery_images.gallery_image, gallery_images.product_id as gallery_product_id
      $result = $db->getResult();

      
      
    ?>


        <table id="productsTable" class="table table-striped table-hover table-bordered display">
            <thead>
                <th>S/L</th>
                <th>Title</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Featured Products</th>
                <th>Image</th>
                <th>Gallery Image</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </thead>
            <tbody>

              
                <?php
                if(count($result) > 0){
                foreach ($result as $key => $value) {
                    // print_r($value['gallery_image']);
                ?>
                <tr>
                    <td><?= ++$key  ?></td>
                    <td><?= $value['product_title']  ?></td>
                    <td><?= $value['sub_cat_title']  ?></td>
                    <td><?= $value['brand_title']  ?></td>
                    <td><?= $value['product_price']  ?></td>
                    <td><?= $value['qty']  ?></td>

                    <td>
                        <?php
                        if ($value['featured_product'] == 1){
                        ?>
                        <input type="checkbox" class="form-check-input toggle-checkbox featured_product" data-id="<?= $value['product_id'];?>" checked>

                        <?php
                       } else{
                        ?>
                        <input type="checkbox" class="form-check-input toggle-checkbox featured_product" data-id="<?= $value['product_id'];?>" >
                        <?php
                       }
                        ?>
                    </td>

                    <td>
                        <?php
                            if($value['featured_image'] != ""){
                            ?>
                        <img src="./../admin/product_images/<?= $value['featured_image'];?>"
                            alt="<?= $value['product_title']  ?>" width="50" height="50">

                        <?php
                }
                else{
                ?>

                        <img src="https://indolinkenglish.files.wordpress.com/2011/06/consumer10.jpg"
                            alt="<?= $value['product_title']  ?>" width="50" height="50">
                        <?php
                }
?>

                    </td>

                    <!-- Gallery Image Show Here -->
                    <td>
                        <?php
                        error_reporting(0);
                       if (isset($value['product_id'])) {
                     
                       $db->select('gallery_images','gallery_image',null,"product_id = {$value['product_id']}");
                          $gallery_result = $db->getResult();
                        //   print_r($gallery_result);
                        if(count($gallery_result) > 0 || $gallery_result == null){ 
                        foreach($gallery_result as $gall_key => $gallery_image):
                            ?>
                        <img  src="./../admin/product_images/<?= $gallery_image['gallery_image'];?>"
                            alt="<?= $gallery_image['gallery_image']  ?>" width="35" height="30"> <br>

                        <?php
                    endforeach;    

                      }

                     else{
                      ?>

                        <img src="https://indolinkenglish.files.wordpress.com/2011/06/consumer10.jpg"
                            alt="" width="10" height="10">
                        <?php
                         }
                     }else{
                      ?>
                        <img src="https://indolinkenglish.files.wordpress.com/2011/06/consumer10.jpg"
                        alt="" width="10" height="10">;
                        <?php
                     }
                        ?>
                    </td>

                    <td>
                        <span
                            class="badge rounded-pill <?= $value['product_status'] == 0 ? 'bg-danger':'bg-success';?>">

                            <?php
                        if($value['product_status'] == 0)
                        echo 'Inactive';
                        elseif($value['product_status'] == 1)
                        echo 'active';
                        ?>
                        </span>
                    </td>

                    <td>
                        <a class="text-primary" href="edit_product.php?product_id=<?= $value['product_id'] ?>"><i
                                class="fas fa-edit"></i></a> &nbsp;
                        <a class="delete_product text-danger" href="javascript:void();" data-id="<?= $value['product_id'];?>" data-subcat="<?= $value['product_sub_cat'];?>"
                ><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

                <?php
                }

            }
            else{

           
                    ?>

                <tr>
                    <td>No Products is Found</td>
                </tr>

                <?php
            }
                    ?>

            </tbody>
        </table>

        <!-- <div class="not-found clearfix">!!! No Products Found !!!</div> -->

        <div class="pagination-outer">

        </div>
    </div>


</main>

<?php include './footer.php' ?>