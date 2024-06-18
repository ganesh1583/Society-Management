<?php
  session_start();

  $phone = trim($_POST['phone']);
  $age = $_POST['age'];
  $gender = trim($_POST['gender']);
  $occupation = trim($_POST['occupation']);
  $family_count = $_POST['family_count'];
  $unit_no = trim($_POST['unit_no']);
  $society_name = trim($_POST['society_name']);
  $total_units = $_POST['total_units'];

  $_SESSION['phone'] = $phone;
  $_SESSION['age'] = $age;
  $_SESSION['gender'] = $gender;
  $_SESSION['occupation'] = $occupation;
  $_SESSION['family_count'] = $family_count;
  $_SESSION['unit_no'] = $unit_no;
  $_SESSION['society_name'] = $society_name;
  $_SESSION['total_units'] = $total_units;
  
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
        var block_no = document.signupform.block_no.value;
        var pin = document.signupform.pin.value;

        if(block_no < 0)
        {
          alert("Block Number Cannot Be Negative");
          return false;
        }

        if(pin < 0)
        {
          alert("Pin Code Cannot Be Negative");
          return false;
        }
        pinlen = pin.toString();
        if(pinlen.length != 6)
        {
          alert("PIN Code Length Should Be 6");
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
      <h4> Address Information </h4>
      <form method="POST" action="/Society_Management/authentication/admin_signup4.php" name="signupform" onsubmit="return validate()">

        <div class="txt_field">
          <input type="number" name="block_no" required>
          <label>Block No</label>
        </div>

        <div class="txt_field">
          <input type="text" name="lane" required>
          <label>Street/Road/Lane</label>
        </div>

        <div class="txt_field">
          <input type="text" name="area" required>
          <label>Area/Landmark</label>
        </div>

        <div class="txt_field">
          <input type="text" name="city" required>
          <label>City</label>
        </div>

        <div class="txt_field">
          <input type="text" name="district" required>
          <label>District</label>
        </div>

        <div class="txt_field">
          <input type="text" name="state" required>
          <label>State</label>
        </div>

        <div class="txt_field">
          <input type="text" name="country" required>
          <label>Country</label>
        </div>

        <div class="txt_field">
          <input type="number" name="pin" required>
          <label>Pin</label>
        </div>
    
       <input type="submit" value="Create Account">

        <div class="back_button">
          <a href="/Society_Management/authentication/admin_signup2.php">Back</a>
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
