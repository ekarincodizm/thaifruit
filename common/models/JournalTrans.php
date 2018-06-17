<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "journal_trans".
 *
 * @property int $id
 * @property int $journal_id
 * @property int $product_id
 * @property double $qty
 * @property int $journal_type_status
 * @property double $line_amount
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class JournalTrans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['journal_id', 'product_id', 'journal_type_status', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','onhand_qty','diff_qty','from_wh','to_wh','from_loc','to_loc','from_lot','to_lot'], 'integer'],
            [['qty', 'line_amount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'journal_id' => Yii::t('app', 'เลขที่'),
            'product_id' => Yii::t('app', 'รห้สสินค้า'),
            'qty' => Yii::t('app', 'จำนวน'),
            'journal_type_status' => Yii::t('app', 'Journal Type Status'),
            'line_amount' => Yii::t('app', 'จำนวนเงิน'),
            'onhand_qty' => Yii::t('app', 'จำนวน'),
            'diff_qty' => Yii::t('app', 'จำนวนส่วนต่าง'),
            'from_wh' => Yii::t('app', 'คลังต้นทาง'),
            'to_wh' => Yii::t('app', 'คลังปลายทาง'),
            'from_loc' => Yii::t('app', 'ล๊อคต้นทาง'),
            'to_loc' => Yii::t('app', 'ล๊อคปลายทาง'),
            'from_lot' => Yii::t('app', 'ล๊อตต้นทาง'),
            'to_lot' => Yii::t('app', 'ล๊อตปลายทาง'),
         
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
