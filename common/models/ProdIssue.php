<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prod_issue".
 *
 * @property int $id
 * @property string $issue_no
 * @property int $trans_date
 * @property int $section_id
 * @property int $qty
 * @property int $issue_by
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProdIssue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prod_issue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['issue_no'],'required'],
            [['section_id', 'qty', 'issue_by', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['issue_no', 'note'], 'string', 'max' => 255],
            [['trans_date'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'issue_no' => Yii::t('app', 'เลขที่เบิก'),
            'trans_date' => Yii::t('app', 'วันที่'),
            'section_id' => Yii::t('app', 'แผนกเบิก'),
            'qty' => Yii::t('app', 'จำนวน'),
            'issue_by' => Yii::t('app', 'ผู้เบิก'),
            'note' => Yii::t('app', 'หมายเหตุ'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
