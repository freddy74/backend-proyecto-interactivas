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
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["fullname"] = $user[0]["user_fullname"];
                header("location: cart.php");
            } else {
                $message = "wrong username or password";
            }
        } else {
            $message = "wrong username or password";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">

    <style>
        body {
            /* background: url(../imgs/background-hero.png); */
            background: url(./imgs/login_background.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;
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
            background: hsla(64, 100%, 50%, 0.39);
        }

        .login-btn {
            background-color: var(--clr-orange);
            font-weight: bold;
            color: var(--clr-white);
            padding: 1rem;
            border: none;
            border-radius: 1rem;
            cursor: pointer;
            width: 100%;
            margin-bottom: 1rem;
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
            font-size: 12px;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <header>
        <nav class="top-nav">
            <ul class="nav-list">
                <li><a class="nav-list-link" href="./index.php">Home</a></li>
                <li><a class="nav-list-link" href="#">Locations</a></li>
                <li><img class="logo" src="./imgs/Hideyoshi.png" alt="logo"></li>
                <li><a class="nav-list-link" href="#">Deliver</a></li>
                <li><a class="nav-list-link" href="#">About</a></li>
            </ul>
        </nav>
    </header>
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
            <p><?php echo $message; ?></p>
            <input type="hidden" name="login" value="1">
        </form>
    </main>
</body>

</html>