<?php
require_once '../database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn-cart'])) {
    $dishName = $_POST['dish-name'];
    $dishPrice = $_POST['dish-price'];
    $dishImage = $_POST['dish-image'];
    $quantity = $_POST['quantity'];
   
    $cart = json_decode($_COOKIE['cart'], true);
    // isset($_COOKIE['cart']) ? --- : array()


    // Verificar si el platillo ya está en el carrito
    $found = false;
    foreach ($cart as $key => $cartItem) {
        if ($cartItem['dishName'] == $dishName) {
            // Si ya existe, incrementar la cantidad y salir del bucle
            $cart[$key]['quantity'] += $quantity;
            $found = true;
            break;
        }
    }

    // Si no se encontró el platillo en el carrito, agregar uno nuevo
    if (!$found) {
        $cartItem = array(
            'dishName' => $dishName,
            'dishPrice' => $dishPrice,
            'dishImage' => $dishImage,
            'quantity' => $quantity
        );
        $cart[] = $cartItem;
    }

    setcookie('cart', json_encode($cart), time() + (3600));
    header('Location: cart.php');
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
            <?php
            if (isset($_COOKIE['cart'])) {
                // Obtener el contenido de la cookie y convertirlo a un array
                $cartItems = json_decode($_COOKIE['cart'], true);

                var_dump($cartItems);
                // Iterar sobre los platillos en el carrito
                foreach ($cartItems as $cartItem) {
                    echo '<tr>';
                    echo '<td><img class="cart-image" src="./imgs/' . $cartItem['dishImage'] . '" alt="Dish Image"></td>';
                    echo '<td>' . $cartItem['dishName'] . '</td>';
                    echo '<td>' . $cartItem['quantity'] . '</td>';
                    echo '<td><a href="remove_from_cart.php?dishName=' . urlencode($cartItem['dishName']) . '">Delete</a></td>';
                    echo '<td>$' . $cartItem['dishPrice'] * $cartItem['quantity'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No items in the cart</td></tr>';
            }

            ?>
        </table>
    </div>



    <div>
        <!-- <?php
                include './parts/footer.php';
                ?> -->

    </div>

</body>