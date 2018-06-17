<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sale".
 *
 * @property int $id
 * @property string $sale_no
 * @property int $revise
 * @property int $require_date
 * @property int $customer_id
 * @property string $customer_ref
 * @property int $delvery_to
 * @property int $currency
 * @property int $sale_id
 * @property double $disc_amount
 * @property double $disc_percent
 * @property double $total_amount
 * @property int $quotation_id
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Sale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['revise', 'require_date', 'customer_id', 'delvery_to', 'currency', 'sale_id', 'quotation_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['disc_amount', 'disc_percent', 'total_amount'], 'number'],
            [['sale_no', 'customer_ref', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sale_no' => Yii::t('app', 'Sale No'),
            'revise' => Yii::t('app', 'Revise'),
            'require_date' => Yii::t('app', 'Require Date'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'customer_ref' => Yii::t('app', 'Customer Ref'),
            'delvery_to' => Yii::t('app', 'Delvery To'),
            'currency' => Yii::t('app', 'Currency'),
            'sale_id' => Yii::t('app', 'Sale ID'),
            'disc_amount' => Yii::t('app', 'Disc Amount'),
            'disc_percent' => Yii::t('app', 'Disc Percent'),
            'total_amount' => Yii::t('app', 'Total Amount'),
            'quotation_id' => Yii::t('app', 'Quotation ID'),
            'note' => Yii::t('app', 'Note'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
