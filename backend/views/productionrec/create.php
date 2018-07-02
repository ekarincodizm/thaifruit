<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Productionrec */

$this->title = Yii::t('app', 'รับยอดผลิต');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รับยอดผลิต'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productionrec-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
