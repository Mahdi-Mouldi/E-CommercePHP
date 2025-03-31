<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="../assets/css/header.css"> 
    <link rel="stylesheet" href="../assets/css/footer.css"> 
</head>
<body>

<header class="header">
    <div class="container">
        <h1 class="logo">E-Commerce</h1>
        <button class="menu-toggle" aria-label="Toggle navigation">☰</button>

        <nav class="nav">
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="auth/login.php">Login</a></li>
                <li><a href="includes/footer.php">Contact</a></li>
                <li><a href="auth/register.php" class="btn-register">Register</a></li>
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
