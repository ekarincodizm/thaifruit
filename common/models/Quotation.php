<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotation".
 *
 * @property int $id
 * @property string $quotation_no
 * @property int $require_date
 * @property int $customer_id
 * @property string $customer_ref
 * @property int $approve_status
 * @property int $approve_by
 * @property int $approve_date
 * @property double $total_amount
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotation_no'],'required'],
            [['require_date', 'customer_id', 'approve_status', 'approve_by', 'approve_date', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['total_amount'], 'number'],
            [['quotation_no', 'customer_ref', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'quotation_no' => Yii::t('app', 'เลขที่ใบเสนอราคา'),
            'require_date' => Yii::t('app', 'วันที่ต้องการ'),
            'customer_id' => Yii::t('app', 'รหัสลูกค้า'),
            'customer_ref' => Yii::t('app', 'รหัสอ้างอิงลูกค้า'),
            'approve_status' => Yii::t('app', 'สถานะอนุมัติ'),
            'approve_by' => Yii::t('app', 'ผู้อนุมัติ'),
            'approve_date' => Yii::t('app', 'วันที่อนุมัติ'),
            'total_amount' => Yii::t('app', 'ราคารวม'),
            'note' => Yii::t('app', 'บันทึก'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
