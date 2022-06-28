<?php require_once "controllerUserData.php"; ?>
<!-- we use require_once to embed the code from controllerUserData.php into this file  -->
<!-- if the specified file is not found it returns a fatal error -->

<?php 
// checking for intruders 
// if email is not set for the session variable then the user is an intruder 
// who tried to access the page using the url
$email = $_SESSION['email'];
if($email == false){
    // if user is intruder redirect him to login-user page
  header('Location: login-user.php');
}
?>

<!-- Html code begins here  -->
<!DOCTYPE html>
<!-- used to identify the language of text content on the webpage -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- used to identify the Character set  -->
    <title>Create a New Password</title>
    <!-- Title of the webpage -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- using bootstrap to set default styles for our form  -->
    <link rel="stylesheet" href="style.css">
    <!-- changing few css elements according to our style  -->
</head>
<!-- Body Begins Here -->
<body>
    <div class="container">
    <!-- class named as container to apply css using class_name   -->
        <div class="row">
        <!-- To use default Bootstrap Properties -->
            <div class="col-md-4 offset-md-4 form">
            <!-- This class is used when the device size is medium or 
               greater than 768px and the maximum width of container is 720px and 
               you want the width equal to 4 columns. -->
                <form action="new-password.php" method="POST" autocomplete="off">
                <!-- Submits the form data to same page using post method this submitted information goes to
                    controllerUserData file which is embeded in this file  -->
                    <h2 class="text-center">New Password</h2>
                    <!-- Form Heading -->
                    <?php 
                    // when user is redirected from forgot-password page
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <!-- alert box -->
                            <?php echo $_SESSION['info']; ?>
                            <!-- echoes the message that OTP is sent to the mail -->
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <!-- alert box -->
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            // displaying the errors in alert box
                            ?>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password" 
                         placeholder="Create new password" required>
                         <!-- Password Feild -->
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" 
                         placeholder="Confirm your password" required>
                         <!-- Confirm Feild -->
                    </div>

                    <div >
                        <p style="font-size:50%;">
                        * A minimum 8 characters password that contains a combination of 
                        uppercase, lowercase letter, digit and a special character are required.</p>
                        <!-- Password constraints -->
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                        <!-- Change Password Button  -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>