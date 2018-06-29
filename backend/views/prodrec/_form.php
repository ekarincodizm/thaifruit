<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Prodrec */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodrec-form">
    <div class="panel panel-headlin">
        <div class="panel-heading">
            <h3><i class="fa fa-files-o"></i> <?=$this->title?> <small></small></h3>

            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>


            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'journal_no')->textInput(['maxlength' => true,'value'=>$model->isNewRecord?$runno:$model->journal_no,'readonly'=>'readonly']) ?>
                </div>
                <div class="col-lg-4">
                    <?php $model->trans_date = !$model->isNewRecord?date('d-m-Y',$model->trans_date):date('d-m-Y');?>
                    <?= $form->field($model, 'trans_date')->widget(DatePicker::className(),[
                        'name'=>'trans_date',
                        'pluginOptions' => [
                                'format'=>'dd-mm-yyyy'
                        ]
                    ]) ?>
                </div>
                <div class="col-lg-4">

                    <?= $form->field($model, 'suplier_id')->widget(Select2::className(),[
                        'data'=>ArrayHelper::map(\backend\models\Suplier::find()->all(),'id','name'),
                        'options' => ['placeholder'=>'เลือก'],
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'raw_type')->widget(Select2::className(),[
                        'data'=>ArrayHelper::map(\backend\models\Product::find()->all(),'id','name'),
                        'options' => ['placeholder'=>'เลือก'],
                    ]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'zone_id')->widget(Select2::className(),[
                        'data'=>ArrayHelper::map(\backend\models\Zone::find()->all(),'id','name'),
                        'options' => ['placeholder'=>'เลือก'],
                    ]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'plan_price')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'qty')->textInput(['style'=>'font-size: 32px;height: 100px;font-weight: bold;']) ?>
                </div>
            </div>

           <div class="row">
               <div class="col-lg-12">
                   <?= $form->field($model, 'qc_note')->textarea(['rows' => 4,'style'=>'font-size: 24px;']) ?>
               </div>
           </div><br>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
