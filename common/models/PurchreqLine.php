<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchreq_line".
 *
 * @property int $id
 * @property int $purchreq_id
 * @property int $product_id
 * @property string $noneitem_name
 * @property double $qty
 * @property double $price
 * @property double $line_amount
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class PurchreqLine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchreq_line';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchreq_id', 'product_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['qty', 'price', 'line_amount'], 'number'],
            [['noneitem_name', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'purchreq_id' => Yii::t('app', 'Purchreq ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'noneitem_name' => Yii::t('app', 'Noneitem Name'),
            'qty' => Yii::t('app', 'Qty'),
            'price' => Yii::t('app', 'Price'),
            'line_amount' => Yii::t('app', 'Line Amount'),
            'note' => Yii::t('app', 'Note'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
