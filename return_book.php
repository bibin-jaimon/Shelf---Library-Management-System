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
    $book_id = $data['book_id'];
    $user_id = $data['user_id'];
    $role=$data['role'];


    if($role=="staff"){
      $result = $con->query("select book_id,staff_id from issue_book_staff where staff_id='$user_id' and book_id = '$book_id'");
      //echo $con->error;
      $result = $result->fetch_array(MYSQLI_ASSOC);
      if($result['book_id']==$book_id && $result['staff_id']==$user_id){
          $result = $con->query("delete from issue_book_staff where staff_id='$user_id' and book_id='$book_id'");
          //echo $result;
          if($con->error)
            echo '<span class="text-danger">error: '.$con->error.' </span>';
          else{
            $result= $con->query("select available from book_details where id='$book_id'");
            $result = $result->fetch_array(MYSQLI_ASSOC);
            $available = $result['available'] + 1;
            $con->query("update book_details set available ='$available' where id='$book_id'");
            echo '<span class="text-success">The Book with id '.$book_id.' has been returned Successfully </span>';
          }
      }
      else{
        echo '<span class="text-danger"> Error : There is no record exists with this details </span>';
      }

    }
    else if($role=="student"){
      $result = $con->query("select book_id,student_id from issue_book_student where student_id='$user_id' and book_id = '$book_id'");
      echo $con->error;
      $result = $result->fetch_array(MYSQLI_ASSOC);
      if($result['book_id']==$book_id && $result['student_id']==$user_id){
      $result = $con->query("delete from issue_book_student where student_id='$user_id' and book_id='$book_id'");
      //echo $result;
      if($con->error)
      echo '<span class="text-danger">error:'.$con->error.'</span>';
      else{
      $result= $con->query("select available from book_details where id='$book_id'");
      $result = $result->fetch_array(MYSQLI_ASSOC);
      $available = $result['available'] + 1;
      $con->query("update book_details set available ='$available' where id='$book_id'");
      echo '<span class="text-success">The Book with id '.$book_id.' has been returned Successfully </span>';
    }
    }
    else{
      echo '<span class="text-danger"> Error : There is no record exists with this details </span>';

    }
  }
}
  ?>
