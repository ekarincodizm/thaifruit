<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Productionrec;

/**
 * ProductionrecSearch represents the model behind the search form of `backend\models\Productionrec`.
 */
class ProductionrecSearch extends Productionrec
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'trans_date', 'zone_id', 'zone_date', 'zone_status', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'zone_type'], 'integer'],
            [['name', 'note'], 'safe'],
            [['all_qty'], 'number'],
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
        $query = Productionrec::find();

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
            'zone_id' => $this->zone_id,
            'zone_date' => $this->zone_date,
            'zone_status' => $this->zone_status,
            'all_qty' => $this->all_qty,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'zone_type' => $this->zone_type,
        ]);

        if($this->globalSearch != ''){
            $query->orFilterWhere(['like','name',$this->globalSearch])
                ->orFilterWhere(['like','note',$this->globalSearch]);
        }

        return $dataProvider;
    }
}
