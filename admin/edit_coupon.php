
<?php
include_once './header.php';
?>
<div class="main" id="main">

<?php
$db = new Database;
$db->select('coupons','*',null,"id = {$_GET['id']}");
$coupon = $db->getResult();
// print_r($coupon);
?>


<form class="g-3 w-50 m-auto pagetitle" method="POST" id="edit_coupon_form">

  <input type="hidden" name="coupon_update_id" value="<?= $_GET['id'];?>">

<h1 class="text-center">Update Coupon</h1>
<div class="col-10 form-group">
  <label for="coupon_title" class="form-label"> Title : </label>
  <input type="text" name="coupon_title" value="<?= $coupon[0]['title'];?>" class="form-control" id="coupon_title" placeholder="coupon title">
</div>
<br>
<div class="col-10 form-group">
  <label for="coupon_code" class="form-label">Code : </label>

  <input type="text" name="coupon_code" value="<?= $coupon[0]['code'];?>" class="form-control" id="coupon_code" placeholder="coupon code">
</div>

<br>

<div class="col-10 form-group">
  <label for="coupon_value" class="form-label">Value : </label>

  <input type="text" name="coupon_value" value="<?= $coupon[0]['value'];?>" class="form-control" id="coupon_value" placeholder="coupon value">
</div>

<br>

                <div class="col-10 form-group">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select class="form-select status" name="status" aria-label="Default select example">
                      <option selected="">Select Coupon Status</option>
                      <option <?= $coupon[0]['status'] == '1' ? 'selected':'';?> value="1">Active</option>
                      <option <?= $coupon[0]['status'] == '0' ? 'selected':'';?> value="0">Inactive</option>
                    </select>
                  </div>
                </div>

<div class="col-sm-2 mt-3">
  <input class="btn btn-primary w-100" type="submit" value="Update">
</div>
</form>
</main>

<?php include './footer.php' ?>