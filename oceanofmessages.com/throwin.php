<?php

    // configuration
    require("../includes/config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["message"]))
        {
            echo("Your bottle is empty!");
        }
        
        if (!empty($_POST["message"]))
        {
            //convert Microsoft special chars to normal ones
            $msghtml = convert_smart_quotes($_POST["message"]);
            $msg = htmlentities($msghtml, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
    
            // insert result into users table
            $result = query("INSERT INTO messages (msg, user_id) VALUES(?, ?)", $msg, $_SESSION["id"]);
            redirect("/");
        }
        
        // if fails, apologize
        if ($result === false)
        {
            echo("An error occured.");
        }
    }
?>
