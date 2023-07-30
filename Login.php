<?php

$is_valid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__."/database.php";

    $sql = sprintf("SELECT*FROM user WHERE email = '%s'",$mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user){
        if (password_verify($_POST["password"],$user["password_hash"])){
            session_start();
                
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: FancyAnimals.html");
            exit;
        }
    }
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <link rel="stylesheet" href="login_sigup_interface.css">
</head>
<body>
    
    <div id="form">
        <h1>Log In</h1>
        <!-- <?php if ($is_invalid): ?>
            <em>Invalid login</em>
        <?php endif; ?> -->

        <form method="post">
            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>            
            <button>Log In</button>
        </form>
        <a href="sigup.html"><button>Register</button></a>
    </div>
    

</body>
</html>