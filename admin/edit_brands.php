<?php
include_once './header.php';
?>
<main id="main" class="main">
    <div class="admin-content-center">
        <h2 class="admin-heading">
            Edit Brand
        </h2>
        <?php
        $brand_id = $_GET['brand_id'];
         $db = new Database;
         $db->select('brands','*',null,"brand_id=$brand_id",null,null);
       $result =  $db->getResult();
      //  print_r($result[0]['brand_title']);exit;
        ?>
        <form id="update_brand" method="post" class='w-25'>
            <h6>Brand Title</h6>
            <?php
            if(count($result) > 0):
              foreach ($result as $row):
            ?>
            <input type="text" class="brand_name" value="<?= $row['brand_title'];?>" name="brand_name" id="" placeholder="Brand Name"> <br><br>
           <input type="hidden" value="<?= $row['brand_id'] ;?>" name="brand_id" >
            <h6>Brand Category</h6>
            <select name="brand_category" class="brand_category" id="">
                <option value="">Brand Cateogry Name</option>
                <?php
                $db->select('categories','*',null,null,null,null);
                $cat_result = $db->getResult();
              if(count($cat_result) > 0){

              foreach ($cat_result as $cat_row) {
                ?>
                <option <?= $cat_row['cat_id'] == $row['brand_cat']? 'selected':'';?> value="<?= $cat_row['cat_id'];?>"> <?= $cat_row['cat_title'];?></option>
                <?php
              }
              }else{ 
                ?>
                    <option value="">No Brand Category</option>
                <?php
              }
                ?>
            </select>
            <?php
            endforeach;
            endif;
            ?>
            <input type="submit" value="Update" name="save" class="mt-2 btn btn-primary">
        </form>
    </div>
</main>
<?php include './footer.php' ?>