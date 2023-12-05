<?php

require_once '../database.php';
$items = $database->select("tb_dishes", "*");

$qty_categories =  $database->select("tb_people_categories", "*");

$category_name = "";
$category_img = "";
$category_number = ""; //guarda id de la categoría

if (isset($_GET['category'])) {
    $category = $_GET['category'];

    if ($category === "main_dishes") {
        $category_name = "Main Dishes";
        $category_number = "1";
    } elseif ($category === "desserts") {
        $category_name = "Desserts";
        $category_number = "3";
    } elseif ($category === "appetizers") {
        $category_name = "Appetizers";
        $category_number = "2";
    } elseif ($category === "beverages") {
        $category_name = "Beverages";
        $category_number = "4";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body class="body2">
    <header class="hero-container3">
        <nav class="top-nav3">
            <ul class="nav-list">
                <li><a class="nav-list-link" href="./index.php">Home</a></li>
                <li><a class="nav-list-link" href="#">Cart</a></li>
            </ul>
            <img class="logo" src="./imgs/Hideyoshi.png" alt="logo">
            <ul class="nav-list3">
                <li><a class="nav-list-link3" href="#">Deliver</a></li>
                <li><a class="nav-list-link3" href="#">About</a></li>
            </ul>
        </nav>
        <div class="buttons-container">
            <a class="go-back_button3" href="./index.php">Go Back</a>
        </div>
        <section>
            <?php
            echo "<h1 class='main-dishes-title'>" . $category_name . "</h1>"
            ?>
            <h2 class="main-dishes-title-japanese">メインディッシュ</h2>
        </section>
    </header>

    <div class="search-container">
        <form class="filter-form">
            <select class="filter" name="people_category" id="people_category">
                <?php
                foreach ($qty_categories as $qty_category) {
                    echo "<option value='" . $qty_category["people_category_id"] . "'>" . $qty_category["people_category_name"] . "</option>";
                }
                ?>
            </select>

            <input id="search" type="button" class="search-btn" value="SEARCH DISHES" onclick="getFilters()"> <!-- evento onclick-->
        </form>
    </div>
    <p id='found' class='found-title'></p>

    </div>

    <section id="cards-container" class="cards_mainDishes-container">
        <?php
        foreach ($items as $item) {
            if ($item["category_id"] == $category_number) {
                echo "<div class='card2'>" .
                    "<a href='./details-ajax.php?id=" . $item["dish_id"] . "'>" .
                    "<img class='card2-img' src='./imgs/" . $item["dish_image"] . "' alt=''>" .
                    "</a>" .
                    "<h2 class='card2-h2'>" . substr($item["dish_name"], 0, 20) . "...</h2>" .
                    "<p class='card2-p'>" . substr($item["dish_description"], 0, 85) . "...</p>" .
                    "<p class='price2'>$" . $item["dish_price"] . "</p>" .
                    "<a  class='btn2' href='./details-ajax.php?id=" . $item["dish_id"] . "'>View Details</a>" .
                    "</div>";
            }
        }
        ?>
    </section>
</body>

<script>
    function getFilters() {

        var categoryNumber = '<?php echo $category_number; ?>'; //traer la id a JS
        console.log(categoryNumber); //debbuging
        let info = {
            qty: document.getElementById("people_category").value,
            category: categoryNumber //se agrega al array de info para traer la categoría desde la bd
        };

        fetch("http://localhost/interactivas2023/backend-proyecto-interactivas/hideyoshi/response.php", {
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': "application/json"
                },
                body: JSON.stringify(info)
            })
            .then(response => response.json())
            .then(data => {
                let found = document.getElementById("found");
                found.innerText = "We found: " + data.length + " dish(es)";

                //limpia el contenedor antes de mostrar nuevos resultados, para evitar duplicados o apilados
                let cardsContainer = document.getElementById("cards-container");
                cardsContainer.innerHTML = "";

                if (data.length > 0) {
                    data.forEach(function(item) {
                        // Verificar si la cantidad de personas coincide y además, filtra por categoría, para mostrar unicamente la seleccionada
                        if (item.people_category_id == info.qty && item.category_id == info.category) {

                            let dish = document.createElement("div");
                            dish.classList.add("card2");

                            let link = document.createElement("a");
                            link.href = './details-ajax.php?id=' + item.dish_id;
                            dish.appendChild(link);

                            let image = document.createElement("img");
                            image.classList.add('card2-img');
                            image.src = './imgs/' + item.dish_image;
                            image.alt = '';
                            link.appendChild(image);

                            let title = document.createElement("h2");
                            title.classList.add('card2-h2');
                            title.innerText = item.dish_name.substr(0, 20) + '...';
                            dish.appendChild(title);

                            let description = document.createElement("p");
                            description.classList.add('card2-p');
                            description.innerText = item.dish_description.substr(1, 70) + '...';
                            dish.appendChild(description);

                            let price = document.createElement("p");
                            price.classList.add('price2');
                            price.innerText = '$' + item.dish_price;
                            dish.appendChild(price);

                            let btn = document.createElement("a");
                            btn.classList.add('btn2');
                            btn.classList.add('read-btn');
                            btn.href = './details-ajax.php?id=' + item.dish_id;
                            btn.innerText = 'View Details';
                            dish.appendChild(btn);

                            cardsContainer.appendChild(dish);
                        }
                    });
                }
            })
            .catch(err => console.log("error: " + err));
    }
</script>

</html>