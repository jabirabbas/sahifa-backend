<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\sahifa\models\Verse */

$this->title = Yii::t('app', 'Create Verse');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Verses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'wModel' => $wModel
]) ?>
