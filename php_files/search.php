<?php
include './../admin/php_files/config.php';

  if (isset($_POST['search_value'])) {
        
    $db = new Database;
    $search_value = $db->escapeString($_POST['search_value']);
    $keywords = explode(" ", $search_value);
    $conditions = [];
    foreach ($keywords as  $keyword) {
        $conditions[] = "product_title LIKE '%$keyword%'";
    }

     $db->select('products','*',null,implode(" OR ",$conditions));
   

    $products = $db->getResult();
    if (!empty($products)) {
        
 echo json_encode(['products'=>$products]);

    }else {
        echo json_encode(['error'=>"No Data Match with The Search info $search_value"]);
    } /* {
        echo json_encode(['error'=>'No Data Match with The Search info ' . $search_value]);
    } */

  }
?>