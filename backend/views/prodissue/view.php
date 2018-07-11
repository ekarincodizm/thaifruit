<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Prodissue */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ใบเบิกวัตถุดิบ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodissue-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'issue_no',
            'trans_date',
            'section_id',
            'qty',
            'issue_by',
            'note',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
