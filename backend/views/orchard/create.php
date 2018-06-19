<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Orchard */

$this->title = Yii::t('app', 'สร้างสวน');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'สวน'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orchard-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
