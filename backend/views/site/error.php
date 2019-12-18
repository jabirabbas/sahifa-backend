<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Error</title>

<link href="https://fonts.googleapis.com/css?family=Kanit:200" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="https://colorlib.com/etc/404/colorlib-error-404-19/css/font-awesome.min.css" />

<link type="text/css" rel="stylesheet" href="https://colorlib.com/etc/404/colorlib-error-404-19/css/style.css" />


<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
<div id="notfound">
<div class="notfound">
<div class="notfound-404">
<h1 style="font-size:55px"><?=Html::encode($this->title)?></h1>
</div>
<h2>Oops! Some Error Occured</h2>
<p><?=nl2br(Html::encode($message))?> <a href="javascript:window.history.back()">Go Back</a></p>

</div>
</div>

<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="10becfb732389870e32a26ff-|49" defer=""></script></body>
</html>

