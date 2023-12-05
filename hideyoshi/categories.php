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
    } elseif ($category === "Desserts") {
        $category_name = "desserts";
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

        <div class="search-container">
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
        </div>
        <p id='found' class='activity-title'></p>

        </div>

    </header>
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

<!-- <script>
    function getFilters() {

        let info = {
            state: document.getElementById("people_category").value
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
                //console.log(data);

                let found = document.getElementById("found");
                found.innerText = "We found: " + data.length + " destination(s)";

                if (document.getElementById("items") !== null) document.getElementById("items").remove();

                if (data.length > 0) {
                    console.log("sí hay");

                    // let container = document.getElementById("items");
                    let container = document.createElement("div");
                    container.setAttribute("id", "items");
                    // container.classList.add("activities-container");
                    // document.getElementById("destinations").appendChild(container);

                    //data.forEach(function (item) {

                    //     let destination = document.createElement("section");
                    //     destination.classList.add("activity");
                    //     container.appendChild(destination);

                    // });
                }

                console.log("no hay");

            })
            .catch(err => console.log("error: " + err));

    }
</script> -->

</html>