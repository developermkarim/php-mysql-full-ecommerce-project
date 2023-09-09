<?php
include_once './header.php';
?>
<main id="main" class="main">
    <div class="admin-content-container coupon-data">
        <div class="d-flex justify-content-around">
            <h2 class="admin-heading">All Coupons</h2>
            <a class="add-new btn btn-danger" href="add_coupon.php">Add New</a>
        </div>

        <?php
    $limit = 10;
     
    $db = new Database();
    $db->select('coupons','*',null,null,'id desc',$limit);
     $result = $db->getResult();
    //  print_r($result);
      
    ?>



        <table id="productsTable" class="table table-striped table-hover table-bordered">
            <thead>
                <th>S/L</th>
                <th>Title</th>
                <th>Code</th>
                <th>Value</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </thead>
            <tbody>


                <?php
               if(count($result)  > 0){ 
                foreach ($result as $key => $value):
                  
                ?>
                <tr>
                    <td><?= ++$key  ?></td>
                    <td><?= $value['title'];?></td>
                    <td><?= $value['code'];?></td>
                    <td><?= $value['value'];?></td>

                    <td>
                    <div class="form-check form-switch">

                   
                
                        <?php
                        if ($value['status'] == 1){
                        ?>
                      
                        <input class="form-check-input coupon-box" data-coupon-id="<?= $value['id'];?>" type="checkbox" checked>

                        <?php
                         } else{
                        ?>
                          <input class="form-check-input coupon-box" data-coupon-id="<?= $value['id'];?>" type="checkbox">
                          
                          <?php
                        }
                          ?>

                          </div>
                    </td>

                    <td>
                        <a class="text-primary" href="edit_coupon.php?id=<?= $value['id'] ;?>">
                        <i class="fas fa-edit"></i></a> &nbsp;
                        <a class="delete_coupon text-danger" href="#" 
                            data-id="<?= $value['id'] ;?>">
                            <i class="fas fa-trash"></i>
                            
                        </a>
                    </td>
                </tr>

                <?php
                endforeach;

            }
            else{

           
                    ?>

                <tr>
                    <td>No Coupon is Found</td>
                </tr>

                <?php
            }
                    ?>

            </tbody>
        </table>

        <!-- <div class="not-found clearfix">!!! No Products Found !!!</div> -->

        <div class="pagination-outer">

        </div>

        
    </div>


</main>

<?php include './footer.php' ?>