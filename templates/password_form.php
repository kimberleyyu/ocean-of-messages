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

<form action="password.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="oldp" placeholder="Old Password" type="password"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="newp" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="confirmation" placeholder="Confirm New Password" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Change Password</button>
        </div>
    </fieldset>
</form>
