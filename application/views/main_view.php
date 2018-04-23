    <?php //session_start()
    if (!controller_user::isGuest()) {
        echo "<h2>Hello, " . $_SESSION['user']->name . "</h2>";
    } else {
        echo '<h3><a href="login" id="loginform">Sign in</a> | <a href="registration" id="registerform">Registration</a></h3>';
    } ?>
