<?php 



    require_once '../../database.php';
    // Reference: https://medoo.in/api/where
    if($_GET){
        $data = $database->select("tb_dishes","*",[
            "dish_id"=>$_GET["dish_id"]
        ]);
    }


    if($_POST){
        // Reference: https://medoo.in/api/delete
        $database->delete("tb_dishes",[
            "dish_id"=>$_POST["id"]
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