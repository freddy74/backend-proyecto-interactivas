<?php
require_once '../database.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">

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
            background: url(./imgs/signin_background.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }




        form {
            background-color: #fff;
            padding: 2.5rem 2.5rem 2.5rem 2.5rem;
            box-shadow: 0 0 1.25rem rgba(0, 0, 0, 0.1);
            width: 100%;
            text-align: left;
            transition: background-color 0.3s ease-in-out;
            border-radius: 2rem;
        }



        .sign-in-title {
            color: black;
            margin-bottom: 2rem;
            text-align: center;
            font-size: var(--fs-xl);
            font-family: var(--ff-secondary);
            margin-left: 10rem;
            margin-right: 10rem;
        }

        label {
            display: block;
            margin: 0.938rem 0 0.063rem;
            color: #555;
            font-family: 'Roboto', sans-serif;
            margin-bottom: .5rem;
        }


        .remember-label {
            text-align: center;

        }

        .form-elements {
            width: calc(100% - 0.75rem);
            padding: 1rem;
            box-sizing: border-box;
            border: 0.060rem solid #ccc;
            border-radius: 0.375rem;
            transition: border-color 0.3s ease-in-out;
            background-color: hsla(64, 100%, 50%, 0.39);


        }

        form-elements:focus {
            border-color: #E86A3C;
        }

        .button {
            background-color: var(--clr-orange);
            color: #fff;
            padding: 0.938rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            width: 100%;
            font-size: 1.125rem;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
            margin-top: 2rem;
            border-radius: 2rem;
            margin-bottom: 1rem;
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


        form-items::placeholder {
            color: rgba(170, 170, 170, 0.7);
        }


        .button-container {
            align-content: center;
            padding: 0;
            margin: 0;
        }

        .button-go-category {
            font-family: var(--ff-main);
            font-weight: bold;
            font-size: var(--fs-xxs);
            align-content: center;
            background-color: var(--clr-orange);
            padding: .5em;
            border-radius: 2rem;
            border: none;
            color: white;

        }
    </style>
</head>



<body>

    <main>
        <section class='activity'>
            <form method="post" action="sign-in.php">
                <h2 class="sign-in-title">Sign In</h2>
                <div>



                    <label for='fullname'>Fullname</label>
                </div>
                <div>
                    <input class="form-elements" id='fullname' class='form-input' type='text' name='Fullname' placeholder="Name">
                </div>
                <div>
                    <label for='email'>Email Address</label>
                </div>
                <div>
                    <input class="form-elements" id='email' class='form-input' type='text' name='email' placeholder="Email">
                </div>
                <div>
                    <label for='username'>Username</label>
                </div>
                <div>
                    <input class="form-elements" id='username' class='form-input' type='text' name='username' placeholder="Username">
                </div>
                <div>
                    <label for='password'>Password</label>
                </div>
                <div>
                    <input class="form-elements" id='password' class='form-input' type='password' name='password' placeholder="Password">
                </div>
                <div>
                    <input class="button" type='submit' value="REGISTER">
                </div>
                <p class="p">
                    <?php echo $message; ?>
                </p>
                <input class="form-elements" type="hidden" name="register" value="1">
            </form>
        </section>

        <div class="button-container">
            <a class="button-go-category" href="./index.php">Continue Watching</a>
        </div>

</body>

</html>