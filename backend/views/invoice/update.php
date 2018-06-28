<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Invoice */

$this->title = Yii::t('app', 'แก้ไขใบเสร็จ: ' . $model->invoice_no, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ใบเสร็จ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->invoice_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไข');
?>
<div class="invoice-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
