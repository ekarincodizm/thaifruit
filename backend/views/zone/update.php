<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Zone */

$this->title = Yii::t('app', 'แก้ไขกอง: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ข้อมูลกอง'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไข');
?>
<div class="zone-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
