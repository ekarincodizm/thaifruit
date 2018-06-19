<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Team */

$this->title = Yii::t('app', 'สร้างทีม');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ทีม'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
