<!DOCTYPE html>

<html>

    <head>
        <link rel="shortcut icon" href="/img/ocean.ico" type="image/x-icon">
        <link rel="icon" href="/img/ocean.ico" type="image/x-icon">
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        <script src="/js/ocean.js"></script>
        <?php
            $current = $_SERVER['PHP_SELF'];
            $login = "/login.php";
            if ($current === $login)
            {
                echo'<link href="/css/login_style.css" rel="stylesheet"/>';
            }
        ?>
        <?php if (isset($title)): ?>
            <title>Ocean of Messages: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Ocean of Messages</title>
        <?php endif ?>

        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>
    </head>

    <body>

        <div class="container">
            <div id="top">
                <div id="header-left">
                    <img id="header_img" alt="Ocean of Messages" src="/img/logo2.png">
                </div>
                <div id="header-right">
                    <div id = "name"> 
                        <?php 
                        
                        if (!empty($_SESSION["id"]))
                        {
                            $usernames = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
                            $username = $usernames[0];
                            echo($username["username"].", welcome!");
                        }
                        else
                        {
                            echo("Cast out your emotions into our ocean and connect with the world through messages in bottles!");
                        }                    
                        
                        ?> 
                    
                    </div>
                </div>
                
            </div>

            <div id="middle">
