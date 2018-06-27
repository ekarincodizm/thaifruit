<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Prodrec */

$this->title = Yii::t('app', 'บันทึกรับวัตถุดิบ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รับวัตถุดิบ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodrec-create">

    <?= $this->render('_form', [
        'model' => $model,
        'runno' => $runno,
    ]) ?>

</div>
