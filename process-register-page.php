<?php
//Check that form has been submitted:
$errors = array();//Initialize an error array.
//Check for a first name:
$first_name =trim($_POST['first_name']);
if (empty($first_name)){
    $errors[]='You forgot to enter your fist name.';
}
//Check for a last name:
$last_name = trim($_POST['last_name']);
if(empty($last_name)){
    $errors[]='You forgot to enter your last name.';
}
$email =trim($_POST['email']);
if(empty($email)){
    $errors[]='You forgot to enter your email';
}
// Check for a password and match against the confirmed password:
$password1 = trim($_POST['password1']);
$password2 = trim($_POST['password2']);
if(!empty($password1)){
    if($password1!==$password2){
        $errors[]='You two password did not match.';
    }
}
else
    $errors[]='You forgot to enter your password.';
if(empty($errors))
{
    try
    {
        $hashed_passcode = password_hash($password1,PASSWORD_DEFAULT);
        require('mysqli_connect.php');
        $query = "INSERT INTO users(userid, first_name, last_name, email,password,registration_date)";
        $query.="VALUES('',?,?,?,?,NOW())";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q,$query);
        //bind fields to SQL statement
        mysqli_stmt_bind_param($q,'ssss',$first_name,$last_name,$email,$hashed_passcode);
        mysqli_stmt_execute($q);
        if(mysqli_stmt_affected_rows($q)==1)
        {
            $dbcon->close();
            header("location:register-thanks.php");
            exit();
        }
        else
        {
            $errorstring = "<p class='text-center col-sm-8' style ='color:red'>";
            $errorstring.="System Error<br/>You could not be registerd due";
            $errorstring .= "to a system error. We apologize for any inconvenience.</p>";
              echo "<p class=' text-center col-sm-2' style ='color:red'>$errorstring</p>";
            mysqli_close($dbcon);
            echo '<footer class="jumbotron text-center col-sm-12" style="padding-bottom:1px; padding-top:8px;"> include("footer.php"); </footer>';
            exit();
        }
    }
    catch (Exception $e)
    {
        print"The system is busy please try later";
    }
    catch (Error $e)
    {
        print "The system is busy please try again later.";
    }
}
else
{
    $errorstring = "Error! The following error(s) occurred:<br>";
    foreach ($errors as $msg)
    {
        $errorstring.="$msg<br>\n";
    }
    $errorstring .= "Please try again.<br>";
    echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
}
?>
