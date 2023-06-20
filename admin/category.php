<?php
include_once './header.php';
?>
<main id="main" class="main">
    <div class="admin-content-container">
        <div class="d-flex justify-content-around">
            <h2 class="admin-heading">All Categories</h2>
            <a class="add-new btn btn-danger" href="add_category.php">Add New</a>
        </div>

        <?php
    $limit = 10;
     
    $db = new Database();
    $db->select('categories','*',null,null,'cat_id desc',$limit);
     $result = $db->getResult();
    //  print_r($result);
      
    ?>



        <table id="productsTable" class="table table-striped table-hover table-bordered">
            <thead>
                <th>S/L</th>
                <th>Title</th>
                <th width="100px">Action</th>
            </thead>
            <tbody>


                <?php
               if(count($result)  > 0){ 
                foreach ($result as $key => $value):
                  
                ?>
                <tr>
                    <td><?= ++$key  ?></td>
                    <td><?= $value['cat_title'];?></td>

                    <td>
                        <a class="text-primary" href="edit_category.php?id=<?= $value['cat_id'] ;?>"><i
                                class="fas fa-edit"></i></a> &nbsp;
                        <a class="delete_category text-danger" href="javascript:void()" 
                            data-id="<?= $value['cat_id'] ;?>">
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
                    <td>No Products is Found</td>
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