<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body 
    {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    .sidenav 
    {
      height: 100%;
      width: 250px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #333;
      padding-top: 20px;
      display: flex;
      flex-direction: column;
    }

    .sidenav a 
    {
      padding: 4px 8px 8px 32px;
      text-decoration: none;
      font-size: 18px;
      color: #f2f2f2;
      display: block;
    }
    .sidenav img 
    {
      width: 60%;
      height: 20%;
      display: block;
      margin: 0 auto 20px;
      border-radius: 80%;
      overflow: hidden; 
    }

    .sidenav a:hover 
    {
      color: #c0c0c0;
    }

    .main 
    {
      margin-left: 250px;
      padding: 20px;
      flex: 1;
    }

    .topnav 
    {
      overflow: hidden;
      background-color: white;
      color:black;
    }

    .topnav a 
    {
      float: right;
      display: block;
      color:black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover 
    {
      background-color: #ddd;
      color: black;
    }

    .topnav a.logout 
    {
      float: right;
      width: 50px;
      background-color: #f44336;
      color: white;
    }

    .topnav a.logout:hover 
    {
      background-color: #b71c1c;
    }

    .topnav h2
    {
      text-align: right;
      margin-left: 270px;
    }

    .topnav h2, a
    {
      display: inline-block;
    }

    footer 
    {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .table-container 
    {
      margin-top: 20px;
      border: 2px solid black;
      margin-bottom: 40px;
    }

    .table-header 
    {
      background-color: #333;
      color: white;
      padding: 10px;
      font-weight: bold;
    }

    .table-content 
    {
      padding: 10px;
    }

    .sidenav h3
    {
      margin-left: 30px;
      margin-top: -18px;
      color: #f2f2f2;
    }

    .body.id author_name
    {
        flex: end;
    }

  </style>
</head>
<body>

<div class="topnav">
  <h2> Society Management System </h2>
  <a href="#" class="logout" onclick="logout()">Logout</a>
  <a href="/Society_Management/dashboard/services.php">Services</a>
  <a href="/Society_Management/dashboard/contact_us.php">Contact Us</a>
  <a href="/Society_Management/dashboard/about_us.php">About Us</a>

</div>

<div class="sidenav">
  <img src="/Society_Management/images/user_default.png" alt="Society Logo">
  <h3> 
    <?php 
      if(isset($_SESSION['member_id'])) 
      {
        $member_id = $_SESSION['member_id'];
      } 
      else 
      {
        echo "<script> alert('member_id does not exist');</script>";
      }    
      $con = pg_connect("host=localhost port=5432 dbname=society_management user=postgres password=postgres") or die("Can't connect to database !!!<br>");
      $qry = "select first_name, last_name from member where member_id = $member_id";
      $rs = pg_query($con, $qry);
      $row = pg_fetch_row($rs);
      $fname = $row[0];
      $lname = $row[1];
      echo "$fname $lname";
      
    ?>  
  </h3>
  <?php 
    $qry = "select member_type from member where member_id = $member_id";
    $rs = pg_query($con,$qry);
    $row = pg_fetch_row($rs);
    $member_type = $row[0];
    
    if($member_type == "admin")
    {
  ?>
    <a href="/Society_Management/dashboard/index_admin.php">Home</a>
  <?php
    }
    else if($member_type == "member")
    {
  ?>
    <a href="/Society_Management/dashboard/index_member.php">Home</a>
  <?php
    }
  ?>

  
  <a href="/Society_Management/dashboard/profile.php">Profile</a>
  <a href="/Society_Management/dashboard/about_society.php">About Society</a>
  <a href="/Society_Management/dashboard/funds.php">Funds</a>
  <a href="/Society_Management/dashboard/notices.php">Notice</a>

  <?php
    if($member_type == "admin")
    {
  ?>
      <a href="/Society_Management/dashboard/authentications.php">Authentications</a>
  <?php
    }
  ?>
  <a href="/Society_Management/dashboard/docs.php">Upload/View Documents</a>
  <a href="/Society_Management/dashboard/bills.php">Bills</a>
  <a href="/Society_Management/dashboard/events.php">Events</a>
  <a href="/Society_Management/dashboard/complaints.php">Complaints</a>
  <a href="/Society_Management/dashboard/amenities.php">Amenities</a>
  <a href="/Society_Management/dashboard/visitor_log.php">Visitor Log</a>
  <a href="/Society_Management/dashboard/feedback.php">Feedback</a>  
</div>



<div class="main">
<div class="table-container">
    <div class="table-header">Announcements & Notices</div>
    <div class="table-content">
      <?php
        $qry = "select society_id from member where member_id = $member_id";
        $rs = pg_query($con,$qry);
        $row = pg_fetch_row($rs);
        $society_id = $row[0];

        $qry = "select * from announcement where society_id = $society_id";
        $rs = pg_query($con,$qry);
      
        if(pg_num_rows($rs) == 0)
        {
          echo "No Announcements!!!<br><br>";
        }
        else
        {
          while($row = pg_fetch_assoc($rs))
          {
            $announcement_id = $row['announcement_id'];
            $title = $row[title];
            $content = $row['content'];
            $author_id = $row['author_id'];
            $announcement_type = $row['announcement_type'];
            
            $qry1 = "select first_name,last_name from member where member_id = $author_id";
            $rs1 = pg_query($con,$qry1);
            $row = pg_fetch_row($rs1);
            $first_name = $row[0];
            $last_name = $row[1];

            echo "Announcement ID : $announcement_id <br>";
            echo "Title : $title<br>";
            echo "Content : $content <br>";
            echo "Announcement Type : $announcement_type <br>";

            echo "<div style='text-align: right;'><span id='author_name'> Modified By: $first_name $last_name </span><br><br></div>";

        
        }
    }
    echo "<a href='/Society_Management/dashboard/add_notices.php'>Add New Notices</a>";

      ?>
    </div>
  </div>

  
</div>

<footer>
  &copy; 2024 Society Management System. All rights reserved.
</footer>

<script>
    function logout() 
    {
      window.location.href = "/Society_Management/authentication/logout.php";
    }
  </script>

</body>
</html>
