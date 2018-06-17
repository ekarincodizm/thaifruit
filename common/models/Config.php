<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property int $id
 * @property int $plant_id
 * @property int $is_currency_rate
 * @property int $is_auto_backup
 * @property int $is_negative_stock
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plant_id', 'is_currency_rate', 'is_auto_backup', 'is_negative_stock', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'plant_id' => Yii::t('app', 'Plant ID'),
            'is_currency_rate' => Yii::t('app', 'Is Currency Rate'),
            'is_auto_backup' => Yii::t('app', 'Is Auto Backup'),
            'is_negative_stock' => Yii::t('app', 'Is Negative Stock'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
