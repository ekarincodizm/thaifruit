<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prod_rec".
 *
 * @property int $id
 * @property string $journal_no
 * @property string $description
 * @property int $trans_date
 * @property int $suplier_id
 * @property int $raw_type
 * @property double $qty
 * @property double $plan_price
 * @property string $qc_note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProdRec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prod_rec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return
        [
            [['journal_no','suplier_id','qty','raw_type','zone_id'],'required'],
            [[ 'suplier_id', 'raw_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['qty', 'plan_price'], 'number'],
            [['qc_note','lot_no','ref_no'], 'string'],
            [['trans_date',],'safe'],
            [['journal_no', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'journal_no' => Yii::t('app', 'เลขที่'),
            'description' => Yii::t('app', 'รายละเอียด'),
            'trans_date' => Yii::t('app', 'วันที่'),
            'suplier_id' => Yii::t('app', 'รหัสผู้ขาย'),
            'raw_type' => Yii::t('app', 'ประเภทส่ง'),
            'qty' => Yii::t('app', 'จำนวน'),
            'plan_price' => Yii::t('app', 'ราคา'),
            'qc_note' => Yii::t('app', 'บันทีกคุณภาพ'),
            'zone_id' => Yii::t('app','เลขกอง'),
            'ref_no' => Yii::t('app','เลขอ้างอิง'),
            'lot_no' => Yii::t('app','Lot'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
