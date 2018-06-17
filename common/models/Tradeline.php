<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tradeline".
 *
 * @property int $id
 * @property int $tradeid
 * @property int $product_group
 * @property int $product_id
 * @property double $from_qty
 * @property double $to_qty
 * @property double $price
 * @property double $discount
 * @property int $form_date
 * @property int $to_data
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Tradeline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tradeline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tradeid', 'product_group', 'product_id', 'form_date', 'to_data', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['from_qty', 'to_qty', 'price', 'discount'], 'number'],
            [['note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tradeid' => Yii::t('app', 'Tradeid'),
            'product_group' => Yii::t('app', 'Product Group'),
            'product_id' => Yii::t('app', 'Product ID'),
            'from_qty' => Yii::t('app', 'From Qty'),
            'to_qty' => Yii::t('app', 'To Qty'),
            'price' => Yii::t('app', 'Price'),
            'discount' => Yii::t('app', 'Discount'),
            'form_date' => Yii::t('app', 'Form Date'),
            'to_data' => Yii::t('app', 'To Data'),
            'note' => Yii::t('app', 'Note'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
