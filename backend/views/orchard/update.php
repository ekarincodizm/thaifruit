<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orchard */

$this->title = Yii::t('app', 'แก้ไขสวน: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'สวน'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไข');
?>
<div class="orchard-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
