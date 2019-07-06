<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Episode;

/**
 * EpisodeSearch represents the model behind the search form about `common\models\Episode`.
 */
class EpisodeSearch extends Episode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'movie_id', 'min', 'sec', 'create_time', 'update_time'], 'integer'],
            [[ 'name', 'foreign_name', 'summary'], 'safe'],
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
        $query = Episode::find();

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
            'min' => $this->min,
            'sec' => $this->sec,
            'movie_id' => $this->movie_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);
        //print_r($this);die;
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'foreign_name', $this->foreign_name])
            ->andFilterWhere(['like', 'summary', $this->summary]);
        return $dataProvider;
    }
}
