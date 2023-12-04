<?php

require_once '../database.php';
$items = $database->select("tb_dishes", "*");

$qty_categories =  $database->select("tb_people_categories", "*");

$category_name = "";
$category_img = "";
$category_number = "";

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
    <title>Categories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<link rel=" preconnect" href="https://fonts.googleapis.com">
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

        <form>
            <select name="people_category" id="people_category" class="filter">
                <?php
                foreach ($qty_categories as $qty_category) {
                    echo "<option value='" . $qty_category["people_category_id"] . "'>" . $qty_category["people_category_name"] . "</option>";
                }
                ?>
            </select>

            <input id="search" type="button" class="btn search-btn" value="SEARCH DISHES" onclick="getFilters()"> <!-- evento onclick-->
        </form>



    </header>

</body>

<div id="search-container" class="search-container">

    <p id='found' class='found-title'></p>
</div>


</div>

<script>
    function getFilters() {

        let info = {
            qty: document.getElementById("people_category").value
        };

        //fetch
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
                console.log(data);

                let found = document.getElementById("found");
                found.innerText = "We found: " + data.length + " dish(es)";

                if (document.getElementById("items") !== null) document.getElementById("items").remove();

                if (data.length > 0) {
                    console.log("sí hay");


                    // let container = document.getElementById("items");
                    let container = document.createElement("div");
                    container.setAttribute("id", "items");
                    container.classList.add("cards_mainDishes-container");
                    document.getElementById("search-container").appendChild(container);

                    data.forEach(function(item) {

                        let dish = document.createElement("section");
                        dish.classList.add("card2");
                        container.appendChild(dish);

                        let image = document.createElement("img");
                        image.classList.add("card2-img");
                        image.setAttribute("src", './imgs/' + item.dish_image);
                        image.setAttribute("alt", item.dish_name);
                        dish.appendChild(image);

                        let title = document.createElement("h2");
                        title.classList.add("card2-h2");
                        title.innerText = item.dish_name.substr(0, 20) + "...";
                        dish.appendChild(title);

                        let description = document.createElement("p");
                        description.classList.add("card2-p");
                        description.innerText = item.dish_description.substr(1, 70) + "...";
                        dish.appendChild(description);

                        let price = document.createElement("p");
                        price.classList.add("price2");
                        price.innerText = "$" + item.dish_price;
                        dish.appendChild(price);

                        let link = document.createElement("a");
                        link.classList.add("btn2");
                        link.classList.add("read-btn");
                        link.setAttribute("href", "./details-ajax.php?id=" + item.dish_id);
                        link.innerText = "View Details";
                        dish.appendChild(link);


                    });
                }

            })
            .catch(err => console.log("error: " + err));

    }
</script>

<?php

include("./parts/footer.php");

?>

</html>