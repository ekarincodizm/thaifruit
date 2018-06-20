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
                    <?= $form->field($model, 'journal_no')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-4">
                    <?php $model->trans_date = !$model->isNewRecord?date('d-m-Y',$model->trans_date):date('d-m-Y');?>
                    <?= $form->field($model, 'trans_date')->widget(DatePicker::className(),[
                        'name'=>'trans_date',
                        'pluginOptions' => [
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
                        'data'=>ArrayHelper::map(\backend\helpers\RawType::asArrayObject(),'id','name'),
                        'options' => ['placeholder'=>'เลือก'],
                    ]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'qty')->textInput(['style'=>'font-size: 32px;height: 100px;font-weight: bold;']) ?>
                </div>
            </div>

            <?= $form->field($model, 'qc_note')->textarea(['rows' => 6]) ?>
           <div class="row">
               <div class="col-lg-4">
                   <?= $form->field($model, 'status')->textInput(['readonly'=>'readonly']) ?>
               </div>
           </div>



            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
