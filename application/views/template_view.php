<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <meta name="description" content=""/>
  <meta name="keywords" content=""/>
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
        <li><a href="/finances">Finances</a></li>
        <li><a href="/plans">Plans</a></li>
        <li class="last"><a href="/charts">Charts</a></li>
      </ul>

      <br class="clearfix"/>
    </div>
  </div>
  <div id="page">
    <h3>Main menu</h3>
    <ul>
      <li class="first active"><a href="/">Main</a></li>
      <li><a href="/finances">Finances</a></li>
      <li><a href="/plans">Plans</a></li>
      <li class="last"><a href="/charts">Charts</a></li>
    </ul>
  </div>
  <div id="content">
    <div class="box">
        <?php include 'application/views/' . $content_view; ?>
    </div>
    <br class="clearfix"/>
  </div>
</div>

<div id="footer">
  <a href="/">Home Finances</a> &copy; 2018</a>
</div>
</body>
</html>