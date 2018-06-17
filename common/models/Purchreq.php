<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchreq".
 *
 * @property int $id
 * @property string $purchreq_no
 * @property int $require_date
 * @property int $request_by
 * @property string $reason
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
class Purchreq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchreq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchreq_no'],'required'],
            [['require_date', 'request_by', 'approve_status', 'approve_by', 'approve_date', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['total_amount'], 'number'],
            [['purchreq_no', 'reason', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'purchreq_no' => Yii::t('app', 'เลขที่ใบขอซ์้อ'),
            'require_date' => Yii::t('app', 'วันที่ต้องการ'),
            'request_by' => Yii::t('app', 'ผู้ขอซื้อ'),
            'reason' => Yii::t('app', 'เหตุผลขอซื้อ'),
            'approve_status' => Yii::t('app', 'อนุมัติ'),
            'approve_by' => Yii::t('app', 'อนุมัติโดย'),
            'approve_date' => Yii::t('app', 'วันที่อนุมัติ'),
            'total_amount' => Yii::t('app', 'ยอดเงินรวม'),
            'note' => Yii::t('app', 'บันทึก'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
