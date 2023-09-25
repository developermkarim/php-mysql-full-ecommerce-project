<?php
class Database{
private $db_host = "localhost";  // Change as required
private $db_user = "root";       // Change as required
private $db_pass = "";   // Change as required
private $db_name = "shopping_db";   // Change as required
private $result = array(); // Any results from a query will be stored here
private $mysqli = ""; // This will be our mysqli object
private $myquery = "";// used for debugging process with SQL return
private $conn = false;
public function __construct(){

    if(!$this->conn){

        $this->mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        // Check connection
        if ($this->mysqli->connect_errno > 0){
          array_push($this->result,$this->mysqli->connect_error);
          throw new Exception("Database connection error: " . $this->mysqli->connect_error);
          return false; // Problem selecting database return FALSE
        }
    }
    else{
        return true;
    }
}

    /* Function for Insert query */ 

    public function insert($table,$params = array()){

        if ($this->tableExists($table)) {
            $table_columns = implode(", ",array_keys($params)); /*  ['name'] = 'mkarim' */
            $table_values = implode("', '", $params); // 'mkarim','email','password'
            $sql = "INSERT INTO $table($table_columns) VALUES('$table_values')";
            $this->myquery = $sql;

            if($this->mysqli->query($this->myquery)){
                array_push($this->result,$this->mysqli->insert_id); // First is array,2nd is value
               return true;
            }else{
                array_push($this->result,$this->mysqli->error);
                return false;
            }

        }
        else{
            return false;
        }
    }


    /* Update Query Function Method Here */
    public function update($table,$params = array(), $where = null){

        if($this->tableExists($table)){

            $arguments = array();

            foreach($params as $columnKey=>$columnValue){ 
                $arguments[] = "$columnKey ='$columnValue'";
            }
            $KeyValue = implode(", ",$arguments);

            $sql = "UPDATE $table SET $KeyValue";

            if($where != null){
                $sql.= "WHERE $where";
            }
            $this->myquery = $sql;
            if($this->mysqli->query($sql)){
                array_push($this->result,$this->mysqli->affected_rows);
                return true;
            }
            else{
                array_push($this->result,$this->mysqli->connect_error);
                return false;
            }

        }
        else{
            return false;
        }
    }
   
/* Delete Function Method Here */
public function delete($table,$where= null){
    if ($this->tableExists($table)) {
        $sql = "DELETE FROM $table ";
        if ($where != null) {
            $sql.= " WHERE $where ";
        //    print_r($sql);
             
            if ($this->mysqli->query($sql)) {
                $this->myquery = $sql;
                array_push($this->result,$this->mysqli->affected_rows);
                return true;

            }else{
                // echo "Table not deleted";
                array_push($this->result,$this->mysqli->connect_error);
                return false;
            }
            
        }
        
    }
    else{

        return false;
    }
}

/* Select Query Method Here */
public function select($table,$row = "*",$join = null,$where = null,$order = null,$limit = null)
{
  if ($this->tableExists($table)){
    
    $sql = " SELECT $row FROM $table ";
    if ($join != null) {
        $sql .= " JOIN ". $join;
        # code...
    }
    if ($where != null) {
        $sql .= " WHERE ". $where;
        # code...
    }
    if ($order != null) {
        $sql .= " ORDER by ". $order;
        # code...
    }
    if ($limit != null) {
       if (isset($_GET['page'])) {
        $page = $_GET['page'];
        # code...
       }else{
        $page = 1;
       } 
       
$start = ($page -1) * $limit;
$sql .= " LIMIT ".$start. "," .$limit;

    }
$this->myquery = $sql;
$query = $this->mysqli->query($sql);
if ($query) {
    
   $this->result = $query->fetch_all(MYSQLI_ASSOC);
   /*  $this->mysqli->query($sql)->fetch_all(MYSQLI_ASSOC); */
   return true;
}
    else{
        array_push($this->result,$this->mysqli->connect_error);
        return false;
    }

  }
  
  else{
    return false;
  }

}

//  value store in this->result based on SQL command

public function sql($sql)
{
  $this->myquery = $sql;
  $query = $this->mysqli->query($sql); // example argument of $sql parameter UPDATE tbl_user SET column='value'; 
  if($query){
    $query_arr = explode(' ',$sql); // mkarim,dulal,rashed
            switch ($query_arr[0]) { // this switch case is allias of if condition $query_arr[0] == 'INSERT';
               case 'INSERT':
               array_push($this->result,
            $this->mysqli->insert_id);
                break;
                case "UPDATE":
                array_push($this->result,$this->mysqli->affected_rows);
                break;
                case 'DELETE':
                array_push($this->result,$this->mysqli->affected_rows);
                break;
                case 'SELECT':
                array_push($this->result,$query->fetch_all(MYSQLI_ASSOC));
        }
        
        return true;
  }
  
  else{
    array_push($this->result,$this->mysqli->connect_error);
    return false;
  }

}

