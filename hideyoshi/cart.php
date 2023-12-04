<?php
require_once '../database.php';

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
    <link rel="stylesheet" href="<link rel=" preconnect" href="https://fonts.googleapis.com">
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
    <div class="cart-container">

        <table class="cart-table">
            <tr>
                <td class="table-title">Image</td>
                <td class="table-title">Dish name</td>
                <td class="table-title">Quantity</td>
                <td class="table-title">Delete</td>
                <td class="table-title">Price</td>
            </tr>

            <?php
            if (isset($_COOKIE['cart'])) {

                $cartItems = json_decode($_COOKIE['cart'], true);

                $subtotal = 0;

                // Iterar sobre los platillos en el carrito
                foreach ($cartItems as $cartItem) {
                    echo '<tr>';
                    echo '<td><img class="cart-image" src="./imgs/' . $cartItem['dishImage'] . '" alt="Dish Image"></td>';
                    echo '<td>' . $cartItem['dishName'] . '</td>';
                    echo '<td>' . $cartItem['quantity'] . '</td>';
                    echo '<td><a href="#">Delete</a></td>';
                    echo '<td>$' . $cartItem['dishPrice'] * $cartItem['quantity'] . '</td>';
                    echo '</tr>';

                    $subtotal += $cartItem['dishPrice'] * $cartItem['quantity'];
                }

                echo '<div class="checkout-container">
                <p>Subtotal: $' . $subtotal . '</p>
                <p>Total: $' . $subtotal . '</p>
                <a class="checkout-btn" href="index.php">Checkout</a>
                </div>';
            } else {
                echo '<tr><td class="no-items" colspan="5">No items in the cart</td></tr>';
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