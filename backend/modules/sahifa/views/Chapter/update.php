<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\sahifa\models\Chapter */

$this->title = Yii::t('app', 'Update Chapter');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chapters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
