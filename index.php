<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Commerce</title>
        <link rel="stylesheet" href="assets/css/header.css"> 
        <link rel="stylesheet" href="assets/css/footer.css"> 
        <link rel="stylesheet" href="assets/css/register.css"> 
    </head>
    <body>
        <?php include("includes/header.php"); ?>
        <div class="container">
<?php 
if (isset($_SESSION["user_id"]) && isset($_SESSION["email"])) {
echo $_SESSION["user_id"] . " | " . $_SESSION["email"];
} else {
echo "User not logged in.";
}
?>
</div>

        <?php include("includes/footer.php"); ?>
    </body>
</html>