    // Function to get the last inserted ID
    public function getLastInsertId() {
        return $this->mysqli->insert_id;
    }

    // Function to get the number of affected rows in the last query
    public function getAffectedRows() {
        return $this->mysqli->affected_rows;
    }


   // FUNCTION to show pagination
   public function pagination($table, $join = null, $where = null, $limit){
    // Check to see if table exists
    if($this->tableExists($table)){
        //If no limit is set then no pagination is available
        if( $limit != null){
            // select count() query for pagination
      $sql = "SELECT COUNT(*) FROM $table";
      if($where != null){
            $sql .= " WHERE $where";
              }
              if($join != null){
                  $sql .= ' JOIN '.$join;
              }
              // echo $sql; exit;
      $query = $this->mysqli->query($sql);
      
      $total_record = $query->fetch_array();
      $total_record = $total_record[0];

      $total_page = ceil( $total_record / $limit);

      $url = basename($_SERVER['PHP_SELF']);

          if(isset($_GET["page"])){
                  $page = $_GET["page"];
                  }
                  else{
                    $page = 1;
                  }

      // show pagination
      $output =   "<ul class='pagination'>";
      if($page>1){
          $output .="<li><a href='$url?page=".($page-1)."' class='page-link'>Prev</a></li>";
      }
      if($total_record > $limit){
        for ($i=1; $i<=$total_page ; $i++) {
          if($i == $page){
             $cls = "class='active'";
          }else{
             $cls = '';
          }
            $output .="<li $cls><a class='page-link' href='$url?page=$i'>$i</a></li>";
        }
      }
      if($total_page>$page){
        $output .="<li> <a class='page-link' href='$url?page=".($page+1)."'>Next</a></li>";
      }
      $output .= "</ul>";

      return $output;
        }

    }else{
      return false; // Table does not exist
    }

}

    /*  Function Method to check whether table exist or not in database */
    private function tableExists($table)
    {
       $tableIndb = $this->mysqli->query("SHOW TABLES FROM $this->db_name LIKE '$table'");
       if ($tableIndb) {
        if ($tableIndb->num_rows == 1) {
            return true;
        }
        else{
            array_push($this->result,$table." table doesn't exist");
            return false;
        }
        
       }
    }

    /* This function to get the result of fetch and error */
    function getSql(){
        $sqlval = $this->myquery;
         $this->myquery = array();
        return $sqlval;
    }

