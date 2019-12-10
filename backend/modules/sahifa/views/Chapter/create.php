<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\sahifa\models\Chapter */

$this->title = Yii::t('app', 'Create Chapter');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chapters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>