<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

include 'config.php';

if(!isset($_SESSION['user_id']) && $_SESSION['user_role'] != 'user'){
    header("Location : " . $hostname);
};

include './header.php';
include './bottom-header.php';
?>

<div id="user_profile-content">
    <div class="container" style="margin-left:25%;">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <h2 class="section-head text-center">My Profile</h2>


                <?php
                    $user_id = $_SESSION['user_id'];

                    $db = new Database;
                    $db->select('user','*',null,"user_id='{$user_id}'",null,null);
                     $result = $db->getResult();
                     if(count($result) > 0):
                        foreach ($result as $row):
                            
                    ?>
                <table class="table table-bordered table-responsive">
                    <tr>
                        <td><b>First Name :</b></td>
                        <td><?php echo $row["f_name"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Last Name :</b></td>
                        <td><?php echo $row["l_name"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Username :</b></td>
                        <td><?php echo $row["username"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Mobile :</b></td>
                        <td><?php echo $row["mobile"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Address :</b></td>
                        <td><?php echo $row["address"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>City :</b></td>
                        <td><?php echo $row["city"]; ?></td>
                    </tr>
                </table>
                <?php
                                endforeach;
                            endif;
                                ?>

                <a class="site-btn btn" href="edit_user.php?user<?= $_SESSION['user_id'];?>"> Modify Details</a>
                <a class="site-btn btn" href="change_password.php">Change Password</a>

            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>