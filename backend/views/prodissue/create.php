<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Prodissue */

$this->title = Yii::t('app', 'สร้างใบเบิก');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ใบเบิกวัตถุดิบ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodissue-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
