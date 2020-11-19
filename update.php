<?php
include_once('gh.php');
$name=$_POST['name'];
$email=$_POST['email'];
$credit=$_POST['credit'];
$err=false;
if(isset($_POST['tra']))
{
    $sql="SELECT * FROM userlist WHERE Email='$email'";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
   if($email==$row['Email']){
       $err=true;
       echo"<script>alert('Email already exists! please use other');";
        echo"window.location.href='add.php'";
        echo"</script>";
   }
    if(!$err)
    {
        
        $sql1="INSERT INTO userlist(Names,Email,Credit) VALUES('$name','$email','$credit')";
        $res1=$conn->query($sql1);
        if($res1){
            $msg="User added successfully";
            echo "<script>alert('$msg');";
            echo "window.location.href='add.php'";
            echo "</script>";
        }
        else{
            die("query failrd");
            echo "query error";
        }
    }
    else{
        $msg="Email already exists!please use other email";
        echo"<script>alert('$msg');";
        echo"window.location.href='add.php'";
        echo"</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
</html>