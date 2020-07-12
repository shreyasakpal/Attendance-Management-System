<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$m_no = $_POST['m_no'];
$e_mail = $_POST['e_mail'];
$college = $_POST['college'];
$gender = $_POST['gender'];
$prof = $_POST['prof'];
$password = $_POST['password'];
$r_no = $_POST['r_no'];
$class = $_POST['class'];
$branch = $_POST['branch'];


if (!empty($fname)|| !empty($lname) || !empty($username) ||!empty($m_no) || !empty($e_mail) || !empty($college) ||!empty($gender) ||!empty($prof) ||!empty($password) || !empty($r_no)|| !empty($class)|| !empty($branch) ) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "webwarden";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT e_mail FROM users WHERE e_mail = ? LIMIT 1";
     $INSERT = "INSERT INTO users (fname, lname, username, m_no, e_mail, college, gender, prof, password, branch, r_no, class) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $e_mail);
     $stmt->execute();
     $stmt->bind_result($e_mail);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssssssss", $fname, $lname, $username, $m_no, $e_mail, $college, $gender, $prof, $password, $r_no, $class, $branch);
      $stmt->execute();
      echo "Registered sucessfully";
      
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All fields are required";
 die();
}
?>