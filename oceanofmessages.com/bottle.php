<?php

    // configuration
    require("../includes/config.php");
    
    // get all messages
    $rows = query("SELECT * FROM messages WHERE user_id = ?", $_SESSION["id"]);
    
    // error check
    if ($rows === false)
    {
        apologize("There is no message in the database");
    }
    
    // create position array to store information
    $positions = [];
    $i = 1;
    foreach ($rows as $row)
    {
        // store into positions
       $positions[] = [
            "number" => $i,
            "message" => $row["msg"],
            "reply" => $row["reply"]
        ];
        $i++;
    }
    
    // render portfolio
    render("bottle.php", ["positions" => $positions, "title" => "bottle"]);

?>
