<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Movie;

/**
 * MovieSearch represents the model behind the search form about `common\models\Movie`.
 */
class MovieSearch extends Movie
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'year', 'duration', 'douban_id', 'user_id', 'status', 'create_time', 'update_time','valid'], 'integer'],
            [['name', 'ename', 'musician_id','supervisor_id','director_id', 'desc', 'music_desc'], 'safe'],
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
        $query = Movie::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'year' => $this->year,
            'duration' => $this->duration,
            'douban_id' => $this->douban_id,
            'user_id' => $this->user_id,
            'is_showing' => $this->is_showing,
            'status' => $this->status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ename', $this->ename])
//            ->andFilterWhere(['like', 'master_id', $this->master_id])
            ->andFilterWhere(['like', 'music_desc', $this->music_desc])
            ->andFilterWhere(['like', 'desc', $this->desc]);
        $query->orderBy(['id' => SORT_DESC]);

        return $dataProvider;
    }
}
