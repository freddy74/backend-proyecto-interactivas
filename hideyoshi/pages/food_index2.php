<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Descripción del Platillo</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background:url(../../imgs/waves_background.png);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    header {
      background-color: #343a40;
      color: #fff;
      text-align: center;
      padding: 1.5rem 0;
    }

    .container {
      max-width: 800px;
      margin: 2rem auto;
      padding: 2rem;
      background-color: #fff;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .dish-image {
      width: 80%;
      max-height: 300px;
      object-fit: cover;
      border-radius: 1rem;
      margin-bottom: 2rem;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .dish-name {
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 1rem;
      color: #343a40;
    }

    .dish-price {
      font-size: 2rem;
      color: #e44d26;
      font-weight: bold;
      margin-bottom: 2rem;
    }

    .dish-description{
        
    }

    .btn-container {
      display: flex;
      justify-content: center;
      margin-top: 1.5rem;
    }

    .btn {
      display: inline-block;
      padding: 1.2rem 2.5rem;
      font-size: 1.8rem;
      text-align: center;
      text-decoration: none;
      color: #fff;
      background-color: #e44d26;
      border-radius: 0.5rem;
      cursor: pointer;
      transition: background-color 0.3s;
      margin: 0 1rem;
    }

    
    .btn:hover {
      background-color: #343a40;
    }
  </style>
</head>
<body>
 

  <div class="container">
    <img class="dish-image" src="../../imgs/gyoza.png" alt="Nombre del Platillo">
    <div class="dish-name">Gyoza</div>
    <div class="dish-price">$9.99</div>
    <div class="btn-container">
      <a href="#" class="btn">Add to Cart</a>
    </div>
  </div>
</body>
</html>