<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://amarius1.github.io/WavecomV/wavecom.css" type="text/css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style type="text/css">
      [center] *
        {
        
        }
        .wrapper
        {
            margin-top: 40px;
            height: 100%;
        }
    </style>
</head>

<body >
    <div class="wrapper">
        <h2 data-aos="fade-down" center>Sign Up</h2>
        <div data-aos="fade-down" center>
        <i icon style="font-size: 60px !important; color: var(--accent) !important;" >account_circle</i>
        </div>
        <H5 data-aos="fade-up" center>Please fill this form to create an account.</H5>
        <form data-aos="fade-up" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div center class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">


                <label class="textfield outlined">
                    <input type="text" name="username" value="<?php echo $username; ?>" placeholder=" ">
                    <span>Username</span>

                </label><br>
                   <span style="color: red;"><?php echo $username_err; ?></span>





            </div>
            <div center class="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">


                <label class="textfield outlined">
                    <input type="password" name="password" value="<?php echo $password; ?>" placeholder=" ">
                    <span>Password</span>

                </label><br>
                
                 <span style="color: red;"><?php echo $password_err; ?></span>




            </div>
            <div center class="<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">


                <label class="textfield outlined">
                    <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" placeholder=" ">
                    <span>Confirm Password</span>

                </label><Br>
                
                <span style="color: red;"><?php echo $confirm_password_err; ?></span>









            </div>
            <div center>
                <input type="submit" btn class="raised accent" value="Submit">
                <input type="reset" btn class="" value="Reset">
            </div>
            <p center>Already have an account? <a hyperlink href="login.php">Login here</a>.</p>
        </form>
    </div>




    <script src="https://amarius1.github.io/WavecomV/wavecom.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>