<h1>Welcome!</h1>
<p>
<!--  <img src="/images/...jpg" align="left">-->
	    <? session_start() ?>
  <a href="/">Home Finances</a> - Hello, <? echo $_SESSION['user']->name; ?></p>
  <h2><a href="/login" id="loginform">Sign in</a> | <a href="registration" id="registerform">Sign up</a></h2>
