<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prod_rec_line".
 *
 * @property int $id
 * @property int $prod_rec_id
 * @property int $product_id
 * @property int $zone_id
 * @property int $qty
 * @property double $price
 * @property string $lot_no
 * @property string $ref_no
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProdRecLine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prod_rec_line';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_rec_id','orchard','team1','team2', 'product_id','line_type','zone_id', 'qty', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['price'], 'number'],
            [['lot_no', 'ref_no','list_zone','qc_note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'prod_rec_id' => Yii::t('app', 'Prod Rec ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'zone_id' => Yii::t('app', 'Zone ID'),
            'qty' => Yii::t('app', 'Qty'),
            'price' => Yii::t('app', 'Price'),
            'lot_no' => Yii::t('app', 'Lot No'),
            'ref_no' => Yii::t('app', 'Ref No'),
            'list_zone' => Yii::t('app', 'List Zone'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
