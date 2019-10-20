<?php
ini_set('session.gc_maxlifetime', 86400);
ini_set('session.cookie_lifetime', 0);
session_set_cookie_params(0);
session_start();

$root = __DIR__;
$page = (isset($_GET['page'])) ? $_GET['page'] : 'home';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="/js/lib/jquery-3.4.1.min.js"></script>
  <script src="/js/main.js"></script>
  <link rel="stylesheet" href="/css/main.css">
  <?php
  if (file_exists(__DIR__.'/pages/'.$page.'/index.js')) {
    echo '<script src="'.'/pages/'.$page.'/index.js'.'"></script>';
  }
  if (file_exists(__DIR__.'/pages/'.$page.'/index.css')) {
    echo '<link rel="stylesheet" href="'.'/pages/'.$page.'/index.css'.'">';
  }
  ?>
  <title>Document</title>
</head>
<body>
  <?php
  include(__DIR__.'/components/main-menu/index.php');

  if (file_exists(__DIR__.'/pages/'.$page.'/index.php')) {
    include(__DIR__.'/pages/'.$page.'/index.php');
  }
  ?>
</body>
</html>