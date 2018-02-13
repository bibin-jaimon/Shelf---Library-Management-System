<?php
  $password_flag=0;
  $username_flag=0;
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
        $data = json_decode(file_get_contents('php://input'), true);
        $username = $data['username'];
        $password = $data['password'];
        $result = $con->query("SELECT * FROM user_auth where username= '$username'");
        $check = $result->fetch_array(MYSQLI_ASSOC);

        if($check['role']=="admin" && $password == $check['password']){
          //code for admin page
          echo 'admin';
        }
        else if($check['role']=="librarian" && $password == $check['password']){
          //code for librarian page
          echo 'librarian';
        }
        else{
          echo '<span class="text">Please enter valid Credentials</span>';
        }
}
?>
