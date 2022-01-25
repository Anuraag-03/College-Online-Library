<?php 
session_start();
// starts the session

require "connection.php";
// users the Userform-DB whenever required

$email = "";
$name = "";
$errors = array();
// Setting name, email and errors as empty strings and empty array

//if user clicks signup button
if(isset($_POST['signup'])){

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    // Here mysqli_real_escape_string() function converts inputs obtained from form to legeal SQL string 
    // by removing special characters so that they can be used in Queries

    //  to check for password constraints
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
   // preg_match() it returns a boolean value true if any of the sequence specified in parameter 
   // is found in the string passed else it returns false

   // Password Constraint check
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) 
     {
        // if constraints not met then add the error in errors array as key-value pair
        $errors['password'] = "Give a Strong Password !";

     }

    if($password !== $cpassword){
        // if password entered and confirm-password are not equal
        // then add the error in errors array as key-value pair
        $errors['password'] = "Confirm password not matched!";
    }
    
    // Checking if the mail already exits
    // Corresponding SQL query
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    // the  obtained result-table is collected in res variable 
    $res = mysqli_query($con, $email_check); 

    // if number of rows in res table are more than 0 i.e the email already exists
    if(mysqli_num_rows($res) > 0){
        //add the error in errors array as key-value pair
        $errors['email'] = "Email that you have entered is already exist!";
    }
    
    // if there are no errors in errors array than execute the following block 
    if(count($errors) === 0){
        
        // hash the password using strong one way hash algorithm 
        // Here I am using BlowFish algorithm which gives an 60 character string as o/p
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        
        // Generating Otp using rand function 
        $code = rand(999999, 111111);

        //The user is Un-Verified as of now 
        $status = "notverified";

        // insert query using SQL accepted strings stored as php variables
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        
        // Performing insert operation
        $data_check = mysqli_query($con, $insert_data);

        // On successfull Insertion
        if($data_check){
            // subject, message and sender details  
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            
            // I am using my personal mail 
            // make changes accordingly to the SMTP settings of the mail and system 
            // U may need to change some configurations in XAMPP to use SMTP
            $sender = "From: anuraag.cbit@gmail.com";

            // if successful in sending mail
            if(mail($email, $subject, $message, $sender)){
                // setting session variables 
                // inorder to restrict intruders using the url to access the page
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                // redirecting to user-otp page
                header('location: user-otp.php');
                exit();
            }
            // Upon failure of sending the mail through mail
            else{
                // load the error array with this otp-error as key-value pair
                $errors['otp-error'] = "Failed while sending code!";
            }
        }
        // upon failure in inserting into the database 
        else{
            // load the error array with this db-error as key-value pair
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}

//if user clicks verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = ""; 
        // setting info to empty string so that when user tries accessing the page
        // using back button of browser 

        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        // converting to acceptable sql string format 

        // selecting the tuple where the code is equal to  otp entered by user (query)
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        
        // finding the result of the query 
        $code_res = mysqli_query($con, $check_code);

        // if the otp entered by user found in DB
        if(mysqli_num_rows($code_res) > 0){

            $fetch_data = mysqli_fetch_assoc($code_res);
            // fetches the result as an associative array with key-value pairs

            $fetch_code = $fetch_data['code']; // code from the associative array using key 
            $email = $fetch_data['email']; // email from the associative array using key 
            $name = $fetch_data['name']; // name from the associative array using key 

            $code = 0; // change the code attr to 0 once the user enters correct OTP
            $status = 'verified'; // change the status to verified

            // SQL query
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            // Update using the query  
            $update_res = mysqli_query($con, $update_otp);
            // If update successful
            if($update_res){
                // Set Session Variables
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                // redirect to home dash board of the student
                header('location: home.php');
                exit();
            }
            // Database update error 
            else{
                $errors['db-error'] = "Failed while updating code!";
                // add the error in errors array
            }
        }
        // Incorrect OTP entered
        else{
            $errors['otp-error'] = "You've entered incorrect code!";
            // add the error in errors array as key-value pair
        }
    }

