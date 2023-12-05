<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            max-width: 25rem;
            width: 100%;
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
    </style>
</head>
<body>


    <div id="profile-container">
        <img class="profile-image" src="" alt="profile-picture">
        <input type="file" id="image-input" style="display: none;">
        <label for="image-input" class="edit-image">Editar Foto</label>
        



        <?php 
            echo "<h2>Nombre de Usuario</h2>";
            echo "<p>Tipo de Usuario: Normal</p>";

        ?>
        
    </div>

</body>
</html>
