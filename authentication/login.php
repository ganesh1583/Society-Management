<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body 
    {
      margin: 0;
      padding: 0;
      background: linear-gradient(120deg, #3498DB, #9B59B6);
      height: 100vh;
      overflow: hidden;
      background: url('/Society_Management/images/login_image.jpg');
      background-size: cover;
      background-size: 125%;
    }

    #navbar 
    {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 97%;
      height: 55px;
      background-color: #333;
      padding: 0 20px;
    }

    #navbar h2 
    {
      margin: 0;
      color: #fff;
    }

    #navbar a 
    {
      color: #fff;
      text-decoration: none;
      padding: 15px 20px;
    }

    #navbar a:hover 
    {
      background-color: #ddd;
      color: black;
    }

    .center 
    {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      background: #ECF0F1;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      box-sizing: border-box;
    }

    .center input 
    {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    .center h1 
    {
      text-align: center;
      padding: 20px 0;
      border-bottom: 1px solid silver;
    }

    .center form 
    {
      padding: 0 40px;
      box-sizing: border-box;
    }

    form .txt_field 
    {
      position: relative;
      border-bottom: 2px solid #adadad;
      margin: 30px 0;
    }

    .txt_field input 
    {
      width: 100%;
      padding: 0 5px;
      height: 40px;
      font-size: 16px;
      border: none;
      background: none;
      outline: none;
    }

    .txt_field label 
    {
      position: absolute;
      top: 50%;
      left: 5px;
      color: #adadad;
      transform: translateY(-50%);
      font-size: 16px;
      pointer-events: none;
      transition: .5s;
    }

    .txt_field span::before 
    {
      content: '';
      position: absolute;
      top: 40px;
      left: 0;
      width: 0%;
      height: 2px;
      background: #2691d9;
      transition: .5s;
    }

    .txt_field input:focus ~ label,
    .txt_field input:valid ~ label 
    {
      top: -5px;
      color: #2691d9;
    }

    .txt_field input:focus ~ span::before,
    .txt_field input:valid ~ span::before 
    {
      width: 100%;
    }

    .pass 
    {
      margin: -5px 0 20px 5px;
      color: #a6a6a6;
      cursor: pointer;
    }

    .pass:hover 
    {
      text-decoration: underline;
    }

    input[type="submit"] 
    {
      width: 100%;
      height: 50px;
      border: 1px solid;
      background: #2691d9;
      border-radius: 25px;
      font-size: 18px;
      color: #e9f4fb;
      font-weight: 700;
      cursor: pointer;
      outline: none;
    }

    input[type="submit"]:hover 
    {
      border-color: #2691d9;
      transition: .5s;
    }

    .login_link 
    {
      margin: 30px 0;
      text-align: center;
      font-size: 16px;
      color: #666666;
    }

    .login_link a 
    {
      color: #2691d9;
      text-decoration: none;
    }

    .login_link a:hover 
    {
      text-decoration: underline;
    }

    footer 
    {
      background-color: #333;
      padding: 15px;
      text-align: center;
      color: white;
      position: fixed;
      bottom: 0;
      width: 100%;
      height: 3%;
    }

    .footer-content 
    {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 80%;
      margin: 0 auto;
    }

    .fp
    {
      color: blue;
    }

  </style>
</head>
<body>

  <div id="navbar">
    <h2> Society Management System </h2>
    <nav>
      <a href="/Society_Management/dashboard/about_us.php"> About Us </a>
      <a href="/Society_Management/dashboard/contact_us.php"> Contact Us </a>
      <a href="/Society_Management/dashboard/services.php"> Services </a>
    </nav>
  </div>

  <div class="center">
    <h1> Login </h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

      <div class="txt_field">
        <input type="text" name="username" required>
        <label> Username </label>
      </div>

      <div class="txt_field">
        <input type="password" name="password" required>
        <label> Password </label>
      </div>


      <input type="submit" value="Login">

      <div class="login_link">
        Not a member? <a href="/Society_Management/authentication/admin_signup1.php">Signup</a>
      </div>

    </form>
  </div>


  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $username = $_POST["username"];
      $password = $_POST["password"];

      $con = pg_connect("host=localhost port=5432 dbname=society_management user=postgres password=postgres") or die("Cant connect to database !!!<br>");
      $qry = "SELECT COUNT(username) FROM credentials WHERE username='$username'";
      $rs = pg_query($con, $qry) or die("Can't access information !!!<br>");
      $row = pg_fetch_row($rs);
      $count = $row[0];

      if($count == 0)
      {
        echo" <script>alert('Incorrect Username!!!')</script> ";
      }
      else if($count == 1)
      {
          $qry = "select password from credentials where username='$username'";
          $rs = pg_query($con, $qry);
          $row = pg_fetch_row($rs);
          $password2 = $row[0];

          if(strcmp($password,$password2) == 0)
          {
              $qry = "select member_id from credentials where username='$username' and password='$password'";
              $rs = pg_query($con,$qry);
              $row = pg_fetch_row($rs);
              $member_id = $row[0];

              $qry = "select member_type from member where member_id = $member_id";
              $rs = pg_query($con,$qry);
              $row = pg_fetch_row($rs);
              $member_type = $row[0];

              pg_close($con);


              $_SESSION['member_id'] = $member_id;
            

            
              if($member_type == "admin")
              {
                echo '<script>window.location.href = "/Society_Management/dashboard/index_admin.php";</script>';
                exit();
              }
              else if($member_type == "member")
              {
                echo '<script>window.location.href = "/Society_Management/dashboard/index_member.php";</script>';
                exit();
              }
              else if($member_type == "security_person")
              {
                echo '<script>window.location.href = "/Society_Management/dashboard/index_guard.php";</script>';
                exit();
              }
          }
          else
          {
            echo" <script>alert('Incorrect Password!!!')</script> ";
          }
      }
      else
      {
        echo" <script>alert('Incorrect Username OR Password!!!')</script> ";
      }
    }
  ?>

  <footer>
    <div id="footer-content">
      &copy; <?php echo date("Y"); ?> Society Management System. All rights reserved.
    </div>
  </footer>

</body>
</html>
