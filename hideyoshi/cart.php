<?php
require_once '../database.php';

if ($_POST) {
    var_dump($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hideyoshi - Japanese Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>

<style>
    body {
        background: var(--clr-light-green);
    }
</style>

<header>
    <nav class="top-nav">
        <input class="mobile-check" type="checkbox">

        <label class="mobile-btn">
            <span></span>
        </label>
        <ul class="nav-list">
            <li><a class="nav-list-link" href="./index.php">Home</a></li>
            <li><a class="nav-list-link" href="#">Cart</a></li>
        </ul>
        <img class="logo" src="./imgs/Hideyoshi.png" alt="logo">
        <ul class="responsive-top nav-list">
            <li><a class="nav-list-link" href="#">Login</a></li>
            <li><a class="nav-list-link" href="#">About</a></li>
        </ul>
    </nav>

</header>

<body>

    <div class="admin-container">
        <table>
            <tr>
                <td>Image</td>
                <td>Dish name</td>
                <td>Quantity</td>
                <td>Delete</td>
                <td>Price</td>
            </tr>
        </table>
    </div>


    <div>
        <!-- <?php
                include './parts/footer.php';
                ?> -->

    </div>

    <?php
    ?>

</body>