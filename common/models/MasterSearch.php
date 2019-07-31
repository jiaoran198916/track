<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Master;

/**
 * MasterSearch represents the model behind the search form about `common\models\Master`.
 */
class MasterSearch extends Master
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'douban_id', 'user_id', 'create_time', 'update_time'], 'integer'],
            [['name', 'ename', 'pic', 'birthday', 'place', 'desc'], 'safe'],
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
        $query = Master::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0,
            ],
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
            'douban_id' => $this->douban_id,
            'user_id' => $this->user_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ename', $this->ename])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}
