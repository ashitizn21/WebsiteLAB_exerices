<?php

    require_once("config.php");

    $name_err = $id_err = $dept_err =$user_err =$password_err = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        // if(isset($_POST['name-input']) && isset($_POST['sch-id']) && isset($POST([''])))
        if(empty(trim($_POST["name-input"]))){
            $name_err = "please enter name";
        }else{
            $name = $_POST['name-input'];
        }
        
        if(empty(trim($_POST['sch-id']))){
            $id_err = "please enter ur id";
        }else {
            $student_id = $_POST['sch-id'];
        }
        
        if(empty(trim($_POST['dept']))){
            $dept_err = "enter ur Dept";
        }else{
            $dept = $_POST['dept'];
        }
        
        if(empty(trim($_POST['username']))){
            $user_err = "enter your username";
        }else{
            $username = $_POST['username'];
        }
        
        if(empty(trim($_POST['password']))){
            $password_err = "enter password";
        }else{
            $password = $_POST['password'];
        }
        // echo empty($name_err);
        // echo empty($id_err);
        // echo empty($dept_err);
        // echo empty($user_err);
        // echo empty($password_err) && empty($name_err);

        
        // echo "am here";
        if(empty($name_err)  && empty($id_err) && empty($dept_err)&& empty($user_err) && empty($password_err)){
            
            $sql = "INSERT INTO students (name, sch_Id, dept, username, password) VALUES (?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($con, $sql)){
                
                mysqli_stmt_bind_param($stmt, "sssss", $name, $student_id, $dept, $username, $passw);

                $passw = password_hash($password, PASSWORD_DEFAULT);

                if(mysqli_stmt_execute($stmt)){
                    
                    header("Location: index.php");
                }else{
                    
                    echo mysqli_error($con);
                }
            }else{
                
                echo mysqli_error($con);
            }
        }else{
            echo mysqli_error($con);
        }
        mysqli_close($con);
       
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- <link rel="stylesheet" href="assets/style.css"> -->
    <link rel="stylesheet" href="assets/style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap');

body{
    font-family: "ubuntu", sans-serif;
    background: #444;
}

.fo-tbl {
    padding: 3px;
}

input{
    margin: 3px;
    padding: 5px;
}

input {
    margin: 5px;
}

.signClass{
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    border: 1px solid crimson;
    background: beige;
    padding:20px;
    width: 70%;
    margin: 100px auto auto;
    height: 60%;
    
}

.home {
    background: cornsilk;
    min-height: 100vh;
}

.home p {
    font-size: 27px;
    margin: 12px;
}
    </style>
</head>
<body>
    <div class="signClass">
        <div class="sign-title">
        
             <h1>Sign Up</h1>
        </div>
        <div class="signForm">
        
        <form  action="signUp.php" method="post" class="fo-tbl">
            <label for=""> Name: </label>  <br>
            <input type="text" name="name-input" placeholder="enter your name"> <br>
            <label for=""> ID: </label>  <br>
            <input type="text" name="sch-id" placeholder="Id"> <br>
            <label for="" >Department</label> <br>
            <input type="text" name="dept" placeholder="Dept"> <br>
            <label for="">Username</label> <br>
            <input type="text" name="username" placeholder="username" autocomplete="off" require> <br>
            <label for="">password</label>  <br>
            <input type="password" name="password" placeholder="password" autocomplete="off" require>
            <br>
            <input type="submit"  value="SUBMIT">
        </form>
        </div>
    </div>
</body>
</html>