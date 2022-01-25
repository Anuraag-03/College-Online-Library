<?php require_once "controllerUserData.php"; ?>
<!-- we use require_once to embed the code from controllerUserData.php into this file  -->
<!-- if the specified file is not found it returns a fatal error -->


<!-- Html code begins here  -->
<!DOCTYPE html>

<html lang="en">
<!-- used to identify the language of text content on the webpage -->

<head>
    
    <meta charset="UTF-8">
    <!-- character set used in this webpage is utf-8 -->

    <title>Login Form</title>
    <!-- setting the title of the form -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- using bootstrap to set default styles for our form -->

    <link rel="stylesheet" href="style.css">
    <!-- changing few css elements according to our style  -->

</head>

<!-- Body Begins Here -->
<body>
    <div class="container">
    <!-- class named as container to apply css using class_name  -->
        <div class="row">
        <!-- Bootstrap property uses to hold columns in it -->
            <div class="col-md-4 offset-md-4 form login-form">
            <!-- This class is used when the device size is medium or 
              greater than 768px and the maximum width of container is 720px and 
             you want the width equal to 4 columns. -->

                <form action="login-user.php" method="POST" autocomplete="">
                <!-- Submits the form data to same page using post method this submitted information goes to
                controllerUserData file which is embeded in this file  -->
                <!-- if the feild is left empty autocomplete assigns an empty string  -->

                    <h2 class="text-center">ONLINE LIBRARY LOGIN</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <!-- Form Heading & message-->

                    <?php
                    // If Errors exist then display them in Alert Box  
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            // Error is displayed in the alert-box
                            ?>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Input details of the form -->
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" 
                        placeholder="Email Address" required value="<?php echo $email ?>">
                        <!-- Input for Email and it echoes the name entered before 
                        when move back to this page   -->
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password" 
                        placeholder="Password" required>
                        <!-- Input for Password -->
                    </div>

                    <div class="link forget-pass text-left">
                        <a href="forgot-password.php">Forgot password?</a>
                        <!-- Forgot Pasword redirects to Forgot-Password Page -->
                    </div>

                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                        <!-- Login Button -->
                    </div>
                    <div class="link login-link text-center">
                        Not yet a member? <a href="signup-user.php">Signup now</a>
                        <!-- if user is not a member this link redirects to sign-up page -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>