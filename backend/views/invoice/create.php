<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Invoice */

$this->title = Yii::t('app', 'สร้างใบเสร็จ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ใบเสร็จ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-create">
    <?= $this->render('_form', [
        'model' => $model,
        'runno' => $runno,
    ]) ?>

</div>
