<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\sahifa\models\Verse */

$this->title = Yii::t('app', 'Update Verse');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Verses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?= $this->render('_form', [
    'model' => $model,
    'wModel' => $wModel,
]) ?>
