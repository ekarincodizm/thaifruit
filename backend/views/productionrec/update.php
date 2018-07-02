<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productionrec */

$this->title = Yii::t('app', 'รับยอดผลิต: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รับยอดผลิต'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไข');
?>
<div class="productionrec-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
