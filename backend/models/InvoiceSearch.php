<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form of `backend\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'invoice_date', 'suplier_id', 'payment_type', 'payment_term', 'delivery_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['invoice_no', 'note'], 'safe'],
            [['total_amount'], 'number'],
            [['globalSearch'],'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Invoice::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'invoice_date' => $this->invoice_date,
            'suplier_id' => $this->suplier_id,
            'payment_type' => $this->payment_type,
            'payment_term' => $this->payment_term,
            'delivery_type' => $this->delivery_type,
            'total_amount' => $this->total_amount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        if($this->globalSearch !='') {
            $query->orFilterWhere(['like', 'invoice_no', $this->globalSearch])
                ->orFilterWhere(['like', 'note', $this->globalSearch]);
        }
        return $dataProvider;
    }
}
