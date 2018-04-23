<h1 align="center">Welcome to Home Finances App!</h1>
<p>
    <!--  <img src="/images/...jpg" align="left">-->
    <? session_start() ?>
    Hello, <? echo $_SESSION['user']->name; ?></p>
<h2><a href="/login" id="loginform">Sign in</a> | <a href="registration" id="registerform">Registration</a></h2>
