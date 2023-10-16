<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="authenticate_login.php" method="post">
            <h3>Login</h3>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>
            <button type="submit">Submit</button><br>

            Don't have an account?
            <a href="signup.php">Signup Here</a>
        </form>
    </div>
</body>
</html>