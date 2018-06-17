<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bank_account".
 *
 * @property int $id
 * @property int $party_id
 * @property int $account_type_id
 * @property string $account_name
 * @property string $account_no
 * @property string $branch
 * @property int $is_primary
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class BankAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['party_id','bank_id','account_no'],'required'],
            [['party_id', 'account_type_id', 'is_primary', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['account_name', 'account_no', 'branch'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'party_id' => Yii::t('app', 'Party ID'),
            'account_type_id' => Yii::t('app', 'ประเภทบัญชี'),
            'account_name' => Yii::t('app', 'ชื่อบัญชี'),
            'bank_id' => Yii::t('app', 'ธนาคาร'),
            'account_no' => Yii::t('app', 'เลขที่บัญชี'),
            'branch' => Yii::t('app', 'สาขา'),
            'is_primary' => Yii::t('app', 'บัญชีหลัก'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
