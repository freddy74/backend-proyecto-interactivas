<?php
require_once '../database.php';
$subtotal = 0;
$updateCookie = false;

$data = json_decode($_COOKIE['cart'], true);

if (isset($_GET["cart"]) && $_GET["cart"] >= 0 && $data != null) {
    array_splice($data, $_GET["cart"], 1);
    $updateCookie = true;
}

$cart = $data;

if ($updateCookie) setcookie('cart', json_encode($cart), time() + 72000);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn-cart'])) {
    $dishName = $_POST['dish-name'];
    $dishPrice = $_POST['dish-price'];
    $dishImage = $_POST['dish-image'];
    $quantity = $_POST['quantity'];

    $cart = json_decode($_COOKIE['cart'], true);

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
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>

<header>

    <section class="cart-info">
        <h2 class="table-title">Your shopping cart</h2>
        <a class="continue-shopping-btn" href="index.php">Continue shopping</a>
    </section>

</header>

<body>
    <?php
    if ($cart != null) {
        echo "<table class='cart-table'>" .
            "<tr>" .
            "<td class='table-title'>Image</td>" .
            "<td class='table-title'>Dish name</td>" .
            "<td class='table-title'>Quantity</td>" .
            "<td class='table-title'>Delete</td>" .
            "<td class='table-title'>Price</td>" .
            "</tr>";
    } else {
        echo "<table class='cart-table'>" . "<tr><td class='no-items' colspan='5'>No items in the cart</td></tr></table>";
    }

    ?>
    <div class="cart-container">
        <?php

        foreach ($cart as $index => $cart) {

            $data = $database->select("tb_dishes", "*", ["dish_id"]); // => $cart["id"]

            echo '<tr>';
            echo '<td><img class="cart-image" src="./imgs/' . $cart['dishImage'] . '" alt="Dish Image"></td>';
            echo '<td>' . $cart['dishName'] . '</td>';
            echo '<td>' . $cart['quantity'] . '</td>';
            echo '<td><a href="cart.php?cart=' . $index . '">Delete</a></td>';
            echo '<td>$' . $cart['dishPrice'] . '</td>';
            echo '</tr>';
            $subtotal += $cart['dishPrice'];
        }
        // $subtotal += $cart['dishPrice'] * $cartItem['quantity'];

        // if (isset($_COOKIE['cart']) && !null) {

        // $cartItems = json_decode($_COOKIE['cart'], true);

        // $subtotal = 0;

        // Iterar sobre los platillos en el carrito
        // foreach ($cartItems as $index => $cartItem) {
        //     echo '<tr>';
        //     echo '<td><img class="cart-image" src="./imgs/' . $cartItem['dishImage'] . '" alt="Dish Image"></td>';
        //     echo '<td>' . $cartItem['dish_name'] . '</td>';
        //     echo '<td>' . $cartItem['quantity'] . '</td>';
        //     echo '<td><a href="cart.php?cart=' . $index . '">Delete</a></td>';
        //     echo '<td>$' . $cartItem['dishPrice'] * $cartItem['quantity'] . '</td>';
        //     echo '</tr>';

        echo '<div class="checkout-container">
                <p>Subtotal: $' . $subtotal . '</p>
                <p>Total: $' . $subtotal . '</p>
                <a class="checkout-btn" href="index.php">Checkout</a>
                </div>';

        ?>
        </table>
    </div>

    <div>
        <!-- <?php
                include './parts/footer.php';
                ?> -->
    </div>

</body>