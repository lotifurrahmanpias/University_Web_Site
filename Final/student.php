<?php
session_start();
$_SESSION['student_id']='';
include_once "function.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="student.css">
</head>

<body>
    <form style="margin-left:-160px;" class="index" method="POST">
        <h2>LOGIN</h2>

        <div class="error">
            <!-- <p class = "error">Password is required! </p> -->


            <label>Student Id</label>
            <input type="id" name="student_id" placeholder="Your Student Id"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password (Birth Certificate or NID)"><br>
            <button type="submit" name="login">Login</button>
            <p>Don't have account?</p>
           
        </div>
    </form>
    <a style=" margin-left:-220px; margin-top:277px;"  href="s_reg.php"><button>Register</button></a>
    
</body>

<style>
    body{
        background:  rgb(210, 210, 250);
    }

    .error{

       color:white; 
       background:  rgb(1, 124, 124) ;
        
       
    }
</style>

</html>
<?php

if (strlen($_SESSION['student_id'])>0) {
    header('Location:view_cgpa.php');
}


// $log = <<< DELEMETER
// <h1>Login</h1>
// <form id="LoginForm" method="POST" action="">
//                             <input type="text" placeholder="Username" name="username"> <br> <br> <br>
//                             <input type="password" placeholder="Password" name="password">
//                             <br> <br> <br>
//                             <button type="submit" name="login" class="btn">Login</button>
//                             <!-- <a href="#">Forgot Password</a> -->
//                         </form>
// DELEMETER;
// echo $log;

if (isset($_POST['login'])) {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM student WHERE student_id= '$student_id' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['student_id'] = $student_id;
        header('Location: view_cgpa.php');
    } else {
        echo "<p style=color:red;margin:-104px;margin-top:310px;text-align:center;><b>Invaild Email or Password !</b> </p>" ;
    }
    header("refresh:1 url=student.php");
}



?>
