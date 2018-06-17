<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock_balance".
 *
 * @property int $id
 * @property int $party_id
 * @property int $product_id
 * @property int $warehouse_id
 * @property int $location_id
 * @property int $lot_id
 * @property double $quantity
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class StockBalance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock_balance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['party_id', 'product_id', 'warehouse_id', 'location_id', 'lot_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['quantity'], 'number'],
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
            'product_id' => Yii::t('app', 'รหัสสินค้า'),
            'warehouse_id' => Yii::t('app', 'คลังสินค้า'),
            'location_id' => Yii::t('app', 'ล๊อคจัดเก็บ'),
            'lot_id' => Yii::t('app', 'ล๊อต'),
            'quantity' => Yii::t('app', 'จำนวน'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
