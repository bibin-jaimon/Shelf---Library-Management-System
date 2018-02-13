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
        $data = json_decode(file_get_contents('php://input'), true);
        $title = $data['title'];
        $author = $data['author'];
        $category = strtoupper($data['category']);
        $count = $data['count'];
        $result=$con->query("INSERT INTO book_details (title,author,category,count,available) values('$title','$author','$category','$count','$count')");
        if($con->error){
        //  echo $con->error;
        echo '<span class="text-danger"> '.$title.' already exists </span>';
        }
        else{
        echo '<span class="text-success"> '.$title.' has been added</span>';
        }
}
?>
