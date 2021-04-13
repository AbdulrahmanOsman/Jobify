<?php

include 'init.php';
    session_start();
    $company_id = $_SESSION['company_id']; 
    
   
    echo $company_id;

if (isset($_POST['AddJob'])){
     /* Job_title	Job_description	City	Years_of_experience	Job_type	Salary	Company_id	Job_id	Employee_id */
    $stmt=$con->prepare('INSERT INTO job    
            (Job_title , Job_description , City , Years_of_experience ,	Job_type ,Salary , Company_id)
        VALUES 
            (:zjobTitle , :zjobDescription , :zcity ,:zyearExp , :zjobtype , :zsalary , :zcompany_id)');
    $stmt->execute(array(
        'zjobTitle'=>$_POST["jobTitle"],
        'zjobDescription'=>$_POST["jobDescription"],
        'zcity' => $_POST["city"],
        'zyearExp'=>$_POST["yearExp"],
        'zjobtype' =>$_POST["jobtype"],
        'zsalary'=>$_POST["salary"],
        'zcompany_id'=> [$company_id] 

      ));

}
 $stmt = $con->prepare('SELECT * FROM job');
        $stmt -> execute();
        $rows = $stmt->fetchAll();
        print_r($rows);

?>
<form method="POST" action="<?php ?>" >
        <input type="text" name="jobTitle" id="" placeholder=" jobTitle" class="w-100">
        <input type="text" name="jobDescription" id="" placeholder="jobDescription" class="w-100">
        <input type="text" name="city" id="" placeholder="city" class="w-100">
        <input type="text" name="yearExp" id="" placeholder="yearExp" class="w-100">
        <input type="text" name="jobtype" id="" placeholder="jobtype" class="w-100">
        <input type="text" name="salary" id="" placeholder="salary" class="w-100">
        <button class="btn btn-primary" name="AddJob">Add Job</button>
        <br><br>
        <li><a href="profile.php">PROFILE</a></li>
        

 </form>
