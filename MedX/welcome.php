<?php
// Initialize the session
session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://amarius1.github.io/WavecomV/wavecom.css" type="text/css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style type="text/css">

    </style>
</head>

<body style="background-image: linear-gradient(to left top, #002b6b, #0060ad, #0094bb, #00c48a, #4beb12); background-attachment:fixed; height:100%; overflow-x: hidden;">
    <section data-aos="fade-down" bar>
        <p data-aos="fade-right">Welcome back, <span style="position: relative; top: -8px; margin-bottom: -12px;" accent><?php echo htmlspecialchars($_SESSION["username"]); ?></span></p>

        <span actions>

            <span data-aos="fade-left" dropdown>
                <a btn icon class="activator">more_vert</a>
                <ul style="top: 2px" class="dd-menu">
                    <a href="reset-password.php" btn style="width: 154px;">Reset password</a>
                    <a href="logout.php" btn>Log out</a>
                </ul>
            </span>


        </span>
    </section>
    
    
    <main data-aos="fade-up" center>
    
    <H5>Your medical notifications</H5>
    
    <span card style="width: 400px; margin-top: 30px;">
        
        
         <p>Notifications: <?php  echo $_SESSION['notification']; ?> none</p>
        
    
    </span>
    
    
    
    
    </main>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://amarius1.github.io/WavecomV/wavecom.js"></script>
    <script>
        // drop down menu script
        $("[dropdown]").on("click", ".activator", function() {
            $('[dropdown]').removeClass('open');
            $(this).parent().toggleClass('open');

        });

        $(document).on("click", function(event) {
            var $trigger = $("[dropdown]");
            if ($trigger !== event.target && !$trigger.has(event.target).length) {
                $("[dropdown]").removeClass("open");

            }
        });

        $(document).ready(function() {
            $("button").click(function() {
                $(this).text($(this).text() == 'Order by Alphabet' ? 'Order by Category' : 'Order by Alphabet').fadeIn();
            });
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>