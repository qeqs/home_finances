<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Home Finances</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
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
                <li><a href="/finances">Finances</a></li>
                <li><a href="/plans">Plans</a></li>
                <li><a href="/charts">Charts</a></li>
                <li class="last"><a href="/login/logout">Logout</a></li>
            </ul>
            <br class="clearfix"/>
        </div>
    </div>
    <?php
    session_start();
    echo "<div id='sidebar'>User: ".$_SESSION['user']->name."</div><br>";
    ?>
    <div id="content">
        <div class="box">
            <?php include 'application/views/' . $content_view; ?>
        </div>
        <br class="clearfix"/>
    </div>
</div>
</body>
</html>