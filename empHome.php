<?php 
include 'init.php';


if (isset($_POST['AddJob'])){
     /* Job_title	Job_description	City	Years_of_experience	Job_type	Salary	Company_id	Job_id	Employee_id */
    $stmt=$con->prepare('INSERT INTO job    
            (Job_title , Job_description , City , Years_of_experience ,	Job_type ,Salary)
        VALUES 
            (:zjobTitle , :zjobDescription , :zcity ,:zyearExp , :zjobtype , :zsalary )');
    $stmt->execute(array(
        'zjobTitle'=>$_POST["jobTitle"],
        'zjobDescription'=>$_POST["jobDescription"],
        'zcity' => $_POST["#"],
        'zyearExp'=>$_POST["yearExp"],
        'zjobtype' =>$_POST["#"],
        'zsalary'=>$_POST["#"]
      ));

}
 $stmt = $con->prepare('SELECT * FROM job');
        $stmt -> execute();
        $rows = $stmt->fetchAll();
        print_r($rows);

?>
<form method="POST" action="<?php ?>" >
<input type="text" name="jobTitle" id="" placeholder=" jobTitle" class="w-100">
        <input type="text" name="yearExp" id="" placeholder="yearExp" class="w-100">
        <input type="text" name="jobDescription" id="" placeholder="jobDescription" class="w-100">
        <button class="btn btn-primary" name="AddJob">Add Job</button>
        <br><br>
        <li><a href="profile.php">PROFILE</a></li>
        

 </form>
 <?php

        session_start();  
        $employee_id = $_SESSION['employee_id'];
       

        $stmt=$con->prepare('SELECT Title FROM employee WHERE Employee_id=?');
        $stmt->execute(array($employee_id)); 
        $userjob = $stmt->fetch();

        
       /*
        foreach($userjob as $value){
            //Print the element out.
            $jb =$value ;
           
        }
        */

       
        $stmt = $con->prepare('SELECT * FROM job WHERE Job_title =? ');
        $stmt -> execute(array($userjob));
        $jobs = $stmt->fetchAll();
        print_r($jobs); 
        foreach($jobs as $item) {
            echo $item['Job_title'];
            echo $item['Years_of_experience'];
            echo $item['Job_description'];
        
            // to know what's in $item
            echo '<pre>'; var_dump($item);
        }
    
    


?>