<?php
include_once './header.php';
?>

<main id="main" class="main">
    <div class="admin-content-container">
        <div class="d-flex justify-content-right">
            <h2 class="admin-heading">Add Brand</h2>
          
        </div>
       <form class="w-25" id="create_brand" method="post" autocomplete="off">
            <label>Brand Title</label>
            <input type="text" name="brand_name" class="form-control brand_name" id="" placeholder="Brand Name"> <br>
            <label>Brand Category</label>
            <select name="brand_category" class="form-control brand_category" id="">
                <option value="" disabled selected>Brand Cateogry Name</option>
                <?php
                $db = new Database;
                $db->select('categories','*',null,null,null,null);
              $result =  $db->getResult();
              if(count($result) > 0){

              foreach ($result as $row) {
                ?>
                <option value="<?= $row['cat_id'];?>"><?= $row['cat_title'];?></option>
                <?php
              }
              }else{ 
                ?>
                    <option value="">No Brand Category</option>
                <?php
              }
                ?>
            </select>
            <br>
            <input type="submit" name="save" value="Submit" class="btn">
        </form>
    </div>
</main>
<?php include './footer.php' ?>