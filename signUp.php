<?php 
include 'init.php';

if (isset($_POST['Add'])){
    
    if($_POST['password'] != $_POST['confirmPassword'])
        echo 'ERROR password not typical';
    else{
    $stmt=$con->prepare('INSERT INTO employee
                            (First_name,Last_name,Title,Email,pass)
                     VALUES 
                            (:zfirstname , :zlastName , :zjobTitle , :zemail , :zpass)');
    $stmt->execute(array(
        'zfirstname'=>$_POST["firstName"],
        'zlastName'=>$_POST["lastName"],
        'zjobTitle'=>$_POST["jobTitle1"],
        ':zemail'=>$_POST["email"],
        'zpass'=>$_POST["password"]
        ));
       // $employee_id = $_POST['employee_id'];
        session_start();

        $_SESSION['employee_id']; 
        header('Location:empHome.php'); 

       /* $stmt = $con->prepare('SELECT *FROM newjob WHERE jobTitle = ? ');
        $stmt -> execute(array($_POST["jobTitle1"]));
        $jobs = $stmt->fetchAll();
        print_r($jobs); 
            $_SESSION['jobs']=$jobs; 
             header('Location:empHome.php');  */


        // Show All DB for Emp.
        /*$stmt = $con->prepare('SELECT * FROM user_information');
        $stmt -> execute();
        $rows = $stmt->fetchAll();
        print_r($rows);*/
       
       
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Meta Tags -->
    <meta charset="UTF-8">
    <meta name="description" content="Find & hire top freelancers, web developers & designers inexpensively">
    <meta name="keywords" content="job, recruitment, freelance, hire, company, cv">
    <meta name="author" content="Abdulrahman Osman, Ahmed Ayman, Ahmed Elkeay, Ahmed Toukhy, Bassem Karem, Mahmoud Abdelhameed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Page Name -->
    <title> Personal Sign Up | Jobify </title>
    <link rel="shortcut icon" href="images/siteIcon.png">

    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" href="css/signUp/signUp.css">

    <!--Font-->
    <link rel="stylesheet" href="fonts/abril.css">
    <link rel="stylesheet" href="fonts/montserrat.css">
</head>
<body>

    <img src="images/path1.svg"  alt="" class="rightSVG">

    <nav>
        <div class="container">
            <a class="navbar-brand" href="index.php">Jobify</a>
        </div>
    </nav>

    <div class="signUp">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" >
            <h2>Sign Up</h2>
            <input type="text" name="firstName" id="" placeholder="First Name" class="w-100">
            <input type="text" name="lastName" id="" placeholder="Last Name" class="w-100">
            <input type="text" name="jobTitle1" id="" placeholder="Title" class="w-100">
            <input type="email" name="email" id="" placeholder="Email" class="w-100">
            <input type="password" name="password" id="" placeholder="Password" class="w-100">
            <input type="password" name="confirmPassword" id="" placeholder="Confirm Password" class="w-100">

            <input type="button" value="Sign Up" name="Add" onclick="document.location='#'">

            <div class="formfoot">
                <p> Have an account? <a href="signIn">Sign in</a></p>
            </div>
        </form>
    </div>

    <!--jquery-->
    <script src="javascript/jquery.js"></script>
    <!--popper cdn -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!--bootstrap -->
    <script src="javascript/bootstrap.min.js"></script>
    <!--custom JS -->
    <script src="javascript/interactions.js"></script>
</body>
</html>