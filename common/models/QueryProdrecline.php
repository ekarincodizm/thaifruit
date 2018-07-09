<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "query_prodrecline".
 *
 * @property int $prod_rec_id
 * @property int $product_id
 * @property string $list_zone
 * @property int $line_type
 * @property string $qty
 */
class QueryProdrecline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'query_prodrecline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_rec_id', 'product_id', 'line_type'], 'integer'],
            [['qty'], 'number'],
            [['list_zone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prod_rec_id' => Yii::t('app', 'Prod Rec ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'list_zone' => Yii::t('app', 'List Zone'),
            'line_type' => Yii::t('app', 'Line Type'),
            'qty' => Yii::t('app', 'Qty'),
        ];
    }
}
