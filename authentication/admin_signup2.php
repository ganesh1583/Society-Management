<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  session_start();

  $name = explode(" ",trim($_POST['name']));
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $email = trim($_POST['email']);

  $_SESSION['name'] = $name;
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  $_SESSION['email'] = $email;

  $con = pg_connect("host=localhost port=5432 dbname=society_management user=postgres password=postgres");
  
  $qry = "select count(username) from member where username='$username'";
  $rs = pg_query($con,$qry);
  $row = pg_fetch_row($rs);
  $usernames = $row[0];

  if($usernames > 0)
  {
    echo "<script> alert('Username Already Exists'); </script>";
    header("refresh:0;url=/Society_Management/authentication/admin_signup1.php");
    exit();
  }
?>
        
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Admin Sign Up </title>
    <style>
      body 
      {
        margin: 0;
        padding: 0;
        background: linear-gradient(120deg, #3498DB, #9B59B6);
        height: 100vh;
        overflow: auto;
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
        position: relative;
        top: 77%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: #ECF0F1;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        box-sizing: border-box;
        overflow: auto;
        margin-top: 15px;
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
      
      .center h4
      {
        text-align: center;
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
      
      .signup_link
      {
        margin: 30px 0;
        text-align: center;
        font-size: 16px;
        color: #666666;
      }
      
      .signup_link a
      {
        color: #2691d9;
        text-decoration: none;
      }
      
      .signup_link a:hover
      {
        text-decoration: underline;
      }

      .login_link,
      .back_button
      {
        display: inline-block;
        margin: 30px 50px;
        font-size: 16px;
        color: #666666;
      }

      .back_button
      {
        text-align: left;
      }

      .login_link
      {
        text-align: right;
      }

      footer 
      {
        background-color: #333;
        padding: 15px;
        text-align: center;
        color: white;
        position: relative;
        bottom: 0;
        width: 100%;
        height: 3%;
        overflow: auto;
      }

      .footer-content 
      {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        margin: 0 auto;
      }


    </style>

      <script>
        function validate()
        {
          var phone = document.signupform.phone.value;
          var age = document.signupform.age.value;
          var gender = document.signupform.gender.value;
          var occupation = document.signupform.occupation.value;
          var family_count = document.signupform.family_count.value;
          var unit_no = document.signupform.unit_no.value;
          var total_units = document.signupform.total_units.value;
          var society_name = document.signupform.society_name.value;


          if(phone.length != 10)
          {
            alert("Phone Numbers Length Should Be 10");
            return false;
          }
          if(age < 0)
          {
            alert("Age Cannot Be Negative");
            return false;
          }
          if(family_count < 1)
          {
            alert("Family Count Cannot Be Negative or Zero");
            return false;
          }
          if(total_units < 0)
          {
            alert("Total Units Cannot Be Negative");
            return false;
          }           
        }
      </script>

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
      <h1>Admin Sign Up</h1>
      <h4> Personal Information </h4>
      <form method="POST" action="/Society_Management/authentication/admin_signup3.php" name="signupform" onsubmit="return validate()">

        <div class="txt_field">
          <input type="text" name="phone" required>
          <label> Phone </label>
        </div>

        <div class="txt_field">
          <input type="number" name="age" required>
          <label> Age </label>
        </div>
      
        <div class="radio_buttons">
          <label> Gender </label><br> <hr>
          Male <input type="radio" name="gender" value="Male" required>
          Female <input type="radio" name="gender" value="Female" required>
          Other <input type="radio" name="gender" value="Other" required>
        </div>

        <div class="txt_field">
          <input type="text" name="occupation" required>
          <label> Occupation </label>
        </div>

        <div class="txt_field">
          <input type="number" name="family_count" required>
          <label> Family Count </label>
        </div>

        <div class="txt_field">
          <input type="text" name="unit_no" required>
          <label> Flat Number/Unit Number </label>
        </div>

        <div class="txt_field">
          <input type="number" name="total_units" required>
          <label> Total Units/Flats </label>
        </div>

        <div class="txt_field">
          <input type="text" name="society_name" required>
          <label> Society Name </label>
        </div>

  
        <input type="submit" value="Next">

        <div class="back_button">
          <a href="/Society_Management/authentication/admin_signup1.php">Back</a>
        </div>

        <div class="login_link">
          <a href="/Society_Management/authentication/login.php">Login</a>
        </div>

      </form>
    </div>
   
    <footer>
      <div id="footer-content">
        &copy; <?php echo date("Y"); ?> Society Management System. All rights reserved.
      </div>
    </footer>

  </body>
</html>
