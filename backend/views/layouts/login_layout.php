<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use backend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page login-bg" style="min-height: 100%;">
    <?php $this->beginBody() ?>
    <div class="container">
        <?/*= Alert::widget() */?>
        <?php if(Yii::$app->session->hasFlash('success')):?>
            <div style="position: absolute;top: 20px; font-size:16px; min-width:300px; padding:20px; right:20px;background-color: lightgreen;border:1px solid green; border-radius: 5px" id="flash">
                <i class="glyphicon glyphicon-check"></i> <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>    
        <?php endif; ?>
        <?php if(Yii::$app->session->hasFlash('error')):?>
            <div style="position: absolute;top: 20px; font-size:16px; min-width:300px; padding:20px; right:20px;background-color: pink; border-radius: 5px" id="flash">
                <i class="glyphicon glyphicon-alert"></i> <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>    
        <?php endif; ?>
        <?= $content ?>
    </div>
<?php
    if (class_exists('yii\debug\Module')) {
        $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
    }
    $this->endBody();
?>
</body>
</html>
<?php $this->endPage() ?>

<script>
 setTimeout(function(){
    $("#flash").fadeOut("slow");
},3000);
</script>    