<?php
   

    session_start();
    include 'init.php';
  //  $employee_id = $_SESSION['employee_id']; 
     echo "123456";
    if(isset($_SESSION['employee_id'])){
        echo "123456";
        $stmt=$con->prepare('SELECT * FROM employee WHERE Employee_id=?');
        $stmt->execute(array($_SESSION['employee_id']));
        $row = $stmt-> fetchAll();
     //   json_encode($row); //converts an array to JSON string
        print_r($row);
        foreach($row as $item) {
            echo $item['First_name'];
            echo $item['Last_name'];
        
            // to know what's in $item
            echo '<pre>'; var_dump($item);
        }
        
    }


?>