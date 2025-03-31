<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/E-CommercePHP/config.php';
?>

<header class="header">
    <div class="container">
        <h1 class="logo">E-Commerce</h1>
        <button class="menu-toggle" aria-label="Toggle navigation">☰</button>

        <nav class="nav">
            <ul class="menu">
                <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>auth/login.php">Login</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="<?php echo BASE_URL; ?>auth/register.php" class="btn-register">Register</a></li>
            </ul>
        </nav>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.querySelector(".menu-toggle");
            const menu = document.querySelector(".nav .menu");

            toggleButton.addEventListener("click", function () {
                menu.classList.toggle("active");
            });
        });
    </script>
</header>
