<?php

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "webwarden";
    //create connection
    $link = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $attendance=$_POST['attendance'];
        $date = $_POST['date'];
        $subject = $_POST['subject'];
        

        $query="select distinct date,subject from class1";
        $result=$link->query($query);
        $b=false;
        if($result->num_rows>0){
            while ($check=$result->fetch_assoc()) {
                
                if($date==$check['date'] && $subject==$check['subject']){
                    $b=true;
                    echo "<div class='alert alert-danger'>
                    Attendance taken today;
                    </div>";
                }
            }
        }
                if(!$b){
                    foreach ($attendance as $key => $value) {
                        if($value=="present"){
                            $query="insert into class1(date,subject,r_no,attendance,value) values('$date','$subject',$key,'present',1)";
                            $insertResult=$link->query($query);
                        }
                        else{
                            $query="insert into class1(date,subject,r_no,attendance,value) values('$date','$subject',$key,'absent',0)";
                            $insertResult=$link->query($query);   
                        }
                    }

                    if($insertResult){
                        echo "<div class='alert alert-danger'>
                    Attendance taken succesfully;
                    </div>";

                    }
                }
        

    }

?>