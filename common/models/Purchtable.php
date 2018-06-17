<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchtable".
 *
 * @property int $id
 * @property string $purch_no
 * @property string $purch_date
 * @property int $vendor_id
 * @property int $delivery_to
 * @property double $discount_amt
 * @property double $discount_per
 * @property int $confirm_status
 * @property int $require_date
 * @property double $total_amount
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Purchtable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchtable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purch_no','vendor_id'],'required'],
            [['vendor_id', 'delivery_to', 'confirm_status', 'require_date', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['discount_amt', 'discount_per', 'total_amount'], 'number'],
            [['purch_no', 'purch_date', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'purch_no' => Yii::t('app', 'เลขที่ใบสั่งซื้อ'),
            'purch_date' => Yii::t('app', 'วันที่สั่งซื้อ'),
            'vendor_id' => Yii::t('app', 'ผู้ขาย'),
            'delivery_to' => Yii::t('app', 'สถานที่ส่งของ'),
            'discount_amt' => Yii::t('app', 'ส่วนลด'),
            'discount_per' => Yii::t('app', 'ส่วนลดเปอร์เซ็นต์'),
            'confirm_status' => Yii::t('app', 'สถานะอนุมัติ'),
            'require_date' => Yii::t('app', 'วันที่ต้องการสินค้า'),
            'total_amount' => Yii::t('app', 'ราคารวม'),
            'note' => Yii::t('app', 'บันทึก'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขเมื่อ'),
        ];
    }
}
