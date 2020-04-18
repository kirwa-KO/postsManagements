<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Ibn Tofail Site</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <img src="images/university.jpg" alt="Background image">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="php/insert_data.php">Sing up</a></li>
                <li><a href="#sing_in">Sing in</a></li>
                <li><a href="php/Sing_out.php">Sing out</a></li>
                <li><a href="php/insert_data.php">Import Data</a></li>
                <li><a href="php/about_us.php">About us</a></li>
            </ul>
        </nav>
        <br/>
        <?php if (!isset($_SESSION['username']))
        {
        echo '<form action="php/sing_in.php" method="POST" id="sing_in">
            <h3>To Sing Put your username and Password</h3>
            <label>Username</label>
            <br/>
            <input type="text" name="username" placeholder="username...."> <br /><br />
            <label>Password</label>
            <br/>
            <input type="password" name="password" placeholder="************"> <br /><br />
            <input type="submit" value="Sing in"/>

        </form>';
        }
        else
        {
            echo '<h3 style="text-align: center;">You are Log in in this is you websites</h3>' . "<br />";
            echo '<h2 style="text-align: center;">' . $_SESSION['sites'] . "<br/>";
        }
        ?>
    </body>
</html>
