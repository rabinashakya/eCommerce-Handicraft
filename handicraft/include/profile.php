
<?php 
if(!isset($_SESSION['id'])){ ?>
            <div class="button-container">
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Register</a>
            </div>
            <?php } else { ?>
            <div class="button-container">
            <p>Username: <?php if(isset($_SESSION['name'])) echo $_SESSION['name']?></p>
            <a href="logout.php" class="btn">Logout</a>
            </div>
<?php } ?>