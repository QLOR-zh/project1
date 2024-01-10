<?php
$firstName =  $_POST["firstName"];
$lastName =  $_POST["lastName"];
$emali = $_POST["emali"];

$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emaliError' => '',

];
if(!array_filter($errors)){
    $firstName =mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName =mysqli_real_escape_string($conn, $_POST['lastName']) ;
    $emali =mysqli_real_escape_string($conn, $_POST['emali']);

$sql = "INSERT INTO users(firstName, lastName, emali)
        VALUES('$firstName', '$lastName', '$emali')";


 if(empty($firstName)){
    $errors['firstNameError'] = 'يرجى ادخال الاسم الاول';

 }
 if(empty($lastName)){
    $errors['lastNameError'] = 'يرجى ادخال الاسم الاخير';
 }
 if(empty($emali)){
    $errors['emaliError'] = 'يرجى ادخال  الايميل';
 }
 elseif(!filter_var($emali, FILTER_VALIDATE_EMAIL)){
    $errors['emaliError'] = ' يرجى ادخال ايميل صحيح ';
 }
 
 
 
 else{
    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
     }else{
     echo 'Error:' . mysqli_error($conn);
     }

 }

}
