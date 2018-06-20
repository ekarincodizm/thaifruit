<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prodrec;

/**
 * ProdrecSearch represents the model behind the search form of `backend\models\Prodrec`.
 */
class ProdrecSearch extends Prodrec
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'trans_date', 'suplier_id', 'raw_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['journal_no', 'description', 'qc_note'], 'safe'],
            [['qty', 'plan_price'], 'number'],
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
        $query = Prodrec::find();

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
            'trans_date' => $this->trans_date,
            'suplier_id' => $this->suplier_id,
            'raw_type' => $this->raw_type,
            'qty' => $this->qty,
            'plan_price' => $this->plan_price,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'journal_no', $this->journal_no])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'qc_note', $this->qc_note]);

        return $dataProvider;
    }
}
