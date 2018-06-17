<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchline".
 *
 * @property int $id
 * @property int $purch_id
 * @property int $product_id
 * @property double $qty
 * @property double $line_price
 * @property double $line_disc_amt
 * @property double $line_disc_per
 * @property double $line_amt
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Purchline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purch_id', 'product_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['qty', 'line_price', 'line_disc_amt', 'line_disc_per', 'line_amt'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'purch_id' => Yii::t('app', 'เลขที่ใบสั่งซื้อ'),
            'product_id' => Yii::t('app', 'รหัสสินค้า'),
            'qty' => Yii::t('app', 'จำนวน'),
            'line_price' => Yii::t('app', 'ราคา'),
            'line_disc_amt' => Yii::t('app', 'ส่วนลด'),
            'line_disc_per' => Yii::t('app', 'ส่วนลดเปอร์เซ็นต์'),
            'line_amt' => Yii::t('app', 'ราคารวม'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
