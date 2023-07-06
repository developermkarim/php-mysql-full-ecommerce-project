<?php
include_once './header.php';
?>
<main id="main" class="main">
    <div class="admin-content-container">
        <div class="d-flex justify-content-around">

            <h2 class="admin-heading">
               Options
            </h2>
           
        </div>



<?php
$db = new Database;
$db->select('options','*');
$result = $db->getResult();
if($result > 0):
    foreach($result as $row):
?>
              <form id="updateOptions" class="add-post-form row" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Name</label>
                        <input type="text" class="form-control site_name" name="site_name"
                               value="<?php echo $row['site_name']; ?>" placeholder="Site Name"/>
                        <input type="hidden" name="s_no" value="<?php echo $row['s_no']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="">Site Title</label>
                        <input type="text" class="form-control site_title" name="site_title"
                               value="<?php echo $row['site_title']; ?>" placeholder="Site Title"/>
                    </div>
                    <div class="form-group">
                        <label>Site Description</label>
                        <textarea name="site_desc" class="form-control site_desc" cols="30" rows="3"><?php echo $row['site_desc']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Contact Email</label>
                        <input type="email" class="form-control email" name="contact_email" value="<?php echo $row['contact_email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Contact Phone Number</label>
                        <input type="text" class="form-control phone" name="contact_phone" value="<?php echo $row['contact_phone']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Logo</label>
                        <input type="file" class="new_logo" name="new_logo" />
                        <input type="hidden" class="old_logo" name="old_logo" value="<?php echo $row['site_logo']; ?>">

                        <img id="image" src="../images/<?= $row['site_logo'];?>" alt="Site Logo" width="100px" height="50px" >

                    </div>
                    <div class="form-group">
                        <label for="">Footer Text</label>
                        <input type="text" class="form-control footer_text" name="footer_text" value="<?php echo $row['footer_text']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Currency Format</label>
                        <input type="text" class="form-control currency" name="currency_format" value="<?php echo $row['currency_format']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Contact Address</label>
                        <textarea name="contact_address" class="form-control address" cols="30" rows="3"><?php echo $row['contact_address']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" class="btn add-new" name="submit" value="Update">
                    </div>
                </div>
            </form>

            <?php
           
    endforeach;
    endif;
            ?>
    </div>
</main>

</div>
<?php include './footer.php' ?>