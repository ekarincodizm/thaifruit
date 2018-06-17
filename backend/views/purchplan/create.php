<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Purchplan */

$this->title = Yii::t('app', 'สร้างแผนสั่งซื้อ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'แผนสั่งซื้อ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchplan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
