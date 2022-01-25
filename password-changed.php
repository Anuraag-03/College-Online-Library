<?php require_once "controllerUserData.php"; ?>
<!-- we use require_once to embed the code from controllerUserData.php into this file  -->
<!-- if the specified file is not found it returns a fatal error -->

<?php
// checking for intruders 
// if email is not set for the session variable then the user is an intruder 
// who tried to access the page using the url
if($_SESSION['info'] == false){
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
    <title>Login Form</title>
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
            <div class="col-md-4 offset-md-4 form login-form">
            <!-- This class is used when the device size is medium or 
               greater than 768px and the maximum width of container is 720px and 
               you want the width equal to 4 columns. -->
            <?php 
            // when user is redirected from new-password page
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                    <!-- alert box -->
                <?php echo $_SESSION['info']; ?>
                <!-- alerts message to redirect to login page -->
                </div>
                <?php
            }
            ?>
                <form action="login-user.php" method="POST">
                <!-- Submits the form data to same page using post method this submitted information goes to
                controllerUserData file which is embeded in this file  -->
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                        <!-- button to redirect to login page -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>