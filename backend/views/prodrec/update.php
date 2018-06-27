<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prodrec */

$this->title = Yii::t('app', 'แก้ไขรายการรับ: ' . $model->journal_no, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รับวัตถุดิบ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->journal_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไข');
?>
<div class="prodrec-update">

    <?= $this->render('_form', [
        'model' => $model,
        //'runno' => $runno,
    ]) ?>

</div>
