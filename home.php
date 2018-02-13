<?php
   //header('Content-Type: text/javascript');
   $count = array(
     $staff_count => 0,
     $student_count => 0
   );
   error_reporting(E_ALL);
   ini_set('display_errors', '1');
   $host="localhost";
   $username="root";
   $password ="bibin@9496";
   $database="lib";
   $con= new MySQLi($host,$username,$password,$database);
  if($con->connect_errno)
      echo "unable to establish connection";
  else{
    $query = $con->query("SELECT * from staff_count");
    $staff_count = $query->fetch_array(MYSQLI_ASSOC);
    //echo $con->error;
    $query = $con->query("SELECT * from student_count");
    $student_count = $query->fetch_array(MYSQLI_ASSOC);
    $count['staff_count'] = $staff_count['no_of_staff'];
    $count['student_count'] = $student_count['no_of_students'];
    echo json_encode($count);
    }
?>
