<?php
include_once("../config.php");
include_once("../includes/dbcon.php");

/**
 * login user
 *
 * @param mysqli $connection The database connection.
 * @param array  $data       The login data (email, password).
 *
 * @return array An associative array with keys 'message' and 'toast_class'.
 */
function loginUser($connection, $data) {
    $email = $data["email"];
    $password = $data["password"];

    $query = "SELECT user_id, password FROM User WHERE email = '$email'";
    $res = mysqli_query($connection, $query);
    $num_rows = mysqli_num_rows($res);

    if ($num_rows === 0) {
        return [
            "message" => "Invalid email or password",
            "toast_class" => "#dc3545" // Danger color
        ];
    }

    $row = mysqli_fetch_assoc($res);
    if (!password_verify($password, $row["password"])) {
        return [
            "message" => "Invalid email or password",
            "toast_class" => "#dc3545" // Danger color
        ];
    }

    session_start();
    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["email"] = $email;
    header("location: ../index.php");
    exit();

    return [];
}

$result = null;
if (isset($_POST["login"])) {
    $result = loginUser($connection, $_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - E-Commerce</title>
        <link rel="stylesheet" href="../assets/css/login.css">
        <link rel="stylesheet" href="../assets/css/footer.css">
        <link rel="stylesheet" href="../assets/css/header.css">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <div class="login-container">
            <h2>Login</h2>
            <?php if ($result) { ?>
            <div style="background-color: <?php echo $result["toast_class"]; ?>;">
                <?php echo $result["message"]; ?>
            </div>
            <?php } ?>
            <form action="../auth/login.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="login" class="btn-login">Login</button>
            </form>
            <div>
                <div><a href="./register.php">Need an account? Register now!</a></div>
                <div><a href="../index.php">Back to Home</a></div>
            </div>
        </div>
        <?php include("../includes/footer.php"); ?>
    </body>
</html>
