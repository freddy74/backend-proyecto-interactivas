<?php 
    require_once '../database.php';

    // Reference: https://medoo.in/api/select
    $histories = $database->select("tb_history","*");
    $users = $database->select("tb_users","*");

    session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/main.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background: url(./imgs/profile_background.jpg);
            justify-content: center;
            align-items: center;
            height: 100vh;
           
        }

        .profile-container {
            background-color: white;
            border-radius: 1.5rem;
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: left;
            max-width: 80rem;
            width: 100%;
            height: 40rem;
            display:grid;
            grid-template-columns: 1fr 1fr ;
            
        }

        .profile-image {
            width: 9rem;
            height: 9rem;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1.5rem;
        }

        .edit-image {
            cursor: pointer;
            color: #3498db;
            text-decoration: underline;
            display: block;
            margin-top: 1rem;
        }

        .history-container{
            width:100%;
            height:60vh;
            background-color: white;
            border: .2rem solid black;
            align-content:center;
            display:grid;
            grid-template-columns: 1fr 1fr ;
            overflow: auto;
        }
        .container{
            width:100vw;
            display:flex;
            justify-content: center;
            heig
        }
        .username{

        }

        .email{

        }

        .user-type{

        }

        .history-text{
            margin-bottom: 1rem;
        }


        .btn {
            display: inline-block;
            padding: 0.625rem 1.25rem;
            font-size: 1rem; 
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border: 0.0625rem solid #4CAF50; 
            border-radius: 0.3125rem;
            cursor: pointer;
        }
    </style>
    </head>



    <body>
    <header >
        <?php 
            include "./parts/nav.php"
        ?>
   </header>

   <div class = "container">
   <div class="profile-container">
        <!-- <img class="profile-image" src="" alt="profile-picture"> -->
       <!-- <input type="file" id="image-input" style="display: none;">-->
       <!-- <label for="image-input" class="edit-image">Editar Foto</label>-->
       <section>
       <?php 
            echo "<h2>Username: ".$_SESSION["fullname"]."</h2>";
            echo "<h2>Email: ".$_SESSION["mail"]."</h2>";
            echo "<a href='./admin/dishes-list.php' class='btn'>Administration</a>";

        ?>
       </section>
      
        <div class= "history-container">
            <?php 
                foreach ($histories as $history) {
                    foreach ($users as $user) {
                        if ($history["id_user"] == $user["user_id"]) {
                            echo 
                            "<p class='history-text'>".$history["date"]."</p>".
                            "<p class='history-text'>".$history["description"]."</p>";

                        }
                    }
                }
            ?>


        </div>
    </div>
   </div>
            

    

</body>
</html>
