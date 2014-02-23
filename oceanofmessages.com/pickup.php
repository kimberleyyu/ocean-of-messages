<?php
    require("../includes/constants.php");
    require("../includes/functions.php");
    session_start();
    // configuration
    //require("../includes/config.php"); 
    
    // find out total number of messages
    $count = query("SELECT COUNT(*) FROM messages");
    $num = $count[0]["COUNT(*)"];
    //($_SESSION["id"]);
    $counter = 0;
    
    do
    {
        do
        {
            // generate random number between 1 and total num of msgs
            $rand = rand(1, $num);
            // check if the user_id = their id number
            $user_id = query("SELECT user_id FROM messages WHERE m_id = ?", $rand);
        }
        while ($_SESSION["id"] === $user_id[0]["user_id"]);

        // return that msg    
        $msgs = query("SELECT * FROM messages WHERE m_id = ? && reply_id = 0", $rand);
        if(empty($msgs))
        {
            $counter++;
        }
        else
        {
            $counter = $num + 1;
        }
    }
    while ($counter <= $num);
    
    
    if(empty($msgs))
    {
        exit;
    }
    $msg = $msgs[0];
    
    // old can delete...
    //$msghtml2 = htmlentities(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $msghtml), ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8'); 
    //$msg['msg'] = $msghtml2; 
    
    //convert Microsoft special characters
#    $msghtml = $msg['msg'];
#    $msghtml2 = convert_smart_quotes($msghtml);
#    $msg['msg'] = htmlentities($msghtml2, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
    
    header("Content-Type: application/json", true);
    echo json_encode($msg);
    // this doesn't work but some way needed to redirect....redirect("/");

?>

