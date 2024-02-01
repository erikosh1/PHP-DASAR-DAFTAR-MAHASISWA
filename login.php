<?php 
    session_start();
    require 'functions.php';


// cek cookie
    if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id

        $result = mysqli_query($conn, "SELECT username FROM userr WHERE id = $id");
        $row = mysqli_fetch_assoc($result);


        // cek cookie dan useername

        if($key === $hash('sha256', $row['username'])) {
            $_SESSION['login'] = true;

        }


    }





if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}




if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM userr WHERE username = '$username'");

    // cek username

    if(mysqli_num_rows($result) === 1) {
        
// cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;

                // cek remember me
            if(isset($_POST["remember"])){
                // buat cokkie
                setcookie('id',$row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time()+60);

            }


            header("Location:index.php");
            exit;
        }
        $error = true;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Halaman login</h1>

    <?php  if(isset($error)) :?>
        <p style="color:red; font-style:italic;">username/sandi salah</p>
        <?php endif; ?>

    <form action="" method="post">
    <ul>
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username" required autocomplete="off">
        </li>
        <li>
            <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember" name="remember">Remember Me</label>
        </li>
        <li>
        <button type="submit" name="login">Login</button>
        </li>
    </ul>
    </form>
</body>
</html>
