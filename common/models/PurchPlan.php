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
            [['name'],'required'],
            [['discription', 'note'], 'string'],
            [[ 'product_type', 'plan_type', 'plan_qty', 'received_qty', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['plan_price'], 'number'],
            [['plan_date',],'safe'],
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
            'name' => Yii::t('app', 'ชื่อ'),
            'discription' => Yii::t('app', 'รายละเอียด'),
            'plan_date' => Yii::t('app', 'วันที่'),
            'product_type' => Yii::t('app', 'ประเภทสินค้า'),
            'plan_type' => Yii::t('app', 'ประเภท'),
            'plan_qty' => Yii::t('app', 'จำนวนวางแผน'),
            'received_qty' => Yii::t('app', 'จำนวนรับ'),
            'plan_price' => Yii::t('app', 'ราคา'),
            'note' => Yii::t('app', 'บันทีก'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
