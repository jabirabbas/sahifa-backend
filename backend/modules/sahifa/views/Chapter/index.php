<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\sahifa\models\ChapterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Chapters');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-title-wrapper">
  <div class="container-fluid">
      <div class="row margin_bottom_15">
          <div class="col-lg-6 col-md-6">
            <div class="p-title"><?= Html::encode($this->title) ?></div>
          </div>
          <div class="col-lg-6 col-md-6">
              <div class="page-btn text-right">
                  <!--<a href="#" class=""><img src="images/search-icon.png"></a>
                  <span class="btn-divider"><img src="images/btn-divider.png"></span>-->
                  <?php
                    if(in_array(Yii::$app->user->identity->role_id,array(1,2))){
                      echo Html::a(Yii::t('app', 'Create Chapter'), ['create'], ['class' => 'btn btn-comman','data-toggle'=>'modal','data-target'=>'#add_new']);
                    } 
                  ?>
              </div>
          </div>
      </div>
    </div>
</div>

<div class="page-body-wrapper">
  <div class="container-fluid">
    <div class='row'>
      <div class="col-md-12">

        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['class'=>'table-wrapper table-scroll'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                [
                  'attribute'=>'title_en',
                  'contentOptions' => ['style' => 'width:200px; white-space: normal;'],
                ],
                'title_ar',
                'title_ur',
                'title_fa',
                'munajaat',
                [
                    'label' => 'Audio Link',
                    'format' => 'raw',
                    'value' => function($model){
                      return Html::a('Open Link', $model->audio_link,['target'=>'_blank','data-pjax' => '0']);
                    }
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'filter' => Html::activeDropDownList($searchModel, 'status', array('1' => 'Active', '0' => 'Inactive'),['class'=>'form-control','prompt' => 'Select Status']),
                    'value' => function($model){
                      return ($model->status == 1) ? 'Active' : 'Inactive';
                    }
                ],
                'created_on:datetime',
                //'created_by',
                ['class' => 'yii\grid\ActionColumn','visible'=>(in_array(Yii::$app->user->identity->role_id,[1])), 'template' => '{update} {delete}','buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="btn ico-edit"></span>', $url,['title'=>'Update','data-toggle'=>'modal','data-target'=>'#edit']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="btn ico-delete"></span>', ['delete', 'id' => $model->id], [
                          'title' => 'Delete',
                          'data' => [
                              'confirm' => 'Are you sure ? You will lose all the information about this Chapter with this action.',
                              'method' => 'post',
                          ]]);
                    }],],
            ],
        ]); ?>

        <?php Pjax::end(); ?>
      </div>

      <!-- Pagination Wrapper -->
      <div class="pagination-wrapper text-center">
          <nav aria-label="Page navigation">
              <?= GridView::widget([
                'layout'=> "{pager}",
                'pager' => [
                    'prevPageLabel' => '< Prev',
                    'nextPageLabel'  => 'Next >'
                ],
                'dataProvider' => $dataProvider
              ]) ?>  
          </nav>
      </div>
      <!-- Pagination Wrapper End -->


    </div>
  </div>    
</div>

<div class="modal remote fade" id="add_new">
  <div class="modal-dialog">
      <div class="modal-content loader-lg"></div>
  </div>
</div>

<div class="modal remote fade" id="edit">
  <div class="modal-dialog">
      <div class="modal-content loader-lg"></div>
  </div>
</div>