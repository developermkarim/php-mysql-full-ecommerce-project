<?php
include_once './header.php';
?>

<main id="main" class="main">
    <div class="admin-content-container">
        <div class="d-flex justify-content-around">

            <h2 class="admin-heading">
                All Brands
            </h2>
            <a class="add-new btn btn-danger" href="add_brand.php">
                Add New
            </a>
        </div>

        <?php
        $brands = new Database;
        $limit = 10;
        $db->select('brands','brands.brand_id,brands.brand_title,brands.brand_cat,categories.cat_title',' categories categories ON brands.brand_cat=categories.cat_id',null,'brands.brand_id DESC',$limit);
        $result = $db->getResult();
        // print_r($result);
        if(count($result) > 0){
        ?>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
 foreach ($result as $key => $value) {
   
?>
                <tr>
                    <td><?= $value['brand_title'];?></td>
                    <td><?= $value['cat_title'];?></td>
                    <td>
                        <a class="text-primary" href="edit_brands.php?brand_id=<?= $value['brand_id'];?>">
                            <i class="fas fa-edit"></i>
                        </a> &nbsp;

                        <a class="delete_brand text-danger" href="javascript:void();"
                            data-id="<?= $value['brand_id'];?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

                <?php
         
        }
      
        ?>
            </tbody>
            <?php
        }
        else{
        ?>
            <tr>
                <td>No Data is available now</td>
            </tr>
            <?php
        }
        ?>
        </table>
    </div>
</main>

<?php include './footer.php' ?>