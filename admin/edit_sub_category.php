
<?php
include_once './header.php';
?>
<div class="main" id="main">

<?php
$db = new Database;



$getId = $_GET['id'];
$db->select('sub_categories','*',"categories ON sub_categories.cat_parent=categories.cat_id","sub_cat_id='{$getId}'",null,null);
$result = $db->getResult()[0];
//   print_r($result);
$db->select('categories','*',null,null,null,null);
$cat_results = $db->getResult();
// print_r($cat_results);

if(count($result) > 0){
?>

<form class="g-3 w-50 m-auto" method="POST" id="editSubCategory">

<div class="col-6 d-block">
  <label for="update_sub_category_name" class="form-label">Sub Category Name</label>

  <input type="hidden" id="sub_cat_id" name="sub_cat_id" value="<?= $result['sub_cat_id'];?>">

  <input type="text" name="update_sub_category_name" value="<?= $result['sub_cat_title'] ;?>" class="form-control" id="update_sub_category_name">

  <select name="update_category_name" id="update_category_name">
<option selected value="">Select Sub-Cateogry</option>
  <?php
  foreach($cat_results as $key => $cat_result):
    ?>
    <option <?php echo $cat_result['cat_id'] == $result['cat_parent'] ? 'selected':'';?> value="<?= $cat_result['cat_id'];?>">
    <?= $cat_result['cat_title'];?>
</option>
<?php
  endforeach;
?>
  </select>
</div>
<div class="col-sm-2 mt-3">
  <input class="btn btn-primary w-100" type="submit" value="Save">
</div>
</form>
<?php
}
?>
</main>

<?php include './footer.php' ?>