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
      text-align:center;
      font-size: 2rem;
      font-family: 'Roboto Condensed', sans-serif;
    }

    label {
      display: block;
      margin: 0.938rem 0 0.063rem;
      color: #555;
      font-family: 'Roboto', sans-serif;
    }

    .remember-label{
        text-align:center;

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





    button {
      background-color: #E86A3C;
      color: #fff;
      padding: 0.938rem;
      border: none;
      border-radius: 0.375rem;
      cursor: pointer;
      width: 100%;
      font-size: 1.125rem;
      transition: background-color 0.3s ease-in-out;
      margin-top:2rem;
    }

    button:hover {
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








  </style>
</head>
<body>
  <form action="#" method="post">
    <h2>Good to see you here!</h2>

    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <label class="remember-label">
      <input type="checkbox" name="remember"> Remember password
    </label>

 
    <button type="submit">Sign In</button>

    <p class="forgot-password"><a href="#">Did you forget your password?</a></p>
  </form>
</body>
</html>