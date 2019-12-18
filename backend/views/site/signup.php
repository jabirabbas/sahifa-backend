<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title = 'CNAAP Manager :: Sign Up';
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
                        <?php $form = ActiveForm::begin([
                            'id' => 'signup_form'
                        ]); ?>

                        <?= $form->field($model, 'role_id')->hiddenInput(['value'=>'4'])->label(false); ?>
                            
                        <?= $form->field($model, 'name',['template' => '
                            <div class="form-group has-feedback">
                            {input}
                            {error}</div>'])->textInput(['placeholder'=>'Name'])->label(false) ?>

                        <?= $form->field($model, 'email',['template' => '
                            <div class="form-group has-feedback">
                            {input}
                            {error}</div>'])->textInput(['placeholder'=>'Email Address'])->label(false) ?>    
                                
                        <?= $form->field($model, 'password_hash',['template' => '
                            <div class="form-group has-feedback">
                            {input}
                            </div>{error}'])->passwordInput(['placeholder'=>'Password'])->label(false) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Sign Up', ['class' => 'btn btn-login btn-block', 'name' => 'signup-button']) ?>
                        </div>

                        <div class="row">
                            <div class="col-md-8">Already Registered? <?=Html::a('<strong>Login</strong>',['/site/login'],['class'=>'text-center'])?></div>
                            <div class="col-md-4 text-right"><span class="version">Version 1.0</span></div>
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
