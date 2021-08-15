<?php

require_once("config.php");
// require_once("index.php");

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {

    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username_err = $password_err = "";
    $username = $password = "";
    if (empty(trim($_POST['username']))) {
        $username_err = "Invalid password";
    } else {
        $username = $_POST['username'];
    }

    if (empty(trim($_POST['password']))) {
        $password_err = "Invalid Password";
    } else {
        $password = $_POST['password'];
    }

    if (empty($username_err) && empty($password_err)) {

        $sql = "SELECT id, username, password FROM students WHERE username = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            echo $username . " " . $password;

            mysqli_stmt_bind_param($stmt, "s", $username);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_pw);

                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_pw)) {
                            echo "after execution";

                            session_start();

                            $_SESSION['loggedIn'] = true;
                            $_SESSION['userLoggedIn'] = $username;
                            $_SESSION['id'] = $id;

                            header("Location: index.php");
                        } else {
                            echo "Invalid password";
                        }
                    } else {
                        echo "Invalid password";
                    }
                } else {
                    echo "Invalid password";
                }
            } else {
                echo "data is not fetched!...";
            }
        } else {
            echo mysqli_error($con);
        }
    } else {

        echo $password_err;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="assets/style.css">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap');

        body {
            font-family: "ubuntu", sans-serif;
            background: #444;
        }

        .fo-tbl {
            padding: 3px;
        }

        input {
            margin: 3px;
        }

        .signClass {
            align-items: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border: 1px solid crimson;
            background: beige;
            padding: 20px;
            width: 70%;
            margin: 100px auto auto auto;
            height: 60%;

        }

        input{
    margin: 3px;
    padding: 5px;
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

            <h1>Sign In</h1>

        </div>
        <div class="signForm">

            <form action="signIn.php" method="POST">
                <span></span>
                <input type="text" name="username" placeholder="Username" autocomplete="off">
                <br>
                <input type="text" name="password" placeholder="Password" autocomplete="off"> <br>
                <input type="submit" value="SUBMIT">
            </form>       
        </div>
    </div>
</body>

</html>