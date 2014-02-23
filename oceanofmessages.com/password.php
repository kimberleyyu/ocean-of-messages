<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["oldp"]))
        {
            apologize("You must provide your old password.");
        }
        else if (empty($_POST["newp"]))
        {
            apologize("You must provide a new password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must confirm your new password.");
        }
        else if ($_POST["oldp"] === $_POST["newp"])
        {
            apologize("You must enter a different new password.");
        }
        else if ($_POST["newp"] !== $_POST["confirmation"])
        {
            apologize("Your confirmation does not match your password.");
        }
        
        // query database for user
        $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        
        // error checking
        if ($rows === false)
        {
            apologize("An error occurred.");
        }

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];
            
            // if password doesn't match
            if (crypt($_POST["oldp"], $row["hash"]) !== $row["hash"])
            {
                apologize("Your old password is incorrect.");
            }
            else
            {
                // update the password in users table
                $result = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["newp"]), $_SESSION["id"]);
                
                // error check
                if ($result === false)
                {
                    Apologize("Unable to change password.");
                }
                
                // directs back to home page
                redirect("/");
            }
        }
        
        // apologize if anything else goes wrong
        Apologize("An error occured.");
    }
    else
    {
        // else render form
        render("password_form.php", ["title" => "Change password"]);
    }

?>
