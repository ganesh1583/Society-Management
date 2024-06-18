<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_SESSION['name'];
        if(count($name) == 3)
        {
            $first_name = $name[0];
            $middle_name = $name[1];
            $last_name = $name[2];
        }
        else if(count($name) == 2)
        {
            $first_name = $name[0];
            $middle_name = $name[1];
        }

        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $email = $_SESSION['email'];

        $phone = trim($_POST['phone']);
        $age = $_POST['age'];
        $gender = trim($_POST['gender']);
        $occupation = trim($_POST['occupation']);
        $family_count = $_POST['family_count'];
        $unit_number = trim($_POST['unit_no']);
        $society_id = $_POST['society_id'];

        $con = pg_connect("host=localhost port=5432 dbname=society_management user=postgres password=postgres") or die("Cant connect!");
       
        $qry = "select count(society_id) from society where society_id=$society_id";
        $rs = pg_query($con,$qry);
        $row = pg_fetch_row($rs);
        $society_exists = $row[0];

        if($society_exists == 1)
        {


            $qry = "select admin_id from society where society_id=$society_id";
            $rs = pg_query($con,$qry);

            if(!$rs)
            {
                echo "<script> alert('Error while getting admin ID'); </script>";
            }

            $row = pg_fetch_row($rs);
            $admin_id = $row[0];

            if(count($name) == 3)
            {
            $qry = "insert into authentication_requests (society_id,admin_id,first_name,middle_name,last_name,username,password,phone,age,gender,email,unit_number,occupation,family_count,request_date) values ($society_id,$admin_id,'$first_name','$middle_name','$last_name','$username','$password','$phone',$age,'$gender','$email','$unit_number','$occupation',$family_count,CURRENT_TIMESTAMP)";
            }
            else if(count($name) == 2)
            {
                $qry = "insert into authentication_requests (society_id,admin_id,first_name,last_name,username,password,phone,age,gender,email,unit_number,occupation,family_count,request_date) values ($society_id,$admin_id,'$first_name','$middle_name','$username','$password','$phone',$age,'$gender','$email','$unit_number','$occupation',$family_count,CURRENT_TIMESTAMP)";
            }

            $rs = pg_query($con,$qry);

            if(!$rs)
            {
                echo "<script> alert('Error while inserting member data'); </script>";
            }

            echo '<script>alert("Request sent to respective admin. Please wait till conformation!");</script>';
			header("refresh:0;url=/Society_Management/authentication/login.php");

        }
        else
        {
            echo "<script> alert('Society ID $society_id does not exists'); </script>";
        }


    }
?>
