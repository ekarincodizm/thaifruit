<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
/* @var $this yii\web\View */
/* @var $model backend\models\Prodissue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodissue-form">

    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal form-label-left']]); ?>

    <?= $form->field($model, 'issue_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_date')->textInput() ?>

    <?= $form->field($model, 'section_id')->textInput() ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'issue_by')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">สถานะ
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'','class'=>'form-control']])->label(false) ?>
        </div>
    </div>


    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
