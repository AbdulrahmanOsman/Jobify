<?php
include 'init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $companyemail=$_POST['email'];
    $companypass=$_POST['password'];
    $stmt=$con->prepare('SELECT Email , password FROM company WHERE Email=? AND password=?');
    $stmt->execute(array($companyemail,$companypass));
    $count = $stmt->rowcount();
    echo $count;
    if($count>0){
        $stmt = $con->prepare('SELECT Company_id FROM company WHERE Email=?');
        $stmt -> execute(array($companyemail));
        $company_id = $stmt->fetch();

       
 
        session_start();
        $_SESSION['company_id'] = $company_id;  
        header('Location:companyHome.php'); 
        

    }else {
        echo "Try again";
        echo "Username/password is not valid";
    }
    
}

?>


<div class="signUp">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" >
        <h2>Sign In</h2>
        <input type="email" name="email" id="" placeholder="Email" class="w-100">
        <input type="password" name="password" id="" placeholder="Password" class="w-100">

        <div class="formfoot">
            <button class="btn btn-primary">Sign In</button>
            
            <span>Don't have an acount?</span><a href="signUp.php" > Register </a>
        </div>
    </form>
    
    <img src="images/path1.svg" alt="">
    </div>
