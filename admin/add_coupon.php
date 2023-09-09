
<?php
include_once './header.php';
?>
<div class="main" id="main">



<form class="g-3 w-50 m-auto pagetitle needs-validation" method="POST" id="add_coupon_form">
<h1 class="text-center">Add Coupon</h1>
<div class="col-10 form-group">
  <label for="coupon_title" class="form-label"> Title : </label>
  <input type="text" name="coupon_title" class="form-control" id="coupon_title" placeholder="coupon title">
</div>

<br>

<div class="col-10 form-group">
  <label for="coupon_code" class="form-label">Code : </label>

  <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="coupon code">
</div>

<br>

<div class="col-10 form-group">
  <label for="coupon_value" class="form-label">Value : </label>

  <input type="text" name="coupon_value" class="form-control" id="coupon_value" placeholder="coupon value">
</div>

<br>


<br>


               <div class="col-10 form-group">
                  <label class="form-label">Status</label>
                 
                    <select class="form-select status" name="status" aria-label="Default select example">
                      <option selected value="">Select Coupon Status</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                </div>

<div class="col-sm-2 mt-3">
  <input class="btn btn-primary w-100" type="submit" value="Save">
</div>
</form>
</main>

<?php include './footer.php' ?>