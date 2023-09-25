<?php
include './header.php';
?>
<main id="main" class="main">
    <div class="admin-content-container">

    <h2 class="admin-heading text-center mt-3">
               Customer Orders
    </h2>
           
       

<!-- Display Area for Product Table -->
<?php
// $db->select('order_details','*',' ');
//  GROUP_CONCAT(products.product_title SEPARATOR ', ') AS customer_products , GROUP BY order_details.order_id
$db->sql("SELECT orders.id as order_id ,orders.order_code as order_code,orders.name as name, orders.transaction_id as transaction_id , order_details.price as price, order_details.quantity as quantity ,orders.order_date as order_date,orders.status as status,products.product_title as order_product_name FROM order_details LEFT JOIN orders ON orders.id = order_details.order_id LEFT JOIN products ON products.product_id = order_details.product_id LEFT JOIN user ON user.user_id = order_details.user_id");

$customer_orders = $db->getResult();
 // print_r($customer_orders);
?>


<table id="productsTable" class="table table-striped table-hover table-bordered display order-data-table">
            <thead>
                <th>S/L</th>
                <th>order No</th>
                <th>Customer Name</th>
                <th>products</th>
                <th>transaction id</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Date</th>
                <th>Order-Status</th>
            
            </thead>
            <tbody>

              
                <?php
                if(count($customer_orders) > 0){
                $prevOrderId = null;
                $serialNumber = 1;
                foreach($customer_orders[0] as $key => $order) {
                    
                ?>
                <tr>
<!--                  <td <?php if ($order['order_code'] != $prevOrderCode) : ?> rowspan='2' <?php endif; ?>>
                    <?php
                    if ($order['order_code'] != $prevOrderCode) {
                        echo $serialNumber;
                        $serialNumber++;
                    }
                    ?>
                </td> -->

<!--                 <td <?php if ($order['order_code'] != $prevOrderCode) : ?> rowspan='2' <?php endif; ?>>
                    <?php
                    if ($order['order_code'] != $prevOrderCode) {
                        echo $order['order_code'];
                    }
                    ?>
                </td> -->

                    <td><?= ++$key ?> </td>
                    <td><?= $order['order_code'] ?> </td>
                    <td><?= $order['name'] ?> </td>
                    <td><?= $order['order_product_name'] ?> </td>
                 <!--    <td><?= $order['customer_products']  .',(qty) = '. $order['quantity']?></td> -->
                    <td><?= $order['transaction_id']  ?></td>
                    <td><?= $order['price']  ?></td>
                    <td><?= $order['quantity']  ?></td>
                    <td><?= $order['price'] *  $order ['quantity']?></td>
                    <td><?= $order['order_date']   ?></td>


                    <?php if (
                    $order['status'] == 'Pending'
                    || $order['status'] == 'Processing'
                    || $order['status'] == 'Shipped'
                    || $order['status'] == 'Delivered'
                ) : ?>
                    <td>
                        <button
                            data-order-id="<?= $order['order_id']; ?>"
                            data-order-status="<?= $order['status']; ?>"
                            class="btn btn-outline-danger status-change"
                        >
                            <?= $order['status']; ?>
                        </button>
                    </td>
                <?php endif; ?>
                </tr>
                <?php

             //    $prevOrderCode = $order['order_code']; // Update the previous order_code

                }
            
             }
              else{
                  echo  '<tr><td>"No data found in order_details table.";</td></tr>';
                }
                ?>
            </tbody>
</table>

    </div>
</main>

<?php
include './footer.php';
?>