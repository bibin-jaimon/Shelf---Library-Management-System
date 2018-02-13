<?php

  //header('Content-Type: text/javascript');
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
  $query = $con->query("SELECT * from book_details");
  while($result = $query->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $result;
            //print(json_encode($myArray));
    }
    $data=json_encode($myArray);
    echo $data;
  }
?>
