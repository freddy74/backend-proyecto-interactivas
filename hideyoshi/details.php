<?php
require_once '../database.php';

if (isset($_GET)) {
    $item = $database->select("tb_dishes", [
        "[>]tb_people_categories" => ["people_category_id" => "people_category_id"],
        "[>]tb_categories" => ["category_id" => "category_id"]
    ], [
        "tb_dishes.dish_id",
        "tb_dishes.dish_name",
        "tb_dishes.dish_image",
        "tb_dishes.dish_name_jp",
        "tb_dishes.dish_featured",
        "tb_dishes.dish_description",
        "tb_dishes.dish_description_jp",
        "tb_dishes.dish_price",

        "tb_people_categories.people_category_id",
        "tb_people_categories.people_category_name",
        "tb_categories.category_id",
        "tb_categories.category_name",
    ], [
        "dish_id" => $_GET["id"]
    ]);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Platillo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            /*display: flex;
            align-items: center;
            justify-content: center;*/
            background: url(./imgs/body-background.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-color: black;

        }


        /*Grid*/
        .info-container {
            text-align: right;
        }

        .dish-details {
            padding: 1.875rem;
            text-align: right;
        }

        .details-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .order-container {
            font-family: var(--ff-main);
            font-size: var(--fs-l);
            display: grid;
            grid-template-columns: 1fr;
            align-content: left;
        }

        .container {
            border-radius: 0.5rem;
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 120vh;
            background-color: white;
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 3rem;
            border-radius: 2rem;
            margin-top: 7;
        }

        .dish-categories {
            display: flex;
            flex-direction: column;
            justify-content: right;
            text-decoration: none;
            color: black;
            cursor: inherit;
            text-align: right;
            margin-bottom: 2rem;
        }

        /*Grid*/
        /*Text*/
        .dish-name {
            font-size: 2rem;
            font-weight: bold;
            font-family: 'Roboto Condensed', sans-serif;
        }

        .dish-category-signatured {
            font-family: var(--ff-main);
            font-size: var(--fs-xs2);
            text-decoration: none;
            color: var(--clr-black);
            font-weight: bold;

        }

        .dish-description {
            color: black;
            margin-bottom: 1.875rem;
            font-size: var(--fs-xxs);
        }

        .dish-price {
            font-family: var(--ff-main);
            font-size: 2.1rem;
            text-decoration: none;
            color: green;
            font-weight: bold;
            margin-bottom: 2rem
        }

        /*Text*/
        /*Components*/
        .dish-image {
            width: 25vw;
            height: 40vh;
            object-fit: cover;
            border-radius: 2rem;
        }

        .nav-cart-button {
            background-color: var(--clr-orange);
            color: #fff;
            border: none;
            padding: 0.9rem 3rem;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: var(--ff-main);
            font-size: 1rem;
            font-weight: bold;
            border-radius: 2rem;
        }

        .add-to-cart {
            background-color: var(--clr-orange);
            color: #fff;
            border: none;
            padding: 0.9rem 3rem;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: var(--ff-main);
            font-size: var(--fs-xxs);
            font-weight: bold;
            border-radius: 2rem;
        }

        .add-to-cart:hover {
            background-color: #F42B00;
        }

        /*Components*/
        /*Nav*/
        .nav-cart-button:hover {
            background-color: #F42B00;
        }

        .top-nav {
            display: flex;
            gap: 3rem;
            align-items: center;
            justify-content: center;
            padding-top: 2rem;
            margin-bottom: 2rem;
        }

        .nav-list {
            font-family: 'Roboto', sans-serif;
            font-size: 1rem;
            font-weight: var(--fw-regular);

            list-style-type: none;
            text-decoration: none;
            gap: 5rem;
            transition: transform 0.2s ease-in-out;

            align-items: center;
            display: flex;
        }

        .nav:hover {
            transform: scale(2);
        }

        .nav-list-link {
            text-decoration: none;
            color: rgb(255, 255, 255);
            font-weight: var(--fw-bold);
            transition: transform 0.3s ease-in-out;
        }

        .nav-list-link:hover {
            transform: scale(2);
        }

        .top-nav2 {
            display: flex;
            gap: 6rem;
            align-items: center;
            justify-content: center;
            padding-top: 1rem;
            margin-bottom: 3rem;
        }

        .nav-list2 {
            font-family: var(--ff-secondary);
            font-size: var(--fs-xxs);
            font-weight: var(--fw-bold);
            list-style-type: none;
            text-decoration: none;
            display: flex;
            gap: 0.5rem;
        }

        .nav-list-link2 {
            text-decoration: none;
            color: var(--clr-white);
        }

        /*Nav*/
    </style>


</head>

<body>

    <?php
    include "./parts/nav-cart.php";
    ?>

    <form action="cart.php" method="post">
        <div class="details-container">
            <?php
            echo "<div class='container'>" .
                "<div class='image-container'>" .
                "<img class='dish-image' src='./imgs/" . $item[0]["dish_image"] . "' alt='Imagen del Platillo'>" .
                "</div>" .
                "<div class='info-container'>" .
                "<div class='dish-details'>" .
                "<div class='dish-name'>" . $item[0]["dish_name"] . "</div>" .
                "<p class='dish-price'>$" . $item[0]["dish_price"] . "</p>" .

                "<div class='dish-categories'>";

            if ($item[0]["dish_featured"] === "y") {
                echo "<a class='dish-category-signatured' href='#'>Signatured Dish</a>";
            }

            echo "<a class='dish-category-signatured' href='#'>" . $item[0]["category_name"] . "</a>" .
                "</div>" .
                "<div class='dish-description'>" . $item[0]["dish_description"] . "</div>" .

                "<input name='quantity' type='number'  class='add-to-cart' value='1' min='1'>" .
                "<input name='btn-cart' type='submit' class='add-to-cart' value='Add to Cart'>" .

                "<input name='dish-name' type='hidden' value='" . $item[0]["dish_name"] . "'>" .
                "<input name='dish-price' type='hidden' value='" . $item[0]["dish_price"] . "'>" .
                "<input name='dish-image' type='hidden' value='" . $item[0]["dish_image"] . "'>" .
                "</div>" .
                "</div>" .
                "</div>";
            ?>
        </div>
    </form>

</body>

</html>