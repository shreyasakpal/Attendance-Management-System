<!Doctype html>
<html lang="en">
<meta charset="UTF-8">
<head>
	<title>Login</title>
    <link rel="stylesheet" href="css/st.css">
</head>
<body>
	<span class="topnav">
		<a href="home1.html">HOME</a> &nbsp; &nbsp; &nbsp;
 		<a href="mooc.html">MOOC Courses</a>&nbsp; &nbsp; &nbsp;
		<a href="syllabus.html">Syllabus</a>&nbsp; &nbsp; &nbsp;
        <a href="upload.html">POST</a> &nbsp; &nbsp; &nbsp;
        <a href="subject.html">Attendance</a> &nbsp; &nbsp; &nbsp;
        <a href="stime.html">TIMETABLE</a> &nbsp; &nbsp; &nbsp;
	</span>
    <!-- this script got from www.javascriptfreecode.com coded by: Krishna Eydat-->
<html>
<head>
<script language="javascript" type="text/javascript">
alert("Welcome")
</script>
</head>
</html>       


    <br>
    <br>
    <br>

	<?php

$dir_path = "uploads/";
$extensions_array = array('jpg','png','jpeg','gif');

if(is_dir($dir_path))
{
    $files = scandir($dir_path);
    
    for($i = 0; $i < count($files); $i++)
    {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            // get file name
            echo "File Name -> $files[$i]<br>";
            
            // get file extension
            $file = pathinfo($files[$i]);
            $extension = $file['extension'];
            
            
           // check file extension
            if(in_array($extension, $extensions_array))
            {
            // show image
            echo "<img src='$dir_path$files[$i]' style='width:100px;height:100px;'><br>";
            }
        }
    }
}
?>


            </body>
            </html>