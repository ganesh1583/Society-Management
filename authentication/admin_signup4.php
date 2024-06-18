<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $block_no = $_POST['block_no'];
        $lane = trim($_POST['lane']);
        $area = trim($_POST['area']);
        $city = trim($_POST['city']);
        $district = trim($_POST['district']);
        $state = trim($_POST['state']);
        $country = trim($_POST['country']);
        $pin = $_POST['pin'];

        $address = array($block_no, $lane, $area, $city, $district, $state, $country,$pin);
        $address = implode(',',$address);

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

        $phone = $_SESSION['phone'];
        $age = $_SESSION['age'];
        $gender = $_SESSION['gender'];
        $occupation = $_SESSION['occupation'];
        $family_count = $_SESSION['family_count'];
        $unit_no = $_SESSION['unit_no'];
        $total_units = $_SESSION['total_units'];
        $society_name = $_SESSION['society_name'];

        $con = pg_connect("host=localhost port=5432 dbname=society_management user=postgres password=postgres") or die("Cant connect!");

        $qry = "insert into society (society_name,address,total_units,created_at) values ('$society_name','$address',$total_units,CURRENT_TIMESTAMP)";
        $rs = pg_query($con,$qry);

        if(!$rs)
        {
            echo "<script> alert('Error while inserting into society table'); </script> ";
        }

        $qry = "select max(society_id) from society";
        $rs = pg_query($con,$qry);

        if(!$rs)
        {
            echo "<script> alert('Error while getting society ID table'); </script> ";
        }

        $row = pg_fetch_row($rs);
        $society_id = $row[0];

        if(count($name) == 3)
        {
            $qry = "insert into member (society_id,first_name,middle_name,last_name,username,email,phone,age,occupation,family_count,gender,unit_no,member_type,join_at) values($society_id,'$first_name','$middle_name','$last_name','$username','$email','$phone',$age,'$occupation',$family_count,'$gender','$unit_no','admin',CURRENT_TIMESTAMP)";
        }
        else if(count($name) == 2)
        {
            $qry = "insert into member (society_id,first_name,last_name,username,email,phone,age,occupation,family_count,gender,unit_no,member_type,join_at) values($society_id,'$first_name','$middle_name','$username','$email','$phone',$age,'$occupation',$family_count,'$gender','$unit_no','admin',CURRENT_TIMESTAMP)";
        }

        $rs = pg_query($con,$qry);
        
        if(!$rs)
        {
            echo "<script> alert('Error while inserting values in member'); </script> ";
        }
        
        $qry = "select max(member_id) from member";
        $rs = pg_query($con,$qry);

        if(!$rs)
        {
            echo "<script> alert('Error while getting member ID'); </script> ";
        }

        $row = pg_fetch_row($rs);
        $member_id = $row[0];
        

        $qry = "update society set admin_id = $member_id where society_id = $society_id";
        $rs = pg_query($con,$qry);
        
        if(!$rs)
        {
            echo "<script> alert('Error while inserting admin id'); </script> ";
        }

        $qry = "insert into credentials (username,password,member_id) values('$username','$password',$member_id)";
        $rs = pg_query($con,$qry);

        if(!$rs)
        {
            echo "<script> alert('Error while inserting credentials'); </script> ";
        }

        $qry = "insert into funds (society_id,current_balance,last_updated,total_income,total_expense) values ($society_id,0,CURRENT_TIMESTAMP,0,0)";
        $rs = pg_query($con,$qry);
        
        if(!$rs)
        {
            echo "<script> alert('Error while inserting into funds'); </script> ";
        }
        $_SESSION['member_id'] = $member_id;
        echo '<script>alert("Signup successful! You will be redirected to the login page.");</script>';
        header("refresh:0;url=/Society_Management/authentication/login.php");
        header("Location: /Society_Management/authentication/login.php");

    }
?>
