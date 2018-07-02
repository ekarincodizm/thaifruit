<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Productionrec */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productionrec-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trans_date')->textInput() ?>

    <?= $form->field($model, 'zone_id')->textInput() ?>

    <?= $form->field($model, 'zone_date')->textInput() ?>

    <?= $form->field($model, 'zone_status')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'all_qty')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
