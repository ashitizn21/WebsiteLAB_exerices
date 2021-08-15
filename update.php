<?php

    require_once "config.php";



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
    margin: auto;
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
            <label for=""> ID: </label> <br>
            <input type="text" name="sch-id" placeholder="Id"> <br>
            <label for="" >Department</label> <br>
            <input type="text" name="dept" placeholder="Dept"> <br>
            <label for="">Username</label> <br>
            <input type="text" name="username" placeholder="username" autocomplete="off" require> <br>
            <label for="">password</label> <br>
            <input type="password" name="password" placeholder="password" autocomplete="off" require>
            <br>
            <input type="submit"  value="UPDATE">
        </form>
        </div>
    </div>
</body>
</html>