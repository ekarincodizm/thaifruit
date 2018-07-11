<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prodissue;

/**
 * ProdissueSearch represents the model behind the search form of `backend\models\Prodissue`.
 */
class ProdissueSearch extends Prodissue
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'trans_date', 'section_id', 'qty', 'issue_by', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['issue_no', 'note'], 'safe'],
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
        $query = Prodissue::find();

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
            'section_id' => $this->section_id,
            'qty' => $this->qty,
            'issue_by' => $this->issue_by,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        if($this->globalSearch != ''){
            $query->orFilterWhere(['like','issue_no',$this->globalSearch])
                ->orFilterWhere(['like','note',$this->globalSearch]);
        }

        return $dataProvider;
    }
}
