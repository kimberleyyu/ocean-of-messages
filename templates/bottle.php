<div class="navbar">
    <a class = "icon" href="index.php">
        <img alt="Home" src="/img/home_button.png">
    </a>
    <a class = "icon" href="bottle.php">
        <img alt="My Bottles" src="/img/bottle_button.png">
    </a>
    <a class = "icon" href="password.php">
        <img alt="Change Password" src="/img/password_button.png">
    </a>
    <a class = "icon" href="logout.php">
        <img alt="Log Out" src="/img/logout_button.png">
    </a>
    <a class = "icon" href="doc.php">
        <img alt="Instructions" src="/img/instructions_button.png">
    </a>
</div>


<table id="bottles" class="table table-striped">
    <thead>
        <tr>
        <th>Number</th>
        <th>Message</th>
        <th>Reply</th>
        </tr>
    </thead>
    <tbody>
        <?php

        // printing each stock in each row
        foreach ($positions as $position)
        {
            print("<tr>");
            print("<td>{$position["number"]}</td>");
            print("<td><p>{$position["message"]}</p></td>");
            print("<td><p>{$position["reply"]}</p></td>");
            print("</tr>");
        }
        ?>
    </tbody>
</table>
