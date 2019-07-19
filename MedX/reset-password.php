<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            
            if(mysqli_stmt_execute($stmt)){
                
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://amarius1.github.io/WavecomV/wavecom.css" type="text/css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style type="text/css">
       .wrapper
        {
            margin-top: 40px;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2 data-aos="fade-down" center>Reset Password</h2>
        <div data-aos="fade-down" center>
        <i icon style="font-size: 60px !important; color: var(--accent) !important;" >delete</i>
        </div>
        <p data-aos="fade-up" center >Please fill out this form to reset your password.</p>
        <form data-aos="fade-up" center action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div center class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                
                <label class="textfield outlined">
                    <input type="password" name="new_password" value="<?php echo $new_password; ?>" placeholder=" ">
                    <span>Password</span>
                    

                </label><br>
                <span style="color: red"><?php echo $new_password_err; ?></span>




            </div>
            <div center class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
        
                  
                <label class="textfield outlined">
                    <input type="password" name="confirm_password" placeholder=" ">
                    <span>Confirm password</span>
                    
                </label><br>
                <span style="color: red"><?php echo $confirm_password_err; ?></span>

                
                
            </div>
            <div center class="form-group">
                <input btn type="submit" class="btn btn-primary" value="Submit">
                <a btn class="outlined" href="welcome.php">Cancel</a><br>
                <p center>Account ID: <?php echo htmlspecialchars($_SESSION["id"]); ?></p>
            </div>
        </form>
    </div>
     <script src="https://amarius1.github.io/WavecomV/wavecom.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>