<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "production_rec_line".
 *
 * @property int $id
 * @property int $production_rec_id
 * @property int $emp_id
 * @property int $line_num
 * @property int $line_qty
 * @property int $case_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProductionRecLine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production_rec_line';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['production_rec_id', 'emp_id', 'line_num', 'line_qty', 'case_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'production_rec_id' => Yii::t('app', 'เลขที่ผลิต'),
            'emp_id' => Yii::t('app', 'พนักงาน'),
            'line_num' => Yii::t('app', 'ครั้งที่ส่งยอด'),
            'line_qty' => Yii::t('app', 'จำนวน'),
            'case_id' => Yii::t('app', 'ประเภทการส่ง'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
