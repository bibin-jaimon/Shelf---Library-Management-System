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

        $date_today = date("d/m/Y");
        $this_day = date("d");
        $this_month= date("m");
        $this_year = date("Y");
        $result= $con->query("select available from book_details where id='$book_id'");
        $result = $result->fetch_array(MYSQLI_ASSOC);
  if($result['available']!=0){
        if($this_day==25){
          $this_month+=1;
          if($this_month==12){
            $this_year+=1;
          }
          $enddate = '1/'.$this_month.'/'.$this_year;
        }
       else if($this_day==26){
          $this_month+=1;
          if($this_month==12){
            $this_year+=1;
          }
          $enddate = '2/'.$this_month.'/'.$this_year;
        }
        else if($this_day==27){
          $this_month+=1;
          if($this_month==12){
            $this_year+=1;
          }
          $enddate = '3/'.$this_month.'/'.$this_year;
        }
        else if($this_day==28){
          $this_month+=1;
          if($this_month==12){
            $this_year+=1;
          }
          $enddate = '4/'.$this_month.'/'.$this_year;
        }
        else if($this_day==29){
          $this_month+=1;
          if($this_month==12){
            $this_year+=1;
          }
          $enddate = '5/'.$this_month.'/'.$this_year;
        }
        else if($this_day==30){
          $this_month+=1;
          if($this_month==12){
            $this_year+=1;
          }
          $enddate = '6/'.$this_month.'/'.$this_year;
        }else{
          $this_day+=6;
          $enddate= $this_day.'/'.$this_month.'/'.$this_year;
        }
        if($role=='student'){
          $student_id=$user_id;
          $con->query("INSERT INTO issue_book_student (book_id,student_id,date_today,enddate) values('$book_id','$student_id','$date_today','$enddate')");

          if($con->error){
            echo '<span class="text-danger"> Please enter valid details ! </span>';
          }
          else{
            $result= $con->query("select available from book_details where id='$book_id'");
            $result = $result->fetch_array(MYSQLI_ASSOC);
            $available = $result['available'] - 1;
            $con->query("update book_details set available ='$available' where id='$book_id'");
            echo '<span class="text-success"> Success</span>';
          }
        }
        else{
          $staff_id=$user_id;
          $con->query("INSERT INTO issue_book_staff (book_id,staff_id,date_today,enddate) values('$book_id','$staff_id','$date_today','$enddate')");
          if($con->error){
          //echo $con->error;
          echo '<span class="text-danger"> Please enter valid details ! </span>';
          }
          else{
            $result= $con->query("select available from book_details where id='$book_id'");
            $result = $result->fetch_array(MYSQLI_ASSOC);
            $available = $result['available'] - 1;
            $con->query("update book_details set available ='$available' where id='$book_id'");
            echo '<span class="text-success"> Success</span>';
          }
        }
      }
      else{
        echo '<span class="text-danger"> This book is not available</span>';
      }

  }
?>
