<?php
    $auth_req_id = $_POST['auth_req_id'];
    $con = pg_connect("host=localhost port=5432 dbname=society_management user=postgres password=postgres") or die("Can't connect to database !!!<br>");

    $qry = "select * from authentication_requests where auth_req_id = $auth_req_id";
    $rs = pg_query($con,$qry);

    if(pg_num_rows($rs) != 1)
    {
        echo "<script> alert('Request Id $auth_req_id not found!!!'); </script>";
        header("Location: /Society_Management/dashboard/authentications.php");
    }
    else
    {
        $row = pg_fetch_assoc($rs);

        $society_id = $row['society_id'];
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $username = $row['username'];
        $password = $row['password'];
        $phone = $row['phone'];
        $age = $row['age'];
        $gender = $row['gender'];
        $email = $row['email'];
        $unit_no = $row['unit_number'];
        $occupation = $row['occupation'];
        $family_count = $row['family_count'];

        $qry = "insert into member (society_id,first_name,middle_name,last_name,username,email,phone,age,occupation,family_count,gender,unit_no,member_type,join_at) values($society_id,'$first_name','$middle_name','$last_name','$username','$email','$phone',$age,'$occupation',$family_count,'$gender','$unit_no','member',CURRENT_TIMESTAMP)";

        $rs = pg_query($con,$qry);

        if(!$rs)
        {
            echo "<script> alert('Error while inserting into member table'); </script> ";
        }

        $qry = "select max(member_id) from member";
        $rs = pg_query($con,$qry);

        if(!$rs)
        {
            echo "<script> alert('Error while getting member ID'); </script> ";
        }

        $row = pg_fetch_row($rs);
        $member_id = $row[0];

        $qry = "insert into credentials (username,password,member_id) values('$username','$password',$member_id)";
        $rs = pg_query($con,$qry);
        
        if(!$rs)
        {
            echo "<script> alert('Error while inserting into credentials'); </script> ";
        }

        $qry = "delete from authentication_requests where auth_req_id = $auth_req_id";
        $rs = pg_query($con,$qry);

        if(!$rs)
        {
            echo "<script> alert('Error while deleting from authentication req table'); </script> ";
        }

        echo "<script> alert('Permission Granted to User!!!') </script>";
        header("refresh:0;url=/Society_Management/dashboard/authentications.php");
        
    }


?>