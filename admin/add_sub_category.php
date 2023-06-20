<?php
include_once './header.php';
?>
<div class="main" id="main">

    <!-- Form -->
    <form id="createSubCategory" class="add-post-form col-md-6" method="POST">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="sub_cat_name" class="form-control sub_category" placeholder="Sub Category Name" />
        </div>
        <div class="form-group">
            <label for="">Parent Category</label>
            <?php
            $db = new Database();
           $db->select('categories','cat_id,cat_title',null,null,null,null);
           $result = $db->getResult();
        //    print_r($result);
            ?>
            <!-- <input name="title" value="12" type="text" /> -->
            <select class="form-control parent_cat" name="parent_cat">
                <option value="" selected disabled>Select Category</option>

                <?php
                if(count($result) > 0){

               foreach ($result as $key => $value) {
            
                ?>

           <option value="<?= $value['cat_id'];?>"><?= $value['cat_title'];?>
        </option>

              <?php

               }
                }else{
              ?>
              <option value="No">No category</option>
              <?php
                }
              ?>
            </select>
        </div>
        <input type="submit" name="save" class="btn add-new" value="Submit" />
    </form>
    <!-- /Form -->
    </main>

<?php include './footer.php' ?>
