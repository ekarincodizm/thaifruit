<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = Yii::t('app', 'แก้ไขพนักงาน: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'พนักงาน'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไข');
?>
<div class="employee-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
