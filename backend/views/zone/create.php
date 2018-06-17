<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Zone */

$this->title = Yii::t('app', 'สร้างกอง');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ข้อมูลกอง'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
