<?php
    

    $e_mail = $_POST['e_mail'];
    $password = $_POST['password'];

    
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "webwarden";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    $e_mail = stripcslashes($e_mail);
    $password = stripcslashes($password);
    $e_mail = mysqli_real_escape_string($conn, $_POST['e_mail']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn,"select e_mail,password from users where e_mail = '$e_mail' && password='$password' && prof='student'") 
                or die("failed to query database");

    $row = mysqli_fetch_array($result);
    if ($row['e_mail'] == $e_mail && $row['password'] == $password ){

        echo "Succesfully logged in Welcome " ;
        header("location: student.php");
    } else {
        echo "Make sure you are a student!
             Incorrect password or email
                Failed to login";
    }
    

?>