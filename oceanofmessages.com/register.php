<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must confirm your password.");
        }
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Your confirmation does not match your password.");
        }
        
        // insert result into users table
        $result = query("INSERT INTO users (username, hash) VALUES(?, ?)", $_POST["username"], crypt($_POST["password"]));

        // if fails, apologize
        if ($result === false)
        {
            apologize("An error occured.");
        }
        
        // log in user
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $_SESSION["id"] = $rows[0]["id"];
        
        // directs back to home page
        redirect("/doc.php");
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>
