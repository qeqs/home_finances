<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Home Finances</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <a href="/">Home</span> <span class="cms">Finances</span></a>
        </div>

        <div id="menu">
            <ul>
                <li class="first active"><a href="/">Main</a></li>
                <li><a href="/login" id="loginform">Sign in</a></li>
                <li><a href="registration" id="registerform">Registration</a></li>
            </ul>
            <br class="clearfix"/>
        </div>
    </div>

    <div id="content">
        <div class="box">
            <?php include 'application/views/' . $content_view; ?>
        </div>
        <br class="clearfix"/>
    </div>

</div>
</body>
</html>