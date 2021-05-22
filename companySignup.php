<?php
include 'init.php';

if (isset($_POST['Add'])){
    
    if($_POST['password'] != $_POST['confirmPassword'])
        echo 'ERROR password not typical';
    else{
    $stmt=$con->prepare('INSERT INTO company
                            (Company_name ,	Website	, Company_phone ,	Industry_of_company	 , Country	, Email ,	Password)
                     VALUES 
                            (:zCompany_name , :zWebsite , :zCompany_phone , :zIndustry_of_company , :zCountry , :zEmail ,:zPassword)');
    $stmt->execute(array(
        'zCompany_name'=>$_POST["companyName"],
        'zWebsite'=>$_POST["website"],
        'zCompany_phone'=>$_POST["companyPhone"],
        'zIndustry_of_company'=>$_POST["companyIndustry"],
        'zCountry'=>$_POST["country"],
        ':zEmail'=>$_POST["email"],
        'zPassword'=>$_POST["password"]
        ));
        session_start();
        $_SESSION['company_id'];  
        header('Location:companyHome.php'); 
    }
}
//Company_name	Website	Company_phone	Industry_of_company	Country	Email	Password	Company_id
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
    <title>Company Sign Up | Jobify </title>
    <link rel="shortcut icon" href="images/siteIcon.png">

    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" href="icofont/icofont.min.css">
    <link rel="stylesheet" href="css/company/companySignUp.css">

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
        <input type="text" name="companyName" id="" placeholder="company Name" class="w-100">
        <input type="text" name="website" id="" placeholder="website" class="w-100">
        <input type="text" name="companyPhone" id="" placeholder="Company" class="w-100">
        <input type="text" name="companyIndustry" id="" placeholder="companyIndustry" class="w-100">
        <input type="text" name="country" id="" placeholder="country" class="w-100">
        <input type="text" name="email" id="" placeholder="email" class="w-100">
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

