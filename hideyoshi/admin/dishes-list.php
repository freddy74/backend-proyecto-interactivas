<?php 
    require_once '../../database.php';
    // Reference: https://medoo.in/api/select
    $dishes = $database->select("tb_dishes","*");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dishes List</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    
    <h2>Registered Dishes</h2>
    <a class="link-btn" href="./add-dishes.php">Add New Dishes</a>
    <table>
        <thead>
            <tr>
                <td>Dish Name</td>
                <td>Price</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($dishes as $dish){
                    echo "<tr>";
                    echo "<td>".$dish["dish_name"]."</td>";
                    echo "<td> $".$dish["dish_price"]."</td>";
                    echo "<td><a href='edit-dishes.php?dish_id=".$dish["dish_id"]."'>Edit</a> <a href='delete-dishes.php?dish_id=".$dish["dish_id"]."'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>