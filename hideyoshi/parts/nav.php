<nav class="top-nav">
        <input class="mobile-check" type="checkbox">
           
            <label class="mobile-btn">
                <span></span>
            </label>
            <ul class="nav-list">
            <img class="logo" src="./imgs/Hideyoshi.png" alt="logo">
                <ul class="responsive-top nav-list">
                <li><a class="nav-list-link" href="./index.php">Home</a></li>
                <li><a class="nav-list-link" href="./cart.php">Cart</a></li>
            </ul>
           
           


            <?php
            
            if (session_status() === PHP_SESSION_NONE) {
                echo "<li><a class='nav-list-link' href='./login.php'>Login</a></li>";
            } else {
                // Verifica si las claves están definidas en $_SESSION antes de intentar acceder a ellas
                if (isset($_SESSION["id"]) && isset($_SESSION["fullname"])) {
                    echo "<li><a class='nav-list-link' href='./profile.php?id=".$_SESSION["id"]."'>".$_SESSION["fullname"]."</a></li>";
                    echo "<li><a class='nav-list-link' href='./logout.php'>Logout</a></li>";
                } else {
                    // Maneja la situación en la que las claves no están definidas
                    echo "<li><a class='nav-list-link' href='./login.php'>Login</a></li>";
                }
            }

                  
                 
             ?>
                
            </ul>
        </nav>