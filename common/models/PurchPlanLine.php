<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purch_plan_line".
 *
 * @property int $id
 * @property int $plan_id
 * @property int $product_type
 * @property int $plan_type
 * @property int $plan_qty
 * @property int $received_qty
 * @property double $plan_price
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class PurchPlanLine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purch_plan_line';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id', 'product_type', 'plan_type', 'plan_qty', 'received_qty', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['plan_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'plan_id' => Yii::t('app', 'Plan ID'),
            'product_type' => Yii::t('app', 'Product Type'),
            'plan_type' => Yii::t('app', 'Plan Type'),
            'plan_qty' => Yii::t('app', 'Plan Qty'),
            'received_qty' => Yii::t('app', 'Received Qty'),
            'plan_price' => Yii::t('app', 'Plan Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
