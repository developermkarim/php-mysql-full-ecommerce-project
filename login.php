<?php
include 'header.php'
?>

<div class="container">
<div class="row mt-4">
        <div class="col-md-6" style="margin-left: 25%;">
  <!-- Form -->
  <form  id="user_login_form2" method ="POST"autocomplete="off">
                                <div class="customer_login"> 
                                    <h2 class="text-center">login here</h2>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="email" class="form-control username" name="username" placeholder="Username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control password" placeholder="password" name="password" autocomplete="off">
                                    </div>
                                    <input type="submit" name="login" class="btn btn-success px-2" value="login"/>
                                    
                                    <span>Don't Have an Account <a  href="register.php">Register</a></span>
                                </div>
                            </form>
                            <!-- /Form -->
            </div>
        </div>
 </div>

<?php
include 'footer.php'
?>