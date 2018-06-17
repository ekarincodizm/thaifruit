<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purch_plan".
 *
 * @property int $id
 * @property string $name
 * @property string $discription
 * @property int $plan_date
 * @property int $product_type
 * @property int $plan_type
 * @property int $plan_qty
 * @property int $received_qty
 * @property double $plan_price
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class PurchPlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purch_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discription', 'note'], 'string'],
            [['plan_date', 'product_type', 'plan_type', 'plan_qty', 'received_qty', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['plan_price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'discription' => Yii::t('app', 'Discription'),
            'plan_date' => Yii::t('app', 'Plan Date'),
            'product_type' => Yii::t('app', 'Product Type'),
            'plan_type' => Yii::t('app', 'Plan Type'),
            'plan_qty' => Yii::t('app', 'Plan Qty'),
            'received_qty' => Yii::t('app', 'Received Qty'),
            'plan_price' => Yii::t('app', 'Plan Price'),
            'note' => Yii::t('app', 'Note'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
