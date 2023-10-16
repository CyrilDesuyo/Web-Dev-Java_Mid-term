<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Signup</title>
</head>
<body>
    <div class="wrapper">
        <form action="authenticate_signup.php" method="post">
            <h3>Signup</h3>
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name"><br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>
            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="confirm-password" id="confirm-password"><br>
            <label for="role">Select your role</label>
            <select name="role" id="role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br>
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="Prefer not to say">Prefer not to say</option>
            </select><br>
            <button type="submit">Submit</button><br>
            Already have an account? <a href="login.php">Login Here</a>
        </form>
    </div>
</body>
</html>
