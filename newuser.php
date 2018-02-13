<?php
  $flag=0;
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
        $role = $data['role'];
        if($role=='student'){
          $fullname = $data['fullname'];
          $regno =  strtoupper($data['regno']);
          $rollno = $data['rollno'];
          $branch = $data['branch'];
          $result = $con->query("INSERT INTO student_details (name,regno,rollno,branch) values('$fullname','$regno','$rollno','$branch')");
          if($con->error){
          echo '<span class="text-danger"> '.$regno.' already exists</span>';

          }
          else{
          echo '<span class="text-success"> '.$fullname.' has been added</span>';
          }
        }
        else{
          $fullname = $data['fullname'];
          $department = $data['department'];
          $designation = $data['designation'];
          $staff_id = strtoupper($data['staff_id']);
          if(isset($staff_id)){
          $con->query("INSERT INTO staff_details (staff_id,fullname,department,designation) values('$staff_id','$fullname','$department','$designation')");
          if($con->error){
            echo '<span class="text-danger"> '.$staff_id.' already exists</span>';
          }
          else{
            echo '<span class="text-success"> '.$staff_id.' has been added</span>';
          }
        }

      }
}
?>
