<nav class="top-nav">
        <input class="mobile-check" type="checkbox">
           
            <label class="mobile-btn">
                <span></span>
            </label>
            <ul class="nav-list">
                <li><a class="nav-list-link" href="./index.php">Home</a></li>
                <li><a class="nav-list-link" href="./cart.php">Cart</a></li>
            </ul>
            <img class="logo" src="./imgs/Hideyoshi.png" alt="logo">
            <ul class="responsive-top nav-list">


            <?php
                if (session_status() === PHP_SESSION_ACTIVE){
                    echo "<li><a class='nav-list-link' href='./profile.php?id=".$_SESSION["id"]."'>".$_SESSION["fullname"]."</a></li>";
                
                 }
                 if (session_status() !== PHP_SESSION_ACTIVE) {
                    echo "<li><a class='nav-list-link' href='./login.php'>Login</a></li>";  
                 }
                  
                 
             ?>
                <li><a class="nav-list-link" href="./logout.php">Logout</a></li>
            </ul>
        </nav>