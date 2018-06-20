<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Purchplan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-headline">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-4">
                <?php $model->plan_date = !$model->isNewRecord?date('d-m-Y',$model->plan_date):date('d-m-Y')?>
                <?= $form->field($model, 'plan_date')->widget(DatePicker::className(),[
                        'name'=>'plan_date',
                        'value' => date('d-m-Y'),
                        'pluginOptions' => [
                            'format' => 'dd-mm-yyyy',
                            'todayHighlight' => true
                        ]
                ]) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'product_type')->widget(Select2::className(),[
                    'data'=>ArrayHelper::map(\backend\models\Productcat::find()->all(),'id','name'),
                    'options' => ['placeholder'=>'เลือก']
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'plan_type')->textInput() ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'plan_qty')->textInput() ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'received_qty')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'plan_price')->textInput() ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-lg-4">
                <?php $model->isNewRecord?$model->status =1:0 ?>
                <?= $form->field($model, 'status')->textInput(['readonly'=>'readonly']) ?>
            </div>
        </div>
        <br>
        <div class="btn btn-default"><i class="fa fa-plus-circle"></i> เพิ่มรายการ </div>
        <hr>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
</div>
