<?php

include 'config.php';
session_start();



if(!isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user'){
    
include './header.php';

?>

<div class="product-cart-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-head">My Orders</h2>
                </div>

                <?php
                $user = $_SESSION['user_id'];
                $db->sql("SELECT order_products.product_id,order_products.order_id,order_products.total_amount,order_products.product_qty,order_products.delivery,order_products.product_user,order_products.order_date,products.featured_image,user.f_name,user.address,user.city,payments.payment_status,
                
                GROUPT_CONCAT(DISTINCT products.product_title ORDER BY products.product_id) as Product_titile,
                GROUPT_CONCAT( DISTINCT products.features_image ORDER BY products.product_id) as Product_image,
                GROUPT_CONCAT(DISTINCT products.product_price) as Product_price

                FROM order_products 
                LEFT JOIN products ON FIND_IN_SET(products.product_id,order_products.product_id) > 0
                LEFT JOIN user ON order_products.product_user = user.user_id
                LEFT JOIN payments ON order_products.pay_req_id = order_products.txn_id
                WHERE user.user_id = '.$user.' GROUP BY order_products.order_id ORDER BY order_products.order_id DESC;

                 ");

                $result =  $db->getResult();
                if(count($result) > 0):
                    foreach ($result as $row):
                        for ($i=0; $i < count($row); $i++):
                ?>
                <table class="table table-bordered">
                    
                <tbody>
                    <tr class="active">
                        <th colspan="3">
                            <h4>
                                <b>ORDER No. :  
                                <?= 'ORD00' . $row[$i]['order_id'];?>
                                </b>
                            </h4>
                        </th>
                        <th width="200px"><b>
                            Order Placed : 
                        </b><?= date('d M, Y',strtotime($row[$i]['order_date']));?>

                        </th>
                    </tr>

                    <?php
                    $product_titles = array_filter(explode('$$',$row[$i]['product_titles']));

                    $product_prices = array_filter(explode(',',$row[$i]['product_prices']));

                    $prdouct_qty = array_filter(explode(',',$row[$i]['product_qty']));

                    $product_images = array_filter(explode(',',$row[$i]['product_images']));

                    for ($p=0; $p < count($product_qty); $p++) { 
                        
                    ?>
                   <tr>

                   <td>
                    <img src="./product_images/<?= $product_qty[$p];?>" alt="" width="100px">
                   </td>
                   <td>
                    <span>Product Titile <b><?= $product_titles[$p];?> </b>
                </span>
                <span>
 Product_price : <b> <?= $cur_format . ' ' . $product_prices[$p];?> </b>
                </span>
                <span>Product_qty : <b> <?= $prdouct_qty[$p] ;?> </b></span>
                   </td>

                   <td>
                    <?php
                    if($row[$i]['delivery'] == '1'){
                  $status = '<label class="">Delivered
                  </label>';
                    }else{
                        $status = '<label class="">In - Process
                        </label>';
                    }
                    ?>
                    <b>Status : <?= $status;?> </b>
                   </td>
                   <td>
                    <span>Delivery Expected By : <?= date('d', strtotime($row[$i]['order_date'] . ' + 4 day'));?> - <?= date('D F, Y',strtotime($row[$i]['order_date']. ' +7'));?> </span>
                   
                </td>
                   </tr>
                   <?php
                    }
                   ?>

              <tr>
                   <td colspan="3" align="right">
                    <b>Total Amount</b>
                   </td>
                   <td> <b><?=  $cur_format . ' '. $row[$i]['total_amount'] ;?></td></b> 
                   </tr>

                </tbody>
                </table>

                <?php
                endfor;
            endforeach;
             else :
                ?>
                        <div class="empty-result">
                            No Order Found
                        </div>
                        <?php
                        endif;
                        ?>
            </div>
        </div>
</div>


<?php
include './footer.php';
}
?>