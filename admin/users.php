<?php
include_once './header.php';
?>
<main id="main" class="main">
    <div class="admin-content-container">
        <div class="d-flex justify-content-around">

            <h2 class="admin-heading">
                All Users
            </h2>
           
        </div>

                <table class="table table-striped table-hover table-bordered">
            <thead>
                 <tr>
                    <th>Serial No:</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $db = new Database;
                $limit = 2;
                    $db->select('user','*',null,null,'user_id DESC',$limit);
                    $user_result = $db->getResult();
                    // print_r($user_result);exit;
                    if(count($user_result) > 0):
                        foreach ($user_result as $key => $row):
                ?>
            <tr>
                <td><?= ++$key ;?></td>
                <td><?php echo $row['f_name'].' '.$row['l_name']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['city']; ?></td>

                <td>
                    <!-- Show User Info -->

                    <!-- Small Modal -->
              <a href="" class="btn btn-sm btn-primary user_view" data-bs-toggle="modal" data-id="<?= $row['user_id'];?>" data-bs-target="#user-detail<?= $row['user_id'];?>">
               <i class="fas fa-eye"></i>
              </a>
                   
   <div class="modal fade" id="user-detail" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Small Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                   
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
             

              <!-- Block Unblock Here -->

            
                     <?php
                            if($row['user_role'] == '1'){ ?>
                                <a href="" class="btn btn-xs btn-primary user-status" data-id="<?php echo $row['user_id']; ?>" data-status="<?php echo $row['user_role'] ?>">Block</a>
                            <?php }else{ ?>
                                <a href="" class="btn btn-xs btn-primary user-status" data-id="<?php echo $row['user_id']; ?>" data-status="<?php echo $row['user_role'] ?>"    >Unblock</a>
                            <?php   } ?>
    
              <a href="javascript:void()" data-id="<?= $row['user_id'];?>" class="text text-bg-danger py-1 px-2 rounded-1 delete_user">
                <i class="fas fa-trash"></i>
              </a>
                  
                </td>
              
            </tr>


           

           <?php 
           
            endforeach;
        endif;
            ?>
            </tbody>

                </table>

</main>


   <!-- User Modal Description Here -->
   <div class="modal fade" id="user-detailtrt" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Small Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            <!--   End Small Modal -->

<?php include './footer.php' ?>