<?php
include 'config.php';
session_start();
?>

<?php
 if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user')  {
    include 'header.php';
  
?>


<div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                        <div class="signup_form">
                            <h2>Change Password</h2>
                            <!-- Form -->
                            <?php
                            $current_user = $_SESSION['user_id'];
                            $db = new Database;
                            $db->select('user','*',null,"user_id='{$user}'",null,null);
                            $result = $db->getResult();
                            if(count($result) > 0):
                                foreach ($result as $row):
                            ?>
                            <form id="modify-password" method="POST">
                                        <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" disabled="" value="<?= $row['username'];?>" requried="">
                                    </div>
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control old_pass" placeholder="Enter Old Password" requried="">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control new_pass" placeholder="Enter Old Password" requried="">
                                    </div>
                                    <input type="submit" name="submit" class="btn" value="Submit">
                            </form>

                            <!-- /Form -->
                            <?php
                            endforeach;
                        endif;
                            ?>
                        </div>
                </div>
        </div>
    </div>




<?php
include './footer.php';

 }
?>