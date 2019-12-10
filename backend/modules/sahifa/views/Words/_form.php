<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sahifa\models\Words */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="words-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'verse_id')->textInput() ?>

    <?= $form->field($model, 'word_sequence')->textInput() ?>

    <?= $form->field($model, 'word_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'word_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'word_ur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'word_fa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'word_hi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
