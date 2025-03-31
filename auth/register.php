<?php
include_once("../config.php");
include_once("../includes/dbcon.php");

/**
 * Registers a new user and returns an array with a message and a toast class color.
 *
 * @param mysqli $connection The database connection.
 * @param array  $data       The registration data (name, email, address, password, confirm_password).
 *
 * @return array An associative array with keys 'message' and 'toast_class'.
 */
function registerUser($connection, $data) {
    $name = $data["name"];
    $email = $data["email"];
    $address = $data["address"];
    $password = $data["password"];
    $confirm_password = $data["confirm_password"];

    if ($password !== $confirm_password) {
        return [
            "message" => "Passwords didn't match.",
            "toast_class" => "#dc3545" // Danger color
        ];
    }

    $select_query = "SELECT user_id FROM User WHERE email = '$email'";
    $res = mysqli_query($connection, $select_query);
    if (!$res) {
        return [
            "message" => "Database query error.",
            "toast_class" => "#dc3545"
        ];
    }
    if (mysqli_num_rows($res) > 0) {
        return [
            "message" => "Email already exist with another account. Please try with another email",
            "toast_class" => "#007bff" // Primary color
        ];
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $user_insert_query = "INSERT INTO User (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
    if (!mysqli_query($connection, $user_insert_query)) {
        return [
            "message" => "Internal server error during user insertion.",
            "toast_class" => "#dc3545"
        ];
    }

    $user_id = mysqli_insert_id($connection);

    $customer_insert_query = "INSERT INTO Customer (user_id, address) VALUES ($user_id, '$address')";
    if (!mysqli_query($connection, $customer_insert_query)) {
        return [
            "message" => "Internal server error during customer insertion.",
            "toast_class" => "#dc3545"
        ];
    }

    return [
        "message" => "Registered successfully",
        "toast_class" => "#28a745" // Success color
    ];
}

$result = null;
if (isset($_POST["register"])) {
    $result = registerUser($connection, $_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="../assets/css/register.css"> 
        <link rel="stylesheet" href="../assets/css/header.css"> 
        <link rel="stylesheet" href="../assets/css/footer.css"> 
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <div class="register-container">
            <h2>Register</h2>
            <?php if ($result) { ?>
            <div style="background-color: <?php echo $result["toast_class"]; ?>;">
                <?php echo $result["message"]; ?>
            </div>
            <?php } ?>
            <form action="../auth/register.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <button type="submit" class="btn-register" name="register">Register Now</button>
            </form>
            <div>
                <div><a href="../auth/login.php">Have an account? Go to login</a></div>
                <div><a href="../index.php">Back to Home</a></div>
            </div>
        </div>
        <?php include("../includes/footer.php"); ?>
    </body>
</html>
