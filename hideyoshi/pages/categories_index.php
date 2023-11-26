<?php 
    require_once '../../database.php';
    $items = $database->select("tb_dishes","*");

    $category_name = "";
    $category_img = "";
    $category_number = "";
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        if ($category === "main_dishes") {
            $category_name = "Main Dishes";
            $category_number = "1";
        }elseif ($category === "desserts") {
            $category_name = "Desserts";
            $category_number = "3";
        }elseif ($category === "appetizers") {
            $category_name = "Appetizers";
            $category_number = "2";
        }elseif ($category === "beverages") {
            $category_name = "Beverages";
            $category_number = "4";
        }
    }
    echo $category;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body class="body2">
    <header class="hero-container3">
        <nav class="top-nav3">
            <ul class="nav-list">
                <li><a class="nav-list-link" href="../index.php">Home</a></li>
                <li><a class="nav-list-link" href="#">Cart</a></li>
            </ul>
            <img class="logo" src="../../imgs/Hideyoshi.png" alt="logo">
            <ul class="nav-list3">
                <li><a class="nav-list-link3" href="#">Deliver</a></li>
                <li><a class="nav-list-link3" href="#">About</a></li>
            </ul>
        </nav>
        <div class="buttons-container">
            <a class="go-back_button3" href="../index.php">Go Back</a>
            <a class="go-next_button3" href="">Go Next</a>
        </div>
        <section>
            <?php 
                echo "<h1 class='main-dishes-title'>".$category_name."</h1>"
            ?>
            <h2 class="main-dishes-title-japanese">メインディッシュ</h2>
        </section>
    </header>
    <section class="cards_mainDishes-container">
        <?php
            

            foreach ($items as $item) {
                if ($item["category_id"] == $category_number)  {
                    echo "<div class='card2'>".
                        "<a href='../pages/food_index2.php?id=".$item["dish_id"]."'>".
                            "<img class='card2-img' src='../../imgs/".$item["dish_image"]."' alt=''>".
                        "</a>".
                        "<h2 class='card2-h2'>".$item["dish_name"]."</h2>".
                        "<p class='card2-p'>".substr($item["dish_description"],0,85)."...</p>".
                        "<p class='price2'>$".$item["dish_price"]."</p>".
                        "<a  class='btn2' href='../pages/food_index2.php?id=".$item["dish_id"]."'>Add to car</a>".
                        
                    "</div>";
                }
            }
        ?>


        
        
    </section>
</body>

</html>