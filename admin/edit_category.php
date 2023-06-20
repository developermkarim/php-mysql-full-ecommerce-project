
<?php
include_once './header.php';
?>
<div class="main" id="main">
<?php
$db = new Database;
$getId = $_GET['id'];
$db->select('categories','*',null,"cat_id='{$getId}'",null,null);
$result = $db->getResult();
//  print_r($result);
if(count($result) > 0){
?>

<form class="g-3 w-50 m-auto" method="POST" id="update_category_form">

<div class="col-6 d-block">
  <label for="update_category_name" class="form-label">Category Name</label>

  <input type="hidden" name="cat_id" value="<?= $result[0]['cat_id'];?>">

  <input type="text" name="update_category_name" value="<?= $result[0]['cat_title'] ;?>" class="form-control" id="update_category_name">
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