<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "journaltable".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $account_type
 * @property int $account_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Journaltable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journaltable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'],'required'],
            [['name'],'unique'],
            [['account_type', 'account_id', 'created_at', 'updated_at', 'created_by', 'updated_by','trans_type'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'ชื่อสมุดบันทึก'),
            'description' => Yii::t('app', 'รายละเอียด'),
            'trans_type' => Yii::t('app', 'ประเภทรายการ'),
            'account_type' => Yii::t('app', 'ประเภทบันชี'),
            'account_id' => Yii::t('app', 'เลขที่บัญชี'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
