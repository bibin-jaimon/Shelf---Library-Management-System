<?php
$str = '<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <title>Student Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="main.css" rel="stylesheet" type="text/css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="script.js"></script>
</head>
<body>

<div class="container-fluid">
  <nav class="navbar navbar-fixed-top">
  <div id="cssmenu">
  <ul>
    <li ><a href="/lib/admin.html">Home</a></li>
    <li><a href="/lib/shelf.html">Shelf</a></li>
    <li><a href="/lib/student_portal.php">Student Portal</a></li>
    <li><a href="/lib/staff_portal.php">Staff Portal</a></li>
    <li><a href="/lib/newbook.html">Add new Book</a></li>
    <li><a href="/lib/newuser.html">Add new User </a></li>
    <li class="navbar-right"><a href="/lib/login.html"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
  </ul>
  </div>
  </nav>
</div>

<div class="container" style="margin-top:80px;">


        <h2 style="color: #448aff;text-align: center;"> STUDENT PORTAL </h2>
<hr>
  <table class="table table-striped">
     <thead>
        <tr class="row-name">
           <th>Reg. No.</th>
           <th>Name</th>
           <th>Rollno</th>
           <th>Branch</th>
        </tr>
     </thead>
     <tbody id="tabcontent">';

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
  $query = $con->query("SELECT * from student_details order by name");
  while($result = $query ->fetch_array(MYSQLI_ASSOC)) {

        $str .='<tr class="row-content">
        <td >'. $result['regno'] .'</td>
        <td >'. $result['name'] .'</td>
        <td >'. $result['rollno'] .'</td>
        <td >'. $result['branch'] .'</td>';


    }

  $str .=  '</tbody></table></div></body></html>';
echo $str;
}
 ?>
