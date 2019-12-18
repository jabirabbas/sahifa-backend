<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title = 'CNAAP Manager :: Forgot Password';
?>
<div class="row login-row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-box">
          <div class="">
            <div class="">
              <div class="card card-container">
                <div class="crad-head clearfix">
                  <div class="logoname">
                    <?=Html::img('@web/images/login-logo.png',['style'=>"vertical-align: text-bottom !important;"]);?>
                    <span class="lname">CNAAP
                    <span class="tagline">Planned Migration</span>
                    </span>
                  </div>
                </div>

                <div class="">
                    <!-- /.login-logo -->
                    <div class="login-box-body">
                        <p class="text-center" style="margin-top:0">Please enter your email address. Password reset link will be sent to your registered email address.</p>
                        <br/>
                        <?php $form = ActiveForm::begin([
                            'id' => 'forgot_form',
                            'class' => 'forgot-form',
                            'options' => ['autocomplete'=>'off']
                        ]); ?>
                            
                        <?= $form->field($model, 'email',['template' => '
                            <div class="form-group has-feedback field-login-username">
                            {input}
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            {error}</div>'])->textInput(['placeholder'=>'Email Address'])->label(false) ?>
                                
                        <div class="form-group">
                            <?= Html::submitButton('Send Password Reset Link', ['class' => 'btn btn-login btn-block', 'name' => 'login-button']) ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6"><?=Html::a('<strong><i class="fa fa-chevron-left"></i> Back to Login</strong>',['/site/login'],['class'=>'text-center'])?></div>
                            <div class="col-md-6 text-right"><span class="version">Version 1.0</span></div>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                  <!-- /.login-box-body -->
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
