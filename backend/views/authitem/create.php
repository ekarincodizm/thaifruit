<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Authitem */

$this->title = Yii::t('app', 'Create Authitem');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Authitems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authitem-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
