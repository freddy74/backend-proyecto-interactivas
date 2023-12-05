<?php 
    // Reference: https://medoo.in/api/where

    require_once '../database.php';

    $dishes = $database->select("tb_dishes", "*");
    $cart = json_decode($_COOKIE['cart'], true);
    session_start();
    // var_dump($cart); 
    $date = date("Y-m-d H:i:s");
    // if (isset($_POST)) {
        $order_description = "Dishes list: ";
            foreach ($cart as $cartItem) {
                $subtotal = $cartItem["quantity"]*$cartItem["dishPrice"];
                $order_description .= "Dish Name:" . $cartItem["dishName"] . ". Quantity:" . $cartItem["quantity"] . ". Price per unit: $" . $cartItem["dishPrice"] . ". Subtotal:" . $subtotal . ".";
            }
        
        // echo $order_description;
        
        $database->insert("tb_history",[
            "date"=>$date,
            "id_user"=>$_SESSION["id"],
            "description"=>$order_description
        ]);
    // }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="cart-table">
            <tr>
                <td class="table-title">Dish name</td>
                <td class="table-title">Quantity</td>
                <td class="table-title">Price</td>
            </tr>
    <?php 
            if (isset($_COOKIE['cart'])) {
                $cartItems = json_decode($_COOKIE['cart'], true);

                $subtotal = 0;

                // Iterar sobre los platillos en el carrito
                foreach ($cartItems as $cartItem) {
                    echo '<tr>';
                    echo '<td>' . $cartItem['dishName'] . '</td>';
                    echo '<td>' . $cartItem['quantity'] . '</td>';
                    echo '<td>$' . $cartItem['dishPrice'] * $cartItem['quantity'] . '</td>';
                    echo '</tr>';

                    $subtotal += $cartItem['dishPrice'] * $cartItem['quantity'];
                }
                
                echo  
                '</table>
                <div class="checkout-container">
                <p>Subtotal: $' . $subtotal . '</p>
                <p>Total: $' . $subtotal . '</p>

                </div>';
            } else {
                echo '<tr><td class="no-items" colspan="5">No items in the cart</td></tr>';
            }

    ?>
            <?php 
                $date = date("Y-m-d H:i:s"); 
            ?>

            <form method="post">
                <input class="checkout-btn" type="submit" name="submit" value="Confirm">
            </form>
    
</body>
</html>