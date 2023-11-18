<?php 
    require_once '../../database.php';

    $categories = $database->select("tb_categories","*");
    $people_categories = $database->select("tb_people_categories","*");
    $message = "";

    if (isset($_GET)){
        $item = $database->select("tb_dishes",[
            "[>]tb_people_categories"=>["people_category_id" => "people_category_id"],
            "[>]tb_categories"=>["category_id" => "category_id"]
        ],[
            "tb_dishes.dish_id",
            "tb_dishes.people_category_id",
            "tb_dishes.category_id",
            "tb_dishes.dish_name",
            "tb_dishes.dish_image",
            "tb_dishes.dish_featured",
            "tb_dishes.dish_description",
            "tb_dishes.dish_price",
            
        ],[
            "dish_id"=>$_GET["dish_id"]
        ]);
    }

    if($_POST){
        //var_dump($item);

        $data = $database->select("tb_dishes","*", [
            'dish_id'=>$_POST['id']
        ]);

        var_dump($_POST);
        if(isset($_FILES["dish_image"]) && $_FILES['dish_image']['name']){
            $errors = [];
            $file_name = $_FILES["dish_image"]["name"];
            $file_size = $_FILES["dish_image"]["size"];
            $file_tmp = $_FILES["dish_image"]["tmp_name"];
            $file_type = $_FILES["dish_image"]["type"];
            $file_ext_arr = explode(".", $_FILES["dish_image"]["name"]);

            $file_ext = end($file_ext_arr);
            $img_ext = ["jpeg", "png", "jpg", "webp"];

            if(!in_array($file_ext, $img_ext)){
                $errors[] = "File type not supported";
                $message = "File type not supported";
            }

            if(empty($errors)){
                $filename = strtolower($_POST["dish_name"]);
                $filename = str_replace(',', '', $filename);
                $filename = str_replace('.', '', $filename);
                $filename = str_replace(' ', '-', $filename);
                $img = "location-".$filename.".".$file_ext;
                move_uploaded_file($file_tmp, "../imgs/".$img);
            }
        }else{
            $img = $data[0]['dish_image'];
        }

        $database->update("tb_dishes",[
            "people_category_id"=>$_POST["people_category"],
            "category_id"=>$_POST["category"],
            "dish_name"=>$_POST["dish_name"],
            "dish_description"=>$_POST["dish_description"],


           // "destination_lname_tr"=>$_POST["destination_lname_tr"],
           // "destination_sname_tr"=>$_POST["destination_sname_tr"],
           // "destination_description_tr"=>$_POST["destination_description_tr"],
            "dish_image"=>$img,
            "dish_price"=>$_POST["dish_price"]
        ],[
            "dish_id"=> $_POST['id']
        ]);
        header("location: dishes-list.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dishes</title>
    <link rel="stylesheet" href="../css/themes/admin.css">
</head>
<body>
    <div class="container">
        <h2>Edit Dish</h2>
        <?php 
            echo $message;
        ?>

        <form method="post" action="edit-dishes.php" enctype="multipart/form-data">
            <div class="form-items">
                <label for="dish_name">Dish Name</label>
                <input id="dish_name" class="textfield" name="dish_name" type="text" value= "<?php echo $item[0]["dish_name"]?>">
            </div>


       
            

            
            <div class="form-items">
                <label for="dish_category">People Category</label>
                <select name="dish_category" id="dish_category">
                <?php 
                    foreach($people_categories as $people_category){
                        if($item[0]["people_category_id"]==$people_category["people_category_id"]){
                            echo"<option value='".$people_category["people_category_id"]."' selected>".$people_category["people_category_name"]."</option>";
                        }else{
                            echo"<option value='".$people_category["people_category_id"]."'>".$people_category["people_category_name"]."</option>";
                        }
                        
                    }
                ?>
                </select>
            </div>


            <div class="form-items">
                <label for="dish_featured"> Dish featured</label>
                <select name="dish_featured" id="dish_featured">
                <?php 
                        if($item[0]["dish_featured"]=="n"){
                            echo"<option value='n' selected>No</option>";
                            echo"<option value='y'>Yes</option>";
                        }else{
                            echo"<option value='n'>No</option>";
                            echo"<option value='y' selected>Yes</option>";
                        }
                ?>
                </select>
            </div>



            <div class="form-items">
                <label for="camping_category">Dish Category</label>
                <select name="camping_category" id="camping_category">
                    <?php 

                        foreach($categories as $category){
                            if($item[0]["category_id"]==$category["category_id"]){
                                echo"<option value='".$category["category_id"]."' selected>".$category["category_name"]."</option>";
                            }else{
                                echo"<option value='".$category["category_id"]."'>".$category["category_name"]."</option>";
                            }
                        }
                    ?>

                </select>
            </div>
            <div class="form-items">
                <label for="dish_description">Dish Description</label>
                <textarea id="dish_description" name="dish_description" id="" cols="30" rows="10"><?php echo $item[0]["dish_description"];?></textarea>
            </div>


        

            <div class="form-items">
                <label for="dish_image">Dish Image</label>
                <img id="preview" src="../../imgs/<?php echo $item[0]["dish_image"];?>" alt="Preview">
                <input id="dish_image" type="file" name="dish_image" onchange="readURL(this)">
            </div>

            <div class="form-items">
                <label for="destination_price">Dish Price</label>
                <input id="dish_price" class="textfield" name="dish_price" type="text" value= "<?php echo $item[0]["dish_price"]?>">
            </div>

            <input type="hidden" name="id" value ="<?php echo $item[0]["dish_id"]; ?>">
            <div class="form-items">
                <input class="submit-btn" type="submit" value="Edit Dish">
            </div>
        </form>
    </div>

    <script>
        function readURL(input) {
            if(input.files && input.files[0]){
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