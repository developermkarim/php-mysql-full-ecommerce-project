<?php
include_once './header.php';
?>
<main id="main" class="main">
    <div class="admin-content-container">
        <div class="d-flex justify-content-around">
            <h2 class="admin-heading">All Products</h2>
            <a class="add-new btn btn-danger" href="add_product.php">Add New</a>
        </div>

        <?php
    $limit = 10;
      $db->select('products','products.product_id,products.product_code,products.product_price,products.product_status,products.qty,products.featured_image,products.product_cat,products.product_sub_cat,products.product_brand,products.product_title,sub_categories.sub_cat_title,brands.brand_id,brands.brand_title','sub_categories ON products.product_sub_cat = sub_categories.sub_cat_id LEFT JOIN brands ON products.product_brand=brands.brand_id',null,'products.product_id DESC',$limit);

      $result = $db->getResult();

    //   print_r($result);
      
    ?>


        <table id="productsTable" class="table table-striped table-hover table-bordered">
            <thead>
                <th>S/L</th>
                <th>Title</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </thead>
            <tbody>

              
                <?php
                if(count($result) > 0){
                foreach ($result as $key => $value) {
                    
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
                            if($value['featured_image'] != ""){
                            ?>
                        <img src="./../product_images/<?= $value['featured_image'];?>"
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
                        <a class="text-primary" href="edit_product.php?id=<?php $value['product_id'] ?>"><i
                                class="fas fa-edit"></i></a> &nbsp;
                        <a class="delete_product text-danger" href="javascript:void()" data-id="<?php ?>"
                            data-subcat="<?php  ?>"><i class="fas fa-trash"></i></a>
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