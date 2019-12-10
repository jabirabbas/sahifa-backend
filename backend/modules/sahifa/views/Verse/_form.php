<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\sahifa\models\Verse */
/* @var $form yii\widgets\ActiveForm */
?>

<style>.required label:after {content: " *"; color: red;}</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><?=Html::img('@web/images/modal_close.png')?></span></button>
    <h4 class="modal-title"><?=Html::encode($this->title)?></h4>
</div>
<div class="modal-body">
    <div class="modal_tab">

        <?php $form = ActiveForm::begin([ 'enableClientValidation' => true, 'enableAjaxValidation' => true,'validationUrl' => ['/sahifa/verse/validate'],'options' => ['id'=>'VerseModifyForm']]); ?>

        <?php $chapters=ArrayHelper::map(\app\modules\sahifa\models\Chapter::findAll(['status'=>1]), 'id', 'title_en'); ?>
        <?= $form->field($model, 'chapter_id')->dropdownList($chapters, ['prompt' => '--Select Chapter--'])->label('Chapter') ?>

        <div class="form-group" style="width:45%; float:left; margin-right: 5%">
            <?= $form->field($model, 'verse_no')->textInput(['type' => 'number', 'min'=>1]) ?>
        </div>   
        <div class="form-group" style="width:50%;float: left;"> 
            <?= $form->field($model, 'word_count')->textInput(['type' => 'number', 'min'=>1]) ?>
        </div>
        <?= $form->field($model, 'verse_en')->textarea(['rows' => 2]) ?>

        <?= $form->field($model, 'verse_ar')->textarea(['rows' => 2]) ?>

        <?= $form->field($model, 'verse_ur')->textarea(['rows' => 2]) ?>

        <?= $form->field($model, 'verse_fa')->textarea(['rows' => 2]) ?>

        <?= $form->field($model, 'verse_hi')->textarea(['rows' => 2]) ?>

        <?php if(Yii::$app->controller->action->id == 'create'){ ?>
            <div class="row comps">
                <div class="col-lg-1">
                    <div class="add_btn" style="margin-top:25px;cursor:pointer;display: flex;align-items: center;height: 30px;justify-content: space-evenly;"><?=Html::img("@web/images/plus.png")?></div>
                </div>  
                <div class="col-lg-3">
                    <?= $form->field($wModel, 'word_sequence[]')->textInput(['type' => 'number', 'min'=>1])->label('Sequence') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($wModel, 'word_en[]')->textInput()->label('English Word') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($wModel, 'word_ar[]')->textInput()->label('Arabic Word') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($wModel, 'word_ur[]')->textInput()->label('Urdu Word') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($wModel, 'word_fa[]')->textInput()->label('Farsi Word') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($wModel, 'word_hi[]')->textInput()->label('Hindi Word') ?>
                </div>
            </div>
        <?php } else {
            $i = 0;
            $words = $wModel->findAll(['verse_id'=>$model->id]);
            if(count($words) > 0){
                $i = 0;
                foreach ($words as $word) { ?>         
                    <div class="row comps">
                        <div class="col-lg-1">
                            <?php if($i > 0){ ?>
                                <div class="remove_btn" style="margin-top:25px;cursor:pointer;display: flex;align-items: center;height: 30px;justify-content: space-evenly;"><?=Html::img("@web/images/cross_btn.png")?></div>
                            <?php } else { ?>
                                <div class="add_btn" style="margin-top:25px;cursor:pointer;display: flex;align-items: center;height: 30px;justify-content: space-evenly;"><?=Html::img("@web/images/plus.png")?></div>
                            <?php } ?>
                            
                        </div>  
                        <div class="col-lg-3">
                            <?= $form->field($wModel, 'word_sequence[]')->textInput(['type' => 'number', 'min'=>1, 'value'=>$word['word_sequence']])->label('Sequence') ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($wModel, 'word_en[]')->textInput(['value'=>$word['word_en']])->label('English Word') ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($wModel, 'word_ar[]')->textInput(['value'=>$word['word_ar']])->label('Arabic Word') ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($wModel, 'word_ur[]')->textInput(['value'=>$word['word_ur']])->label('Urdu Word') ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($wModel, 'word_fa[]')->textInput(['value'=>$word['word_fa']])->label('Farsi Word') ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($wModel, 'word_hi[]')->textInput(['value'=>$word['word_hi']])->label('Hindi Word') ?>
                        </div>
                    </div>
                <?php $i++; }
            } else { ?>
                <div class="row comps">
                    <div class="col-lg-1">
                        <div class="add_btn" style="margin-top:25px;cursor:pointer;display: flex;align-items: center;height: 30px;justify-content: space-evenly;"><?=Html::img("@web/images/plus.png")?></div>
                    </div>  
                    <div class="col-lg-3">
                        <?= $form->field($wModel, 'word_sequence[]')->textInput(['type' => 'number', 'min'=>1])->label('Sequence') ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($wModel, 'word_en[]')->textInput()->label('English Word') ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($wModel, 'word_ar[]')->textInput()->label('Arabic Word') ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($wModel, 'word_ur[]')->textInput()->label('Urdu Word') ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($wModel, 'word_fa[]')->textInput()->label('Farsi Word') ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($wModel, 'word_hi[]')->textInput()->label('Hindi Word') ?>
                    </div>
                </div>
            <?php }    
        } ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>


<?php 
    $remove_img =  \Yii::getAlias('@web')."/images/cross_btn.png";

    $js = "$(document).ready(function(){

                $(document).on('click','.add_btn', function(){
                    var parent = $('.comps:last');
                    var clone = $(parent).clone();
                    $(clone).find('img').attr('src','$remove_img');
                    $(clone).find('.add_btn').removeClass('add_btn').addClass('remove_btn');
                    $(clone).find('input').val('');
                    $(clone).insertAfter($(parent))
                })
                $(document).on('click','.remove_btn', function(){
                    $(this).parents('.comps').remove();
                })
            })";
    $this->registerJs($js);
?>