<?php

    // configuration
    require("../includes/config.php"); 

    // receive the posted data
    $mid = $_POST['mid'];
    //convert Microsoft special chars to normal ones
    $msghtml = convert_smart_quotes($_POST['msg']);
    $msg = htmlentities($msghtml, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
    
    // validate submission
    if (empty($_POST['mid']) || empty($_POST['msg']))
    {
        echo("An error occured");
    }
    
    if (!empty($msg))
    {
        // update result in messages table
        $result = query("UPDATE messages SET reply = ?, reply_id = ? WHERE m_id = ?",$msg, $_SESSION["id"], $mid);
    }
    
    // error check
    if ($result == false || empty($result))
    {
        echo("An error occured");
    }

?>
