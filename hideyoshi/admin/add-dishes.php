<?php

/***
 * 0. include database connection file
 * 1. receive form values from post and insert them into the table (match table field with values from name atributte)
 * 2. for the destination_image insert the value "destination-placeholder.webp"
 * 3. redirect to destinations-list. php after complete the insert into
 */
require_once '../../database.php';
// Reference: https://medoo.in/api/select
$categories = $database->select("tb_categories", "*");
// Reference: https://medoo.in/api/select
$qty_categories = $database->select("tb_people_categories", "*");

$message = "";

if ($_POST) {
    var_dump($_POST);

    if (isset($_FILES["dish_image"])) {

        var_dump($_FILES);

        $errors = [];
        $file_name = $_FILES["dish_image"]["name"];
        $file_size = $_FILES["dish_image"]["size"];
        $file_tmp = $_FILES["dish_image"]["tmp_name"];
        $file_type = $_FILES["dish_image"]["type"];
        $file_ext_arr = explode(".", $_FILES["dish_image"]["name"]);

        $file_ext = end($file_ext_arr);
        $img_ext = ["jpeg", "png", "jpg", "webp"];

        if (!in_array($file_ext, $img_ext)) {
            $errors[] = "File type is not supported";
            $message = "File type is not supported";
        }

        if (empty($errors)) {
            $filename = strtolower($_POST["dish_name"]);
            $filename = str_replace(',', '', $filename);
            $filename = str_replace('.', '', $filename);
            $filename = str_replace(' ', '-', $filename);
            $filenames[] = $filename;

            //nombre que va a tener la imagen que vamos a subir
            $img = $filename . "." . $file_ext;

            move_uploaded_file($file_tmp, "../imgs/" . $img);

            $database->insert("tb_dishes", [
                "people_category_id" => $_POST["people_category"],
                "category_id" => $_POST["dish_category"],
                "dish_name" => $_POST["dish_name"],
                "dish_name_jp" => $_POST["dish_name_JP"],
                "dish_description" => $_POST["dish_description"],
                "dish_description_jp" => $_POST["dish_description_JP"],
                "dish_image" => $img,
                "dish_price" => $_POST["dish_price"]
            ]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dishes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
</head>
<h2 class="table-title center-text">Add New Dishes</h2>

<body>
    <div class="admin-container">
        <?php
        echo $message;
        ?>
        <form class="add-form" method="post" action="add-dishes.php" enctype="multipart/form-data">
            <div class="form-container">
                <!-- name -->
                <div class="form-items">
                    <label for="dish_name">Dish Name</label>
                    <input id="dish_name" class="textfield" name="dish_name" type="text">
                </div>

                <!-- name JP -->
                <div class="form-items">
                    <label for="dish_name_JP">Dish Name Japanese</label>
                    <input id="dish_name_JP" class="textfield" name="dish_name_JP" type="text">
                </div>

                <!-- description -->
                <div class="form-items">
                    <label for="dish_description">Dish Description</label>
                    <textarea id="dish_description" name="dish_description" id="" cols="30" rows="10"></textarea>
                </div>

                <!-- description JP -->
                <div class="form-items">
                    <label for="dish_description_JP">Dish Description Japanese</label>
                    <textarea id="dish_description_JP" name="dish_description_JP" id="" cols="30" rows="10"></textarea>
                </div>

                <!-- people category -->
                <div class="form-items">
                    <label for="people_category">People Category</label>
                    <select name="people_category" id="people_category">
                        <?php
                        foreach ($qty_categories as $qty_category) {
                            echo "<option value='" . $qty_category["people_category_id"] . "'>" . $qty_category["people_category_name"] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- category -->
                <div class="form-items">
                    <label for="dish_category">Dish Category</label>
                    <select name="dish_category" id="dish_category">
                        <?php
                        foreach ($categories as $category) {
                            echo "<option value='" . $category["category_id"] . "'>" . $category["category_name"] . "</option>";
                        }
                        ?>
                    </select>
                </div>



                <!-- price -->
                <div class="form-items">
                    <label for="dish_price">Dish Price</label>
                    <input id="dish_price" class="textfield" name="dish_price" type="text">
                </div>

            </div>
            <div class="add-img-container">
                <!-- image -->
                <div class="form-items">
                    <label for="dish_image">Dish Image</label>
                    <img width="100px" id="preview" src="../imgs/konbu-dashi.jpg" alt="Preview">
                    <!-- provitional width style -->
                    <input id="dish_image" type="file" name="dish_image" onchange="readURL(this)">
                </div>
            </div>

            <!-- btn -->
            <div class="form-items ">
                <input colspan="30" class="submit-btn" type="submit" value="Add New Dish">
            </div>
        </form>
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let preview = document.getElementById('preview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>