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
        $qry = "delete from authentication_requests where auth_req_id = $auth_req_id";
        $rs = pg_query($con,$qry);

        if(!$rs)
        {
            echo "<script> alert('Error while deleting from authentication req table'); </script> ";
        }

        echo "<script> alert('User is Removed!!!') </script>";
        header("refresh:0;url=/Society_Management/dashboard/authentications.php");
        
    }


?>