<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProdrecSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodrec-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'journal_no') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'trans_date') ?>

    <?= $form->field($model, 'suplier_id') ?>

    <?php // echo $form->field($model, 'raw_type') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'plan_price') ?>

    <?php // echo $form->field($model, 'qc_note') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
