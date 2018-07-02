<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "production_rec".
 *
 * @property int $id
 * @property int $trans_date
 * @property int $zone_id
 * @property int $zone_date
 * @property int $zone_status
 * @property string $name
 * @property double $all_qty
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProductionRec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production_rec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zone_id'],'required'],
            [['trans_date', 'zone_id','zone_type', 'zone_status', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['all_qty'], 'number'],
            [['zone_date'],'safe'],
            [['name', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'trans_date' => Yii::t('app', 'วันที่'),
            'zone_type' => Yii::t('app', 'ประเภทกอง'),
            'zone_id' => Yii::t('app', 'กอง'),
            'zone_date' => Yii::t('app', 'วันที่กอง'),
            'zone_status' => Yii::t('app', 'สถานะกอง'),
            'name' => Yii::t('app', 'ชื่อ'),
            'all_qty' => Yii::t('app', 'จำนวนผลิต'),
            'note' => Yii::t('app', 'Note'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
