<?php
require_once '../../database.php';
// Reference: https://medoo.in/api/select
$dishes = $database->select("tb_dishes", "*");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dishes List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>

    <div class="cart-info">
        <h2 class="table-title">Registered Dishes</h2>
        <a class="continue-shopping-btn" href="./add-dishes.php">Add New Dishes</a>
    </div>
    <!-- <div class="cart-container"> -->
    <table class="cart-table">
        <thead>
            <tr>
                <td class="table-title">Dish Name</td>
                <td class="table-title">Price</td>
                <td class="table-title">Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dishes as $dish) {
                echo "<tr class='table-row'>";
                echo "<td>" . $dish["dish_name"] . "</td>";
                echo "<td> $" . $dish["dish_price"] . "</td>";
                // echo "<div class='action-icon'>";
                echo "<td><div class='action-icons'><a href='edit-dishes.php?dish_id=" . $dish["dish_id"] . "'><img src='../imgs/edit-icon.svg' alt='edit-icon'>
                    </a> <a href='delete-dishes.php?dish_id=" . $dish["dish_id"] . "'><img src='../imgs/delete-icon.svg' alt='delete-icon'></a></div></td>";

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- </div> -->

</body>

</html>