//if user click login button
    if(isset($_POST['login'])){
        // converting login form data to acceptable SQL strings
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        // checks for the mail in Userform-DB
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $check_name = "SELECT name FROM usertable WHERE email = '$email'";

        $res1 = mysqli_query($con, $check_name); // query to find name if it exists for the mail id
        $res = mysqli_query($con, $check_email); // to pass on as session variable 
        
        // if user mail found in Userform-DB
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res); // returns the associate array of the query result
            $fetch_pass = $fetch['password']; // accessing password using associate array 
            $fetch1 = mysqli_fetch_assoc($res1); // accessing name using associate array 
            
            $name = $fetch1['name']; // To pass on to session variable

            // checks if password in DB and password entered are same after hashing and comparing it with encrypt
            if(password_verify($password, $fetch_pass)){
                // setting session variables
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                // If verified user 
                if($status == 'verified'){
                // Session Variables
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  $_SESSION['name']=$name;
                  header('location: home.php'); // Redirects to student dashboard
                }
                // if not verified user ask for otp
                else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    // redirects to otp page if not verified user
                    header('location: user-otp.php');
                }
            }
            // If user enters incorrect password
            else{
                $errors['email'] = "Incorrect email or password!";
            }
        }
        // If mail not present in DB
        else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

//if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        // converting to SQL supported string format
        $email = mysqli_real_escape_string($con, $_POST['email']);
        // checking if the mail is present in DB query
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        // searching for the query
        $run_sql = mysqli_query($con, $check_email);

        // if the mail is found in DB
        if(mysqli_num_rows($run_sql) > 0){
            // generating OTP using rand function
            $code = rand(999999, 111111);
            // Update the code in tuple where email was found (query)
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            // Updating the record in DB with new reset OTP
            $run_query =  mysqli_query($con, $insert_code);
            // if update successfull
            if($run_query){
                // subject, message, sender required for sending mail through SMTP
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: anuraag.cbit@gmail.com";
                // If mail was sent successfully
                if(mail($email, $subject, $message, $sender)){
                    // setting session variables
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    // redirect to reset-code php file
                    header('location: reset-code.php');
                    exit();
                }
                // if unable to send the mail 
                else{
                    $errors['otp-error'] = "Failed while sending code!";
                    // add the error into errors using key-value pairs
                }
            }
            // if update was unsuccessful
            else{
                $errors['db-error'] = "Something went wrong!";
            }
        }
        // if mail doesn't exist in the DB
        else{
            $errors['email'] = "This email address does not exist!";
        }
    }

//if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        // setting info to empty string so that when user tries accessing the page
        // using back button of browser
        $_SESSION['info'] = "";
        // converting to valid SQL string format
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        // query to find the otp from the Userform_DB
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        // searching the query
        $code_res = mysqli_query($con, $check_code);
        
        // if the result is found 
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res); // converts the found record into associate array
            // creating session variables
            $email = $fetch_data['email']; 
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            // redirects to new-password page
            header('location: new-password.php');
            exit();
        }
        // if otp enterd is incorrect 
        else{
            $errors['otp-error'] = "You've entered incorrect code!";
            // add the error in errors array using key-value pair
        }
    }

//if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = ""; 
        // setting info to empty string so that when user tries accessing the page
        // using back button of browser

        // converting to Compatible SQL string format
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        
        // Password Constraints
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

    
        // Checking for Password Constraints
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) 
     {
        // if constraints failed add the error in errors array
        $errors['password'] = "Give a Strong Password !";

     }
     // if password and confirm-Passoword are not equal
     if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
        // add the error in errors array
    }
    // if no errors
    else{
            $code = 0; // update the code to 0
            $email = $_SESSION['email']; //getting email using session session variable
            $encpass = password_hash($password, PASSWORD_BCRYPT);  // hash the passoword usng BlowFish algo 

            // query to update the password
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            // Updating in the database
            $run_query = mysqli_query($con, $update_pass);
            // if successfully updadated
            if($run_query){
                // setting session variables
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                // redirect to Passwoerd-changed page so that user can be redirected further to login page
                header('Location: password-changed.php');
            }
            // Datebase error in updating the password
            else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
//if login now button click
    if(isset($_POST['login-now'])){
        // redirects to login page from password-changed page
        header('Location: login-user.php');
    }
?>