<?php
include_once("gh.php");
if(isset($_POST['credit'])){
    
    function function_alert($errors){
        
        if($error){
            echo "<script>alert('$errors');";
            echo "window.location.href='transd.php'";
            echo "</script>";
        }
        else{
            echo "<script>alert('$errors');";
            echo "window.location.href='user.php'";
            echo "</script>";
        }
        
    }
    session_start();
    $from_id=trim($_POST['fromname']);
    $to_id=trim($_POST['toname']);
    $credit=trim($_POST['credit']);
    echo $credit;
    echo $to_id;
    $error=false;
    $sql_1="SELECT * FROM userlist WHERE id='$from_id'";
    $from_res=$conn->query($sql_1);
    $row_from=mysqli_fetch_assoc($from_res);
    $from_name=$row_from['Names'];
    $sql_2="SELECT * FROM userlist WHERE id='$to_id'";
    $to_res=$conn->query($sql_2);
    $row_to=$to_res->fetch_assoc();
    $to_name=$row_to['Names'];
    $from_credit=$row_from['Credit'];
    $to_credit=$row_to['Credit'];
    echo $to_name;
    echo $from_credit;
    if((int)$credit<1)
    {
        $errors=" less than 1 is not accepted";
        $error=true;
    }
    if((int)$credit>(int)$from_credit)
    {
        $errors="Insufficient Credit Balance!";
        $error=true;
    }
    
    if(!$error)
    {
        $user="UPDATE userlist SET Credit=Credit - $credit WHERE id=$from_id";
        $query=$conn->query($user);
        if(!$query)
        {
            die("QUERY FAILED".function_alert("Invalid Value"));
            echo "query error";
            $error=true;
        }
        $user_to="UPDATE userlist SET Credit=Credit + $credit WHERE id=$to_id";
        $query=$conn->query($user_to);
        $query1="INSERT INTO trans(Frname,Toname,Credittr) VALUES('$from_name','$to_name','$credit')";
        $res=$conn->query($query1);
        if($res){
            $errors="Trasfered Successfully";
            echo "<script>alert('$errors');";
            echo "window.location.href='user.php'";
            echo "</script>";
        }
        else{
            die("query failrd");
            echo "query error";
        }
    }
    else
    {
        echo "<script>alert('$errors');";
        echo "window.location.href='transd.php?ID=$from_id'";
        echo "</script>";
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