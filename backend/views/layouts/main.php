<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
    <title>CNAAP Manager</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    
    <header>
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid" style="padding: 0px 0px;">
                <div class="navbar-header">
                    <div class="app-version">
                        <?=Html::img('@web/images/logo-inside-page.jpg')?>
                    </div>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-header">
                        <!--<button type="button" class="navbar-toggle collapsed" onclick="openNav()">-->
                        <button type="button" class="navbar-toggle collapsed" onclick="openClose()">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <ul class="nav navbar-nav pull-right" style="width: 180px">
                        <li class="dropdown user user-menu" style="width: 100%">
                            <a href="#" class="dropdown-toggle clearfix" data-toggle="dropdown">
                                <div class="user-icon pull-left"><?=Html::img('@web/images/default.jpg',['width'=>35])?></div>
                                <div class="welcome pull-left">
                                    Welcome,
                                    <span class="user-name"><?=Yii::$app->user->identity->name?></span>
                                </div>
                            </a>
                            <ul class="dropdown-menu" style="width: 100%">
                                <li>
                                    <a href="#passwordModal" data-toggle="modal" class="">Change Password</a>
                                </li>
                                <li>
                                    <?=Html::a('Sign Out',['/site/logout'])?>    
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
    </header>

    <aside class="main-sidebar sidenav" id="mySidenav" style="width: 240px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="gw-sidebar">
            <div id="gw-sidebar" class="gw-sidebar">
                <div class="nano-content">
                    <ul class="gw-nav gw-nav-list cd-accordion-menu animated" id="sidenav">
                        <li class="init-un-active"> <?= Html::a('<span>'.Html::img('@web/images/chapter.png', array('width'=>'20', 'height' => '24')).'</span><span>Chapters</span>',['/sahifa/chapter'])?> </li>

                        <li class=""> <?= Html::a('<span>'.Html::img('@web/images/icons/serverinventory.png').'</span><span>Verses</span>', ['/sahifa/verse'])?> </li>

                        <?php if(Yii::$app->user->identity->role_id == 1){ ?>    
                            <li class="init-arrow-right"> <?= Html::a('<span>'.Html::img('@web/images/icons/setting.png').'</span><span class="gw-menu-text">Settings</span>',null,['style'=>'cursor:pointer'])?> </a>
                                <ul class="dropdown-container gw-nav-list">
                                    <li class="init-un-active"> <?= Html::a('Users', ['/user/index'])?></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="body-wrapper" id="main">
        <?php if(Yii::$app->session->hasFlash('success')){ ?>
            <?= Alert::widget(['options' => ['class'=>'alert alert-success', 'style' =>'margin: 20px 20px 20px 0'],'body' => Yii::$app->session->getFlash('success')]) ?>
        <?php } else if(Yii::$app->session->hasFlash('error')) { ?>
            <?= Alert::widget(['options' => ['class'=>'alert alert-danger', 'style' =>'margin: 20px 20px 20px 0'],'body' => Yii::$app->session->getFlash('error')]) ?>
        <?php } else if(Yii::$app->session->hasFlash('info')) { ?>
            <?= Alert::widget(['options' => ['class'=>'alert alert-info', 'style' =>'margin: 20px 20px 20px 0'],'body' => Yii::$app->session->getFlash('info')]) ?>    
        <?php } else if(Yii::$app->session->hasFlash('warning')) { ?>
            <?= Alert::widget(['options' => ['class'=>'alert alert-warning', 'style' =>'margin: 20px 20px 20px 0'],'body' => Yii::$app->session->getFlash('warning')]) ?>    
        <?php } ?>        
        <?= $content ?>
    </div>

</div>


<div class="modal remote fade" id="passwordModal">
    <div class="modal-dialog">
        <div class="modal-content loader-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><?=Html::img('@web/images/modal_close.png')?></span></button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
                <div class="modal_tab">
                    <?php $form = ActiveForm::begin(['action' => ['/site/change-password'],'options' => ['id'=>'passwordForm']]); ?>

                    <div class="form-group required" data-label="Current Password">
                        <label class="control-label">Current Password <font color="red">*</font></label>
                        <input id="current_password" class="form-control" type="password" name="current_password" />
                        <div class="help-block"></div>
                    </div>

                    <div class="form-group required" data-label="New Password">
                        <label class="control-label">New Password <font color="red">*</font></label>
                        <input id="new_password" class="form-control" type="password" name="new_password" />
                        <div class="help-block"></div>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('SAVE', ['class' => 'btn blue-btn']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>        
        </div>
    </div>
</div>

<?php

    if (class_exists('yii\debug\Module')) {
        $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
    }
    $this->endBody();
    $this->registerJs('setTimeout(function(){
                if($(".alert-danger").is(":visible") || $(".alert-success").is(":visible") || $(".alert-info").is(":visible") || $(".alert-warning").is(":visible")){
                    $(".alert-danger, .alert-success, .alert-warning, .alert-info").slideUp("medium");
                }
            },4000)');
    $this->registerJs("$('.init-arrow-right').off('click'); $('.init-arrow-right').click(function(){
                        $(this).find('ul').slideToggle('fast');
                        $(this).toggleClass('init-arrow-down');
                        $('#mySidenav').animate({scrollTop: 1000},300);
                    });");
    $this->registerJs("
        $('.init-un-active a[href*=\"/web/".Yii::$app->controller->id."/\"]').parents('li').addClass('active');

        $('body').on('beforeSubmit', 'form#passwordForm', function () {
             var form = $(this);

            form.find('input').focus(function(){
                $(this).parents('.form-group').removeClass('has-error');
                $(this).next().text('');
            })

             form.find('.required').each(function(){
                if($.trim($(this).find('input').val()) == ''){
                    $(this).addClass('has-error');
                    $(this).find('.help-block').text($(this).data('label')+' cannot be blank');
                }
             })

             if($('#new_password').val() != '' && $('#new_password').val().length < 6){
                $('#new_password').parents('.form-group').addClass('has-error');
                $('#new_password').parents('.form-group').find('.help-block').text('Password should be minimum of 6 characters');
             }

             // return false if form still have some validation errors
             if (form.find('.has-error').length) {
                  return false;
             }
             // submit form
             $.ajax({
                  url: form.attr('action'),
                  type: 'post',
                  data: form.serialize(),
                  success: function (response) {
                    if(response == 0){
                        $('#current_password').parents('.form-group').addClass('has-error');
                        $('#current_password').parents('.form-group').find('.help-block').text('Current Password is incorrect.');
                    } else {
                        window.location.reload();
                    }
                  }
             });
             return false;
        }); ");

?>
</body>
</html>
<?php $this->endPage() ?>
