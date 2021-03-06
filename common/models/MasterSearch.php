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
            [['id', 'douban_id', 'user_id', 'create_time', 'update_time','type'], 'integer'],
            [['name', 'ename', 'pic', 'birthday', 'city_id', 'desc', 'official'], 'safe'],
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
                'pageSize' => 20,
            ]
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
            'type' => $this->type,
            'douban_id' => $this->douban_id,
            'user_id' => $this->user_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ename', $this->ename])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'city_id', $this->city_id])
            ->andFilterWhere(['like', 'desc', $this->desc]);
//        echo $query->createCommand()->getRawSql();die;

        $query->orderBy('id desc');
        return $dataProvider;
    }
}
