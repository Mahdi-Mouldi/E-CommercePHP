<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/E-CommercePHP/config.php';
?>

<header class="header">
    <div class="container">
        <h1 class="logo">E-Commerce</h1>
        <nav class="nav">
            <ul class="menu">
                <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>auth/login.php">Login</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="<?php echo BASE_URL; ?>auth/register.php" class="btn-register">Register</a></li>
            </ul>
        </nav>
    </div>
</header>
