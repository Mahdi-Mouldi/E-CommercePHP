<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Commerce</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>
    <div class="register-container">
        <h2>Rgitegister</h2>
        <form action="register.php" method=""POST>
            <label for="first_name">FirstName:</label>
            <input type="text" id="first_name" name="first_name" required>
            <br><br>
            <label for="last_name">LastName:</label>
            <input type="text" id="last_name" name="last_name" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="Password">Password</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <label for="comfirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <br><br>
            <button type="subimt" class="btn-register">Register Now</button>
        </form>
    </div>
</body>
</html>