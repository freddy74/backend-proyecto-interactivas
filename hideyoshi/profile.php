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
            echo "<h2>Username</h2>";
            echo "<h2>Email</h2>";
            echo "<h2>Type</h2>";
        ?>
       </section>
      
        <div class= "history-container">

        </div>
    </div>
   </div>
            

    

</body>
</html>
