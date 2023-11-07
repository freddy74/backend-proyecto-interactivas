<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="<link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">
    <title>Log In</title>

    <style>
        body {
            /* background: url(../imgs/background-hero.png); */
            background: var(--clr-cian);
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
            background: var(--clr-yellow);
            font-weight: bold;
            color: var(--clr-black);
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
        }

        /* .box-container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            position: relative;
        }

        .back-box {
            width: 100%;
            padding: 10px 20px;
            display: flex;
            background: var(--clr-yellow);
            backdrop-filter: blur(20px);
        }

        .back-box div {
            margin: 100px 40px;
            color: white;
        }

        .back-box p,
        .back-box button {
            margin-top: 30px;
        }

        .back-box h3 {
            font-weight: 400;
            font-size: 26px;
        }

        .back-box button {
            border: solid;
            color: var(--clr-yellow);
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 80%;
            background-color: #000000;
        }

        .login-register-container {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 380px;
            position: relative;
            top: -185px;
            left: 0px;
        }

        .login-register-container form {
            width: 100%;
            padding: 80px 20px;
            background: var(--clr-white);
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-register-container form h2 {
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
            color: var(--clr-black);
        }

        .login-register-container form input {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            border: none;
            outline: none;
            background: #F2F2F2;
        }

        .login-register-container form button {
            padding: 10px 40px;
            margin-top: 40px;
            border: none;
            outline: none;
            font-size: var(--fs-xxs);
            cursor: pointer;
        }

        .register-form {
            opacity: 1;
            display: block;
        }

        .login-form {
            display: none;
        }

        .main-login{
            display: flex;
            margin: auto;
        } */
    </style>

</head>

<body>
    <header>
        <nav class="top-nav">
            <ul class="nav-list">
                <li><a class="nav-list-link" href="../index.html">Home</a></li>
                <li><a class="nav-list-link" href="#">Locations</a></li>
                <li><img class="logo" src="../imgs/Hideyoshi.png" alt="logo"></li>
                <li><a class="nav-list-link" href="#">Deliver</a></li>
                <li><a class="nav-list-link" href="#">About</a></li>
            </ul>
        </nav>
    </header>
    <main class="login-main">
        <!-- <main>
        <div class="box-container">
            <div class="back-box">
                <div class="back-box-login">
                    <h3>Have an account?</h3>
                    <p>Log in with your username and password</p>
                    <button id="btn-login">Login</button>
                </div>
                <div class="back-box-register">
                    <h3>Not a member yet?</h3>
                    <p>Log in with your username and password</p>
                    <button id="btn-register">Register</button>
                </div>
            </div>
            <div class="login-register-container">
                <form action="" class="register-form">
                    <h2>Sign In</h2>
                    <input type="text" placeholder="Name">
                    <input type="text" placeholder="Email">
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <button>Sign In</button>
                </form>
                <form action="" class="login-form">
                    <h2>Log In</h2>
                    <input type="text" placeholder="Email">
                    <input type="password" placeholder="Password">
                    <button>Enter</button>
                </form>
            </div>
        </div>
    </main> -->
        <form class="login-form">
            <h2 class="login-title">Log In</h2>
            <input class="username-field" placeholder="Username" type="text" id="username" name="username" required>
            <input class="password-field" placeholder="Password" type="password" id="password" name="password" required>
            <button class="login-btn" type="submit">Log In</button>
            <div class="sign-up-cta">
                <h2>Not a member yet?</h2>
                <a class="sign-up-link" href="#">Create account!</a>
            </div>
        </form>
    </main>
</body>

</html>