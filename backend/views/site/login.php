<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title = 'CNAAP Manager :: Login';
?>
<div class="row login-row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-box">
            <div class="card card-container">
                <div class="crad-head clearfix">
                  <div class="logoname">
                    <?=Html::img('@web/images/login-logo.png',['style'=>"vertical-align: text-bottom !important;"]);?>
                    <span class="lname">CNAAP
                    <span class="tagline">Planned Migration</span>
                    </span>
                  </div>
                </div>
                
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login_form',
                        'class' => 'login-form',
                        'options' => ['autocomplete'=>'off']
                    ]); ?>
                        
                    <?= $form->field($model, 'username',['template' => '
                        <div class="form-group has-feedback field-login-username">
                        {input}
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        {error}</div>'])->textInput(['placeholder'=>'Email Address'])->label(false) ?>
                            
                    <?= $form->field($model, 'password',['template' => '
                        <div class="form-group has-feedback field-login-password">
                        {input}
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>{error}'])->passwordInput(['placeholder'=>'Password'])->label(false) ?>
                        
                    <div class="row">
                        <div class="col-md-6" hidden>
                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'template' => '<div class="radcheckinline">
                                                  <div class="checkbox">
                                                {input}
                                                <label for="loginform-rememberme" class="checkbox-custom-label">Remember Me</label></div></div>',
                                'class' => 'checkbox-custom'                
                            ])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Sign in', ['class' => 'btn btn-login btn-block', 'name' => 'login-button']) ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">No Account? <?=Html::a('<strong>Sign Up</strong>',['/site/signup'],['class'=>'text-center'])?></div>
                        <div class="col-md-6 text-right"><span class="version"><?=Html::a('Forgot password?',['/site/forgot'])?></span></div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
              <!-- /.login-box-body -->
            </div>
        </div>
    </div>
</div>
