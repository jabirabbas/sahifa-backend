<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<style>.required label:after {content: " *"; color: red;}</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><?=Html::img('@web/images/modal_close.png')?></span></button>
    <h4 class="modal-title"><?=Html::encode($this->title)?></h4>
</div>
<div class="modal-body">
    <div class="modal_tab">

        <?php $form = ActiveForm::begin([ 'enableClientValidation' => true, 'enableAjaxValidation' => true,'validationUrl' => ['/user/validate'],'options' => ['id'=>'UserModifyForm']]); ?>

	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['type' => 'email', 'maxlength' => true]) ?>

        <?= $form->field($model, 'password_hash')->textInput(['type' => 'password', 'maxlength' => true]) ?>

        <?= $form->field($model, 'role_id')->dropDownList(ArrayHelper::map(\common\models\roles::find()->all(),'id','role'),['prompt'=>'--Select Role--']) ?>

        <?= $form->field($model, 'status')->dropDownList([ '1' => 'Active', '0' => 'Inactive']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
