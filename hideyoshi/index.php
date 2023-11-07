<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hideyoshi - Japanese Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body class="body1">
    <header class="hero-container">
        <nav class="top-nav">
            <ul class="nav-list">
                <li><a class="nav-list-link" href="./index.html">Home</a></li>
                <li><a class="nav-list-link" href="#">Locations</a></li>

                <li><img class="logo" src="./imgs/Hideyoshi.png" alt="logo"></li>

                <li><a class="nav-list-link" href="#">Deliver</a></li>
                <li><a class="nav-list-link" href="#">About</a></li>
            </ul>
        </nav>
        <section class="hero-text-container">
            <h1 class="hero-title">Enjoy the most traditional</h1>
            <h2 class="hero-title-yellow hero-title">Japanese Food!</h2>
            <p class="hero-text">More than 10 years working, Hideyoshi go beyond the limits of luxury, <br>
                creativity, and good flavor. Our clients are the reason we keep <br>
                cooking the way we do! Please visit some of our restaurants. <br>
                You won’t have better options!</p>
            <div class="cta-container">
                <a class="order-btn" href="#">Order Now</a>
            </div>
        </section>
    </header>
    
    <section class="menu-container2">
        <div class="menu-cards">
            <div class="card">
                <h2 class="text-card">Main Dishes</h2>
                <a href="./pages/categories_index.html">
                    <img class="menu-img" src="imgs/main-dishes-card.png" alt="main-dishes-card">
                </a>
            </div>
            <div class="card">
                <h2 class="text-card">Desserts</h2>
                <a href="./pages/categories_index.html">
                    <img class="menu-img" src="imgs/desserts.png" alt="desserts">
                </a>
            </div>
            <div class="card">
                <h2 class="text-card">Appetizers</h2>
                <a href="./pages/categories_index.html">
                    <img class="menu-img" src="imgs/appetizers.png" alt="appetizers">
                </a>
            </div>
            <div class="card">
                <h2 class="text-card">Beverages</h2>
                <a href="./pages/categories_index.html">
                    <img class="menu-img" src="imgs/beverages.png" alt="beverages">
                </a>
            </div>
        </div>
    </section>
    <section class="menu-container">
        <h2 class="popular-title">Popular Food</h2>
        <p class="popular-text">Check the most popular food in Hideyoshi!
        </p>
        <div class="menu-cards">
            <!-- Slider main container -->
            <div>
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img class="slider-img" src="./imgs/gyoza.png" alt="gyoza">
                            <div class="popular-card-text">
                                <p class="card2-h2">Gyoza</p>
                                <p class="price2">$10.99</p>
                            </div>
                            <div class="popular-btn-cont">
                                <a class="read-more-btn" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img class="slider-img" src="./imgs/gyoza.png" alt="gyoza">
                            <div class="popular-card-text">
                                <p class="card2-h2">Gyoza</p>
                                <p class="price2">$10.99</p>
                            </div>
                            <div class="popular-btn-cont">
                                <a class="read-more-btn" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img class="slider-img" src="./imgs/gyoza.png" alt="gyoza">
                            <div class="popular-card-text">
                                <p class="card2-h2">Gyoza</p>
                                <p class="price2">$10.99</p>
                            </div>
                            <div class="popular-btn-cont">
                                <a class="read-more-btn" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img class="slider-img" src="./imgs/gyoza.png" alt="gyoza">
                            <div class="popular-card-text">
                                <p class="card2-h2">Gyoza</p>
                                <p class="price2">$10.99</p>
                            </div>
                            <div class="popular-btn-cont">
                                <a class="read-more-btn" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img class="slider-img" src="./imgs/gyoza.png" alt="gyoza">
                            <div class="popular-card-text">
                                <p class="card2-h2">Gyoza</p>
                                <p class="price2">$10.99</p>
                            </div>
                            <div class="popular-btn-cont">
                                <a class="read-more-btn" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
    </section>
    <section>
        <div class="subscribe">
            <section class="in-touch">
                <h2 class="subscribe-title">Do you want to share something with us?</h2>
                <p>It's very important for us to know how was the customer atention while you were visiting us</p>

                <form class="subscribe-form" action="">
                    <input class="email" type="text" placeholder="Email Address">
                    <input class="submit-btn" type="submit" value="Send">
                </form>
            </section>
        </div>
    </section>
    <footer class="footer-container">
        <div class="footer-content">
            <div class="social-icons">
                <img src="./imgs/instagram-icon-original.svg" alt="instagram-logo">
                <img src="./imgs/instagram-icon-original.svg" alt="instagram-logo">
                <img src="./imgs/instagram-icon-original.svg" alt="instagram-logo">
                <img src="./imgs/instagram-icon-original.svg" alt="instagram-logo">
            </div>
            <div class="footer-links">
                <section>
                    <h3>Get to Know Us</h3>
                    <ul class="nav-bottom-list">
                        <li><a class="footer-link-text" href="#">About Us</a></li>
                        <li><a class="footer-link-text" href="#">About Us</a></li>
                        <li><a class="footer-link-text" href="#">About Us</a></li>
                        <li><a class="footer-link-text" href="#">About Us</a></li>
                    </ul>
                </section>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>