    /* This function to escape String from input value */
function escapeString($data){
   $input_val = trim($data);
   $input_val = stripslashes($input_val);
   $input_val = htmlspecialchars($input_val);
   $result = $this->mysqli->real_escape_string($input_val);
    return $result;
}

/* To get Result of fetching data from $this->result */
function getResult(){
    $resultVal = $this->result;
     $this->result = array();
    return $resultVal;
}

/* this Function is for Input Validattion */
  // Function to validate a form
  public function validateForm($formData, $validationRules) {
    $errors = array();

    foreach ($validationRules as $fieldName => $rules) {
        foreach ($rules as $rule) {
            switch ($rule) {
                case 'required':
                    if (empty($formData[$fieldName])) {
                        $errors[$fieldName] = ucfirst($fieldName) . ' is required.';
                    }
                    break;
                case 'email':
                    if (!empty($formData[$fieldName]) && !filter_var($formData[$fieldName], FILTER_VALIDATE_EMAIL)) {
                        $errors[$fieldName] = 'Invalid ' . ucfirst($fieldName) . ' format.';
                    }
                    break;
                case 'phone':
                    if (!empty($formData[$fieldName]) && !preg_match('/^\d{10}$/', $formData[$fieldName])) {
                        $errors[$fieldName] = 'Invalid ' . ucfirst($fieldName) . ' format.';
                    }
                    break;
                case 'username':
                    if (!empty($formData[$fieldName]) && strlen($formData[$fieldName]) < 6) {
                        $errors[$fieldName] = 'Username must be at least 6 characters.';
                    }
                    break;
                case 'address':
                    if (empty($formData[$fieldName])) {
                        $errors[$fieldName] = 'Address is required.';
                    }
                    break;
                // Add more validation rules as needed
            }
        }
    }

    return $errors;
}

public function uploadFile($fileInputName, $targetDirectory, $rename = true, $allowedFileTypes = array(), $deletePrevious = true) {
    if (!isset($_FILES[$fileInputName])) {
        return false; // File input does not exist
    }

    $file = $_FILES[$fileInputName];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false; // File upload error
    }

    // Get file information
    $fileName = $file['name'];
    $fileTmpPath = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];

    $minFileSize = 2097152;
        // Check if the file size is greater than or equal to the minimum size (2 MB)
        if ($fileSize > $minFileSize) {
            return false; // File size is too large
        }
    
    // Check file type (if allowedFileTypes is provided)
    if (!empty($allowedFileTypes) && !in_array($fileType, $allowedFileTypes)) {
        return false; // Invalid file type
    }

    // Optional Use

    // Optional Use

    // Generate a unique filename (if rename is enabled)
    if ($rename) {
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniqueName = uniqid() . '.' . $fileExtension;
        $targetPath = $targetDirectory . $uniqueName;
    } else {
        $targetPath = $targetDirectory . $fileName;
    }

    // Delete the previous file (if deletePrevious is enabled)
    if ($deletePrevious && file_exists($targetPath)) {
        unlink($targetPath);
        
    }

    /* Options Optimization start */
        // Optimize the image (resize to a fixed width)
        $newWidth = 800; // Define your desired width
        list($originalWidth, $originalHeight) = getimagesize($fileTmpPath);
        $aspectRatio = $originalWidth / $newWidth;
        $newHeight = $originalHeight / $aspectRatio;
    
        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
        $sourceImage = imagecreatefromjpeg($fileTmpPath); // Assuming JPEG format
    
        imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
    
        // Save the optimized image (JPEG format)
        imagejpeg($resizedImage, $targetPath, 80); // 80 is the quality (adjust as needed)
    
        imagedestroy($sourceImage);
        imagedestroy($resizedImage);
    
        return $targetPath; // Return the path to the uploaded and optimized file
    /* Options Optimization End */

        // Move the uploaded file to the target directory
        if (move_uploaded_file($fileTmpPath, $targetPath)) {
            return $targetPath; // Return the path to the uploaded and optimized file
            } else {
                return false; // Failed to move the file
            }

}
 

/* Destruct Method to destroy the mysqli function of construct method */

function __destruct()
{
    if($this->conn){
        if($this->mysqli->close()){
            $this->conn = false;
            return true;
        }
        else{
            return false;
        }
    }
}


   // Function to close the database connection,  With this method in your class, you can now explicitly close the database connection in your code by calling $db->closeConnection()
   public function closeConnection() {
    if ($this->conn) {
        if ($this->mysqli->close()) {
            $this->conn = false;
            return true;
        } else {
            return false;
        }
    }
}

};


