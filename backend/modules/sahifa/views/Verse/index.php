<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\sahifa\models\VerseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Verses');
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
                    if(in_array(Yii::$app->user->identity->role_id,array(1))){
                      echo Html::a(Yii::t('app', 'Create Verse'), ['create'], ['class' => 'btn btn-comman','data-toggle'=>'modal','data-target'=>'#add_new']);
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
                        'attribute' => 'chapter.title_en',
                        'label' => 'Chapter',
                        'filter' => Html::activeDropDownList($searchModel, 'chapter_id', ArrayHelper::map(\app\modules\sahifa\models\Chapter::find()->all(),'id','title_en'),['class'=>'form-control','prompt' => 'Select Status'])
                    ],
                    [
                        'attribute' => 'verse_no',
                        'contentOptions' => ['style' => 'width:50px; white-space: normal;'],
                    ],
                    [
                        'attribute' => 'word_count',
                        'contentOptions' => ['style' => 'width:50px; white-space: normal;'],
                    ],
                    'verse_en:ntext',
                    'verse_ar:ntext',
                    //'verse_ur:ntext',
                    //'verse_fa:ntext',
                    //'verse_hi:ntext',
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
                                  'confirm' => 'Are you sure ? You will lose all the information about this Verse with this action.',
                                  'method' => 'post',
                              ]]);
                        }]
                    ],
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