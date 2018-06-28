<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property string $invoice_no
 * @property int $invoice_date
 * @property int $suplier_id
 * @property int $payment_type
 * @property int $payment_term
 * @property int $delivery_type
 * @property string $note
 * @property double $total_amount
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoice_date', 'suplier_id', 'payment_type', 'payment_term', 'delivery_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['total_amount'], 'number'],
            [['invoice_no', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'invoice_no' => Yii::t('app', 'เลขที่'),
            'invoice_date' => Yii::t('app', 'Invoice Date'),
            'suplier_id' => Yii::t('app', 'Suplier ID'),
            'payment_type' => Yii::t('app', 'Payment Type'),
            'payment_term' => Yii::t('app', 'Payment Term'),
            'delivery_type' => Yii::t('app', 'Delivery Type'),
            'note' => Yii::t('app', 'Note'),
            'total_amount' => Yii::t('app', 'Total Amount'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
