 <?php
include 'database.php';

 if (isset($_POST['submitBtn'])) {
    $db = new Database;
    $startDate = $db->escapeString($_POST['startDate']);
    $endDate = $db->escapeString($_POST['endDate']); 

/*     $format_startDate = $sdate->format('Y-m-d H:i:s'); // Convert to timestamp format
    $format_endDate = $eDate->format('Y-m-d H:i:s');   // Convert to timestamp format */
    $db->select('products','*',null,"product_date BETWEEN '$startDate' AND '$endDate'","product_id DESC",null);
    $result =  $db->getResult();
    // print_r($result);

    // print_r($result);
   // $table = "<a href='download.php?startDate=$startDate&endDate=$endDate' class='btn btn-success my-4'><i class='fas fa-download' aria-hidden='true'></i> DownLoad</a>";

  
    $table = '<table class="table table-striped table-hover table-bordered display">';
    $table .= '<tr><th>Name</th><th>product_code</th><th>Image</th><th>Product Views</th><th>Price</th></tr>'; 

    if(!empty($result)){
       
        // echo json_encode(['success'=>$result]);
        foreach ($result as $key => $row) {
            $table .= '<tr>';
            $table .= '<td>' . $row['product_title'] . '</td>';
            $table .= '<td>' . $row['product_code'] . '</td>';
            $table .= '<td><img src="../admin/product_images/' . $row['featured_image'] . '" alt="'.$row['product_title'].'." width="50" height="50"></td>';
            $table .= '<td>' . $row['product_views'] . '</td>';
            $table .= '<td>' . $row['product_price'] . '</td>';
            $table .= '</tr>';
       
        
        }

            $table .= '</table>';       
             echo $table; 
            
    }else{
        
        echo json_encode(['error'=>'No Data fetching Here']);
    }


}
?> 

<?php

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate); // Add one day to include the end date

    // Database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'shopping_db';

    $connection = mysqli_connect($host, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM products WHERE product_date BETWEEN '$startTimestamp' AND '$endTimestamp'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Product Name</th><th>Product Date</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . date('Y-m-d H:i:s', $row['product_date']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found.";
    }

    mysqli_close($connection);
} */
?>

