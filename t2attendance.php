<!Doctype html>
<html lang="en">
<meta charset="UTF-8">
<head>
<title>Class2 Attendance</title>


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
.button2 {
  background-color: #AFEEEE; 
  color: black; 
  margin-left: 38%;
  margin-top: 10px;
  border: 2px solid #3b7687;
  border-radius: 10px;
  color: darkcyan;
  font-size: 30px;
  font-family:"Comic Sans MS", cursive, sans-serif;
}

.button3:hover {
    background-color: darkcyan;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    border-radius: 12px;
    color: aqua;
}
.wrapper {
    text-align: center;
}

.button {
    position: absolute;
    top: 100%;

}
</style>
    <body>
      
<center>
<br />
<?php
echo "Today is " . date("d/m/Y") . "<br><br><br><br>";
?>
<form action="insert.php" method="POST" >

Select Date:<input type="date" name="date">&nbsp; &nbsp; &nbsp; &nbsp;

Class:<select name="class"><option value="2">Class 2</option></select>&nbsp; &nbsp; &nbsp; &nbsp;

Select Subject:<select name="subject">
                        <option value="ip">IP</option>
                        <option value="cns">CNS</option>  
                        <option value="mep">MEP</option>
                        <option value="admt">ADMT</option>
                        <option value="adsa">ADSA</option>
                        <option value="bce">BCE</option>
                        </select>
                        <br>
                        <br>
                        <br>
<?php
$conn= new mysqli("localhost", "root", "", "webwarden");

    $sql = "SELECT * FROM users where prof='student' and class='class2' order by r_no";



$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table width='1300' border='6'> 

<tr>

<th width='100'>Roll no</th>
<th width='100'>Firstname</th>
<th width='100'>Lastname</th>
<th width='100'>Class</th>
<th width='100'>Attendance</th>
</tr>"; 
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr> ";

echo "<td align='center'>" . $row['r_no'] . "</td>";
echo "<td align='center'>" . $row['fname'] . "</td>";
echo "<td align='center'>" . $row['lname'] . "</td>";
echo "<td align='center'>" . $row['class'] . "</td>";

?>


<td align='center'> 
              <label><input required type="radio" name="attendance[<?php echo $row['r_no']; ?>]"  value="present" >Present</label> 
&emsp;
<label><input required type="radio" name="attendance[<?php echo $row['r_no']; ?>]" value="absent" >Absent</label><br /> <br />

 </td>
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


<div class="wrapper" style="text-align: center">

<input type="submit" class="button2 button3" name="submit" value="Submit">
</div>





</form>
<div align="right">
 <a href="class.html"><h3>Back</h2></a>
</div>