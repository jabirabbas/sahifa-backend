<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sahifa\models\WordsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="words-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'verse_id') ?>

    <?= $form->field($model, 'word_sequence') ?>

    <?= $form->field($model, 'word_en') ?>

    <?= $form->field($model, 'word_ar') ?>

    <?php // echo $form->field($model, 'word_ur') ?>

    <?php // echo $form->field($model, 'word_fa') ?>

    <?php // echo $form->field($model, 'word_hi') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
