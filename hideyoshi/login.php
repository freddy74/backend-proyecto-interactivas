<?php
require_once '../database.php';
$message = "";
if ($_POST) {
    if (isset($_POST["login"])) {
        $user = $database->select("tb_users", "*", [
            "user_username" => $_POST["username"]
        ]);
        if (count($user) > 0) {
            //validate password
            if (password_verify($_POST["password"], $user[0]["user_password"])) {
                session_start();
                $_SESSION["id"] = $user[0]["user_id"];
                $_SESSION["mail"] = $user[0]["user_email"];
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["fullname"] = $user[0]["user_fullname"];
                header("location: index.php");
            } else {
                $message = "Wrong username or password!";
            }
        } else {
            $message = "Wrong username or password!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="<link rel=" preconnect href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Log In</title>
    <link rel="stylesheet" href="./css/main.css">

    <style>
        body {
            /* background: url(../imgs/background-hero.png); */
            background: url(./imgs/login_background.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 90vh;
        }

        .login-main {
            font-family: var(--ff-main);
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            padding: 3rem;
            border-radius: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            gap: 1rem;
            font-size: 1rem;
            padding-left: 5rem;
            padding-right: 5rem;
            margin-top:10rem;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border-style: none;
            background:#B3B1B1;
        }

        .login-btn {
            background-color: black;
            font-weight: bold;
            color: var(--clr-white);
            padding: 1rem;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 1rem;
            font-size:var(--fs-xxs);
            font-family:var(--ff-main);
        }

        .login-btn-cont {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .signup-btn {
            border: solid;
            color: var(--clr-yellow);
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 80%;
            background-color: #00000000;
        }

        .sign-up-cta {
            text-align: center;
            font-family: var(--ff-secondary);
        }

        .sign-up-link {
            font-size: 1rem;
            font-weight:bold;
            text-decoration: none;
            margin-top:2rem;
            color:#04B404;
        }

        .sign-up-link2 {
            font-size: 1rem;
            text-decoration: none;
            text-align: center;
            align-content:center;
            margin-top:1rem;
            color: #8A0808;
            font-weight:bold;
        }
    </style>

</head>

<body>
    
    <main class="login-main">
        <form class="login-form" method="post" action="login.php">
            <h2 class="login-title">Log In</h2>
            <input class="username-field" placeholder="Username" type="text" id="username" name="username" required>
            <input class="password-field" placeholder="Password" type="password" id="password" name="password" required>
            <button class="login-btn" type="submit">Log In</button>

            <div class="sign-up-cta">
                <h2>Not a member yet?</h2>
                <a class="sign-up-link" href="./sign-in.php">Create account!</a>
            </div>
            <a class="sign-up-link2" href="./sign-in.php">Forgot password?</a>
            <p><?php echo $message; ?></p>
            <input type="hidden" name="login" value="1">
        </form>
    </main>
</body>

</html>