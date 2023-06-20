
<?php
include_once './header.php';
?>
<div class="main" id="main">



<form class="g-3 w-50 m-auto" method="POST" id="category_form">

<div class="col-6 d-block">
  <label for="category_name" class="form-label">Category Name</label>
  <input type="text" name="category_name" class="form-control" id="category_name" >
 
</div>



<div class="col-sm-2 mt-3">
  <input class="btn btn-primary w-100" type="submit" value="Save">
</div>
</form>
</main>

<?php include './footer.php' ?>