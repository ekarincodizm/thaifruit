<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $vendor_group_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_code','name','vendor_group_id'],'required'],
            [['vendor_group_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','vendor_type','payment_type','payment_term','delivery_type','lead_time'], 'integer'],
            [['name', 'description','vendor_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vendor_code' => Yii::t('app', 'รหัสผู้ขาย'),
            'name' => Yii::t('app', 'ชื่อ'),
            'description' => Yii::t('app', 'รายละเอียด'),
            'vendor_group_id' => Yii::t('app', 'กลุ่มผู้ขาย'),
            'payment_term' => Yii::t('app', 'วิธีการชำระเงิน'),
            'payment_type' => Yii::t('app', 'Payment Type'),
            'delivery_type' => Yii::t('app', 'วิธีส่งมอบสินค้า'),
            'lead_time' => Yii::t('app', 'ระยะเวลาส่งมอบ'),
            'vendor_type' => Yii::t('app', 'ประเภทผู้ขาย'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
