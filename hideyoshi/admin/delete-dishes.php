<?php



require_once '../../database.php';
// Reference: https://medoo.in/api/where
if ($_GET) {
    $data = $database->select("tb_dishes", "*", [
        "dish_id" => $_GET["dish_id"]
    ]);
}


if ($_POST) {
    // Reference: https://medoo.in/api/delete
    $database->delete("tb_dishes", [
        "dish_id" => $_POST["id"]
    ]);

    header("location: dishes-list.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Dish</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <h2>Delete Destination: <?php echo $data[0]["dish_name"]; ?></h2>
    <form method="post" action="delete-dishes.php">
        <input name="id" type="hidden" value="<?php echo $data[0]["dish_id"]; ?>">
        <input type="button" onclick="history.back();" value="CANCEL">
        <input type="submit" value="DELETE" onclick="return confirm('Do you really want to delete this destination?');">
    </form>
</body>

</html>