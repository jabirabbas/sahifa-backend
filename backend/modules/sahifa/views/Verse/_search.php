<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sahifa\models\VerseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'chapter_id') ?>

    <?= $form->field($model, 'verse_no') ?>

    <?= $form->field($model, 'verse_en') ?>

    <?= $form->field($model, 'verse_ar') ?>

    <?php // echo $form->field($model, 'verse_ur') ?>

    <?php // echo $form->field($model, 'verse_fa') ?>

    <?php // echo $form->field($model, 'verse_hi') ?>

    <?php // echo $form->field($model, 'word_count') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
