<?php
include './header.php';
?>
<main id="main" class="main" style="margin-left:381px;height:450px">
    <div class="admin-content-container">

    <h2 class="admin-heading text-center mt-3">
               Report
    </h2>
           
       
<form id="reportSection">
<div class="row">
    <div class="col-md-4">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" class="form-control">
    </div>
    <div class="col-md-2">
    <label></label>
    <input class="btn btn-primary mt-4" type="submit" value="Search">
    </div>
    <button onclick='printTable()' class='btn btn-success col-md-2 my-4'><i class='fas fa-download' aria-hidden='true'></i> DownLoad</button>;
</div>
</form>

<!-- Display Area for Product Table -->
<div id="reportTable"></div>


    </div>
</main>

<?php
include './footer.php';
?>