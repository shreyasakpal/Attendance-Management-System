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
      <!-- this script got from www.javascriptfreecode.com-Coded by: Krishna Eydat -->
<!-- Print Page Script
Use this script to have your
users print your HTML page
-->




<center>
<br />
<?php
echo "Today is " . date("m/d/Y") . "<br><br><br><br>";
?>
<form action="" method="POST" >


<?php
$conn= new mysqli("localhost", "root", "", "webwarden");

    $sql = "select r_no,value from defaulter where value<0.7000";




$result = $conn->query($sql);
if ($result && $result->num_rows >0) {
    echo "<table width='1300' border='6'> 
        
<tr>

<th width='100'>Roll no</th>
<th width='100'>Attendance</th>
</tr>"; 
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr> ";

echo "<td align='center'>" . $row['r_no'] . "</td>";
echo "<td align='center'>" . $row['value'] . "</td>";

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
<br>
<br>
<br>
<br>
<br>
<br>



<SCRIPT LANGUAGE="JavaScript">
if (window.print) {
document.write('<form> '
+ '<input type=button class="button2 button3" name=print value="Print defaulter List" '
+ 'onClick="javascript:window.print()"> </form>');
}
// End -->
</script>





</form>

