<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Platillo</title>
    <link rel="stylesheet" href="../css/main.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            /*display: flex;
            align-items: center;
            justify-content: center;*/
            background: url(../../imgs/background_dishes.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-color: black;
        }

        
            /*Grid*/
            .info-container{
                text-align:right;
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
            .order-container{
                font-family:var(--ff-main);
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
                background-color:white; 
                display: flex;
                flex-direction: row;
                align-items: center;
                padding: 3rem;
                border-radius: 2rem;
                margin-top: 7;
            }

            .dish-categories{
                display: flex;
                flex-direction: column;
                justify-content: right;
                text-decoration: none;
                color: black; 
                cursor: inherit;
                text-align:right;
                margin-bottom:2rem;
            }
            /*Grid*/
            /*Text*/
            .dish-name {
                font-size: 5rem; 
                font-weight: bold;
                /* margin-bottom: 4rem; */
                font-family:var(--ff-secondary);
            }

            .dish-category-signatured{
                font-family: var(--ff-main);
                font-size: var(--fs-xs);
                text-decoration:none;
                color: var(--clr-black);
                font-weight:bold;

            }
            .dish-description {
                color: black;
                margin-bottom: 1.875rem;
                font-size: 1.75rem;
            }  
            .dish-price{
                font-family: var(--ff-main);
                font-size: var(--fs-l);
                text-decoration:none;
                color: var(--clr-black);
                font-weight:bold;
                margin-bottom: 1rem
            }
            /*Text*/
            /*Components*/
            .dish-image {
                width: 25vw;
                height: 40vh;
                object-fit: cover;
                border-radius:2rem;
            }
            .nav-cart-button{
                background-color: var(--clr-orange);
                color: #fff;
                border: none;
                padding: 0.9rem 3rem;
                font-size: 1.2rem; 
                cursor: pointer;
                transition: background-color 0.3s;
                font-family:var(--ff-main);
                font-size:var(--fs-xxs);
                font-weight:bold;
                border-radius: 2rem;
            }
            .add-to-cart {
                background-color: var(--clr-orange);
                color: #fff;
                border: none;
                padding: 0.9rem 3rem;
                font-size: 1.2rem; 
                cursor: pointer;
                transition: background-color 0.3s;
                font-family:var(--ff-main);
                font-size:var(--fs-xs);
                font-weight:bold;
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
                gap: 6rem;
                align-items: center;
                justify-content: center;
                padding-top: 2rem;
                margin-bottom: 2rem;
            }
            .nav-list {
                font-family: 'Roboto', sans-serif;
                font-size: var(--fs-xxs);
                font-weight: var(--fw-regular);
                font-size: 18px;

                list-style-type: none;
                text-decoration: none;
                gap: 5rem;
                transition: transform 0.2s ease-in-out;

                align-items: center;
                display: flex;
            }
            .nav:hover{
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
        include "../parts/nav-cart.php";
    ?>

    <div class="details-container">
        <div class="container">
            <div class="image-container" >
                <img class="dish-image" src="../../imgs/gyoza.png" alt="Imagen del Platillo">
            </div>
            
            <div class="info-container">
                <div class="dish-details">
                    <div class="dish-name">Gyoza</div>
                    <p class="dish-price">$19.99</p>


                    <div class="dish-categories">
                        <a class="dish-category-signatured" href='#'>Signatured Dish</a>
                        <a class="dish-category-signatured" href='#'>Category</a>
                    </div>
                    <div class="dish-description">Lorem ipsum dolor sit amet. Non nesciunt eius ut quos sequi et ipsa accusamus in nihil saepe non possimus ullam. Aut praesentium asperiores ea modi minima est consequatur voluptates a esse facilis sit molestias Quis sit eaque repellat.  </div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                
            </div>
        </div>
        
    </div>

    















    
    <!-- <div class="details-container">
        <div class="container">
            <img class="dish-image" src="../../imgs/gyoza.png" alt="Imagen del Platillo">
            <div class="dish-details">
                <div class="dish-name">Gyoza</div>
                <div class="dish-description">Lorem ipsum dolor sit amet. Non nesciunt eius ut quos sequi et ipsa accusamus in nihil saepe non possimus ullam. Aut praesentium asperiores ea modi minima est consequatur voluptates a esse facilis sit molestias Quis sit eaque repellat. Sed voluptas quisquam ut quos deleniti ut beatae sint ut dolore voluptas et temporibus omnis eos distinctio illo ut aliquam sint? </div>
            </div>
            <section class="order-container">
                <div>
                    <h2>Amount:</h2>
                    <input type="number">
                </div>

                <div>
                    <h2>Signatured dish:</h2>
                
                </div>
            </section>
            <div>
            <button class="add-to-cart" onclick="">Add to cart</button>
            </div>

        </div>
    </div> -->


</body>
</html>