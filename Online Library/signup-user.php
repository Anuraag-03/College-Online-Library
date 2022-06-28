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

    <title>Signup Form</title> 
    <!-- setting the title of the form -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- using bootstrap to set default styles for our form -->
    
    <link rel="stylesheet" href="style.css">
    <!-- changing few css elements according to our style  -->

</head>

<body>
<!-- Body Begins Here -->
    
    <div class="container"> 
    <!-- class named as container to apply css using class_name  -->

        <div class="row">
        <!-- Bootstrap property uses to hold columns in it -->
            <div class="col-md-4 offset-md-4 form">
                <!-- This is the white box in sign-up page used bootstrap class name to apply
                    default css properties  -->

                <!-- This class is used when the device size is medium or 
                   greater than 768px and the maximum width of container is 720px and 
                   you want the width equal to 4 columns. -->

                <form action="signup-user.php" method="POST" autocomplete="">
                <!-- Submits the form data to same page using post method this submitted information goes to
                controllerUserData file which is embeded in this file  -->
                <!-- if the feild is left empty autocomplete assigns an empty string  -->

                    <h2 class="text-center">Online Library SignUp Form</h2>
                    <p class="text-center">It's Quick and Easy.</p>
                    <!-- Form Heading & message-->

                    <?php
                    // In case of any single error 
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                        <!-- Alret Box -->
                            <?php
                            // Echoing the error in the alert box
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>

                        <?php
                    }
                    // If more than one error 
                    elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                            <!-- each error is displayed in the form of a list  -->
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Input details of the form -->
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" 
                          placeholder="Full Name" required value="<?php echo $name ?>">
                        <!-- Input for Name and it echoes the name entered before 
                        when move back to this page   -->
                    </div>

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

                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" 
                        placeholder="Confirm password" required>
                        <!-- Input for Confirm-Password -->
                    </div>

                    <div >
                        <p style="font-size:50%;">
                        * A minimum 8 characters password that contains a combination of 
                        uppercase, lowercase letter, digit and a special character are required.</p>
                        <!-- Password constraints -->
                    </div>

                    <div class="form-group">
                    <!-- Bootstrap property for submit button in forms -->
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                        <!-- Form submit button -->
                    </div>

                    <div class="link login-link text-center">
                        Already a member? 
                        <a href="login-user.php">Login here</a>
                        <!-- Link to Login Form using anchor tag if you already an user -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>