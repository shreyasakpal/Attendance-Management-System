<!Doctype html>
<html lang="en">
<meta charset="UTF-8">
<head>
<title>Attendance</title>

</head>
<style>
     body { 
          
  background-color: lightcyan;
  
  background-attachment: scroll;

         background-size: cover;
         background-repeat: no-repeat;
         min-height: 100%;
         overflow-y: auto; 
         }
         img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
    <body>
<center>
<br />
<?php
echo "Today is " . date("m/d/Y") . "<br><br><br><br>";
?>
<form action="" method="POST" >


<?php
$conn= new mysqli("localhost", "root", "", "webwarden");

    $sql = "select users.fname, class1.* from class1 inner join users on class1.r_no = users.r_no where subject='cns' and class='class2' order by r_no";



$result = $conn->query($sql);
if ($result && $result->num_rows >0) {
    echo "<table width='1300' border='6'> 
        
<tr>
<th width='100'>Name</th>
<th width='100'>Date</th>
<th width='100'>Roll no</th>
<th width='100'>Attendance</th>
</tr>"; 
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr> ";
echo "<td align='center'>" . $row['fname'] . "</td>";
echo "<td align='center'>" . $row['date'] . "</td>";
echo "<td align='center'>" . $row['r_no'] . "</td>";
echo "<td align='center'>" . $row['attendance'] . "</td>";

?>



<?php 
echo " </tr>";

     }
     echo "</table>";
} 
else {
     echo "0 results";
}
$conn->close();
?>   



<br>
<br>










</form>
<div align="right">
 <a href="v.php"><h3>Back</h2></a>
</div>