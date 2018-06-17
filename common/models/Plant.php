<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property string $eng_name
 * @property string $description
 * @property string $tax_id
 * @property string $email
 * @property string $mobile
 * @property string $phone
 * @property string $website
 * @property string $facebook
 * @property string $line
 * @property string $logo
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Plant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'],'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'short_name', 'eng_name', 'description', 'tax_id', 'phone', 'website', 'facebook', 'line', 'logo'], 'string', 'max' => 255],
            [['mobile'],'string','length'=>10],
            [['email'],'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'ชื่อร้าน'),
            'short_name' => Yii::t('app', 'ชื่อย่อ'),
            'eng_name' => Yii::t('app', 'ชื่อภาษาองกฤษ'),
            'description' => Yii::t('app', 'รายละเอียด'),
            'tax_id' => Yii::t('app', 'เลขประจำตัวผู้เสียภาษี'),
            'email' => Yii::t('app', 'อีเมล์'),
            'mobile' => Yii::t('app', 'มือถือ'),
            'phone' => Yii::t('app', 'โทรศัพท์'),
            'website' => Yii::t('app', 'เว็บไซต์'),
            'facebook' => Yii::t('app', 'Facebook'),
            'line' => Yii::t('app', 'Line'),
            'logo' => Yii::t('app', 'Logo'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
