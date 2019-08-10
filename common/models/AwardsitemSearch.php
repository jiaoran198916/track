<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Awardsitem;

/**
 * AwardsitemSearch represents the model behind the search form about `common\models\Awardsitem`.
 */
class AwardsitemSearch extends Awardsitem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'awards_id', 'idx', 'year', 'city_id', 'create_time', 'update_time', 'valid'], 'integer'],
            [['pic'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Awardsitem::find();

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
            'awards_id' => $this->awards_id,
            'idx' => $this->idx,
            'year' => $this->year,
            'city_id' => $this->city_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'valid' => $this->valid,
        ]);

        $query->andFilterWhere(['like', 'pic', $this->pic]);

        return $dataProvider;
    }
}
