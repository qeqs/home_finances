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
            <div id="vk_post_304244_396"></div><script type="text/javascript">
  (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//vk.com/js/api/openapi.js?154"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'vk_openapi_js'));
  (function() {
    if (!window.VK || !VK.Widgets || !VK.Widgets.Post || !VK.Widgets.Post("vk_post_304244_396", 304244, 396, '9YTmqQThmgpDQP9OzVJ3x1aITrc')) setTimeout(arguments.callee, 50);
  }());
</script>
            <?php include 'application/views/' . $content_view; ?>
        </div>
        <br class="clearfix"/>
    </div>
</div>
</body>
</html>
