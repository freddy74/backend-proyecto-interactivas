<?php
require_once '../../database.php';
$message = "";

if ($_POST) {
    if (isset($_POST["register"])) {
        //validate if user already registered
        $validateUsername = $database->select("tb_users", "*", [
            "user_username" => $_POST["username"]
        ]);

        if (count($validateUsername) > 0) {
            // $message = "This username is already registered!";
        } else {
            $pass = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 12]);
            $database->insert("tb_users", [
                "user_fullname" => $_POST["fullname"],
                "user_username" => $_POST["username"],
                "user_password" => $pass,
                "user_email" => $_POST["email"]
            ]);
            //header("location: book.php?id=".$_POST["register"]);
            $message = "Succesfully registered!";

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <style>
        body {
            font-family: 'Roboto';
            font-weight: bold;
            background: #f9f9f9;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url(../../imgs/signin_background.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        form {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 0.625rem;
            box-shadow: 0 0 1.25rem rgba(0, 0, 0, 0.1);
            width: 25rem;
            text-align: left;
            transition: transform 0.3s ease-in-out;
        }

        form:hover {
            transform: scale(1.05);
        }

        h2 {
            color: #E86A3C;
            margin-bottom: 4rem;
            text-align: center;
            font-size: 2rem;
            font-family: 'Roboto Condensed', sans-serif;
        }

        label {
            display: block;
            margin: 0.938rem 0 0.063rem;
            color: #555;
            font-family: 'Roboto', sans-serif;
        }

        .remember-label {
            text-align: center;

        }

        input {
            width: calc(100% - 0.75rem);
            padding: 0.75rem;
            box-sizing: border-box;
            border: 0.060rem solid #ccc;
            border-radius: 0.375rem;
            transition: border-color 0.3s ease-in-out;
        }

        input:focus {
            border-color: #E86A3C;
        }

        .button {
            background-color: #E86A3C;
            color: #fff;
            padding: 0.938rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            width: 100%;
            font-size: 1.125rem;
            transition: background-color 0.3s ease-in-out;
            margin-top: 2rem;
        }

        .button:hover {
            background-color: #c0392b;
        }

        .forgot-password {
            margin-top: 0.935rem;
            text-align: center;
            font-family: 'Roboto', sans-serif;
        }

        a {
            color: #e74c3c;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #970000;
        }


        .p {
            font-family: 'Roboto';
            font-size: 1.5rem;
            text-align: center;
            color: #c0392b;

        }
    </style>

</head>

<body>

    <main>
        <section class='activity'>
            <form method="post" action="sign-in.php">
                <h2>Good to see you here!</h2>
                <div>
                    <label for='fullname'>Fullname</label>
                </div>
                <div>
                    <input id='fullname' class='form-input' type='text' name='fullname'>
                </div>
                <div>
                    <label for='email'>Email Address</label>
                </div>
                <div>
                    <input id='email' class='form-input' type='text' name='email'>
                </div>
                <div>
                    <label for='username'>Username</label>
                </div>
                <div>
                    <input id='username' class='form-input' type='text' name='username'>
                </div>
                <div>
                    <label for='password'>Password</label>
                </div>
                <div>
                    <input id='password' class='form-input' type='password' name='password'>
                </div>
                <div>
                    <input class="button" type='submit' value="REGISTER">
                </div>
                <p class="p">
                    <?php echo $message; ?>
                </p>
                <input type="hidden" name="register" value="1">
            </form>
        </section>
</body>

</html>