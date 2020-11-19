<?php
include_once('gh.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    font-family: 'Roboto', sans-serif;
}
body{
    background:black no-repeat top center;
    background-size: cover;
    height: 100vh;
}
.wrapper{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    padding: 0 20px;

}
.f{
    max-width: 550px;
    margin: 0 auto;
    background: grey;
    padding: 30px;
    border-radius: 5px;
    display: flex;
    box-shadow: 0 0 10px rgb(13,197,166);
    flex-direction: column;
}
.input-fields{
    display: flex;
    flex-direction: column;
    margin-right: 4%;

}
.input-fields,
.msg{
    width: 48%;
}
.msg{
    display: flex;
    flex-direction: row;
    width: 100%;
}
.input-fields,.input{
    margin: 10px 0;
    background: transparent;
    border: 0;
    border-bottom: 2px solid white;
    padding: 10px;
    color: black;
    width: 100%;
}
::-webkit-input-placeholder{
    color: black;
}
::-moz-input-placeholder{
    color: rgba(0, 0, 0, 0.8);
}
.btn{
    background:rgb(13,197,166);
    text-align: center;
    padding: 15px;
    border-radius: 5px;
    color: black;
    cursor: pointer;
    text-transform: uppercase;
}
h1{
    color: rgb(13,197,166);
}
@media screen and (max-width:600px){
    .f{
        flex-direction: column;
    }
    .input-fields,
    .msg{
        width: 100%;
    }
    h1{
        color: black;
    }
}

</style>
<body>
<?php
if(isset($_GET['ID']))
{
    session_start();
    $_SESSION['ID']=$_GET['ID'];
}
$t=$_GET['ID'];
?>

        <div class="wrapper">
            <div class="f">
                <form id="contact-form" action="check.php" method="post" id="kk">
                <center><h1>Transfer credits</h1></center>
                <div class="input-field">
                <select name="toname" id="ee" class="input" required>
                    <option hidden disabled selected value>----- Select Users -------</option>
                    <?php
$sql="SELECT * FROM userlist WHERE id!='".$t."'";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
?>
<option value="<?=$row['id'] ?>"><?=$row['Names'] ?></option>
<?php
}
?>
</select>
                    <input type="text" class="input" name="credit" placeholder="Enter Credits" required="required">
                    <input type="hidden" name="fromname" value="<?php echo $t ?>">

                </div>
            <div class="msg">
                <input type="submit" name="tra" class="btn" value="transfer"></input>
                <div class="btn" onclick="redirect()">back</div>
            </div>
            </div>
        </div>
        </form>
        <script>
            function redirect(){
                window.location.href="user.php";
            }
        </script>
    </body>
</html>