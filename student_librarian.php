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
  <link rel="stylesheet" href="styles1.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="script1.js"></script>
</head>
<body>

<div class="container">
  <nav class="navbar navbar-fixed-top">
  <div id="cssmenu" class="container">
  <ul>
    <li><a href="/lib/librarian.html">Home</a></li>
    <li><a href="/lib/student_librarian.php">Student</a></li>
    <li><a href="/lib/staff_librarian.php">Staff</a></li>

    <li><a href="/lib/issue_book.html">Issue Book</a></li>
    <li><a href="/lib/return_book.html">Return Book</a></li>

    <li><a href="/lib/search.html">Search</a></li>
    <li class="navbar-right"><a href="/lib/login.html"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
  </ul>
  </div>
  </nav>
</div>

<div class="container-fluid" style="margin-top:50px;">


        <h2 style="color: #448aff;text-align: center;"> STUDENT PORTAL </h2>
<hr>
  <table class="table table-striped">
     <thead>
        <tr class="row-name">
           <th>Issue ID</th>
           <th>Reg NO</th>
           <th>Name</th>
           <th>Branch</th>
           <th>ISBN</th>
           <th>Title</th>
           <th>Category</th>
           <th>Issue Date</th>
           <th>Due Date</th>

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
 $query = $con->query("SELECT * from student_librarian");
  while($result = $query ->fetch_array(MYSQLI_ASSOC)) {

        $str .='<tr class="row-content">
        <td >'. $result['id'] .'</td>
        <td >'. $result['student_id'] .'</td>
        <td >'. $result['name'] .'</td>
        <td >'. $result['branch'] .'</td>
        <td >'. $result['book_id'] .'</td>
        <td >'. $result['title'] .'</td>
        <td >'. $result['category'] .'</td>
        <td >'. $result['date_today'] .'</td>
        <td >'. $result['enddate'] .'</td>';


    }

  $str .=  '</tbody></table></div></body></html>';
echo $str;

}
 ?>
