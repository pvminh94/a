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
if(empty($))
?>
