<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sahifa\models\Chapter */
/* @var $form yii\widgets\ActiveForm */
?>
<style>.required label:after {content: " *"; color: red;}</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><?=Html::img('@web/images/modal_close.png')?></span></button>
    <h4 class="modal-title"><?=Html::encode($this->title)?></h4>
</div>
<div class="modal-body">
    <div class="modal_tab">

        <?php $form = ActiveForm::begin([ 'enableClientValidation' => true, 'enableAjaxValidation' => true,'validationUrl' => ['/sahifa/chapter/validate'],'options' => ['id'=>'ChapterModifyForm']]); ?>

        <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title_ar')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title_ur')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title_fa')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'munajaat')->dropDownList(['N' => 'No','Y' => 'Yes']) ?>

        <?= $form->field($model, 'audio_link')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList([ '1' => 'Active', '0' => 'Inactive', ]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
