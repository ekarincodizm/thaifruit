<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Team */

$this->title = Yii::t('app', 'แก้ไขทีม: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ทีม'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="team-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
