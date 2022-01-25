<?php require_once "controllerUserData.php"; ?>
<!-- we use require_once to embed the code from controllerUserData.php into this file  -->
<!-- if the specified file is not found it returns a fatal error -->

<!-- Html code begins here  -->
<!DOCTYPE html>

<!-- used to identify the language of text content on the webpage -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- character set used in this webpage is utf-8 -->

    <title>Forgot Password</title>
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
            <div class="col-md-4 offset-md-4 form">
            <!-- This class is used when the device size is medium or 
                   greater than 768px and the maximum width of container is 720px and 
                   you want the width equal to 4 columns. -->
                <form action="forgot-password.php" method="POST" autocomplete="">
                <!-- Submits the form data to same page using post method this submitted information goes to
                controllerUserData file which is embeded in this file  -->
                <!-- if the feild is left empty autocomplete assigns an empty string  -->
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <!-- Form Heading & message-->

                    <?php
                    // In case of any  error 
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <!-- Alret Box -->
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                    // Echoing the error in the alert box
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <!-- Input Field -->
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" 
                        placeholder="Enter email address" required value="<?php echo $email ?>">
                        <!-- Email Input Feild -->
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                        <!-- From button to submit the mail -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>