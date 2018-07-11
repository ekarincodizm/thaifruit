<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orchard".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property double $area_size
 * @property int $type_id
 * @property int $team_id
 * @property double $wage
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Orchard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orchard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'],'required'],
            [['area_size', 'wage'], 'number'],
            [['type_id', 'team_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','iscompany'], 'integer'],
            [['name', 'description','latlong','id_card','contact_name','standard','attach_file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'ชื่อ'),
            'description' => Yii::t('app', 'รายละเอียด'),
            'area_size' => Yii::t('app', 'ขนาด'),
            'type_id' => Yii::t('app', 'ประเภทสวน'),
            'team_id' => Yii::t('app', 'ทีม'),
            'wage' => Yii::t('app', 'ค่าจ้าง'),
            'contact_name' => Yii::t('app', 'ชื่อผู้ติดต่อ'),
            'id_card' => Yii::t('app', 'เลขที่บัตรประชาชน'),
            'standard' => Yii::t('app', 'มาตรฐาน'),
            'attach_file' => Yii::t('app', 'เอกสารแนบ'),
            'status' => Yii::t('app', 'สถานะ'),
            'iscompany' => Yii::t('app', 'สวนของบริษัท'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
