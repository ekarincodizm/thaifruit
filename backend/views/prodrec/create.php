<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Prodrec */

$this->title = Yii::t('app', 'Create Prodrec');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prodrecs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodrec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
